<div class="row" id="bills-wrapper"> 
   <div class="row item-bills-info-wrapper zero-margin">
              <div class="col s12 assets-item-bills-info zero-padding">
                    <ul class="tabs dmp-main-back switch-bills-section" >
                      <li class="tab col s3"><a class="active dmp-grey-2-text" href="#bills-table-wrapper">Factures <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-bills-infos"> </i><?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'bill-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#visits-table-wrapper">Visites <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-visits-infos"> </i> <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'visit-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#laboratory-table-wrapper">Laboratoire <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text"> </i></a></li>
                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#state-table-wrapper">Etats</a></li>
                    </ul>
              </div>
              
              <div class="col s12 search-keywords-area zero-margin reducable-content zero-padding" style="background: #c9d1d8;">
                          <div class="col s6 prefix darkened-input-field filter-by-keywords filter-wrapper zero-padding">  
                              <div class="col s10 input-field darkened-input-field">
                                  <i class="ion-android-search prefix "></i>
                                  <input type="text" name="search-keywords" style="height:30px;">
                              </div>

                          </div>

                         <div class="col s6 input-field center filter-by-amount filter-wrapper hidden zero-padding" id="">
                            <div class="col s8">
                               <div class="col s6 left-align">
                                  <span class="dmp-main-color" id="min-value-floating-bills-patient"></span>
                               </div>
                               <div class="col s6 right-align">
                                  <span class="dmp-main-color" id="max-value-floating-bills-patient"></span>
                               </div>
                            </div>                   
          
                            <div class="col s9" style="margin-top:10px;" id="range-amount-filter">
                           </div>

                           <div class="col s12 hidden" style="margin-top:30px;">
                              <input type="hidden" class="range-min" name="range-min">
                              <input type="hidden" class="range-max" name="range-max">
                           </div>

                            <div class="col s3">
                              <button class="btn teal white-text trigger-search-amount" style="margin-bottom:10px;">Rechercher</button>
                            </div>
                         </div>

                         <div class="col s6 zero-margin filter-by-dates filter-wrapper hidden">
                               <form class="form-search-by-date-bill-floating">
                                    <div class="col s4 input-field zero-margin">
                                        <h6 class="white-text"><?= h('Date Début') ?></h6>
                                        <input type="date" class="date-filter-bill zero-margin" style="
                                        color:white !important;" required name="begin-date-filter-bills" id="begin-date-filter">
                                    </div>
                                    <div class="col s4 input-field zero-margin">
                                        <h6 class="white-text"><?= h('Date Fin') ?></h6>
                                        <input type="date" class="date-filter-bill zero-margin" style="
                                        color:white !important;" required name="end-date-filter-bills" id="end-date-filter">
                                    </div>
                                    <div class="col s4">
                                       <button type="submit" class="btn white-text" style="margin-top:8%;">Rechercher</button>
                                    </div>
                               </form>
                         </div>

                          <div class="col s2 center">
                            <span style="margin-top:7%;padding: 0 9px;" data-stoppropagation="true" class="btn dmp-main-back dropdown-button" data-activates='bill-wrapper-options' data-beloworigin="true" data-constrainwidth='false' data-gutter="75"><i class="ion-android-settings dmp-orange-color"></i><i class="ion-drag white-text right"></i></span>
                            <!-- Bills Settings search -->
                             <ul id='bill-wrapper-options' class='dropdown-content dmp-main-back setting-filter-search-bills-item-selector'>
                              <li ref=".filter-by-keywords"><a href="#!"><i class="ion-ios-checkmark-empty teal-text left small"></i>Recherche par mots clés</a></li>
                              <li class="divider"></li>
                              <li ref=".filter-by-dates"><a href="#!">Recherche par dates</a></li>
                              <li class="divider"></li>
                              <li ref='.filter-by-amount'><a href="#!">Recherche par montants</a></li>
                            </ul>
                          </div>

                          <div class="col s2 center">
                            <span style="margin-top:10%;padding: 0 9px;">
                                 <i  data-stoppropagation="true" class="dropdown-button ion-information-circled small dmp-main-color pointer-opaq" data-activates='info-search-bills-floating-2' data-beloworigin="true" data-hover="true" data-constrainwidth='false'></i>
                            </span>




                            <ul id='info-search-bills-floating-2' class='dropdown-content dmp-main-back setting-filter-search-bills-item-selector'>
                              <li><a href="#!">Par défaut, les factures et visites datent d'un interval de 3 mois</a></li>
                            </ul>
                          </div>  

                      </div>

          </div>
  
    <div class="row" id="main-content-biling">
         <!-- Facturation - Zone -->
          <div class="row" id="bills-table-wrapper">
                    <div class="row center hidden" id="empty-bills-info">
                            <i class="ion-ios-filing-outline large red-text"></i>
                            <h5>Aucune Facture Disponible</h5>
    
                    </div>
                    <div class="row" id="table-container" style="overflow:auto;height:900px; overflow-x:hidden;">
                        <table class="search-section MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="bills-table" style="margin-top:30px;">
                            <thead class="dmp-main-color">
                                <th class="zero-margin zero-padding"><?= __('N° Facture') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Opérateur') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Code Visite') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Patient') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Facture') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Emission') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Règlement') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Montant') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Type') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Moyen') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Paiements') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Action') ?></th>
                            </thead>
                            <tbody changed="1">

                            </tbody>
                        </table>
                      <div class="row center hidden" id="loader-bills-info">
                              <div class="progress dmp-orange-back">
                                  <div class="indeterminate grey"></div>
                              </div>
                            <span class="dmp-main-color">Importation en cours</span>
                      </div>
                    </div>
             </div>


            <div class="row" id="visits-table-wrapper">
                    <div class="row center hidden" id="empty-visits-info">
                            <i class="ion-ios-filing-outline large red-text"></i>
                            <h5>Aucune Visite Disponible</h5>
    
                    </div>
                        <div class="row" id="table-container" style="overflow:auto;height:900px; overflow-x:hidden;">
                            <table class="search-section MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="visits-info-table" style="margin-top:30px;">
                                <thead class="dmp-main-color">
                                    <th class="zero-padding"><?= __('Code Visite') ?></th>
                                    <th class="zero-padding"><?= __('Opérateur') ?></th>
                                    <th class="zero-padding"><?= __('Patient') ?></th>
                                    <th class="zero-padding"><?= __('Etats') ?></th>
                                    <th class="zero-padding"><?= __('Ordres') ?></th>
                                    <th class="zero-padding"><?= __('Interventions') ?></th>
                                    <th class="zero-padding"><?= __('Actions') ?></th>
                                </thead>
                                <tbody changed="1">

                                </tbody>
                            </table>
                        <div class="row center hidden loader">
                              <div class="progress dmp-orange-back">
                                  <div class="indeterminate grey"></div>
                              </div>
                            <span class="dmp-orange-text light">Importation en cours</span>
                        </div>
                    </div>
             </div>

             <div class="row center" id="state-table-wrapper">
                        <div class="row global-state-selector">
                              <div class="col s6">
                                  <p style="position:relative;">
                                    <i class="ion-podium large dmp-main-color"></i>
                                    <i class="ion-android-time dmp-main-color small" style="top: 30px;position: absolute;"></i>
                                  </p>
                                  <button class="btn global-state-choice-trigger-manager dmp-orange-back">Etat Périodique</button>
                              </div>
                              <div class="col s6">
                                  <p style="position:relative;">
                                      <i class="ion-podium dmp-main-color large"></i>
                                      <i class="ion-arrow-swap dmp-main-color small" style="top: 30px;position: absolute;"></i>
                                  </p>
                                    <button class="btn global-state-choice-trigger-manager dmp-orange-back">Etat Pério-Comparatif</button>
                              </div>
                        </div>

                        <div class="row global-state-content global-state-containers hidden periodic-state-manager">
                                  <div class="container">
                                            <div class="container">
                                                 <p style="position:relative;">
                                                    <i class="ion-podium dmp-main-color large"></i>
                                                    <i class="ion-android-time dmp-main-color small" style="top: 30px;position: absolute;"></i>
                                                    <h5 class="dmp-main-color">Etat Périodique</h5>
                                                </p>
                                                <form id="form-global-state-manager">
                                                    <div class="col s6 input-field darkened-input-field">
                                                          <h6 class="dmp-main-color left-align">Période début</h6>
                                                         <input type="date" name="start-date-state" required style="color:white !important;">
                                                    </div>
                                                    <div class="col s6 input-field darkened-input-field">
                                                        <h6 class="dmp-main-color left-align">Période fin</h6>
                                                         <input type="date" name="end-date-state" required style="color:white !important;">
                                                    </div>
                                                    <div class="col s6">
                                                         <button type="submit" class="btn waves-white dmp-main-back" style="margin-top:30px;">Générer</button>
                                                    </div>
                                                    <div class="col s6">
                                                       <button type="reset" class="btn dmp-orange-back reset-global-state-trigger" style="margin-top:30px;">Retour</button>
                                                    </div>
                                      </form>
                                  </div>
                              </div>
                        </div>


                        <div class="row global-state-content global-state-containers hidden comparative-state-manager">
                                  <div class="container">
                                              <p style="position:relative;">
                                                  <i class="ion-podium dmp-main-color large"></i>
                                                  <i class="ion-arrow-swap dmp-main-color small" style="top: 30px;position: absolute;"></i>
                                                  <h5 class="dmp-main-color">Etat Pério-Comparatif</h5>
                                              </p>
                                              <form id="global-comparative-state-manager-form">
                                                   <div class="col s12 input-field">
                                                      <h6 class="dmp-main-color left-align">Acteurs</h6>
                                                      <select name="global-comparative-state-manager-multiple-select" id="global-comparative-state-manager-multiple-select" multiple="">
                                                          <?php foreach ($managers as $manager):?>
                                                              <?php if(!$manager->id === $manager_id) :?>
                                                                <option value="<?= $manager->id  ?>"><?= h($manager->person->lastname.' '.$manager->person->firstname) ?></option>
                                                              <?php endif; ?>
                                                          <?php endforeach; ?>
                                                      </select>
                                                   </div>
                                                   <div class="col s12">
                                                        <div class="col s6 input-field">
                                                            <h6 class="dmp-main-color darkened-input-field left-align darkened-input-field">Période début</h6>
                                                             <input type="date" style="color:white !important;">
                                                        </div>
                                                        <div class="col s6 input-field darkened-input-field">
                                                            <h6 class="bold dmp-main-color left-align">Période fin</h6>
                                                             <input type="date"  style="color:white !important;">
                                                        </div>
                                                        <div class="col s12 center">
                                                            <div class="col s6">
                                                                 <button type="submit" class="btn waves-white dmp-main-back" style="margin-top:30px;">Générer</button>
                                                            </div>
                                                            <div class="col s6">
                                                             <button type="reset" class="btn dmp-orange-back reset-global-state-trigger" style="margin-top:30px;">Retour</button>
                                                            </div>
                                                        </div>
                                                   </div>
                                              </form>
                                      </div>
                                </div>

                                <div class="row loader hidden">
                                    <?= $this->Html->image('assets_dmp/ajax_loader/loader-orange') ?>
                                </div>
             </div>
    </div>
