function StateVisitGenerator($visit_id)
{
	$('#floating-box-stats-single-visit-generator').empty();
	$.get('/manager/visits/generate-stats-single-visit',{'visit_id':$visit_id},function(data){
			$('#floating-box-stats-single-visit-generator').append(data);
			$('#floating-box-stats-single-visit-generator').removeClass('hidden');

	});	
}


function definePaymentWayBillVisit($visit_invoice_id, $amount, $id_patient)
{
	var $wrapper = $('#setting-visit-payment-mode');
	console.log($visit_invoice_id);
	$('#setting-visit-payment-mode').openModal({
		ready: function(){
			$('#setting-visit-option-payment').unbind('change').bind('change', function(){
				var $selected_option = $(this).find('option:checked').val();

				$('.setting-visit-payment-mode-infos div',$wrapper).addClass('hidden').empty();

				switch($selected_option)
				{
					case 'cash':
						$('#cash-setting-visit-mode').removeClass('hidden');
						$.get('/manager/visit-invoices/setting-visit-payment-mode',{'amount':$amount,'visit_invoice_id':$visit_invoice_id,'type':'cash'}, function(data){
							$('#cash-setting-visit-mode').append(data);												
						});
					break;

					case 'cb':
						$('#cb-setting-visit-mode').removeClass('hidden');
						$.get('/manager/visit-invoices/setting-visit-payment-mode',{'amount':$amount,'visit_invoice_id':$visit_invoice_id,'type':'cb'}, function(data){
							$('#cb-setting-visit-mode').append(data);												
						});
					break;

					case 'insurance':
						$('#insurange-setting-visit-mode').removeClass('hidden');
						$.get('/manager/visit-invoices/setting-visit-payment-mode',{'amount':$amount,'visit_invoice_id':$visit_invoice_id,'type':'insurance','id-patient':$id_patient}, function(data){
							if(data==='ko')
							{
								Materialize.toast('Vous ne bénéficiez pas d\'une assurance valide', 2000, 'notification-back-color2');
							}
							else
							{
								$('#insurange-setting-visit-mode').append(data);												
							}
						});
					break;
				}
			});
		},
		complete: function(){
			$('.setting-visit-payment-mode-infos div',$wrapper).addClass('hidden').empty();
		},
		dismissible: false

	});
}


function createBill()
{
	var $visit_id = $(this).attr('visit-id');
	$('#create-bill-modal-table-patient tbody').empty();
	$('#visit_id_create_bill').val($visit_id);

	$('#create-bill-modal').openModal({
        ready: function(){
        	$('#items-create-bill').empty();

        	$('#trigger-create-bill').unbind('click').bind('click', function(){
        		var $modal=$('#create-bill-modal');
        		var $isErrorFree = true;
        		var $form = $('#create-bill-modal form');

        		$('.required',$form).each(function(){
        			if(validateElement.isValid(this)===false)
        				$isErrorFree = false;
        		});

        		if($('#label_create_bill').val()==="" && $('#label_create_bill').val().length<5)
        		{
        			$isErrorFree = false;
        			Materialize.toast('Veuillez définir un entête pour cette facture',2000,'red');
        		}

        		if($('table tbody tr',$form).length===0)
        			$isErrorFree = false;


        		if($isErrorFree)
        		{
        			$('#visit_create_bill_label').val($('#label_create_bill').val());
        			$.ajax({
        				beforeSend: function(){
        					$('#create-bill-content').addClass('hidden');
        					$('.loader-ajax',$modal).removeClass('hidden');
        				},
        				url: '/manager/visit-invoices/create-custom-bill',
        				type: 'POST',
        				dataType: 'Text',
        				data: $form.serialize(),
        				success: function(data){
        					if(data==="ok")
        					{
        						$('#abort-create-bill').trigger('click');
        						Materialize.toast('Facture Enregistrée',2000,'notification-back-color1');
        						$('#abort-create-bill').trigger('click');
        						$('#refresh-bills-infos').trigger('click');

        						if(!$('#floating-box-patient').hasClass('hidden'))
        							$('#refresh-floating-box-patient-trigger').trigger('click');
        					}
        					else
        					{
        						Materialize.toast('Une erreur est survenue, veuillez réessayer',2000,'notification-back-color2');
        					}
        				},
        				complete: function(){
        					$('#create-bill-content').removeClass('hidden');
        					$('.loader-ajax',$modal).addClass('hidden');


        				}
        			});
        		}
        		else
        		{
        			Materialize.toast('Veuillez corriger le formulaire avant envoi',2000,'red');
        		}
        	});

        	$.get('/manager/visit-acts/all',function(data){
        		if(data!=='ko')
        		{
        			var results = JSON.parse(data);
        			//filling the dropdown acts search floating box
        			$.each(results, function(index, value){
        				 var category = value.description_category;
        				$.each(value.visit_act_sub_categories , function(index, value){
        						$.each(value.visit_acts, function(index, value){
        						   var $li_element = $('<li style="width:1300px;" tags="'+value.label.trim().toLowerCase()+'"><span href="#!">'+value.label+'</span></li>');
	       	   		  	        $li_element.unbind('click').bind('click',function(){
	       	   		  	  		   var $label = {label:value.label.trim(),id:value.id};
	       	   		  	  		   var $type_label = category.trim();
	       	   		  	  		   var $type_item = 'act';
	       	   		  	  		   addItemCustomBill($label,$type_label,$type_item);
	       	   		  	        });
	       	   		  	        $('#dropdown_acts_floating').append($li_element);
	       	   		  	    });
        				});
        			});
        			$('#dropdown_acts_floating').dropdown();



        			var $ul_main_element =  $('<ul></ul>').attr('style','margin-bottom:0px;');
        			
        			var $li_main_element = $('<li></li>').attr('class','pointer').unbind('click').bind('click', function(){
        					if( $('i:eq(0)',this).hasClass('ion-ios-plus-empty'))
        					{
        						$('i:eq(0)',this).removeClass('ion-ios-plus-empty').addClass('ion-ios-minus-empty');
        						$('ul:eq(0)',this).removeClass('hidden');
        					}
        					else
        					{
        						$('i:eq(0)',this).addClass('ion-ios-plus-empty').removeClass('ion-ios-minus-empty');
        						$('ul:eq(0)',this).addClass('hidden');
        					}
        				});

        		    var $helper_ul_main_element = $('<i></i>').attr('class','ion-ios-plus-empty white-text').attr('style','margin-right:10px;');
        		    $li_main_element.append($helper_ul_main_element)
        		    					.append('Actes')
        		    						.appendTo($ul_main_element);


					var $ul_element = $('<ul></ul>').attr('style','margin-left:15px;').attr('class','hidden');
        			$.each(results, function(index, value){
        				
        				var $li_element = $('<li></li>').attr('class','pointer-opaq').unbind('click').bind('click', function(e){
        					e.stopPropagation();
        					if( $('i:eq(0)',this).hasClass('ion-ios-plus-empty'))
        					{
        						$('i:eq(0)',this).removeClass('ion-ios-plus-empty').addClass('ion-ios-minus-empty');
        						$('ul:eq(0)',this).removeClass('hidden');
        					}
        					else
        					{
        						$('i:eq(0)',this).addClass('ion-ios-plus-empty').removeClass('ion-ios-minus-empty');
        						$('ul:eq(0)',this).addClass('hidden');
        					}
        				});
        				var $helper_ul = $('<i></i>').attr('class','ion-ios-plus-empty white-text').attr('style','margin-right:10px;');

        				var $ul_sub_element = $('<ul></ul>').attr('style','margin-left:33px;').attr('class','hidden');
        				$.each(value.visit_act_sub_categories, function(index, value){
        					var $li_helper =  $('<i></i>').attr('class','ion-ios-minus-empty white-text').attr('style','margin-right:10px;');
        					var $li_sub_element = $('<li></li>').attr('subcategory-id',value.id).attr('class','pointer-opaq').unbind('click').bind('click', function(e){
        						e.stopPropagation();
        						loadActs(value.id);
        					});
        					$li_sub_element.append($li_helper)
        							 		 .append(' '+value.label_sub_category)
        										.appendTo($ul_sub_element);
        				});

        				$li_element.append($helper_ul)
        				     .append(' '+value.description_category)
        				       .append($ul_sub_element);

        				$ul_element.append($li_element);
        			});

        			$li_main_element.append($ul_element);
        			$ul_main_element.appendTo('#items-create-bill');

		        	$.get('/manager/visit-invoice-item-categories/all', function(data){
		        			console.log(data);

		        			if(data!=='ok')
		        			{
		        				var results = JSON.parse(data);

								var $ul_element = $('<ul></ul>').attr('style','margin-bottom:0px;margin-top:0px;');
			        			$.each(results, function(index, value){
			        				
				        				var $li_element = $('<li></li>').attr('class','pointer').unbind('click').bind('click', function(e){
				        					e.stopPropagation();
				        					loadOtherItems(value.id);

				        				});
				        				var $helper_ul = $('<i></i>').attr('class','ion-ios-circle-filled white-text').attr('style','margin-right:10px;');

				        				var $ul_sub_element = $('<ul></ul>').attr('style','margin-left:33px;').attr('class','hidden');
				        				
				        				$.each(value.visit_invoice_items, function(index, value){
				        					var $li_helper =  $('<i></i>').attr('class','ion-ios-minus-empty white-text').attr('style','margin-right:10px;');
				        					var $li_sub_element = $('<li></li>').attr('class','pointer-opaq').unbind('click').bind('click', function(e){e.stopPropagation();


				        					});
				        					$li_sub_element.append($li_helper)
				        							 		 .append(' '+value.label_item)
				        										.appendTo($ul_sub_element);
				        				});

				        				$li_element.append($helper_ul)
				        				     .append(' '+value.label_item_category)
				        				       .append($ul_sub_element);

				        				$ul_element.append($li_element).appendTo('#items-create-bill');
			        			});

		        			}
		        			else
		        			{

		        			}

		        	});
        		}
        		else
        		{

        		}
        	});


        },
        complete: function(){
				$('#create-bill-modal form')[0].reset();
        }
	});
}

