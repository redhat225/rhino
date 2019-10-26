$(document).ready(function(){
        $('.item-search-list span').on('click',function(){
            $('.item-search-list span').removeClass('selected-filter');
            $('.item-search-list span i').removeClass('dmp-orange-text').addClass('grey-text');
            $(this).addClass('selected-filter');
            $('i',this).removeClass('grey-text').addClass('dmp-orange-text');
            var $reference=$(this).attr('reference');
            $('#global-search').attr('reference',$reference);
        });

        $('.item-search-list span:first-child').trigger('click');

        $('#global-search').on('keyup',function(e)
        {
            if(e.keyCode!==32)
            {
                var $keyCode = e.keyCode;
                var $blackList = new Array(37,39,38,40);
                var $is_Correct=true;
                var $filter = $('.item-search-list span.selected-filter').attr('reference');
                $.each($blackList,function(index,value){
                    if(value===$keyCode)
                        $is_Correct=false;
               });
            }
            else
            {
                var $is_Correct = true;
                $(this).removeClass('already-search');
            }


           if($is_Correct)
           {
            if(!$(this).hasClass('already-search'))
            {
                switch($filter)
                {
                    case 'patients-search':
                        searchPeople();
                    break;

                    case 'bills-search':
                        searchBill();
                    break;

                    case 'drugs-search':
                        searchDrug();
                    break;

                    default:

                    break;
                }   
            }
           }
           else
            return null;

        });



  });



function searchBill()
{
            var $value = $('#global-search').val();
            if($value.trim().length>2)
            {
                $.ajax({
                    beforeSend : function()
                    {
                        $('#research-picto-side').addClass('hidden');
                        $('#loader-research').removeClass('hidden');
                        $('#global-search').addClass('already-search');
                    },
                    url:'/manager/people/global-search',
                    type:'GET',
                    dataType: 'Text',
                    data : 'tags='+$value+'&kind=search-bill',
                    success: function(data){
                        if(data!=='ko')
                        {
                                var results = JSON.parse(data);

                                if(results.length===1)
                                    $('#result-count-research').text(results.length+' résultat trouvé');
                                else if(results.length>1)
                                    $('#result-count-research').text(results.length+' résultats trouvés');
                                else
                                    $('#result-count-research').text('aucun résultat trouvé');


                                $('#result-research-body').empty();
                                $.each(results,function(index,value){

                                    var $li_element = $('<li class="collection-item custom-card-search-result dmp-grey-2-text avatar left-align"></li>');

                                    if(value.sold_date)
                                    {
                                        var $icon_element = $('<i class="ion-document-text more-light-green-bill-color small"></i>');
                                        var $sold_date = $('<span>R: </span>').append(value.formatted_sold+'<br>');
                                    }
                                    else
                                    {
                                        var $icon_element = $('<i class="ion-document-text more-light-red-bill-color small"></i>');
                                    }

                                    $li_element.append($icon_element);
                                    var $code_invoice = $('<span class="bold" style="padding-bottom:5px !important;display:inline-block;width:100%;"></span>').append(value.code_invoice+'<br>');
                                    $li_element.append($code_invoice);

                                    var $emitted_date = $('<span>E: </span>').append(value.formatted_created+'<br>');
                                    $li_element.append($emitted_date);
                                    if(value.sold_date)
                                    $li_element.append($sold_date);

                                    var $responsible = $('<span></span>').append(value.visit.patient.person.lastname+' '+value.visit.patient.person.firstname);

                                    $li_element.append($responsible);
                                    $li_element.attr('id-bill',value.id);
                                    $li_element.unbind('click').bind('click',showBillInfos);

                                    $('#result-research-body').append($li_element);
                                      
                                });

                                 
                                 if($value!==$('#global-search').val())
                                    searchBill();
                        }
                        else
                            return false;
                    },
                    complete: function(){
                        $('#research-picto-side').removeClass('hidden');
                        $('#loader-research').addClass('hidden');
                        $('#global-search').removeClass('already-search');
                    },
                    error: function(){
                        alert('Une erreur est survenue lors de l\'opération, veuillez réessayer');
                    }
                });
            }
}

function searchDrug()
{
            var $value = $('#global-search').val();
            if($value.trim().length>2)
            {
                $.ajax({
                    beforeSend : function()
                    {
                        $('#research-picto-side').addClass('hidden');
                        $('#loader-research').removeClass('hidden');
                        $('#global-search').addClass('already-search');
                    },
                    url:'/manager/people/global-search',
                    type:'GET',
                    dataType: 'Text',
                    data : 'tags='+$value+'&kind=search-drug',
                    success: function(data){
                        if(data!=='ko')
                        {
                            if(data!=="down")
                            {
                                var results = JSON.parse(data);

                                if(results.length===1)
                                    $('#result-count-research').text(results.length+' résultat trouvé');
                                else if(results.length>1)
                                    $('#result-count-research').text(results.length+' résultats trouvés');
                                else
                                    $('#result-count-research').text('aucun résultat trouvé');


                                $('#result-research-body').empty();

                                $.each(results,function(index,value){
                                   var $li_element = $('<li class="collection-item custom-card-search-result dmp-grey-2-text avatar left-align"></li>');

                                    var $icon_element = $('<i class="ion-ios-medical-outline dmp-grey-2-text small"></i>');
                                    $li_element.append($icon_element);

                                    var $description = $('<span class="requirement-name bold" style="display:inline-block;padding-bottom:5px;width:100%;"></span>').append(value.denomination+'<br>');
                                    $li_element.append($description);

                                    var $cis_code = $('<span class="requirement-ciscode light"></span>').append(value.codeCIS+'<br>');
                                    $li_element.append($cis_code);

                                    $li_element.unbind('click').bind('click',showRequirementInfos);

                                    $('#result-research-body').append($li_element);
                                });

                                 if($value!==$('#global-search').val())
                                    searchDrug();
                            }
                            else
                                Materialize.toast('Connexion défaillante, veuillez réessayer',2000);
                        }
                        else
                        {
                            return false;
                        }
                    },
                    complete: function(){
                        $('#research-picto-side').removeClass('hidden');
                        $('#loader-research').addClass('hidden');
                        $('#global-search').removeClass('already-search');
                    },
                    error: function(){
                        alert('Une erreur est survenue lors de l\'opération, veuillez réessayer');
                    }
                });
            }    
}

