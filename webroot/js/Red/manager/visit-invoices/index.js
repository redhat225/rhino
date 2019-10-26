$(document).ready(function(){
	$('.tooltipped').tooltip();
	//initialize nouislider
	 noUiSliderRange();
	 $('select').material_select();
	 $('ul.tabs').tabs();

	//search by keywords
	$("#keywords-search-id").on('keyup',function(){
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase();
				$(".bill-item").each(function(){
					var $classExp = $(this).attr("tags").toLowerCase();
					var regExp = new RegExp($tags);
					if(regExp.test($classExp))
						$(this).removeClass("hidden");
					else
						$(this).addClass("hidden");
				});
  			}
  			else
  			{
				$(".bill-item").removeClass("hidden");
  			}
  			return false;
	});

	$('#replan-visit-form').on('submit',function(e){
		return null;
	});

	$('#refresh-visits-infos').on('click',function(){
			 getVisitInfo();
	});
	$('#refresh-visits-infos').trigger('click');

	$('#refresh-bills-infos').on('click',function(){
			 var $url='/manager/visit-invoices/all';
			 getBillInfo($url);
	});
	$('#refresh-bills-infos').trigger('click');


	//search by range amount 
	// $("#trigger-search-amount").on("click",function(){
	// 	var $url = '/manager/visit-invoices/all-by-amount?min='+parseFloat($("#range-min").val()*1000)+"&max="+parseFloat($("#range-max").val()*1000);
	// 	getBillInfo($url);
	// });

	//search by date
	$("#form-search-by-date-bill").on("submit",function(){
		return false;
	});


	$("#trigger-search-by-date").on('click',function(){
		var $form = $("#form-search-by-date-bill");
		var $isErrorFree = true;

		$(".date-filter-bill",$form).each(function(){
			if($(this).val()==="")
			$isErrorFree = false;
		});
	
		if($isErrorFree)
		{	
			var $url ="/manager/visit-invoices/all-by-date?begin-date-filter-bills="+$("#begin-date-filter").val().trim()+"&end-date-filter-bills="+$("#end-date-filter").val().trim()+"&type_date="+$value_type_date;
			getBillInfo($url);
		}
		else
		{
			// return false;
			Materialize.toast("veuillez corriger le formulaire",1000);
		}
	});


	//add a new row for creating a new bill item
	$('.add-item-bill-create').unbind('click').bind('click', function(){
			var $table = $(this).attr('data-table');

			var $tr_element = $('<tr></tr>');
			
			for (var i=0; i<7; i++)
			{
				var $td_element = $('<td></td>');
				$tr_element.append($td_element);
			}

			$('td:eq(0)',$tr_element).attr('style','text-align:left !important;');

			var $label_cell =  $('<textarea name="label_custom_bill[]" class="materialize-textarea required label_item_bill"></textarea').attr('style','border-bottom:0px;');
			$('td:eq(0)',$tr_element).append($label_cell).attr('style','width:43%;');

			var $label_type =  $('<input name="label_type_custom_bill[]" class="required label_type_item_bill">').attr('style','border-bottom:0px;');
			$('td:eq(1)',$tr_element).append($label_type).attr('style','width:11%;');


			var $description = $('<input type="text" name="description_custom_bill[]" class="description_item_bill">').attr('style','border-bottom:0px;').unbind('change').bind('change',function(){
				if($(this).val().length>0)
					$(this).addClass('required');
				else
				{
					$(this).removeClass('required');
					$(this).removeClass('invalid')
								.removeClass('valid');
						
				}
			});
			$('td:eq(2)',$tr_element).append($description);

			var $qte_act_item = $('<input type="number" name="qte_custom_item[]" class="required qte_act_item">').unbind('change').bind('change', function(){
				var $value = $(this).val();
				var $cross_value = $(this).parents('tr').find('.unit_price_act_item').val();

				if($cross_value!=="" && $cross_value>0 && $value>0 && $value!=="")
				{
						var $amount_item = Math.ceil($value*$cross_value);
						$(this).parents('tr').find('.total_amount_act_item').val($amount_item);
				}
				else
				{
						$(this).parents('tr').find('.total_amount_act_item').val('');
				}
			});
			$('td:eq(3)',$tr_element).append($qte_act_item);

			var $unit_price_act_item = $('<input type="number" name="unit_price_custom_item[]" class="required unit_price_act_item">').unbind('change').bind('change', function(){
				var $value = $(this).val();
				var $cross_value = $(this).parents('tr').find('.qte_act_item').val();
				if($cross_value!=="" && $cross_value>0 && $value>0 && $value!=="")
				{
						var $amount_item = Math.ceil($value*$cross_value);
						$(this).parents('tr').find('.total_amount_act_item').val($amount_item);
				}
				else
				{
						$(this).parents('tr').find('.total_amount_act_item').val('');
				}
			});
			$('td:eq(4)',$tr_element).append($unit_price_act_item);

			var $total_amount_item = $('<input type="number" readonly name="total_amount_act_item[]" class="total_amount_act_item">');
			$('td:eq(5)',$tr_element).append($total_amount_item);

			var $retrieve_icon = $('<i></i>').attr('class','ion-ios-close small dmp-main-color pointer-opaq').unbind('click').bind('click', function(){
					$(this).parents('tr').remove();
			});

			$('td:eq(6)',$tr_element).append($retrieve_icon);

			$('tbody',$table).append($tr_element);
	});

	//managing global stats generator
	$('.global-state-choice-trigger-manager').unbind('click').bind('click',function(){
		console.log($(this).text());
		var $value = $(this).text();
		var $container = $(this).parents('div');
		$('.global-state-selector').slideUp();
		switch($value)
		{
			case 'Etat Périodique':
				$('.global-state-content', $container).slideUp();
				$('.periodic-state-manager', $container).slideDown();
			break;

			case 'Etat Pério-Comparatif':
				$('.global-state-content', $container).slideUp();
				$('.comparative-state-manager', $container).slideDown();
			break;
		}
	});

	$('.reset-global-state-trigger').unbind('click').bind('click', function(){
		var $container = $(this).parents('div');
		$('.global-state-content', $container).slideUp();
		$('.global-state-selector').slideDown();
	});

	 $('#form-global-state-manager').unbind('submit').bind('submit', function(e){
	 		var $container = $(this).parents('div');
	 		var $form = $(this);
	 		$.ajax({
	 			beforeSend: function(){
	 				$('#floating-box-global-state-generator').empty();
	 				$('.loader', $container).removeClass('hidden');
	 				$('.global-state-containers').addClass('hidden');
	 			},
	 			url:'/manager/institutions/global-state-builder',
	 			type:'GET',
	 			dataType:'text',
	 			data: $form.serialize(),
	 			success: function(data){
	 				$('#floating-box-global-state-generator').append(data);
	 				$('#floating-box-global-state-generator').removeClass('hidden');
	 			},
	 			complete: function(){
	 				$('.loader', $container).addClass('hidden');
	 			}
	 		});

	 		e.preventDefault();
	 });
});