function loadOtherItems($id)
{
	var $id_item_category = $id;
	$('#list-item-acts-floating-box').empty();
	$('#list-item-acts-floating-box').addClass('hidden');
	$('#create-bill-modal .preloader-wrapper').removeClass('hidden');

	$.get('/manager/visit-invoice-item-categories/get',{'category-id':$id_item_category}, function(data){
		$('#create-bill-modal .preloader-wrapper').addClass('hidden');
	       	
	       if(data!=='ko')
	       {
	       	   var result = JSON.parse(data);
	       	   var $ul_element = $('<ul></ul>');

	       	   $.each(result.visit_invoice_items, function(index,value){
	       	   		  var $li_element = $('<li></li>').attr('style','margin-bottom:3px;padding:5px;').attr('class','pointer-opaq').hover(function(){$(this).addClass('floating-card-selected');},function(){$(this).removeClass('floating-card-selected');});
	       	   		  	  $li_element.attr('tags',value.label_item.toLowerCase())
	       	   		  	  $li_element.unbind('click').bind('click',function(){
	       	   		  	  		var $label = {
	       	   		  	  						label:value.label_item.trim(),
	       	   		  	  						id : value.id
	       	   		  	  					};
	       	   		  	  		var $type_label = result.label_item_category.trim();
	       	   		  	  		var $type_item = 'other';
	       	   		  	  		addItemCustomBill($label,$type_label,$type_item);
	       	   		  	  });
	       	   		  $li_element.append(value.label_item).appendTo($ul_element);
	       	   });
	       	   $('#list-item-acts-floating-box').append($ul_element);
	       }
	       else
	       {

	       }
	        $('#list-item-acts-floating-box').removeClass('hidden');
	 });

}

function loadActs($val)
{
	var $id_sub_category = $val;
	$('#list-item-acts-floating-box').empty();
	$('#list-item-acts-floating-box').addClass('hidden');
	$('#create-bill-modal .preloader-wrapper').removeClass('hidden');
	$.get('/manager/visit-acts/get',{'category-id':$id_sub_category}, function(data){
		$('#create-bill-modal .preloader-wrapper').addClass('hidden');
	       
	       if(data!=='ko')
	       {
	       	   var results = JSON.parse(data);
	       	   		var $ul_element = $('<ul></ul>');
	       	   	console.log(results);
	       	   $.each(results, function(index,value){
	       	   		  var $li_element = $('<li></li>').attr('style','margin-bottom:3px;padding:5px;').attr('class','pointer-opaq').hover(function(){$(this).addClass('floating-card-selected');},function(){$(this).removeClass('floating-card-selected');});
	       	   		  	  $li_element.attr('tags',value.label.toLowerCase())
	       	   		  	  $li_element.unbind('click').bind('click',function(){
	       	   		  	  		var $label = {label:value.label.trim(),id:value.id};
	       	   		  	  		var $type_label = value.visit_act_sub_category.visit_act_category.description_category.trim();
	       	   		  	  		var $type_item = 'act';
	       	   		  	  		addItemCustomBill($label,$type_label,$type_item);
	       	   		  	  });
	       	   		  $li_element.append(value.label).appendTo($ul_element);
	       	   });
	       	   $('#list-item-acts-floating-box').append($ul_element);
	       }
	       else
	       {

	       }
	        $('#list-item-acts-floating-box').removeClass('hidden');
	});
}