</div>
          


<!-- Custom Dependencies -->
<?= $this->Html->script('Red/manager/visit-invoices/index') ?>
<?= $this->Html->script('Red/manager/manager-operators/manage_payments') ?>
<?= $this->Html->script('Red/manager/manager_engine_search') ?>
<script>  
//Managing Research Filters
$('.tooltipped').tooltip();
$('.dropdown-button').dropdown();
var $wrapper_filtering = $('#bills-wrapper');

$('.setting-filter-search-bills-item-selector li').on('click',function(){
   var ref = $(this).attr('ref');
   var selected_item_icon = $('<i class="ion-ios-checkmark-empty teal-text left small"></i>');
   $('.setting-filter-search-bills-item-selector li').find('i').remove();
   $(this).find('a').append(selected_item_icon);
   $('.filter-wrapper',$wrapper_filtering).addClass('hidden');
   $(ref,$wrapper_filtering).removeClass('hidden'); 
});

// Search By Keywords
$('input[name="search-keywords"]',$wrapper_filtering).on('keyup',function(){
    var $value = $(this).val().toLowerCase().trim();
    if($value.length>1)
    { 

      $('table.search-section tbody tr',$wrapper_filtering).each(function(){
          var $classExp = $(this).attr("tags").toLowerCase().trim();
          var regExp = new RegExp($value);
          if(regExp.test($classExp))
            $(this).removeClass("hidden");
          else
            $(this).addClass("hidden");
      });
    }
    else
    {
      $('table.search-section tbody tr',$wrapper_filtering).removeClass('hidden');
      return null;
    }
});