function getInfoPatient()
{
	var $id_patient = $(this).attr("patient-id");
	$("#get-patient-info-modal-box").openModal({
		ready: function(){
			$.ajax({
				beforeSend: function(){
					$("#patient-info-wrapper").addClass("hidden");
					$("#loader-patient-payment-modal").removeClass("hidden");
				},
				url:'/manager/patients/get?id='+$id_patient,
				type:'GET',
				dataType:'Text',
				success: function(data)
				{
					if(data==="ko")
					{
						Materialize.toast("Erreur lors de l'importation veuillez réessayer",1500);
						$("#close-modal-get-patient").trigger("click");
					}
					else
					{
						var results = JSON.parse(data);
						// console.log(results);
					}
				},
				error: function(){alert("Erreur Serveur, veuillez réessayer");},
				complete: function(){
					$("#patient-info-wrapper").removeClass("hidden");
					$("#loader-patient-payment-modal").addClass("hidden");
				}
			});
		},
		complete: function(){

		}
	});
}

function getBillInfo($url)
{
	$.ajax({
		beforeSend: function(){
			$('#refresh-bills-infos').addClass('hidden');
			$('#bill-info-loader-icon').removeClass('hidden');
			$("#bills-table tbody").empty();
			$("#loader-bills-info").removeClass("hidden");
		},
		type:'GET',
		url: $url,
		dataType:'text',
		success: function(data){
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
		},
		complete: function(){
			$('#bill-info-loader-icon').addClass('hidden');
			$("#loader-bills-info").addClass("hidden");
			$('#refresh-bills-infos').removeClass('hidden');

		},
		error: function(){alert("Erreur Serveur, veuillez recharger la page/contacter le support si le problème persiste");}

	});
}