function searchPeople()
{
            var $value = $('#global-search').val();
            if($value.trim().length>2)
            {
                $.ajax({
                    beforeSend : function()
                    {
                        $('#research-picto-side').addClass('hidden');
                        $('#loader-research').removeClass('hidden');
                        $('#global-search').addClass('already-search');
                    },
                    url:'/manager/people/global-search',
                    type:'GET',
                    dataType: 'Text',
                    data : 'tags='+$value+'&kind=search-people',
                    success: function(data){
                        if(data!=='ko')
                        {
                            if(data!=="down")
                            {                                
                                var results = JSON.parse(data);

                                if(results.length===1)
                                    $('#result-count-research').text(results.length+' résultat trouvé');
                                else if(results.length>1)
                                    $('#result-count-research').text(results.length+' résultats trouvés');
                                else
                                    $('#result-count-research').text('aucun résultat trouvé');

                                $('#result-research-body').empty();

                                $.each(results,function(index,value){

                                    var $li_element = $('<li class="collection-item custom-card-search-result dmp-grey-2-text avatar left-align zero-padding"></li>');

                                    var $under_wrapper = $('<div class="row"></div>');

                                    if(value.role=="patient")
                                    {
                                        var $icon_element = $('<div class="col s6"><i class="ion-android-people white-text"></i></div>');
                                    }
                                    else
                                    {
                                        var $icon_element = $('<div class="col s6"><i class="ion-fork-repo white-text"></i></div>');
                                    }
                                    $under_wrapper.append($icon_element);
                                    var $additional_info_wrapper = $('<div class="col s12" style="background:rgba(128, 128, 128, 0.5);"></div>');

                                    var $name = value.lastname+' '+value.firstname;
                                    $additional_info_wrapper.append($name);
                                    
                                    var $age = Math.abs(parseInt(value.formatted_dateborn)-parseInt(value.actual));
                                    var $additional_info  = $('<p></p>').append($age+' ans <br>').append(value.people_contact.contact1+'<br>');
                                    if(value.people_contact.contact2)
                                        $additional_info.append(value.people_contact.contact2+'<br/>');

                                    if(value.role!=='patient')
                                        $additional_info.append(value.role);

                                    $additional_info_wrapper.append($additional_info);

                                    $under_wrapper.append($additional_info_wrapper);
                                    $li_element.append($under_wrapper);

                                    $('#result-research-body').append($li_element);
                                                                      $li_element.attr('role',value.role);
                                    $li_element.attr('people-id',value.id);
                                    $li_element.unbind('click').bind('click',showPeopleInfos);
                                });



                                 if($value!==$('#global-search').val())
                                    searchPeople();
                            }
                            else
                                Materialize.toast('Connexion défaillante, veuilez réessayer',2000);
                        }
                        else
                        {
                            return false;
                        }
                    },
                    complete: function(){
                        $('#research-picto-side').removeClass('hidden');
                        $('#loader-research').addClass('hidden');
                        $('#global-search').removeClass('already-search');
                    },
                    error: function(){
                        alert('Une erreur est survenue lors de l\'opération, veuillez réessayer');
                    }
                });
            }
}


function showRequirementInfos()
{
    var $parent = $(this).find('.requirement-ciscode');
    var $cis_code =$parent.text().trim();
    var $current_floating_box = $("#floating-box-1");
    $.ajax({
        beforeSend: function(){
            $('.requirement-api-variable-info',$current_floating_box).empty();
            $('#loader-floating-box-1',$current_floating_box).removeClass('hidden');
            $('.reducable-content',$current_floating_box).addClass('hidden');

            if(!$current_floating_box.hasClass('used'))
                $current_floating_box.removeClass('hidden');
        },
        url:'/manager/requirements/open-medicament',
        type:'GET',
        dataType:'Text',
        data:'cis_code='+$cis_code,
        success: function(data){
            if(data!=='ko')
            {
                if(data==="down")
                {
                    Materialize.toast('Une Erreur est survenue lors de la récupération',2500);
                    $('.reducable-content','#loader-floating-box-1').addClass('hidden');
                    $('#error-conatiner-floating-box-1').removeClass('hidden');
                    $('#closer-floating-box-1-wrapper').addClass('right');
                }
                else
                {
                    $('#closer-floating-box-1-wrapper').removeClass('right');
                    $('#error-conatiner-floating-box-1').addClass('hidden');
                    $('.reducable-content',$current_floating_box).removeClass('hidden');
                    $('.custom-overflowed-tabs li:eq(0)',$current_floating_box).trigger('click');
                    
                result = JSON.parse(data);
                $('#denomination_requirement_selected').text(result.denomination);
                $('#cis_code_requirement_selected').text(result.codeCIS);
                if(result.homeopathie)
                    $('#is_homeopatic_requirement').text('Oui');
                else
                    $('#is_homeopatic_requirement').text('Non');

                if(result.titulaires.length===1)
                {
                    $('#license_owner').append(result.titulaires[0]);
                }
                else
                {
                    $.each(result.titulaires,function(index,value){

                        $('#license_owner').append(value+', ');
                    });
                }

                $('#therapeutic-precision-requirement').html(result.indicationsTherapeutiques);

                if(result.conditionsPrescriptionDelivrance.length===1)
                {
                    $('#delivrance-ways-requirements').append(result.conditionsPrescriptionDelivrance[0]);
                }
                else
                {
                     $.each(result.conditionsPrescriptionDelivrance,function(index,value){
                        $('#delivrance-ways-requirements').append(value+', ');
                    });
                }

                if(result.voiesAdministration.length===1)
                {
                    $('#administration-way-requirement').append(result.voiesAdministration[0]);
                }
                else
                {
                     $.each(result.voiesAdministration,function(index,value){
                        $('#administration-way-requirement').append(value+', ');
                    });
                }


                if(result.presentations)
                {
                    $.each(result.presentations,function(index,value){
                        console.log(value);
                        $('#requirement-presentation-search').append('<i class="ion-ios-arrow-forward dmp-grey-2-text"></i>'+'  '+value.libelle);
                    });
                }

                if(result.compositions)
                {
                    $.each(result.compositions,function(index,value){

                        var $composition_wrapper = $('<p class="white-text"></span>').append(index+1).append('.  ');
                        var $designation_composition = $('<span class="dmp-grey-2-text"></span>').append(value.designationElementPharmaceutique+'  ');
                        var $dosage_composition =  $('<span class="dmp-grey-2-text"></span>').append(value.referenceDosage+'  ');
                        $composition_wrapper.append(' Désignation Pharmaceutique: ').append($designation_composition).append('-')
                                            .append(' Référence Dosage: ').append($dosage_composition);
                        $('#compositions-search-requirement').append($composition_wrapper);
                    });
                }


                //molecular section
                if(result.substancesActives)
                {
                    $.each(result.substancesActives,function(index,value){

                        var $substance_wrapper = $('<p class="white-text"></span>').append(index+1).append('.  ');
                        var $substance_denomination = $('<span class="dmp-grey-2-text"></span>').append(value.denominationSubstance+'  ');
                        var $dosage_substance =  $('<span class="dmp-grey-2-text"></span>').append(value.dosageSubstance+'  ');
                        $substance_wrapper.append(' Substance: ').append($substance_denomination).append('-')
                                            .append(' Dosage: ').append($dosage_substance);
                        $('#molecular-search-requirement').append($substance_wrapper);
                    });
                }


                //interactions section
                if(result.interactions)
                {
                    $.each(result.interactions,function(index,value){

                        var $interaction_wrapper = $('<p class="white-text"></span>').append(index+1).append('.  ');
                        var $interaction_family_1 = $('<span class="dmp-grey-2-text"></span>').append(value.famille1+'  ');
                        var $interaction_family_2 =  $('<span class="dmp-grey-2-text"></span>').append(value.famille2+'  ');
                        $interaction_wrapper.append(' Famille Active: ').append($interaction_family_1).append('-')
                                            .append(' Famille Antagoniste: ').append($interaction_family_2);
                        $('#interactions-search-requirement').append($interaction_wrapper);
                    });
                }


                //famille section
                if(result.familleComposition)
                {
                    $.each(result.familleComposition,function(index,value){

                        var $famille_wrapper = $('<p class="white-text"></span>').append(index+1).append('.  ');
                        var $family_denomination = $('<span class="dmp-grey-2-text"></span>').append(value.denomination+'  ');
                        var $family_cis =  $('<span class="dmp-grey-2-text"></span>').append(value.codeCIS+'  ');
                        $famille_wrapper.append(' Dénomination: ').append($family_denomination).append('-')
                                            .append(' Code Cis: ').append($family_cis);
                        $('#family-search-requirement').append($famille_wrapper);
                    });
                }

                //generic section
                if(result.infosGenerique)
                {
                    // $.each(result.familleComposition,function(index,value){

                    //     var $famille_wrapper = $('<p class="white-text"></span>').append(index+1).append('.  ');
                    //     var $family_denomination = $('<span class="dmp-grey-2-text"></span>').append(value.denomination+'  ');
                    //     var $family_cis =  $('<span class="dmp-grey-2-text"></span>').append(value.codeCIS+'  ');
                    //     $famille_wrapper.append(' Dénomination: ').append($family_denomination).append('-')
                    //                         .append(' Code Cis: ').append($family_cis);
                    //     $('#family-search-requirement').append($interaction_wrapper);
                    // });
                }

                //notice section
                if(result.notice)
                {
                    $('#notice-table-wrapper').html(result.notice);
                }
                else
                    $('#notice-table-wrapper').html('<span class="dmp-grey-2-text">Aucune Notice Disponible pour ce médicament<span>');
                }

                        if(!$current_floating_box.hasClass('used'))
                        {
                                $current_floating_box.removeClass('hidden');
                                $current_floating_box.addClass('used');
                        }

            }   
            else
            {

                return false;
            }
        },
        complete: function()
        {
            $('#loader-floating-box-1').addClass('hidden');
            $('#content-floating-box-1').removeClass('hidden');
        },
        error: function(){}
    });
}