//Search By Amount
$(".trigger-search-amount").on("click",function(){
      $.ajax({
          beforeSend:function(){
              $('#refresh-bills-infos').addClass('hidden');
              $('#bill-info-loader-icon').removeClass('hidden');
              $("#bills-table tbody").empty();
              $("#loader-bills-info").removeClass("hidden");
          },
          type:'GET',
          url:'/manager/visit-invoices/all',
          data:'min='+parseFloat($(".range-min").val()*1000)+"&max="+parseFloat($(".range-max").val()*1000)+'&specific-search=amount',
          success: function(data){
              flushingBillTable(data);
          },
          complete: function(){
              $('#bill-info-loader-icon').addClass('hidden');
              $("#loader-bills-info").addClass("hidden");
              $('#refresh-bills-infos').removeClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}
      });
  });

//Search By Dates
$('.form-search-by-date-bill-floating').on('submit',function(e){
    e.preventDefault();
    var $form = $(this);
    var $isErrorFree = true;
    $('input[type="date"]',$form).each(function(){
        if($(this).val().match(!/^\w{4}-\w{2}-\w{2}$/))
          $isErrorFree = false;
    });

    var date_from = $('input[type="date"]:eq(0)',$form).val()+' 00:00:00';
    var date_to = $('input[type="date"]:eq(1)',$form).val()+' 00:00:00';

    if($isErrorFree)
    {
      $.ajax({
          beforeSend:function(){
              $('#refresh-bills-infos').addClass('hidden');
              $('#bill-info-loader-icon').removeClass('hidden');
              $("#bills-table tbody").empty();
              $("#loader-bills-info").removeClass("hidden");
          },
          type:'GET',
          url:'/manager/visit-invoices/all',
          data:'date-from='+date_from+'&date-to='+date_to+'&specific-search=date',
          success: function(data){
              flushingBillTable(data);
          },
          complete: function(){
              $('#bill-info-loader-icon').addClass('hidden');
              $("#loader-bills-info").addClass("hidden");
              $('#refresh-bills-infos').removeClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}

      });

      $.ajax({
          beforeSend:function(){
              $("#visits-table-wrapper .loader").removeClass("hidden");
              $('#visits-info-table tbody').empty();
              $('#refresh-visits-infos').addClass('hidden');
              $('#visit-info-loader-icon').removeClass('hidden');
              $("#loader-bills-info").removeClass("hidden");
          },
          type:'GET',
          url: '/manager/visits/get',
          dataType:'text',
          data:'date-from='+date_from+'&date-to='+date_to+'&specific-search=date',
          success: function(data){
              flushingVisitTable(data);
          },
          complete: function(){
              $("#visits-table-wrapper .loader").addClass("hidden");
              $("#loader-bills-info").addClass("hidden");
              $('#refresh-visits-infos').removeClass('hidden');
              $('#visit-info-loader-icon').addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}
      });
    }
    else
    {
      Materialize.toast('Veuillez corriger le formulaire avant envoi',2000);
    }
});