function addItemCustomBill($label,$type_label,$type_item)
{
	var $tr_element = $('<tr></tr>');
	
	for (var i=0; i<7; i++)
	{
		var $td_element = $('<td></td>');
		$tr_element.append($td_element);
	}

	$('td:eq(0)',$tr_element).attr('style','text-align:left !important;');

	switch($type_item)
	{
		case 'act':
			$name_cell_1 = 'visit_act_id[]';
			$value_cell_1 = $label.id;
			$name_cell_2 = 'description_act_bill[]';
			$name_cell_3 = 'qte_act_item[]';
			$name_cell_4 = 'unit_price_act_item[]';
			$name_cell_type = 'type_act_label[]';
		break;

		case 'other':
			$name_cell_1 = 'visit_other_id[]';
			$value_cell_1 = $label.id;
			$name_cell_2 = 'description_other_bill[]';
			$name_cell_3 = 'qte_other_item[]';
			$name_cell_4 = 'unit_price_other_item[]';
			$name_cell_type = 'type_other_label[]';
		break;
	}


	var $label_cell =  $('<input type="hidden" name="'+$name_cell_1+'" value="'+$value_cell_1+'" />');
	$('td:eq(0)',$tr_element).append($label.label).attr('style','width:43%;');
	$('td:eq(0)',$tr_element).append($label_cell);

	var $label_type = $('<input type="hidden" name="'+$name_cell_type+'" value="'+$type_label+'">')
	$('td:eq(1)',$tr_element).append($type_label).attr('style','width:11%;');
	$('td:eq(1)',$tr_element).append($label_type);


	var $description = $('<input type="text" name="'+$name_cell_2+'" class="description_item_bill" />').attr('style','border-bottom:0px;').unbind('change').bind('change',function(){
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

	var $qte_act_item = $('<input type="number" name="'+$name_cell_3+'" class="required qte_act_item">').unbind('change').bind('change', function(){
		var $value = $(this).val();
		var $cross_value = $(this).parents('tr').find('.unit_price_act_item').val();
		if($cross_value!=="" && $cross_value>0 && $value>0 && $value!=="")
		{
				var $amount_item = Math.ceil($value*$cross_value);
				$(this).parents('tr').find('.total_amount_act_item').val($amount_item);

				var $sum =0;

				$(this).parents('tbody').find('tr').each(function(){
					$total = $('.unit_price_act_item',this).val()*$('.qte_act_item',this).val();
					$sum+=$total;
				});
				var locale = 'fr';
				var options = {style: 'currency', currency: 'F CFA', minimumFractionDigits: 2, maximumFractionDigits: 2};
				var formatter = new Intl.NumberFormat(locale, options);
				$(this).parents('table').find('tfoot td:eq(5)').text(formatter.format($sum));
		}
		else
		{
				$(this).parents('tr').find('.total_amount_act_item').val('');
		}
	});
	$('td:eq(3)',$tr_element).append($qte_act_item);

	var $unit_price_act_item = $('<input type="number" name="'+$name_cell_4+'" class="required unit_price_act_item">').unbind('change').bind('change', function(){
		var $value = $(this).val();
		var $cross_value = $(this).parents('tr').find('.qte_act_item').val();
		if($cross_value!=="" && $cross_value>0 && $value>0 && $value!=="")
		{
				var $amount_item = Math.ceil($value*$cross_value);
				$(this).parents('tr').find('.total_amount_act_item').val($amount_item);

				var $sum =0;
				$(this).parents('tbody').find('tr').each(function(){
					$total = $('.unit_price_act_item',this).val()*$('.qte_act_item',this).val();
					$sum+=$total;
				});
				var locale = 'fr';
				var options = {style: 'currency', currency: 'XOF', minimumFractionDigits: 2, maximumFractionDigits: 2};
				var formatter = new Intl.NumberFormat(locale, options);
				$(this).parents('table').find('tfoot td:eq(5)').text(formatter.format($sum));



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

	$('#create-bill-modal-table-patient tbody').append($tr_element);
}






function triggerReattributionVisit()
{
	var $patient_id = $(this).attr('patient-id');
	console.log($patient_id);
	var $visit_id = $('#reattribute-visit-id').val();
    var $modal = $('#reattribute-visit-modal');
	$.ajax({
		beforeSend: function(){
			$('.modal-footer',$modal).slideUp();
			$('#reattribute-visit-content').addClass('hidden');
			$('.loader-ajax',$modal).removeClass('hidden');
		},
		url:'/manager/visits/reattribute-visit',
		type:'POST',
		data:{'visit-id':$visit_id,'patient-id':$patient_id},
		dataType:'Text',
		success: function(data){
			if(data==='ok')
			{
				Materialize.toast('Reattribution effectuée avec succès',2000,'notification-back-color1');
				$('#abort-reattribute-visit').trigger('click');
				$('#refresh-visits-infos').trigger('click');
				$('#refresh-bills-infos').trigger('click');
			}
			else
			{
				Materialize.toast('Une erreur est survenue, veuillez réessayer',2000,'notification-back-color1');
			}
		},
		complete: function(){
			$('.modal-footer',$modal).slideDown();
			$('#reattribute-visit-content').removeClass('hidden');
			$('.loader-ajax',$modal).addClass('hidden');

		}
	});
}

function attributeVisit()
{
	var $visit_id = $(this).attr('visit-id');
	$('#reattribute-visit-id').val($visit_id);
    $('#reattribute-visit-table-patient tbody').empty();
	$('#reattribute-visit-modal').openModal({
		ready: function(){
			$.get('/manager/patients/all',function(data){
				var $table = $('#reattribute-visit-table-patient');
				var results = JSON.parse(data);

				$.each(results, function(index,value){
					var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding'></tr>");			 	    

			   		for(var i=1; i<=8;i++)
			   		{
			   			var $td_element = $("<td class='zero-padding light-mixed-text'></td>");
			   			$tr_element.append($td_element);
			   		}

			   		if(value.person.path_pic)
			   		{
			   			var $pic_element = $('<img>').attr('src','/webroot/img/patient/patient_identity/'+value.person.path_pic)
			   											.attr('style','width:90px;');
			   		}
			   		else
			   		{
			   			var $pic_element = $('<i class="ion-ios-contact-outline medium dmp-grey-2-text"></i>');
			   		}
 				    $tr_element.find('td:eq(0)').append($pic_element);
 				    $tr_element.find('td:eq(1)').append(value.code);
 				    $tr_element.find('td:eq(2)').append(value.person.lastname);
 				    $tr_element.find('td:eq(3)').append(value.person.firstname);

 				    var actual_date = new Date();

 				    var $age = Math.abs(actual_date.getFullYear()-parseInt(value.person.formatted_dateborn));
 				    $tr_element.find('td:eq(4)').append($age>1?$age+' ans':$age+' an');


 				    switch(value.person.sexe)
 				    {
 				    	case 'M':
 				    		var $sexe_patient = 'Homme';						
 				    	break;


 				    	case 'F':
 				    		var $sexe_patient = 'Femme';						
 				    	break;
 				    }
 				    $tr_element.find('td:eq(5)').append($sexe_patient);
 				    if(value.person.people_contact.contact2)
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1+' '+value.person.people_contact.contact2);
 		     		else
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1);

 				    var $choice_icon = $('<i class="ion-ios-circle-outline tooltipped dmp-main-color small pointer" data-tooltip="cliquer pour attribuer" data-delay="5s" data-position="left"></i>').attr('patient-id',value.id);

 				    $choice_icon.unbind('hover').hover(function(){$choice_icon.removeClass('ion-ios-circle-outline').addClass('ion-ios-circle-filled');},function(){$choice_icon.addClass('ion-ios-circle-outline').removeClass('ion-ios-circle-filled');});
 				    $choice_icon.unbind('click').bind('click',triggerReattributionVisit);

 				    $tr_element.find('td:eq(7)').append($choice_icon);
 				    $choice_icon.tooltip();

					$('tbody', $table).append($tr_element);

				});
			});
		},

		complete: function(){
		   $('#reattribute-visit-id').val('');
           $('#reattribute-visit-table-patient tbody').empty();

		}
	});
}




function setEndSubState(){
	var $visit_id = $(this).attr('visit-id');
	console.log($visit_id);
	var $modal = $('#end-state-bill-modal');
	$modal.openModal({
			ready: function(){
					$('#end-state-visit-id').val($visit_id);
					$('#trigger-end-state-bill').unbind('click').bind('click',function(){
							var $isErrorFree = true;

							if($('#end-state-visit-id').val()==="")
								$isErrorFree = false;

							if($isErrorFree)
							{
							     var $modal = $('#end-state-bill-modal');

									$.ajax({
										beforeSend: function(){
											$('#end-state-bill-content').addClass('hidden');
										   $('.modal-footer',$modal).slideUp();
										   $('.loader-ajax',$modal).removeClass('hidden');
										},
										url:'/manager/visit-states/generate-end-bill',
										dataType: 'text',
										type:'POST',
										data:{'visit_id':$('#end-state-visit-id').val()},
										success: function(data){
												if(data==='already')
												{
													Materialize.toast('Le billet de sortie a déjà été généré',2000,'notification-back-color1');
													$('#abort-end-state-bill').trigger('click');
												}
												else if(data==='ok')
												{
													Materialize.toast('Le billet a été généré avec succès',2000,'notification-back-color1');
													$('#abort-end-state-bill').trigger('click');
													$('#refresh-visits-infos').trigger('click');
													if(!$('#refresh-floating-box-patient-trigger').hasClass('hidden'))
														$('#refresh-floating-box-patient-trigger').trigger('click');


												}
												else
												{
													Materialize.toast('Une erreur est survenue lors de l\'opération, veuillez réessayer',2000,'dmp-main-back');
												}
										},
										complete: function(){
											$('#end-state-bill-content').removeClass('hidden');
										   $('.modal-footer',$modal).slideDown();
										   $('.loader-ajax',$modal).addClass('hidden');
										}

									});		
							}
							else
							{
								Materialize.toast('Assurez-vous d\'avoir un formulaire correct',1500);
							}
					});
			},

			complete: function(){
					$('#end-state-visit-id').val('');
			}
	});
}


function triggerSoldedPayment()
{
	   	var $id_payment = $(this).attr("info-payment-id");
   		var $value_attribute_modal=$("#solded-payment-invoice-info").attr("invoice-id");
   		var $table = $("#solded-payments-table tbody")

   		if($value_attribute_modal==$id_payment)
   		{
	   		$("#solded-payments-general-modal").openModal();
   		}
   		else
   		{
   			$("#solded-payment-invoice-info").attr("invoice-id",$id_payment);

   			$.ajax({
   				beforeSend: function(){
   					$table.empty();
   					$("#loader-solded-payment-modal").removeClass("hidden");
   				},
   				type:"GET",
   				url:'/manager/visit-invoice-payments/viewPayments/'+$id_payment,
   				dataType:'text',
   				success: function(data){
   					if(data==="ko")
		   			{
		   				Materialize.toast("Données paiements introuvable dans la base",1000);
		   				return false;
		   			}
		   			else
		   			{
   					  var $results = JSON.parse(data);
		   			  console.log($results);
		   			  $.each($results,function(index,value){
		   				var $tr_element = $("<tr></tr>");
		   				for(var i=1; i<=6;i++)
		   				{
		   					var $td_element = $("<td></td>");
		   					$tr_element.append($td_element);
		   				}

		   				$tr_element.find("td:eq(0)").text(value.code_payment);

			   			var $count_voucher = value.voucher_image_count;

			   			for(j=0 ; j<$count_voucher ; j++)
			   			{
			   			   var $evidence = $('<img src="/webroot/Files/manager/'+value.visit_invoice.manager_operator.institution.slug+'/vouchers_images/'+value.code_payment+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
			   				$tr_element.find("td:eq(1)").append($evidence);
			   				$evidence.materialbox();
			   			}

			   			$tr_element.find("td:eq(1)").addClass('medium-cell-row')
		   				
		   				$tr_element.find("td:eq(4)").text(value.amount+' F CFA');
		   				$tr_element.find("td:eq(2)").text(value.formatted_created_invoice);
		   				if(value.visit_invoice_payment_schedule!==null)
		   				{
		   					$tr_element.find("td:eq(3)").text(value.formatted_sold_date);
		   				}
		   				else
		   				{
		   					$tr_element.find("td:eq(3)").text(value.formatted_created_invoice);
		   				}

						   var $trigger_dropdown = $('<a href="#" data-activates="'+value.code_payment+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 10px 10px 10px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');

						   var $dropdown_element =$('<ul class="dropdown-content dmp-main-back" id="'+value.code_payment+'"></ul>');
						   $("<li><a href='/manager/visit-invoices/show-meeting-voucher/"+value.id+"' target='_blank'>Visualiser version PDF</a></li>").appendTo($dropdown_element);
						   $("<li><a href='/manager/visit-invoices/get-pdf-voucher/"+value.id+"'>Télécharger PDF</a></li>").appendTo($dropdown_element);
						   $("<li><span>Télécharger image</span></li>").appendTo($dropdown_element);

						   $tr_element.find("td:eq(5)").append($trigger_dropdown).append($dropdown_element);
						  
		   				$table.append($tr_element);
		   				$trigger_dropdown.dropdown();
		   			});
		   		  }
	   			},
   				complete: function(){
   					$("#loader-solded-payment-modal").addClass("hidden");
   				},
   				error: function(){alert("Erreur serveur, veuillez réessayer",1000);}
   			});
	   		$("#solded-payments-general-modal").openModal();
   		}
}

function triggerUnSoldedPayment()
{

   		$line_element_unsolded_triggered = $(this).parents("tr");
   		var $id_payment = $(this).attr("info-payment-id");
   		var $value_attribute_modal=$("#unsolded-payment-invoice-info").attr("invoice-id");
   		var $table = $("#unsolded-payments-table tbody")

   		if($value_attribute_modal==$id_payment)
   		{
	   		$("#unsolded-payments-general-modal").openModal();
   		}
   		else
   		{
   			$("#unsolded-payment-invoice-info").attr("invoice-id",$id_payment);
   			$.ajax({
   				beforeSend: function(){
   					$table.empty();
   					$("#loader-non-solded-payment-modal").removeClass("hidden");
   				},
   				type:'GET',
   				url: '/manager/visit-invoice-payments/viewPayments/'+$id_payment,
   				dataType:'text',
   				success: function(data){
			   				if(data==="ko")
				   			{
				   				Materialize.toast("Données paiements introuvable dans la base",1000);
				   				return false;
				   			}
				   			else
				   			{
					   			var $results = JSON.parse(data);
					   			console.log($results);
					   			$.each($results,function(index,value){
					   				var $tr_element = $("<tr></tr>");

					   				if(value.state==0)
					   					$tr_element.addClass("light-red-bill");
					   				else
					   					$tr_element.addClass('light-green-bill');

					   				for(var i=1; i<=8;i++)
					   				{
					   					var $td_element = $("<td></td>");
					   					$tr_element.append($td_element);
					   				}
					   				
					   				$tr_element.find("td:eq(0)").text(value.code_payment);
					   				$tr_element.find("td:eq(3)").text(value.amount+' F CFA');
					   				$tr_element.find("td:eq(4)").text(value.reference_payment);
					   				if(value.state==0)
					   				{
					   					$tr_element.find("td:eq(1)").text(value.formatted_exp_date);
					   					$tr_element.find("td:eq(2)").empty().html('&nbsp;');
					   					if(!value.visit_invoice.deleted)
					   					{
						   					//building dropdown element 
						   					var $trigger_dropdown = $('<a href="#" data-activates="'+value.code_payment+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');

						   					var $dropdown_element =$('<ul class="dropdown-content dmp-main-back" id="'+value.code_payment+'"></ul>');
						   					$("<li class='trigger-get-payment' get-payment-id='"+value.id+"' get-payment-amount='"+value.amount+"' get-payment-way-id='"+value.visit_invoice_payment_method_id+"'><a href='#!'>Encaisser le paiement</a></li>").bind('click',getPayment).appendTo($dropdown_element);
						   					$("<li class='trigger-replan-payment' replan-payment-id='"+value.id+"' replan-payment-expec-date='"+value.formatted_eng_exp_date+"' replan-payment-way-id='"+value.visit_invoice_payment_method_id+"'><a href='#!'>Replanifier le paiement</a></li>").bind('click',replanPayment).appendTo($dropdown_element);
						   					if(value.visit_invoice.visit_invoice_type_id==3)
						   					$("<li class='trigger-cancel-booking' cancel-booking-id='"+value.visit_invoice.id+"'><a href='#!'>Annuler la réservation</a></li>").bind('click',cancelBooking).appendTo($dropdown_element);

						   					$tr_element.find("td:eq(7)").append($trigger_dropdown).append($dropdown_element);
						   					$trigger_dropdown.dropdown();
					   					}

					   				}
					   				else
					   				{
					   				  if(value.visit_invoice_payment_schedule==null)
					   				  {
					   					$tr_element.find("td:eq(1)").text(value.formatted_created_invoice);
					   					$tr_element.find("td:eq(2)").text(value.formatted_created_invoice);
					   				  }
					   				  else
					   				  {
					   					$tr_element.find("td:eq(1)").text(value.formatted_exp_date);
					   					$tr_element.find("td:eq(2)").text(value.formatted_sold_date);
					   				  }

					   				  	var $count_voucher = value.voucher_image_count;

							   			for(j=0 ; j<$count_voucher ; j++)
							   			{
							   			   var $evidence = $('<img src="/webroot/Files/manager/'+value.visit_invoice.manager_operator.institution.slug+'/vouchers_images/'+value.code_payment+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
							   				$tr_element.find("td:eq(6)").append($evidence);
							   				$evidence.materialbox();
							   			}
							   			$tr_element.find("td:eq(6)").addClass('medium-cell-row');

						   			  var $trigger_dropdown = $('<a href="#" data-activates="'+value.code_payment+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');

					   				  var $dropdown_element =$('<ul class="dropdown-content dmp-main-back" id="'+value.code_payment+'"></ul>');
						  					 $("<li><a href='/manager/visit-invoices/show-meeting-voucher/"+value.id+"' target='_blank'>Visualiser version PDF</a></li>").appendTo($dropdown_element);
						  					 $("<li><a href='/manager/visit-invoices/get-pdf-voucher/"+value.id+"'>Télécharger PDF</a></li>").appendTo($dropdown_element);
						   					$("<li><span>Télécharger image</span></li>").appendTo($dropdown_element);

						   				$tr_element.find("td:eq(7)").append($trigger_dropdown).append($dropdown_element);
						   				$trigger_dropdown.dropdown();
					   				}
					   				switch(value.visit_invoice_payment_method_id)
					   				{
					   					case 1:
					   						$tr_element.find("td:eq(5)").text("Cash");
					   					break;

					   					case 2:
											$tr_element.find("td:eq(5)").text("Chèque/CB");
					   					break;
					   				}

					   				$table.append($tr_element);
					   				$(".dropdown-button").dropdown();

					   			});
				   			}

   				},
   				complete: function(){
   					$("#loader-non-solded-payment-modal").addClass("hidden");
   				},
   				error: function(){alert("Erreur serveur, veuillez réessayer",1000);}
   			});
	   		$("#unsolded-payments-general-modal").openModal();
   		}
}

//get payment non solded invoices
function getPayment ()
{
	var $item_selected = $(this);
	var $line_tr = $item_selected.parents("tr");
	var $amount = $item_selected.attr("get-payment-amount");
	var $payment_id = $item_selected.attr("get-payment-id");
	var $form = $("#form-get-payment");
	var $payment_way_id= $item_selected.attr("get-payment-way-id");
	$("#get-payment-modal-box").openModal({
		ready: function(){
			
			$form.find("#amount").val($amount);
			$form.find("#get_payment_id").val($payment_id);

			switch($payment_way_id)
			{
				// case '1':
				// 	$("#reference_payment")[0].setAttribute("disabled","disabled");
				// 	$("div:eq(1)",$form).addClass("hidden");
				// break;

				case '2':
					$("#amount_receive")[0].setAttribute("disabled","disabled");
					$("div:eq(0)",$form).addClass("hidden");
				break;
			}

			$("#get-payment-confirm-trigger").unbind("click").bind("click",function(){
					var $isErrorFree = true;
					$.each($(".required:not([disabled='disabled'])",$form),function(){
						if(validateElement.isValid(this)==false)
							$isErrorFree = false;
					});

					if($("#get_payment_id").val()==="")
						$isErrorFree = false;

					if($("#amount_receive").val()!=="")
					{
						if((parseFloat($("#amount_receive").val()))<(parseFloat($("#amount").val())))
						{
							$isErrorFree = false;
							Materialize.toast("Le montant versé est inférieur au montant dû",1000);
						}
					}

					if($isErrorFree)
					{
						$.ajax({
							beforeSend: function(){
								$("#content-get-payment").addClass("hidden");
								$("#loader-get-payment").removeClass("hidden");
								$("#get-payment-modal-box .modal-footer").slideUp();
							},
						    url:'/manager/visit-invoice-payments/soldPayment',
						    type: 'POST',
						    data: $form.serialize(),
						    dataType: 'text',
						    success: function(data){
						    	if(data==="ko")
						    	{
						    		Materialize.toast("Erreur lors de la sauvegarde",2000);
						    	}
						    	else if(data==="abort")
						    	{
						    		Materialize.toast("génération du reçu de paiement échoué, veuillez réessayer/contacter le support",2000);
						    	}
						    	else
						    	{
						    		var result = JSON.parse(data);
						    		$line_tr.removeClass("light-red-bill").addClass("light-green-bill");
						    		$line_tr.find("td:eq(2)").empty().append(result.formatted_sold_date);
						    		if(result.visit_invoice.state==1)
						    		{
						    			$line_element_unsolded_triggered.removeClass("light-red-bill").addClass("light-green-bill");
						    			$line_element_unsolded_triggered.find(".trigger-unsolded-payment-info-box").removeClass(".trigger-unsolded-payment-info-box")
						    														.addClass(".trigger-solded-payment-info-box").unbind("click").bind("click",triggerSoldedPayment);
						    			$("#invoice-solded-content").attr("changed","1");
						    			$("#invoice-unsolded-content").attr("changed","1");

						    			var $new_value=parseInt($("#paid-invoices-count").text().trim());
										$("#paid-invoices-count").text($new_value+1);
										var $new_value=parseInt($("#unpaid-invoices-count").text().trim());
										$("#unpaid-invoices-count").text($new_value-1);
						    		}

						    		$("#get-payment-abort-trigger").trigger("click");

						    		var $proof_payment = $('<img>').attr('src','/webroot/Files/manager/'+result.slug+'/vouchers_images/'+result.code_payment+'-0.jpg').attr('width','25');

						    		$line_tr.find("td:eq(6)").append($proof_payment).addClass('medium-cell-row');
						    		$proof_payment.materialbox();

						    		//formatting dropdown
						    		var $menu_trigger = $('<a href="#" data-activates="'+result.code_payment+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-grey-text" style="font-size:2.2rem;"></i></a>');
                                     
                                    var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="'+result.code_payment+'"></ul>');
                                        $('<li><a href="/manager/visit-invoices/show-meeting-voucher/'+result.id+'" target="blank">Visualiser version PDF</a></li>').appendTo($menu_container);
                                        $('<li><a href="/manager/visit-invoices/get-pdf-voucher/'+result.id+'" target="blank">Télécharger PDF</a></li>').appendTo($menu_container);
                                        $('<li class="divider"></li>').appendTo($menu_container);
                                        $('<li><a href="#!" target="blank">Télécharger Image</a></li>').appendTo($menu_container);

						    		$line_tr.find("td:last-child").empty().append($menu_trigger).append($menu_container);
						    		$menu_trigger.dropdown();

						    		if(!$('#floating-box-manager').hasClass('hidden'))
						    			$('#refresh-floating-box-manager-trigger').trigger('click');

						    		if(!$('#floating-box-patient').hasClass('hidden'))
						    			$('#refresh-floating-box-patient-trigger').trigger('click');

						    		window.open(result.route);
						    	}
						    },
						    complete: function(){
						    	$("#content-get-payment").removeClass("hidden");
								$("#loader-get-payment").addClass("hidden");
								$("#get-payment-modal-box .modal-footer").slideDown();

						    },
						    error: function(){alert("Erreur Serveur, veuillez réessayer");}
						});
					}
					else
					{
						Materialize.toast("Veuillez corriger les champs érronés",1000);
						return false;
					}
			});
		},
		complete: function(){
			$("#form-get-payment")[0].reset();
			$("div",$form).removeClass("hidden");
			$(":input:not(#amount)",$form)[0].removeAttribute("disabled");
		}
	});
}
function replanPayment ()
{
	var $item_selected = $(this);
	var exp_date = $item_selected.attr("replan-payment-expec-date");
	var $line_tr = $item_selected.parents("tr");
	var initial_method_payment = $item_selected.attr("replan-payment-way-id");
	var $id_payment = $item_selected.attr('replan-payment-id');
	$("#replan-payment-modal-box").openModal({
		ready : function(){
	
			$("#form-replan-payment :input[type='date']").val(exp_date);
			$("#invoice_id_replan").val($id_payment);
			switch(initial_method_payment)
			{
				case '1':
				$("#payment_way_2").removeAttr("checked");
					$("#payment_way_1").attr("checked","checked");
					
				break;

				case '2':
				$("#payment_way_1").removeAttr("checked");
					$("#payment_way_2").attr("checked","checked");
					

				break;
			}

			$("#replan-payment-confirm-trigger").unbind('click').bind("click",function(){
				var $isErrorFree = true;
				var $input_date = $("#form-replan-payment :input[type='date']");
				if($input_date.val()==="")
				{
					$isErrorFree = false;
					$input_date.addClass('invalid').removeClass('valid');
				}
				else
				{
					$input_date.removeClass('invalid').addClass('valid');
				}

				if($("#form-replan-payment :radio:checked").length==0)
					$isErrorFree = false;

				if($isErrorFree)
				{
					    var $form = $("#form-replan-payment");
						$.ajax({
							beforeSend : function(){
							$("#content-replan-payment").addClass("hidden");
							$("#loader-replan-payment").removeClass("hidden");
							$('#replan-payment-modal-box .modal-footer').slideUp();
						},
						type: 'POST',
						url : '/manager/visit-invoice-payments/replanPayment',
						dataType: 'text',
						data : $form.serialize(),
						success: function(data){
							if(data === 'ko')
							{
								Materialize.toast("Une erreur est survenue, veuillez réessayer/ contacter le support",1000);
							}
							else
							{		
								$data = JSON.parse(data);
								
								$line_tr.find("td:eq(1)").empty().text($data[0]);
								$item_selected.attr("replan-payment-expec-date",$data[1]);
								$item_selected.attr("replan-payment-way-id",$data[2]);

								switch($data[2])
								{
									case '1':
										$line_tr.find("td:eq(5)").empty().text("Cash");
									break;

									case '2':
										$line_tr.find("td:eq(5)").empty().text("Chèque/CB");
									break;
								}
								
								Materialize.toast("Modification effectuée avec succès",1000);
								$('#replan-payment-abort-trigger').trigger("click");
								

							}
						},
						complete: function(){
							$("#content-replan-payment").removeClass("hidden");
							$("#loader-replan-payment").addClass("hidden");
							$('#replan-payment-modal-box .modal-footer').slideDown();
						},
						error: function (){Materialize.toast("Erreur serveur",3500);}
						});	
				}
				else
				{
					Materialize.toast("Veuillez corriger les champs erronés",1000);
					return false;
				}

			});
		},
		complete: function(){
			$("#form-replan-payment")[0].reset();
		}
	});
}
function cancelBooking ()
{
	var $id_booking = parseInt($(this).attr("cancel-booking-id"));
	var $line_element = $(this).parents('tr');
	$("#cancel-booking-modal-box").openModal({
		ready: function(){
			$("#cancel-booking-input").val($id_booking);
			$("#cancel-booking-confirm-trigger").unbind("click").bind("click",function(){
				if($id_booking)
				{
					$("#content-cancel-booking").addClass("hidden");
					$("#loader-cancel-booking").removeClass("hidden");
					$('#cancel-booking-modal-box .modal-footer').slideUp();
						$.post('/manager/visits/cancelBooking',{"id":$id_booking},function(data){
							$('#cancel-booking-modal-box .modal-footer').slideDown();
							$("#loader-cancel-booking").removeClass("hidden");
							if(data==="ko")
							{
								Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);
							}
							else
							{
								var result = JSON.parse(data);
								if(result[0]==='ok')
								{
									Materialize.toast("Annuation réussie",3000);
									$("#cancel-booking-abort-trigger").trigger("click");
									$('#refresh-bills-infos').trigger('click');
									$('#refresh-visits-infos').trigger('click');

								    if(!$('#floating-box-patient').hasClass('hidden'))
								    $('#refresh-floating-box-patient-trigger').trigger('click');

								}
								else
								{
								   Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);

								}

							}
						});
				}
				else
				{
					Materialize.toast("Erreur DOM",1000);
				}

			});
		},
		complete: function(){
			$("#loader-cancel-booking").addClass("hidden");
			$("#content-cancel-booking").removeClass("hidden");
			$("#cancel-booking-input").val("");
		}
	});

}

function replanVisit()
{
	var $id_visit = parseInt($(this).attr("visit-id"));
	$line_element = $(this).parents('tr');
	$("#replan-visit-modal-box").openModal({
		ready: function(){
			$("#visit_id_replan").val($id_visit);
			$("#replan-visit-confirm-trigger").unbind("click").bind("click",function(){
				var $date_replan = $('#expected_date_replan_visit').val();
				var $time_replan = $('#expected_time_replan_visit').val();
				
				if($id_visit && $date_replan && $time_replan)
				{
					$("#content-replan-visit-replan").addClass("hidden");
					$("#loader-replan").removeClass("hidden");
					$('#replan-visit-modal-box .modal-footer').slideUp();

						$.post('/manager/visits/replan-visit',{"id":$id_visit,"date":$date_replan,'time':$time_replan},function(data){
							$('#replan-visit-modal-box .modal-footer').slideDown();
					        $("#loader-replan").addClass("hidden");
							$("#content-replan-visit-replan").removeClass("hidden");
							
							if(data==="ko")
							{
								Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);
							}
							else
							{
								var result = JSON.parse(data);
								if(result[0]==='ok')
								{
									Materialize.toast("Modification réussie",3000);
									$("#replan-visit-abort-trigger").trigger("click");
									console.log(result[1]);
									$line_element.find('.meeting-date').text(result[1]);
								}
								else
								{
								   Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);

								}

							}

						});
				}
				else
				{
					Materialize.toast("Veuillez corriger le formulaire",1000);
				}

			});
		},
		complete: function(){
			$("#replan-visit-form")[0].reset();
		}
	});
}


function validateBooking(){
   var $id_visit_booking = parseInt($(this).attr('booking-id'));
   	$('#revalidate-booking-input').val($id_visit_booking);

   	$('#revalidate-booking-modal-box').openModal({

   			ready: function(){

   				$('#revalidate-booking-confirm-trigger').unbind('click').bind('click',function(){
				if($id_visit_booking)
				{
					$("#content-revalidate-booking").addClass("hidden");
					$("#loader-revalidate-booking").removeClass("hidden");
					$('#revalidate-booking-modal-box .modal-footer').slideUp();
						$.post('/manager/visits/revalidate-booking',{"id":$id_visit_booking},function(data){
							$('#revalidate-booking-modal-box .modal-footer').slideDown();
					    	$("#content-revalidate-booking").removeClass("hidden");
							$("#loader-revalidate-booking").addClass("hidden");
							if(data==="ko")
							{
								Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);
							}
							else if (data==='ok')
							{
									Materialize.toast("Opération réussie",3000);
									$("#revalidate-booking-abort-trigger").trigger("click");
										$('#refresh-bills-infos').trigger('click');
										$('#refresh-visits-infos').trigger('click');

										if(!$('#floating-box-patient').hasClass('hidden'))
											$('#refresh-floating-box-patient-trigger').trigger('click');
							}	
							else
							{
								Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);

						     }
						});
				}
				else
				{
					Materialize.toast("Erreur DOM",1000);
				}
   				});
   			},

   			complete: function(){}


   	});
}
function cancelUnvalidateBooking(){
	
}

function replanValidateBooking()
{
   var $id_visit_booking = parseInt($(this).attr('visit-id'));
   	$('#update-validate-booking-input').val($id_visit_booking);

   	$('#update-validate-booking-modal-box').openModal({

   			ready: function(){

   				$('#update-validate-booking-confirm-trigger').unbind('click').bind('click',function(){
				if($id_visit_booking)
				{

					var $doctor_id = $('#doctor_id_floating_box').val();
					var $speciality_id = $('#visit_speciality_id_floating_box').val();
					var $speciality_tag = $('#visit_speciality_id_floating_box_tag').val();


						if($speciality_id=='0' && $doctor_id!='0')
							Materialize.toast('Veuillez définir une spécialité pour ce medecin',1500);
						else if($speciality_id=='0' && $doctor_id=="0")
						{
							Materialize.toast('Veuillez définir une spécialité/praticien',1500);
						}
						else
						{
						$("#content-update-validate-booking").addClass("hidden");
						$("#loader-update-validate-booking").removeClass("hidden");
						$('#update-validate-booking-modal-box .modal-footer').slideUp();
							$.post('/manager/visits/update-validate-booking',{"id":$id_visit_booking,'doctor_id':$doctor_id,'speciality_id':$speciality_id,'speciality_tag':$speciality_tag},function(data){
								$('#update-validate-booking-modal-box .modal-footer').slideDown();
						    	$("#content-update-validate-booking").removeClass("hidden");
								$("#loader-update-validate-booking").addClass("hidden");
								if(data==="ko")
								{
									Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);
								}
								else if (data==='ok')
								{
										Materialize.toast("Opération réussie",3000);
										$("#update-validate-booking-abort-trigger").trigger("click");
											$('#refresh-bills-infos').trigger('click');
											$('#refresh-visits-infos').trigger('click');
											
											if(!$('#floating-box-patient').hasClass('hidden'))
											$('#refresh-floating-box-patient-trigger').trigger('click');
								}	
								else if(data==='down')
								{
									Materialize.toast("Spécifiez une spécialité pour ce praticien",1000);
							    }
							    else
							    {
									Materialize.toast("Une erreur est survenue, veuillez réessayer/contacter le support",1000);
							    }
							});
						}


				}
				else
				{
					Materialize.toast("Erreur DOM",1000);
				}
   				});
   			},

   			complete: function(){}


   	});
}

function bilingIntervention()
{
	
}

function changeStateVisit()
{
	var $id_visit = $(this).attr('visit-id');
	var $form = $('#form-change-visit-state');
	var $modal = $('#change-state-visit-modal');
	$('#change-state-visit-modal').openModal({
			ready: function(){
				$('#change-state-visit-trigger').unbind('click').bind('click', function(){
					var $isErrorFree = true;
					if($('#next_state_choice option:checked').val()==="")
						$isErrorFree = false;

					if($isErrorFree)
					{
						$.ajax({
							beforeSend: function(){
								$('.modal-footer', $modal).slideUp();
								$('.loader', $modal).removeClass('hidden');
								$('#change-state-wrapper').addClass('hidden');
							},
							type:'POST',
							url:'/manager/visits/change-state',
							dataType:'text',
							data:'visit-id='+$id_visit+'&state='+$('#next_state_choice option:checked').val(),
							success: function(data){
								console.log(data);
								if(data==='ko')
								{
									Materialize.toast('Cette visite se trouve déja dans cet etat!',3000,'dmp-main-back');
								}
								else
								{
									if(data==='unauthorized')
									{
										Materialize.toast('Veuillez réattribuer la visite à un patient défini',2000,'notification-back-color2');
									}
									else
									{
								 	    //calling modal boxes for generating orders (PDF OR NOT? Sweet question...)
								        $('#change-state-visit-cancel-trigger').trigger('click');
									    $('#floating-box-order-generator').empty();
									    $('#floating-box-order-generator').append(data);
									    $('#floating-box-order-generator').removeClass('hidden');
									}

								}
							},
							complete: function(){
								$('.modal-footer', $modal).slideDown();
								$('.loader', $modal).addClass('hidden');
								$('#change-state-wrapper').removeClass('hidden');
							}
						});	
					}
					else
					{
						Materialize.toast('Veuillez sélectionner un etat pour valider l\'opération',1500);
						return false;
					}

				});
				
			},
			complete: function(){
					// $('#next_state_choice').material_destroy();
			},
			dismissible:false

	});
}

 $('#form-change-visit-state').on('submit',function(e){
 	e.preventDefault();
 });