function showBillInfos()
{
    //save research body - item
    $item = $(this);
    var $id_bill = $(this).attr('id-bill');
    var $current_floating_box = $('#content-floating-box-2');
    $.ajax({
        beforeSend: function(){
            $('.invoice-api-variable-info').empty();
            $('#loader-floating-box-2').removeClass('hidden');
            $('.reducable-content',$current_floating_box).addClass('hidden');
            $('#closer-floating-box-2-wrapper').addClass('right');

            if(!$("#floating-box-2").hasClass('used'))
                $('#floating-box-2').removeClass('hidden');
        },
        url:'/manager/visit-invoices/get',
        type:'GET',
        dataType:'Text',
        data:'id-bill='+$id_bill,
        success: function(data){
            if(data!=='ko')
            {
                if(data==="down")
                {
                    Materialize.toast('Une Erreur est survenue lors de la récupération',2500);
                    $('.reducable-content').addClass('hidden');
                    $('#error-conatiner-floating-box-1').removeClass('hidden');
                    $('#closer-floating-box-2-wrapper').addClass('right');
                }
                else
                {
                    $('.reducable-content',$current_floating_box).removeClass('hidden');
                    $('.custom-overflowed-tabs li:eq(0)',$current_floating_box).trigger('click');
                    $('#closer-floating-box-2-wrapper').removeClass('right');
                    $('#error-conatiner-floating-box-2').addClass('hidden');

                    var results = JSON.parse(data);
                    $.each(results,function(index,value){

                    var $count_bill = parseInt(value.bill_image_count);

                    for(j=0 ; j<$count_bill ; j++)
                    {
                        var $evidence = $('<img class="floating-img-invoice" style="margin-top:5px;margin-bottom:5px;" src="/webroot/Files/manager/'+value.manager_operator.institution.slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
                        $("#invoice-evidence-search-single").append($evidence);
                        $evidence.materialbox();
                    }


                    if($count_bill>1)
                    {
                        $('#invoice-evidence-search-single').removeClass('s1').addClass('s2');
                        $('#closer-floating-box-2-wrapper').removeClass('s2').addClass('s1');
                    }
                    else
                    {
                        $('#invoice-evidence-search-single').removeClass('s2').addClass('s1');
                        $('#closer-floating-box-2-wrapper').removeClass('s1').addClass('s2');
                    }


                    $('#code_invoice_selected').text(value.code_invoice);
                    $('#code_visit_selected_single').text(value.visit.code_visit);
                    $('#operator_single_invoice').text(value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname);
                    $('#single_invoice_emitted_date').text(value.formatted_created);
                      if(value.sold_date)
                    $('#single_invoice_sold_date').text(value.formatted_solded);
                      else
                    $('#single_invoice_sold_date').text('Non Soldé');

                                                    $('#amount_invoice_selected_single').text(value.amount+' F CFA');

                                                 switch(value.visit_invoice_type_id)
                                                    {
                                                        case 2:
                                                            var $type_invoice='Rendez-Vous';
                                                        break;

                                                        case 1:
                                                            var $type_invoice='Visite';
                                                        break;

                                                        case 3:
                                                            var $type_invoice='Réservation';
                                                        break;

                                                        case 4:
                                                            var $type_invoice='Intervention';
                                                        break;

                                                        default:
                                                            var $type_invoice='Indéfini';
                                                        break;
                                                    }

                                                $('#type_single_invoice').text($type_invoice);
                                                  switch(value.visit_invoice_payment_way_id)
                                                    {
                                                        case 2:
                                                            var $way='Chèque/CB';
                                                        break;

                                                        case 1:
                                                            var $way='Cash';
                                                        
                                                        break;

                                                        case 3:
                                                            var $way='Assurance';
                                                    
                                                        break;

                                                        case 4:
                                                            var $way='Cash';
                                                    
                                                        break;

                                                        case 5:
                                                            var $way='Echelonnement(Cash)';
                                                    
                                                        break;

                                                        default:
                                                            var $way='Indéfini';
                                            
                                                        break;
                                                    }
                                            $('#way_invoice_single').text($way);

                            //formatted patient info 
                            var $tr_element = $("<tr style='background:transparent;'></tr>");
                            for(var i=1; i<=6;i++)
                            {
                                var $td_element = $("<td class='light-padding zero-margin light-mixed-text dmp-grey-2-text' style='border-bottom:0.5px dashed white !important;'></td>");
                                $tr_element.append($td_element);
                            }
                            //building image
                            if(value.visit.patient.person.path_pic)
                            {
                                var $img_element = $('<img style="width:100px;">').attr('src','/webroot/img/patient/patient_identity/'+value.visit.patient.person.path_pic);
                                $tr_element.find('td:eq(0)').append($img_element);
                            }
                            else
                            {
                                var $img_element = $('<i class="ion-ios-contact dmp-grey-2-text small"></i>');
                                 $tr_element.find('td:eq(0)').append($img_element);
                            }

                            $tr_element.find('td:eq(1)').append(value.visit.patient.person.lastname);
                            $tr_element.find('td:eq(2)').append(value.visit.patient.person.firstname);
                            var $born_date = new Date(value.visit.patient.person.dateborn);

                            var $actual_date = new Date();
                            var $patient_years_old = Math.abs($born_date.getFullYear()-$actual_date.getFullYear());
                            $tr_element.find('td:eq(3)').append($patient_years_old);

                            switch(value.visit.patient.person.sexe)
                            {
                                case 'M':
                                    $sexe_patient = 'Homme';
                                break;

                                case'F':
                                    $sexe_patient = 'Femme';
                                break;
                            }
                            $tr_element.find('td:eq(4)').append($sexe_patient);
                            $tr_element.find('td:eq(5)').append(value.visit.patient.person.people_contact.contact1);
                            if(value.visit.patient.person.people_contact.contact2)
                               $tr_element.find('td:eq(5)').append('<br>'+value.visit.patient.person.people_contact.contact2);
                           $('#patients-table-single-invoice tbody').append($tr_element);

                           var manager_slug= value.manager_operator.institution.slug;
                           //formatting payments
                                $.each(value.visit_invoice_payments,function(index,value)
                                {
                                    console.log(value);
                                    var $tr_element = $("<tr style='background:transparent;border-bottom: 0.5px dashed white !important;'></tr>");
                                    for(var i=1; i<=6;i++)
                                    {
                                        var $td_element = $("<td class='dmp-grey-2-text'></td>");
                                        $tr_element.append($td_element);
                                    }

                                    $tr_element.find("td:eq(0)").text(value.code_payment);

                                    var $count_voucher = value.voucher_image_count;

                                    for(j=0 ; j<$count_voucher ; j++)
                                    {
                                       var $evidence = $('<img src="/webroot/Files/manager/'+manager_slug+'/vouchers_images/'+value.code_payment+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
                                        $tr_element.find("td:eq(1)").append($evidence);
                                        $evidence.materialbox();
                                    }

                                    if(value.formatted_created_schedule)
                                    {
                                        $tr_element.find("td:eq(2)").text(value.formatted_created_schedule);
                                        if(value.formatted_solded_schedule)
                                            $tr_element.find("td:eq(3)").text(value.formatted_solded_schedule);
                                        else
                                            $tr_element.find("td:eq(3)").html('En attente');
                                    }
                                    else
                                    {
                                        $tr_element.find('td:eq(2)').text(value.formatted_created);
                                        $tr_element.find('td:eq(3)').text(value.formatted_created);
                                    }



                                    // $tr_element.find('td:eq(4)')
                                    $tr_element.find('td:eq(4)').text(value.amount+' F CFA');
                                    $tr_element.find('td:eq(5)').text(value.reference_payment);

                                    $tr_element.hover(function(){
                                        $(this).addClass('hoverable-line-floating-box');
                                    },function(){
                                        $(this).removeClass('hoverable-line-floating-box');

                                    });
                                      $('#payments-table-single-invoice tbody').append($tr_element);

                                });

                    });
        
                            if(!$('#floating-box-2').hasClass('used'))
                            {
                                $('#floating-box-2').addClass('used');
                            }

                }

            }   
            else
            {
                return false;
            }

        },
        complete: function()
        {
            $('#loader-floating-box-2').addClass('hidden');
            $current_floating_box.removeClass('hidden');
        },
        error: function(){}
    });
}


function showPeopleInfos()
{
       var $role = $(this).attr('role');
       var $id_people = 'people-id='+parseInt($(this).attr('people-id'));
       console.log($role);
       console.log($id_people);
    //switching between floating people box
    switch($role)
    {
        case 'patient':
            floating_box = $('#floating-box-patient');
            var $url = '/manager/patients/search-single';
            var $variable_content ='.patient-api-variable-info';
            $ul_list_people =$('#patients-info-wrapper');
            var $side_assets_floating_box = '#closer-floating-box-patient-wrapper';
        break;

        case 'medecin':
            floating_box = $('#floating-box-doctor');
            var $url = '/manager/doctors/search-single';
            var $variable_content ='.doctor-api-variable-info';
            var $side_assets_floating_box = '#closer-floating-box-doctor-wrapper';
        break;

        case 'auxiliary':
            floating_box = $('#floating-box-auxiliary');
            var $url = '/manager/auxiliaries/search-single';
            var $variable_content ='';
            var $side_assets_floating_box = '';
        break;


        case 'pharmacy':
            floating_box = $('#floating-box-auxiliary');
            var $url = '/manager/auxiliaries/search-single';
            var $variable_content ='';
            var $side_assets_floating_box = '';
        break;

        case 'laboratory':
            floating_box = $('#floating-box-laboratory');
            var $url = '/manager/examiner-operators/search-single';
            var $variable_content ='';
            var $side_assets_floating_box = '';
        break;

        case 'manager':
            floating_box = $('#floating-box-manager');
            var $url = '/manager/manager-operators/search-single';
            var $variable_content ='.manager-api-variable-info';
            var $side_assets_floating_box = '#closer-floating-box-manager-wrapper';
        break;
    }

    $.ajax({
        beforeSend: function(){
            floating_box.removeClass('hidden');
            $($side_assets_floating_box,floating_box).addClass('right');
            $($variable_content,floating_box).empty();
            $('.reducable-content',floating_box).addClass('hidden');

            if(!floating_box.hasClass('used'))
            {   
                floating_box.addClass('used');
            }

            $('.loader-people',floating_box).removeClass('hidden');
        },
        url:$url,
        type:'GET',
        dataType: 'text',
        data: $id_people,
        success: function(data){
            if(data!=='ko')
            {
               var results = JSON.parse(data);
               switch($role)
               {
                case 'patient':
                    showPatientInfo(results);
                break;

                case 'medecin':
                    showDoctorInfo(results);
                break; 

                case 'manager':
                    showManagerInfo(results);
                break; 
               }
            }
            else
            {
               $('.loader-people',floating_box).addClass('hidden');
               $('.error-loader-people',floating_box).removeClass('hidden');
                return false;
            }

        },
        complete: function(){
            $('.loader-people',floating_box).addClass('hidden');

        },
        error: function(){
            alert('Une erreur est survenue lors de l\'opération');
        }
    });

}


function showPatientInfo($encoded_data)
{
    $('#floating-box-patient').attr('patient-id',$encoded_data.id);
    $('#add-insurance-info-floating').attr('patient-id',$encoded_data.patient.id)
    $('.error-loader-people',floating_box).addClass('hidden');
    $('.reducable-content',floating_box).removeClass('hidden');
     $('.custom-overflowed-tabs li:eq(0)',floating_box).trigger('click');  

    if($encoded_data.path_pic)
       var $pic_people = $('<img style="width:120px;margin-top:5px;">').attr('src','/webroot/img/patient/patient_identity/'+$encoded_data.path_pic) ;
    else
        var $pic_people = $('<i class="ion-ios-contact dmp-grey-2-text small"></i');

    $('#patient-evidence-search-single').append($pic_people);
    $('#fullname_patient_selected').text($encoded_data.lastname+' '+$encoded_data.firstname);


    var $date_born = new Date($encoded_data.dateborn);
    var $actual_date = new Date();
    var $diff_date = parseInt(Math.abs($date_born.getFullYear()-$actual_date.getFullYear()));
    if($diff_date>1)
      $('#age_patient_selected_single').append($diff_date+' ans');
    else
      $('#age_patient_selected_single').append($diff_date+' an');


    switch($encoded_data.sexe)
    {
        case 'M':
           var $sexe_patient = 'Homme';
        break;

        case 'F':
           var $sexe_patient = 'Femme';
        break;
    }

    $('#sexe_patient_selected_single').text($sexe_patient);

    if($encoded_data.people_contact.contact2)
    $('#contact_single_patient').text($encoded_data.people_contact.contact1+' / '+$encoded_data.people_contact.contact2);
    else
    $('#contact_single_patient').text($encoded_data.people_contact.contact1);


    $('#nationality_patient_selected_single').text($encoded_data.nationality);

    //building adress
    $('#adress_1_patient_selected_single').text($encoded_data.people_adress.country_township.label_township+' - '+$encoded_data.people_adress.city_quarter);

    $('#adress_2_patient_selected_single').text($encoded_data.people_adress.country_township.country_city.label_city);
    $('#adress_3_patient_selected_single').text($encoded_data.people_adress.country_township.country_city.country.label_country);

    //formatting visits infos

         $.each($encoded_data.patient.visits,function(index,value){
                if(value.visit_states[0].visit_state_type_id!==8)
                {

                            var $tr_element = $('<tr></tr>');
                            var tag_row = value.code_visit.toLowerCase()+' '+value.manager_operator.person.lastname.toLowerCase()+' '+value.manager_operator.person.firstname.toLowerCase();
                            for(i=1;i<=7;i++)
                            {
                                var $td_element = $('<td class="dmp-grey-2-text"></td>');
                                $tr_element.append($td_element);
                            }


                            $tr_element.find('td:eq(0)').append(value.code_visit);
                            $tr_element.find('td:eq(1)').append(value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname); 

                             $tr_element.find('td:eq(2)').attr('style','text-align:left !important;');
                            $.each(value.visit_states,function(){
                                             var $visit_state = determine_visit_type(this.visit_state_type_id);
                                             //flushing tags reaserch
                                             tag_row+=' '+$visit_state.toLowerCase()+' '+this.formatted_created_state;
                                             //introduire apres vist_intervention_done
                                             if(this.visit_state_type_id == '8')
                                             {
                                                if(value.deleted)
                                                {
                                                 $tr_element.find("td:eq(2)").append($visit_state+' - création: '+this.formatted_created_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+'</span> <br/>'+'Date Annulation: '+this.formatted_end_state);
                                                 tag_row+=' '+this.formatted_end_state;
                                                }
                                                else
                                                {
                                                 $tr_element.find("td:eq(2)").append($visit_state+' - création: '+this.formatted_created_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+'</span> <br/>');
                                                }
                                                tag_row+=' '+value.visit_intervention_doctors[0].expected_meeting_date;
                                             }
                                             else if(this.visit_state_type_id =='1')
                                             {
                                                $tr_element.find("td:eq(2)").append($visit_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+'</span> <br/>');
                                                tag_row+=' '+value.visit_intervention_doctors[0].expected_meeting_date;
                                             }
                                             else
                                             {
                                                $tr_element.find("td:eq(2)").append($visit_state+' - Début: '+this.formatted_created_state+' - Fin: '+this.formatted_end_state+' <br/>');
                                                tag_row+=' '+this.formatted_end_state;
                                             }

                                    });

                                        $tr_element.attr('tags',tag_row);
                                            //build info orders
                                        var $icon_orders = $('<i class="ion-information-circled small dmp-grey-2-text dmp-main-color trigger-orders-visit-info-box pointer-opaq"></i>').attr("visit-id",value.id);
                                        $icon_orders.unbind("click").bind("click",triggerOrdersVisit);
                                        $tr_element.find("td:eq(3)").html($icon_orders);

                                        //build info interventions
                                        var $intervention_infos = $('<i class="ion-information-circled small dmp-grey-2-text dmp-main-color trigger-intervention-visit-info-box pointer-opaq"></i>').attr("visit-id",value.id);
                                        $intervention_infos.unbind("click").bind("click",triggerInterventionInfos);
                                        $tr_element.find("td:eq(4)").html($intervention_infos);
                                
                                        if(!value.deleted)
                                        {
                                            var $menu_trigger = $('<span href="#" data-activates="visit-action'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button" style="padding:0px 10px 10px 10px;background:transparent;"><i class="ion-android-menu dmp-grey-2-text" style="font-size:2.2rem;"></i></span>');
                                            var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="visit-action'+value.id+'"></ul>');
                                            if(value.visit_states[0].visit_authorized===true)
                                            {
                                                if(value.visit_states[0].visit_state_type_id == '8')
                                                {
                                                   $('<li><span id-bill="'+value.id+'" class="change-payment-mode" id-patient="'+value.patient_id+'" class="">Facturer la réservation</span></li>').unbind('click').bind('click',changePaymentMode).appendTo($menu_container);
                                                   $('<li visit-id="'+value.id+'"><span class="" >Replanifier la réservation</span></li>').unbind('click').bind('click',replanVisit).appendTo($menu_container);
                                                   $('<li ><span class="" >Annuler Réservation</span></li>').attr('cancel-booking-id',value.id).unbind('click').bind('click',cancelBooking).appendTo($menu_container);
                                                }
                                                else if(value.visit_states[0].visit_state_type_id == '1')
                                                   $('<li visit-id="'+value.id+'"><span class="" >Replanifier la visite</span></li>').unbind('click').bind('click',replanVisit).appendTo($menu_container);
                                                else
                                                {
                                                   $('<li><span class="">Facturer</span></li>').appendTo($menu_container);
                                                   $('<li class="divider"></li>').appendTo($menu_container);
                                                   $('<li><span class="">Etat Total-Facturation</span></li>').appendTo($menu_container);
                                                   $('<li class="divider"></li>').appendTo($menu_container);
                                                }

                                            }
                                            if(value.patient_id==0)
                                            {
                                                $('<li><span class="white-text">Réattribuer Visite</span></li>').appendTo($menu_container);
                                                $('<li class="divider"></li>').appendTo($menu_container);
                                            }


                                            $menu_trigger.append($menu_container);
                                            $tr_element.find("td:eq(5)").append($menu_trigger);
                                            $("#patient-visits-single-table tbody").append($tr_element);
                                            $menu_trigger.dropdown();

                                        }
                                        else
                                        {
                                            $tr_element.find("td:eq(5)").html('&nbsp;');
                                            $("#patient-visits-single-table tbody").append($tr_element);
                                        }

                            var code_visit = value.code_visit;
                            //formatting bills infos
                            $.each(value.visit_invoices,function(index,value){
                            // console.log(value);
                                    
                                    var $tr_element = $("<tr class='bill-item light-padding zero-margin dmp-grey-text'></tr>");

                                    if(value.deleted!==null)
                                    {
                                        $tr_element.addClass("light-orange-bill");
                                    }
                                    else
                                    {
                                        if(value.state==0)
                                         $tr_element.addClass("light-red-bill");
                                        else 
                                         $tr_element.addClass("light-green-bill");
                                    }

                                    //adding extra info for keywords-search
                                    $tags = value.code_invoice+" "+value.amount+" "+value.formatted_created+" "+value.formatted_solded+" "+code_visit;

                                        for(var i=1; i<=11;i++)
                                        {
                                            var $td_element = $("<td class='light-padding zero-margin light-mixed-text'></td>");
                                            $tr_element.append($td_element);
                                        }
                                        $tr_element.find("td:eq(0)").text(value.code_invoice);
                                        $tr_element.find("td:eq(1)").text(value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname);
                                        $tr_element.find("td:eq(2)").text(code_visit);

                                        var $count_bill = value.bill_image_count;

                                        for(j=0 ; j<$count_bill ; j++)
                                        {
                                           var $evidence = $('<img src="/webroot/Files/manager/'+value.manager_operator.institution.slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
                                            $tr_element.find("td:eq(3)").append($evidence);
                                            $evidence.materialbox();
                                        }

                                        $tr_element.find('td:eq(3)').addClass('medium-cell-row');

                                        $tr_element.find("td:eq(4)").text(value.formatted_created);
                                        $tr_element.find("td:eq(5)").text(value.formatted_solded);
                                        $tr_element.find("td:eq(6)").text(value.amount+' F CFA');

                                        switch(value.visit_invoice_type_id)
                                        {
                                            case 2:
                                                var $type_invoice='Rendez-Vous';
                                            break;

                                            case 1:
                                                var $type_invoice='Visite';
                                            break;

                                            case 3:
                                                var $type_invoice='Réservation';
                                            break;

                                            case 4:
                                                var $type_invoice='Intervention';
                                            break;

                                            default:
                                                var $type_invoice='Indéfini';
                                            break;
                                        }
                                        $tr_element.find("td:eq(7)").text($type_invoice);
                                        $tags+=$type_invoice+" ";

                                        switch(value.visit_invoice_payment_way_id)
                                        {
                                            case 2:
                                                var $way='Chèque/CB';
                                            break;

                                            case 1:
                                                var $way='Cash';
                                            
                                            break;

                                            case 3:
                                                var $way='Assurance';
                                        
                                            break;

                                            case 4:
                                                var $way='Cash';
                                        
                                            break;

                                            case 5:
                                                var $way='Echelonnement(Cash)';
                                        
                                            break;

                                            default:
                                                var $way='Indéfini';
                                
                                            break;
                                        }
                                        $tr_element.find("td:eq(8)").text($way);
                                        $tr_element.attr("tags",$tags+$way);

                                        //build info payment
                                        var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color"></i>').attr("info-payment-id",value.id);
                                        if(value.state==1)
                                        {
                                            $icon_payments.addClass("trigger-solded-payment-info-box");
                                            $icon_payments.unbind("click").bind("click",triggerSoldedPayment);
                                        }
                                        else
                                        {
                                            $icon_payments.addClass("trigger-unsolded-payment-info-box");
                                            $icon_payments.unbind("click").bind("click",triggerUnSoldedPayment);
                                        }

                                        $tr_element.find("td:eq(9)").html($icon_payments);
                                        //build menu invoice row
                                        var $menu_trigger = $('<a href="#" data-activates="invoice-sold'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button" style="padding:0px 20px 20px 20px; background:transparent !important;"><i class="ion-android-menu  dmp-grey-text" style="font-size:2.2rem;"></i></a>');
                                        var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="invoice-sold'+value.id+'"></ul>');
                                        $('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
                                        $('<li class="divider"></li>').appendTo($menu_container);
                                        $('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
                                        
                                        $tr_element.find("td:eq(10)").append($menu_trigger)
                                                                    .append($menu_container);
                                        $("#patient-invoice-info-single-table tbody").append($tr_element);
                                        $menu_trigger.dropdown();
                        });

                } 
                else
                {
                    console.log(value);
                    var $tr_element = $('<tr></tr>');
                    for(i=1;i<=9;i++)
                    {
                        var $td_element = $('<td class="dmp-grey-2-text"></td>');
                        $tr_element.append($td_element);
                    }

                    var tag_row =value.visit_intervention_doctors[0].patient_booking.code_booking.toLowerCase()+' '+value.code_visit.toLowerCase();

                    $tr_element.find('td:eq(0)').text(value.visit_intervention_doctors[0].patient_booking.code_booking);
                    $tr_element.find('td:eq(1)').text(value.code_visit);
                    var date_booking = new Date(value.visit_intervention_doctors[0].patient_booking.created);
                    var formatted_date_booking = date_booking.getDate()+'-'+(date_booking.getMonth()+1)+'-'+date_booking.getFullYear()+' '+(date_booking.getHours())+':'+(date_booking.getMinutes()-1)+':'+(date_booking.getSeconds());
                    $tr_element.find('td:eq(2)').text(formatted_date_booking);

                    tag_row+=' '+formatted_date_booking;

                    $tr_element.find('td:eq(3)').text(value.visit_intervention_doctors[0].expected_meeting_date);

                    tag_row+=' '+value.visit_intervention_doctors[0].expected_meeting_date;
                    
                    $tr_element.find('td:eq(4)').text(value.visit_intervention_doctors[0].patient_booking.speciality_label);

                    tag_row+=' '+value.visit_intervention_doctors[0].patient_booking.speciality_label.toLowerCase();

                    if(value.visit_intervention_doctors[0].patient_booking.doctor_id)
                    {
                        $tr_element.find('td:eq(5)').text('Dr. '+value.visit_intervention_doctors[0].patient_booking.fullname_doctor);
                        tag_row +=' '+value.visit_intervention_doctors[0].patient_booking.fullname_doctor.toLowerCase();
                    }
                    else
                    {
                        $tr_element.find('td:eq(5)').html('indéfini');
                        tag_row +=' '+'indéfini';
                    }

                    //etats
                    switch(value.visit_intervention_doctors[0].patient_booking.state)
                    {
                        case 1:
                            $state_booking = 'Validé';
                        break;

                        case 2:
                            $state_booking = 'En Attente de Validation';
                        break;

                        case 3:
                            $state_booking = 'Annulée';
                        break;
                    }

                    $tr_element.find('td:eq(6)').text($state_booking);   
                    tag_row+=' '+$state_booking;

                    $tr_element.attr('tags', tag_row);


                    if($state_booking=='Validé')
                    {
                    var $menu_trigger = $('<span href="#" data-activates="visit-action-floating'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button" style="padding:0px 10px 10px 10px;background:transparent;"><i class="ion-android-menu  dmp-grey-2-text" style="font-size:2.2rem;"></i></span>');
                    
                    var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="visit-action-floating'+value.id+'"></ul>');
                                   $('<li><span id-bill="'+value.id+'" class="change-payment-mode" id-patient="'+value.patient_id+'" class="">Facturer la réservation</span></li>').unbind('click').bind('click',changePaymentMode).appendTo($menu_container);
                                   $('<li visit-id="'+value.id+'"><span class="" >Replanifier la réservation</span></li>').unbind('click').bind('click',replanVisit).appendTo($menu_container);
                                   $('<li visit-id="'+value.id+'"><span class="" >Modifier la réservation</span></li>').unbind('click').bind('click',replanValidateBooking).appendTo($menu_container);
                                   $('<li ><span class="" >Annuler Réservation</span></li>').attr('cancel-booking-id',value.id).unbind('click').bind('click',cancelBooking).appendTo($menu_container);
                    }
                    else
                    {
                        var $menu_trigger = $('<span href="#" data-activates="visit-issue-booking-floating'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button" style="padding:0px 10px 10px 10px;background:transparent;"><i class="ion-android-menu  dmp-grey-2-text" style="font-size:2.2rem;"></i></span>');
                        
                        var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="visit-issue-booking-floating'+value.id+'"></ul>');
                                       $('<li booking-id="'+value.id+'"><span  class="validate-booking-mode" id-patient="'+value.patient_id+'" class="">Reconduire la réservation</span></li>').unbind('click').bind('click',validateBooking).appendTo($menu_container);
                    }

                            $menu_trigger.append($menu_container);
                            $tr_element.find("td:eq(7)").append($menu_trigger);
                            
                    
                    $('#patient-visits-single-info-table tbody').append($tr_element);
                     $menu_trigger.dropdown();
                    
                }


            });


        //formatting insurance info


        $.each($encoded_data.patient.patient_insurances, function(index, value){
            console.log(value);
            var $li_element = $('<li class="collection-item light-green-bill dmp-main-color"><div></div></li>');
            
            var $exp_date = new Date(value.expired_insurance_date);
            var $actualDate = new Date();
            var $state_insurance = 'Active';

            if($exp_date>$actual_date)
            {
                $expired= false;
            }
            else
            {
                $expired= true;
                $state_insurance = 'Expirée';
            }

            if(value.deleted)
            {
                $state_insurance = 'Retirée';
                $li_element.removeClass('light-green-bill').addClass('light-red-bill');
            }

            if(value.state===0 || $expired)
                $li_element.removeClass('light-green-bill').addClass('light-grey-bill');

            
             if(value.state===0)
                $state_insurance = 'Inactive';

            $li_element.append('<span class="card_insurance_number">'+value.number_card+'</span>'+'-'+'<span class="card_insurer_label">'+value.patient_insurer.label+'</span>'+'- exp: '+$exp_date.getDate()+'-'+$exp_date.getMonth()+'-'+$exp_date.getFullYear()+' - '+$state_insurance);

            var $anchor_element = $('<a href="#!" class="secondary-content"></a>');

            var $close_element = $('<i></i>').attr('class','ion-ios-close-outline dmp-main-color small right tooltipped').attr('data-tooltip','Supprimer').attr('data-delay','5s').attr('data-position','left').attr('insurance-id',value.id).tooltip();

            var $unclose_element = $('<i></i>').attr('class','ion-android-checkmark-circle dmp-main-color small right tooltipped').attr('data-tooltip','Rétablir').attr('data-delay','5s').attr('data-position','left').attr('insurance-id',value.id).tooltip();

            var $refresh_element = $('<i></i>').attr('class','ion-ios-refresh-outline dmp-main-color small right tooltipped').attr('data-tooltip','Renouveller').attr('data-delay','5s').attr('data-position','left')
            .attr('insurance-id',value.id).tooltip();

            var $turn_off_element = $('<i></i>').attr('class','ion-toggle dmp-main-color small right tooltipped').attr('data-tooltip','Suspendre').attr('data-delay','5s').attr('data-position','left')
            .attr('insurance-id',value.id).attr('patient-id',value.patient_id).tooltip();

            var $turn_on_element = $('<i></i>').attr('class','ion-toggle-filled dmp-main-color small right tooltipped').attr('data-tooltip','Réactiver').attr('data-delay','5s').attr('data-position','left')
            .attr('insurance-id',value.id).attr('patient-id',value.patient_id).tooltip();


            if(value.state===1)
            {
                if(!value.deleted)
                {
                    if($expired)
                     $anchor_element.append($refresh_element);
                    else
                    {
                  $anchor_element.append($turn_off_element)   
                                .append($close_element);
                    }

                }
                else
                {
                    $anchor_element.append($unclose_element);
                }

            }
            else if(value.state===0 && !$expired)
            {
              $anchor_element.append($turn_on_element)   
                                .append($close_element);
            }





            $turn_off_element.unbind('click').bind('click',turnOffInsurance);
            $close_element.unbind('click').bind('click',dropOffInsurance);
            $refresh_element.unbind('click').bind('click',refreshInsurance);
            $unclose_element.unbind('click').bind('click',pullBackInsurance);
            $turn_on_element.unbind('click').bind('click',turnOnInsurance);

            $li_element.append($anchor_element);

            $('#patient-single-insurance-visits-table-wrapper ul').append($li_element);

        });

    console.log($encoded_data);
    console.log($encoded_data.firstname );
}


function showManagerInfo($encoded_data)
{
    $encoded_data = $encoded_data[0];
        $('.error-loader-people',floating_box).addClass('hidden');
    $('.reducable-content',floating_box).removeClass('hidden');
    $('#floating-box-manager').attr('people-id',$encoded_data.person.id);
    $('#floating-box-manager').attr('manager-id',$encoded_data.id);

    if($encoded_data.person.path_pic!=='')
    {
        var manager_pic = $('<img>').attr('src','/webroot/img/manager/'+$encoded_data.institution.slug+'/manager_identity/'+$encoded_data.person.path_pic).attr('style','width:150px; margin-top:18px;');
    }
    else
    {
        var manager_pic = $('<i></i>').attr('class','ion-ios-contact-outline dmp-grey-2-text medium');
    }

    $('#manager-evidence-search-single').append(manager_pic);


    $('#fullname_manager_selected').text($encoded_data.person.lastname+' '+$encoded_data.person.firstname);

    var dateborn = new Date($encoded_data.person.dateborn);
    var actualDate = new Date();
    $('#age_manager_selected_single').append(actualDate.getFullYear()-dateborn.getFullYear()+' ans '+' - ');
    switch($encoded_data.person.people_situation.status)
    {
        case 'C':
                $situation_manager = 'Célibataire'
        break;

        case 'M':
                $situation_manager = 'Marié(e)'
        break;

        case 'D':
                $situation_manager = 'Divorcé(e)'
        break;


        case 'V':
                $situation_manager = 'Veuf(ve)'
        break;

        default:
            $situation_manager = 'situation indéfinie';
        break;
    }

    $('#age_manager_selected_single').append($situation_manager+' - ');

    var $count_children =$encoded_data.person.people_situation.children

    if($count_children>0)
    {
        if($count_children>1?$('#age_manager_selected_single').append($count_children+' enfants'):$('#age_manager_selected_single').append($count_children+' enfant'));
    }
    else
    $('#age_manager_selected_single').append('sans enfants');


    switch($encoded_data.person.sexe)
    {
        case 'F':
          $sexe_manager = 'Femme';
        break;

        case 'M': 
          $sexe_manager = 'Homme';
        break;
    }

    $('#sexe_manager_selected_single').append($sexe_manager);
    $('#nationality_manager_selected_single').append($encoded_data.person.nationality);
    if(!$encoded_data.person.people_contact.contact2)
        $('#contact_single_manager').append($encoded_data.person.people_contact.contact1);
    else
        $('#contact_single_manager').append($encoded_data.person.people_contact.contact1+' - '+$encoded_data.person.people_contact.contact2);


    $('#adress_1_manager_selected_single').append($encoded_data.person.people_adress.country_township.label_township+' '+$encoded_data.person.people_adress.city_quarter);

    $('#adress_2_manager_selected_single').append($encoded_data.person.people_adress.country_township.country_city.label_city);

    $('#adress_3_manager_selected_single').append($encoded_data.person.people_adress.country_township.country_city.country.label_country);

            var slug = $encoded_data.institution.slug;

    //formatting bils infos
        $.each($encoded_data.visits,function(index,value){

             var code_visit = value.code_visit;
             var visit_patient = value.patient.person.lastname+' '+value.patient.person.firstname;
                $.each(value.visit_invoices,function(index,value){
                            // console.log(value);
                                    var $tr_element = $("<tr class='bill-item light-padding zero-margin dmp-grey-text'></tr>");

                                    if(value.deleted!==null)
                                    {
                                        $tr_element.addClass("light-orange-bill");
                                    }
                                    else
                                    {
                                        if(value.state==0)
                                         $tr_element.addClass("light-red-bill");
                                        else 
                                         $tr_element.addClass("light-green-bill");
                                    }

                                    //adding extra info for keywords-search
                                    $tags = value.code_invoice+" "+value.amount+" "+value.formatted_created+" "+value.formatted_solded+" "+code_visit;

                                        for(var i=1; i<=11;i++)
                                        {
                                            var $td_element = $("<td class='light-padding zero-margin light-mixed-text'></td>");
                                            $tr_element.append($td_element);
                                        }
                                        $tr_element.find("td:eq(0)").text(value.code_invoice);
                                        $tr_element.find("td:eq(1)").text(visit_patient);
                                        $tr_element.find("td:eq(2)").text(code_visit);

                                        var $count_bill = value.bill_image_count;

                                        for(j=0 ; j<$count_bill ; j++)
                                        {
                                           var $evidence = $('<img src="/webroot/Files/manager/'+slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
                                            $tr_element.find("td:eq(3)").append($evidence);
                                            $evidence.materialbox();
                                        }

                                        $tr_element.find('td:eq(3)').addClass('medium-cell-row');

                                        $tr_element.find("td:eq(4)").text(value.formatted_created);
                                        $tr_element.find("td:eq(5)").text(value.formatted_solded);
                                        $tr_element.find("td:eq(6)").text(value.amount+' F CFA');

                                        switch(value.visit_invoice_type_id)
                                        {
                                            case 2:
                                                var $type_invoice='Rendez-Vous';
                                            break;

                                            case 1:
                                                var $type_invoice='Visite';
                                            break;

                                            case 3:
                                                var $type_invoice='Réservation';
                                            break;

                                            case 4:
                                                var $type_invoice='Intervention';
                                            break;

                                            default:
                                                var $type_invoice='Indéfini';
                                            break;
                                        }
                                        $tr_element.find("td:eq(7)").text($type_invoice);
                                        $tags+=$type_invoice+" ";

                                        switch(value.visit_invoice_payment_way_id)
                                        {
                                            case 2:
                                                var $way='Chèque/CB';
                                            break;

                                            case 1:
                                                var $way='Cash';
                                            
                                            break;

                                            case 3:
                                                var $way='Assurance';
                                        
                                            break;

                                            case 4:
                                                var $way='Cash';
                                        
                                            break;

                                            case 5:
                                                var $way='Echelonnement(Cash)';
                                        
                                            break;

                                            default:
                                                var $way='Indéfini';
                                
                                            break;
                                        }
                                        $tr_element.find("td:eq(8)").text($way);
                                        $tr_element.attr("tags",$tags+$way);

                                        //build info payment
                                        var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color"></i>').attr("info-payment-id",value.id);
                                        if(value.state==1)
                                        {
                                            $icon_payments.addClass("trigger-solded-payment-info-box");
                                            $icon_payments.unbind("click").bind("click",triggerSoldedPayment);
                                        }
                                        else
                                        {
                                            $icon_payments.addClass("trigger-unsolded-payment-info-box");
                                            $icon_payments.unbind("click").bind("click",triggerUnSoldedPayment);
                                        }

                                        $tr_element.find("td:eq(9)").html($icon_payments);
                                        //build menu invoice row
                                        var $menu_trigger = $('<a href="#" data-activates="invoice-sold'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button" style="padding:0px 20px 20px 20px; background:transparent !important;"><i class="ion-android-menu  dmp-grey-text" style="font-size:2.2rem;"></i></a>');
                                        var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="invoice-sold'+value.id+'"></ul>');
                                        $('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
                                        $('<li class="divider"></li>').appendTo($menu_container);
                                        $('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
                                        
                                        $tr_element.find("td:eq(10)").append($menu_trigger)
                                                                    .append($menu_container);
                                        $("#manager-invoice-info-single-table tbody").append($tr_element);
                                        $menu_trigger.dropdown();
                });

         });


}


function showDoctorInfo($encoded_data)
{
    $encoded_data = $encoded_data[0];
    $('.error-loader-people',floating_box).addClass('hidden');
    $('.reducable-content',floating_box).removeClass('hidden');
    $('#add-doctor-speciality-floating').attr('doctor-id',$encoded_data.id);
    $('#floating-box-doctor').attr('doctor-id',$encoded_data.person.id);

    if($encoded_data.person.path_pic!=='')
    {
        var manager_pic = $('<img>').attr('src','/webroot/img/doctor/doctor_identity/'+$encoded_data.person.path_pic).attr('style','width:150px; margin-top:18px;');
    }
    else
    {
        var manager_pic = $('<i></i>').attr('class','ion-ios-contact-outline dmp-grey-2-text medium');
    }

    $('#doctor-evidence-search-single').append(manager_pic);


    $('#fullname_doctor_selected').text('Dr. '+$encoded_data.person.lastname+' '+$encoded_data.person.firstname);


    var dateborn = new Date($encoded_data.person.dateborn);
    var actualDate = new Date();
    $('#age_doctor_selected_single').append(actualDate.getFullYear()-dateborn.getFullYear()+' ans '+' - ');
    switch($encoded_data.person.people_situation.status)
    {
        case 'C':
                $situation_doctor = 'Célibataire'
        break;

        case 'M':
                $situation_doctor = 'Marié(e)'
        break;

        case 'D':
                $situation_doctor = 'Divorcé(e)'
        break;


        case 'V':
                $situation_doctor = 'Veuf(ve)'
        break;

        default:
            $situation_doctor = 'situation indéfinie';
        break;
    }

    $('#age_doctor_selected_single').append($situation_doctor+' - ');

    var $count_children =$encoded_data.person.people_situation.children

    if($count_children>0)
    {
        if($count_children>1?$('#age_doctor_selected_single').append($count_children+' enfants'):$('#age_doctor_selected_single').append($count_children+' enfant'));
    }
    else
    $('#age_doctor_selected_single').append('sans enfants');


    switch($encoded_data.person.sexe)
    {
        case 'F':
          $sexe_doctor = 'Femme';
        break;

        case 'M': 
          $sexe_doctor = 'Homme';
        break;
    }

    $('#sexe_doctor_selected_single').append($sexe_doctor);
    $('#nationality_doctor_selected_single').append($encoded_data.person.nationality);
    if(!$encoded_data.person.people_contact.contact2)
        $('#contact_single_doctor').append($encoded_data.person.people_contact.contact1);
    else
        $('#contact_single_doctor').append($encoded_data.person.people_contact.contact1+' - '+$encoded_data.person.people_contact.contact2);


    $('#adress_1_doctor_selected_single').append($encoded_data.person.people_adress.country_township.label_township+' '+$encoded_data.person.people_adress.city_quarter);

    $('#adress_2_doctor_selected_single').append($encoded_data.person.people_adress.country_township.country_city.label_city);

    $('#adress_3_doctor_selected_single').append($encoded_data.person.people_adress.country_township.country_city.country.label_country);


        //formatting bils infos
        $.each($encoded_data.visit_intervention_doctors,function(index,value){

             var code_visit = value.visit.code_visit;
             var visit_patient = value.visit.patient.person.lastname+' '+value.visit.patient.person.firstname;
             var $tr_element = $("<tr class='bill-item light-padding zero-margin dmp-grey-text'></tr>");
             var $count_bill = value.bill_count;
             var $slug = value.visit.manager_operator.institution.slug;

              for(var i=1; i<=9;i++)
              {
                  var $td_element = $("<td class='light-padding zero-margin light-mixed-text'></td>");
                  $tr_element.append($td_element);
              }

             if(value.formatted_done===null)
                 $tr_element.addClass("light-red-bill");
             else 
                 $tr_element.addClass("light-green-bill");

                $tr_element.find('td:eq(0)').append(value.visit.code_visit);
                $tr_element.find('td:eq(1)').append(value.formatted_created);
                $tr_element.find('td:eq(2)').append(value.expected_meeting_date);
                $tr_element.find('td:eq(3)').append(value.formatted_done);
                $tr_element.find('td:eq(5)').append(visit_patient);
                $tr_element.find('td:eq(4)').append(value.visit.visit_states[0].visit_state_type.label_state_type);

                var $icon_acts = $('<i></i>').attr('class','ion-ios-information dmp-main-color small');
                $tr_element.find('td:eq(6)').append($icon_acts);
                            
                            for(j=0 ; j<$count_bill; j++)
                            {
                                var $evidence = $('<img src="/webroot/Files/manager/'+$slug+'/invoices_images/'+value.visit_invoice.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
                                $tr_element.find("td:eq(7)").append($evidence);
                                $tr_element.find("td:eq(7)").attr('class','medium-cell-row');
                                $evidence.materialbox();
                            }


                 if(!value.visit_invoice)
                 {
                    var $menu_trigger = $('<span data-activates="facturation-'+value.visit_invoice+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn dropdown-button white" style="padding:0px 10px 10px 10px;"><i class="ion-android-menu dmp-main-color" style="font-size:2.2rem;"></i></span>');
                    
                    var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="facturation-'+value.visit_invoice+'"></ul>');

                    $('<li id-intervention="'+value.id+'" class="facturation-intervention" id-patient="'+value.patient_id+'"><span class="">Facturer l\'intervention</span></li>').unbind('click').bind('click',bilingIntervention).appendTo($menu_container);

                        $menu_trigger.append($menu_container);
                        $tr_element.find('td:eq(8)').append($menu_trigger);
                        $('#doctor-invoice-info-single-table tbody').append($tr_element);
                        $menu_trigger.dropdown();

                 }
                 else
                 {
                    $tr_element.find('td:eq(8)').html('&nbsp;');
                        $('#doctor-invoice-info-single-table tbody').append($tr_element);

                 }


            });

        //formatting specialities
        $.each($encoded_data.institution_doctors, function(index,value){
                $.each(value.doctor_specialities, function(index,value){
                    var $li_element = $('<li class="collection-item dmp-grey-2-text dmp-main-back"><div></div></li>')
                                            .append(value.visit_speciality.libelle);
                    var $remove_li_element = $('<a href="#!" class="secondary-content"><i class="ion-ios-close-outline small white-text pointer-opaq"></i></a>');
                    $remove_li_element.appendTo($li_element).unbind('click').bind('click',removeSpecialityItem);7
                    $('#specialities-doctor-floating-list').append($li_element);
                });
        });



}
    
function removeSpecialityItem()
{

}