function getVisitInfo()
{
	$.ajax({
		beforeSend: function(){
			$("#visits-table-wrapper .loader").removeClass("hidden");
			$('#visits-info-table tbody').empty();
			$('#refresh-visits-infos').addClass('hidden');
			$('#visit-info-loader-icon').removeClass('hidden');
			$("#loader-bills-info").removeClass("hidden");
		},
		type:'GET',
		url: '/manager/visits/get',
		dataType:'text',
		success: function(data){
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
		},
		complete: function(){
			$("#visits-table-wrapper .loader").addClass("hidden");

			$("#loader-bills-info").addClass("hidden");
						$('#refresh-visits-infos').removeClass('hidden');
			$('#visit-info-loader-icon').addClass('hidden');
		},
		error: function(){alert("Erreur Serveur, veuillez recharger la page/contacter le support si le problème persiste");}
	});
}

function triggerOrdersVisit()
{
	var $visit_id = $(this).attr('visit-id');
		$('#orders-visit-modal').openModal({
				ready: function(){
					$.ajax({
						beforeSend: function(){
							$("#orders-visit-table-floating tbody").empty();
							$('#orders-visit-modal-info-wrapper').addClass('hidden');
							$('#orders-visit-modal loader-ajax').removeClass('hidden');
						},
						type:'GET',
						url:'/manager/visit-states/get-orders',
						dataType:'json',
						data:{'visit-id':$visit_id},
						success: function(data){

							$.each(data,function(index, value){
								var $current_state = value.visit_state_type.label_state_type;
								var $slug = value.slug;
								$.each(value.visit_state_order_types, function(index, value){
								    var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding zero-margin'></tr>");
						 	    
						   			for(var i=1; i<=5;i++)
						   			{
						   				var $td_element = $("<td class='zero-padding'></td>");
						   				$tr_element.append($td_element);
						   			}

						   			$('td:eq(0)', $tr_element).append($current_state);
						   			$('td:eq(1)', $tr_element).append(value.label_order_type);
						   			$('td:eq(2)', $tr_element).append(value.formatted_date);

						   			var $count_bill = value.count_order;

							   		for(j=0;j<$count_bill;j++)
							   		{
							   			var $evidence = $('<img src="/webroot/Files/manager/'+$slug+'/orders/'+value._joinData.path_order_details+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
							   			$tr_element.find("td:eq(3)").append($evidence);
							   			$evidence.materialbox();
							   		}


									var $menu_trigger = $('<span href="#" data-activates="visit-action'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="pointer-opaq dropdown-button" style="padding:0px 10px 10px 10px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></span>');
									var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="visit-action'+value.id+'"></ul>');
		  							
		  							$('<li><a href="/manager/visit-state-order-details/get-order-pdf/'+value._joinData.id+'" target="_blank" class="">Visualiser le PDF</span></li>').appendTo($menu_container);
									$('<li class="divider"></li>').appendTo($menu_container);
		  							$('<li><a href="/manager/visit-state-order-details/download-order-pdf/'+value._joinData.id+'" target="_blank" class="">Télécharger le PDF</span></li>').appendTo($menu_container);
									$('<li class="divider"></li>').appendTo($menu_container);
								    $('<li><span class="">Télécharger Image</span></li>').appendTo($menu_container);
							
									$menu_trigger.append($menu_container);
									$('td:eq(4)', $tr_element).append($menu_trigger);

												$("#orders-visit-table-floating tbody").append($tr_element);
																		$menu_trigger.dropdown();



								});
							});

							
						},
						complete: function(){
							$('#orders-visit-modal-info-wrapper').removeClass('hidden');
							$('#orders-visit-modal loader-ajax').addClass('hidden');
						}
					});	
				},
				complete: function(){

				}
		});
}


function changePaymentMode()
{
	var bill_id = parseInt($('span',this).attr('id-bill'));
	var patient_id = parseInt($('span',this).attr('id-patient'));

	var $modal = $('#change-payment-mode');
	$modal.openModal({
		ready: function(){

			$('#change-option-payment').unbind('change').bind('change',function(){
				var $value = $(this).val();
				$('.change-payment-mode-infos div').empty();
				$('.change-payment-mode-infos div').addClass('hidden');	

				switch($value)
				{
					case 'assurance':

							$.get('/manager/visit-invoices/change-payment-mode',{'id-bill':bill_id,'id-patient':patient_id,'type':'insurance'},function(data){
								if(data==="down")
								{
									Materialize.toast('Ce patient ne possède pas d\'assurance valide',1500);
								}
								else
								{
									$('#insurange-change-mode').empty().append(data);
									$('#insurange-change-mode').removeClass('hidden');
									$('#id-bill-change-payment-mode').val(bill_id);
	    							$('#id-patient-change-payment-mode').val(patient_id);
								}

							});
					break;

					case 'cash':
							$.get('/manager/visit-invoices/change-payment-mode',{'id-bill':bill_id,'id-patient':patient_id,'type':'cash'},function(data){
								if(data==='down')
								{
									Materialize.toast('Une érreur est survenue lors de l\'opération',1500);
								}
								else
								{
									$('#cash-change-mode').empty().append(data);
									$('#cash-change-mode').removeClass('hidden');
									$('#id-bill-change-payment-mode').val(bill_id);
	    							$('#id-patient-change-payment-mode').val(patient_id);
								}
							});
					break;

					case 'cheque':
							$.get('/manager/visit-invoices/change-payment-mode',{'id-bill':bill_id,'id-patient':patient_id,'type':'cb'},function(data){
								if(data==='down')
								{
									Materialize.toast('Une érreur est survenue lors de l\'opération',1500);
								}
								else
								{
									$('#cash-change-mode').empty().append(data);
									$('#cash-change-mode').removeClass('hidden');
									$('#id-bill-change-payment-mode').val(bill_id);
	    							$('#id-patient-change-payment-mode').val(patient_id);
								}
							});
					break;

					case '':

					break;
				}
			});
		},
		complete: function(){
				$('.change-payment-mode-infos div').empty();
				$('.change-payment-mode-infos div').addClass('hidden');
				$('#change-option-payment option:eq(0)').trigger('click');
		}
	});
}

function triggerInterventionInfos()
{
	var $visit_id = parseInt($(this).attr('visit-id'));
	var $modal = $('#interventions-visit-modal');
	$('#interventions-visit-modal').openModal({
		ready:function(){
				$.ajax({
					beforeSend: function(){
						$('#interventions-visit-modal-info-wrapper').addClass('hidden');
						$('.loader-ajax',$modal).removeClass('hidden');
						$('#interventions-visit-table tbody').empty();
					},
					url:'/manager/visits/get-interventions?visit-id='+$visit_id,
					dataType:'text',
					type:'GET',
					success:function(data)
					{
						if(data==='ko')
						{
							Materialize.toast('Cette visite ne contient aucune intervention',1500);
						}
						else
						{
							var $results = JSON.parse(data);
							console.log($results);
							
						    $.each($results,function(index,value)
						    {
						    	var $countdown = 1;
						    	if(value.visit_intervention_doctors && value.visit_intervention_auxiliaries)
						    		var merging_object = $.merge(value.visit_intervention_doctors,value.visit_intervention_auxiliaries)
						    	else
						    	{
						    		var merging_object = value.visit_intervention_doctors;
						    	}

						    	// console.log(merging_object);
						    	$.each(merging_object,function(index,value){


									var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding zero-margin'></tr>");
						 	    
						   			for(var i=1; i<=8;i++)
						   			{
						   				var $td_element = $("<td class='zero-padding'></td>");
						   				$tr_element.append($td_element);
						   			}

						   			if(value.deleted)
						   			{
						   				$tr_element.addClass('light-grey-bill');
						   			}

						   			$('td:eq(0)',$tr_element).text($countdown);
						   			$('td:eq(1)',$tr_element).text(value.formatted_created);
						   			if(!value.deleted)
						   			  $('td:eq(2)',$tr_element).text(value.formatted_done);
						   			else
						   			  $('td:eq(2)',$tr_element).text(value.formatted_deleted);
						   			$('td:eq(3)',$tr_element).text(value.category);

						   			//building acts infos
									var $icon_orders = $('<i class="ion-information-circled small white-text dmp-main-color pointer-opaq dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-hover="true" data-activates="dropdown-act-intervention-'+$countdown+'"></i>');
									//dropdown structure
									var $ul_structure = $("<ul id='dropdown-act-intervention-"+$countdown+"' class='dropdown-content dmp-main-back'></ul>").append('<li><span>one</span></li>');
									   // $ul_structure 
						   			$('td:eq(4)',$tr_element).append($icon_orders).append($ul_structure);

						   			if(value.category==='medecin')
						   			{
						   			  $('td:eq(5)',$tr_element).text('Dr. '+value.doctor.person.lastname+' '+value.doctor.person.firstname);
						   			  if(value.visit_invoice)
						   			  {
							   			var $count_bill = value.bill_image_count;

							   			for(j=0;j<$count_bill;j++)
							   			{
							   			   var $evidence = $('<img src="/webroot/Files/manager/'+value.slug+'/invoices_images/'+value.visit_invoice.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
							   				$tr_element.find("td:eq(6)").append($evidence);
							   				$evidence.materialbox();
							   			}

						   			  }
						   			  else
						   			     $('td:eq(6)',$tr_element).html('&nbsp;');
								   		//build menu invoice row
								   		var $menu_trigger = $('<a href="#" data-activates="intervention-info-menu-'+$countdown+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 10px 10px 10px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
								   		var $menu_container = $('<ul class="dropdown-content" id="intervention-info-menu-'+$countdown+'"></ul>');


								   		if(value.visit_invoice)
								   		{
											$('<li><span>Téléchargement Pdf</span></li>').appendTo($menu_container);
											$('<li><span>Téléchargement Images</span></li>').appendTo($menu_container);
								   		}
								   		else
								   			$('<li><span>Facturer</span></li>').appendTo($menu_container);

								   		if(!value.deleted)
								   		{
										 $('td:eq(7)',$tr_element).append($menu_trigger)
																	.append($menu_container);
								   		}
								   		else
								   		{
								   			$('td:eq(7)',$tr_element).html('&nbsp;');
								   		}
										

						   			}
						   			else
						   			{
						   			  $('td:eq(5)',$tr_element).text(value.auxiliary.person.lastname+' '+value.auxiliary.person.firstname);
						   			  $('td:eq(6)',$tr_element).html('&nbsp;');
						   			  $('td:eq(7)',$tr_element).html('&nbsp;');
						   			  var $menu_trigger='';
						   			}

									$("#interventions-visit-table tbody").append($tr_element);
										$menu_trigger.dropdown();
										$icon_orders.dropdown();

						   			$countdown++;
						    	});
						    	

						    });
						 }
					},
					complete: function(data)
					{
						$('#interventions-visit-modal-info-wrapper').removeClass('hidden');
						$('.loader-ajax',$modal).addClass('hidden');
					},
					error: function(data){
						alert('Erreur Serveur, veuillez réessayer/contacter le support');
					}
				});
		},
		complete:function(){}
	});
}

function determine_visit_type($id_state)

{		
			var $visit_state='';
		   			switch($id_state)
		   			{
		   				case 1:
		   						$visit_state = 'Consultation';
		   				break;

		   				case 2:
		   						$visit_state = 'Chirurgie';
		   				break;		   				

		   				case 3:
		   						$visit_state = 'Hospitalisation';
		   				break;		   				

		   				case 4:
		   						$visit_state = 'MEO';
		   				break;

		   				case 5:
		   						$visit_state = 'Réanimation';

		   				break;

		   				case 6:
		   						$visit_state = 'Maternité';
		   				break;


		   				case 7:
		   						$visit_state = 'Urgences';
		   				break;


		   				case 8:
		   						$visit_state = 'Réservation';
		   				break;

		   				case 9:
		   						$visit_state = 'Traumatologie';
		   				break;
		   			}

		   			return $visit_state;
}

function noUiSliderRange()
{
	    $.get('/manager/visit-invoices/range-amount',function(data){
            if(data!=='ko')
            {
                var result = JSON.parse(data);
                min_slider_value = result[0].min;
                max_slider_value = result[0].max;
            }
            else
            {
                min_slider_value = 0;
                max_slider_value = 100000;
            }
            var slider = document.getElementById("range-amount-filter");
            noUiSlider.create(slider,{
               start: [5000, 20000],
               connect: true,
               step: 5,
               range: {
                 'min': min_slider_value,
                 'max': max_slider_value
               },
               format: wNumb({
                 decimals: 0,
                 thousand:'.'
               })
            });

            slider.noUiSlider.on('update', function(values, handle){
                $("#range-value").text(values[0]+" F CFA - "+values[1]+" F CFA");
                $(".range-min").val(values[0]);
                $(".range-max").val(values[1]);
                $('#min-value-floating-bills-patient').text('Min '+values[0]+" F CFA");
				$('#max-value-floating-bills-patient').text('Max '+values[1]+" F CFA");
            });
    });
}