function flushingBillTable(data)
{
 if(data==="ko")
           {
            $("#empty-bills-info").removeClass("hidden");
            $("#bills-table").addClass("hidden");
           }
           else
           {
            var results = JSON.parse(data);
            $.each(results,function(index,value){

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
        $tags = value.code_invoice.toLowerCase()+" "+value.amount+" "+value.formatted_created+" "+value.formatted_solded+" "+value.visit.code_visit.toLowerCase()+" "+value.visit.patient.person.lastname.toLowerCase()+" "+value.visit.patient.person.firstname.toLowerCase()+" ";

            for(var i=1; i<=12;i++)
            {
              var $td_element = $("<td class='light-padding zero-margin light-mixed-text'></td>");
              $tr_element.append($td_element);
            }
            $tr_element.find("td:eq(0)").text(value.code_invoice);
            $tr_element.find("td:eq(1)").text(value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname);
            $tr_element.find("td:eq(2)").text(value.visit.code_visit);
            $tr_element.find("td:eq(3)").text(value.visit.patient.person.lastname+" "+value.visit.patient.person.firstname).attr("patient-id",value.visit.patient.id).addClass("pointer-opaq").bind("click",getInfoPatient);

            var $count_bill = value.bill_image_count;

            for(j=0 ; j<$count_bill ; j++)
            {
               var $evidence = $('<img src="/webroot/Files/manager/'+value.manager_operator.institution.slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
              $tr_element.find("td:eq(4)").append($evidence);
              $evidence.materialbox();
            }

            $tr_element.find('td:eq(4)').addClass('medium-cell-row');

            $tr_element.find("td:eq(5)").text(value.formatted_created);
            $tr_element.find("td:eq(6)").text(value.formatted_solded);
            $tr_element.find("td:eq(7)").text(value.amount);

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
                  $tr_element.find("td:eq(8)").text($type_invoice);
                  $tags+=$type_invoice.toLowerCase()+" ";

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
                  $tr_element.find("td:eq(9)").text($way);
                  $tr_element.attr("tags",$tags+$way.toLowerCase());
                  // $tr_element.attr('tags',$tags);

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

                  $tr_element.find("td:eq(10)").html($icon_payments);
                  //build menu invoice row
                  var $menu_trigger = $('<a href="#" data-activates="invoice-sold'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
                  var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="invoice-sold'+value.id+'"></ul>');
                
                if(value.visit_invoice_type_id===1 && value.visit_invoice_payment_way_id==0)
                $('<li><span>Encaisser Paiement</span></li>').unbind('click').bind('click', function(){definePaymentWayBillVisit(value.id,value.amount_unformatted,value.visit.patient.id);}).appendTo($menu_container);

                $('<li><a href="/manager/visit-invoices/show-meeting-invoice/'+value.id+'" target="blank">Visualiser Pdf</a></li>').appendTo($menu_container);
                $('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
                $('<li class="divider"></li>').appendTo($menu_container);
                $('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
                
                $tr_element.find("td:eq(11)").append($menu_trigger)
                              .append($menu_container);
                $("#bills-table tbody").append($tr_element);
                $menu_trigger.dropdown();


        });
        $("#bills-table").removeClass("hidden");
        $("#empty-bills-info").addClass("hidden");    
      }
}

function flushingVisitTable(data){
  if(data==="ko")
      {
        Materialize.toast("Aucune Visite",3500);
        $("#empty-visits-info").removeClass("hidden");
        $("#visits-info-table").addClass("hidden");
      }
      else
      {
        var $results = JSON.parse(data);
        $.each($results,function(index,value){
        console.log(value);

            var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding'></tr>");           
            var tag_row = value.code_visit+' '+value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname+' '+value.patient.person.lastname+' '+value.patient.person.firstname;

            for(var i=1; i<=7;i++)
            {
              var $td_element = $("<td class='zero-padding light-mixed-text'></td>");
              $tr_element.append($td_element);
            }

            $tr_element.find("td:eq(0)").text(value.code_visit);
            $tr_element.find("td:eq(1)").text(value.manager_operator.person.lastname+' '+value.manager_operator.person.firstname);
            $tr_element.find("td:eq(2)").text(value.patient.person.lastname+' '+value.patient.person.firstname);
            $tr_element.find("td:eq(3)").attr('style','text-align:left !important;');
            
            if(value.deleted)
            {
              $tr_element.addClass('light-grey-bill');
            }
            else
            {
              if(value.visit_states[0].visit_state_type_id===1)
              {
                 $tr_element.addClass('light-blue-bill-1');
              }
              else if(value.visit_states[0].visit_state_type_id===8)
              {
                $tr_element.addClass('light-yellow-bill-1');
              }
              else if(value.visit_states[0].visit_state_type_id===7)
              {
                if(!value.visit_states[0].state_end)
                    $tr_element.addClass('dmp-orange-back').removeClass('dmp-grey-text').addClass('white-text');
                else
                    $tr_element.addClass('light-green-bill');

              }
              else
              {
                 //determine if the visit is over / not when not equal to booking or meeting
                 if(value.visit_states[0].formatted_end_state!=='')
                    $tr_element.addClass('light-green-bill');
                 else
                    $tr_element.addClass('light-red-bill');
              }

            }

            $.each(value.visit_states,function(){
                 var $visit_state = determine_visit_type(this.visit_state_type_id);
                 tag_row+=' '+$visit_state+' '+this.formatted_created_state+' '+this.formatted_end_state;
                 //introduire apres vist_intervention_done
                 if(this.visit_state_type_id == '8')
                 {
                  if(value.deleted)
                  {
                     $tr_element.find("td:eq(3)").append($visit_state+' - création: '+this.formatted_created_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+'</span> <br/>'+'Date Annulation: '+this.formatted_end_state);
                  }
                  else
                  {
                     $tr_element.find("td:eq(3)").append($visit_state+' - création: '+this.formatted_created_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+'</span> <br/>');
                  }
                  tag_row+=' '+value.visit_intervention_doctors[0].expected_meeting_date;
                 }
                 else if(this.visit_state_type_id =='1')
                 {
                    $tr_element.find("td:eq(3)").append($visit_state+' - Date rdv: <span class="meeting-date">'+value.visit_intervention_doctors[0].expected_meeting_date+''+'</span> <br/>');
                  tag_row+=' '+value.visit_intervention_doctors[0].expected_meeting_date;
                 }
                 else
                    $tr_element.find("td:eq(3)").append($visit_state+' - Début: '+this.formatted_created_state+' - Fin: '+this.formatted_end_state+' <br/>');

            });

              $tr_element.attr('tags',tag_row);

                    //build info orders
            var $icon_orders = $('<i class="ion-information-circled small white-text dmp-main-color trigger-solded-payment-info-box pointer-opaq"></i>').attr("visit-id",value.id);
            $icon_orders.unbind("click").bind("click",triggerOrdersVisit);
            $tr_element.find("td:eq(4)").html($icon_orders);

                    //build info interventions
            var $icon_orders = $('<i class="ion-information-circled small white-text dmp-main-color trigger-solded-payment-info-box pointer-opaq"></i>').attr("visit-id",value.id);
            $icon_orders.unbind("click").bind("click",triggerInterventionInfos);
            $tr_element.find("td:eq(5)").html($icon_orders);
            
            var $menu_trigger = $('<span href="#" data-activates="visit-action'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 10px 10px 10px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></span>');
            
            var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="visit-action'+value.id+'"></ul>');

            if(!value.deleted)
            {

    
                if(value.visit_states[0].visit_state_type_id == '8')
                {
                   $('<li><span id-bill="'+value.id+'" class="change-payment-mode" id-patient="'+value.patient.id+'" class="">Facturer la réservation</span></li>').unbind('click').bind('click',changePaymentMode).appendTo($menu_container);
                   $('<li visit-id="'+value.id+'"><span class="" >Replanifier la réservation</span></li>').unbind('click').bind('click',replanVisit).appendTo($menu_container);
                   $('<li visit-id="'+value.id+'"><span class="" >Modifier la réservation</span></li>').unbind('click').bind('click',replanValidateBooking).appendTo($menu_container);
                   $('<li ><span class="" >Annuler Réservation</span></li>').attr('cancel-booking-id',value.id).unbind('click').bind('click',cancelBooking).appendTo($menu_container);
                }
                else if(value.visit_states[0].visit_state_type_id == '1')
                {

                      $('<li visit-id="'+value.id+'"><span class="">Changer Etat</span></li>').unbind('click').bind('click',changeStateVisit).appendTo($menu_container);
                    $('<li visit-id="'+value.id+'"><span class="" >Replanifier la visite</span></li>').unbind('click').bind('click',replanVisit).appendTo($menu_container);
                     
                
                }
                else
                {
                   $('<li visit-id="'+value.id+'"><span class="">Changer Etat</span></li>').unbind('click').bind('click',changeStateVisit).appendTo($menu_container);
                   $('<li class="divider"></li>').appendTo($menu_container);
                   $('<li visit-id="'+value.id+'"><span class="">Facturer</span></li>').unbind('click').bind('click',createBill).appendTo($menu_container);
                   $('<li class="divider"></li>').appendTo($menu_container);
                   $('<li><span class="">Etat Total-Facturation</span></li>').unbind('click').bind('click', function(){StateVisitGenerator(value.id);}).appendTo($menu_container);
                   $('<li class="divider"></li>').appendTo($menu_container);
                   $('<li visit-id="'+value.id+'"><span class="">Definir Billet Sortie</span></li>').unbind('click').bind('click',setEndSubState).appendTo($menu_container);
                }


              if(value.patient_id==0)
              {
                $('<li visit-id="'+value.id+'"><span>Réattribuer Visite</span></li>').unbind('click').bind('click',attributeVisit).appendTo($menu_container);
                $('<li class="divider"></li>').appendTo($menu_container);
              }


              $menu_trigger.append($menu_container);
              $tr_element.find("td:eq(6)").append($menu_trigger);
              $("#visits-info-table tbody").append($tr_element);
              $menu_trigger.dropdown();

            }
            else
            {
              $('<li booking-id="'+value.id+'"><span  class="validate-booking-mode" id-patient="'+value.patient_id+'" class="">Reconduire la réservation</span></li>').unbind('click').bind('click',validateBooking).appendTo($menu_container);
              $menu_trigger.append($menu_container);
              $tr_element.find("td:eq(6)").append($menu_trigger);
              $("#visits-info-table tbody").append($tr_element);
              $menu_trigger.dropdown();
              
            }
            
        });

      }
}

</script>


