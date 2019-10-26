$(document).ready(function(){
	

	$(".trigger-minimization-general-stats").on("click",function(){
		if($(this).hasClass('ion-ios-minus'))
		{
			$(this).removeClass('ion-ios-minus').addClass('ion-ios-plus');
			$(this).parents('div').next('.content-item-general-info').slideUp();
		}
		else
		{
			$(this).removeClass('ion-ios-plus').addClass('ion-ios-minus');
			$(this).parents('div').next('.content-item-general-info').slideDown();
		}
		
	});

	//invoices modal box engine
	$("#card-paid-invoices-trigger").on("click",function(){
		$("#solded-invoices-general-modal").openModal({
			ready: function(){
				var $table = $("#solded-invoices-table tbody");
			 if($table.attr("changed")==1)
			 {
				$.ajax({
					beforeSend: function(){
						$table.empty();
						$("#loader-solded-invoices-modal").removeClass("hidden");
					},
					type:"GET",
					url:'/manager/visit-invoices/get-monthly-solded',
					success: function(data){
						if(data==="none")
						{
							Materialize.toast("Aucune Facture Soldée",1500);
						}
						else
						{
							var results = JSON.parse(data);
							console.log(results);
							$.each(results,function(index, value){
								var $tr_element = $("<tr></tr>");
					   				for(var i=1; i<=8;i++)
						   			{
						   					
						   					  var $td_element = $("<td class='zero-padding'></td>");
						   					  if(i==7)
						   					  $td_element.addClass("pointer-opaq");
						   					
						   					$tr_element.append($td_element);
						   			}
						   		$tr_element.find("td:eq(0)").text(value.code_invoice);
						   		//invoice jpg
						   		$tr_element.find('td:eq(1)').addClass('medium-cell-row');
						   		
						   		var $count_invoice = value.invoices_images;

					   			for(j=0 ; j<$count_invoice ; j++)
					   			{
					   			   var $evidence = $('<img src="/webroot/Files/manager/'+value.manager_operator.institution.slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
					   				$tr_element.find("td:eq(1)").append($evidence);
					   				$evidence.materialbox();
					   			}

						   		$tr_element.find("td:eq(2)").text(value.format_amount+" F CFA");

								$tr_element.find("td:eq(3)").text(value.format_solded);

						   		switch(value.visit_invoice_type_id)
						   		{
									case 2:
										var $type_invoice='Rendez-Vous';
									break;

									case 1:
										var $type_invoice='Visite';
									break;

									case 3:
										var $type_invoice='Réservation rdv';
									break;

									case 4:
										var $type_invoice='Intervention';
									break;

									default:
										var $type_invoice='Indéfini';
									break;
						   		}
						   		$tr_element.find("td:eq(4)").text($type_invoice);

						   		switch(value.visit_invoice_payment_way_id)
						   		{
									case 1:
										var $way='Cash';
									break;

									case 2:
										var $way='Chèque/CB';
									break;

									case 3:
										var $way='Assurance';
									break;

									case 4:
										var $way='Réservation';
									break;

									case 5:
										var $way='Echelonnement';
									break;

									default:
										var $way='Indéfini';
									break;
						   		}
						   		$tr_element.find("td:eq(5)").text($way);
						   		//build info payment
						   		var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color trigger-solded-payment-info-box"></i>').attr("info-payment-id",value.id);
						   		$icon_payments.unbind("click").bind("click",triggerSoldedPayment);
						   		$tr_element.find("td:eq(6)").html($icon_payments);
						   		//build menu invoice row
						   		var $menu_trigger = $('<a href="#" data-activates="invoice-sold'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
						   		var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="invoice-sold'+value.id+'"></ul>');
								$('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
								$('<li class="divider"></li>').appendTo($menu_container);
								$('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
								
								$tr_element.find("td:eq(7)").append($menu_trigger)
															.append($menu_container);

						   		$table.append($tr_element);
								$menu_trigger.dropdown();
								
							});
							$table.attr("changed","0");
						}
					},
					complete:function(){
						$("#loader-solded-invoices-modal").addClass("hidden");
					},
					error:function(){alert("Erreur Serveur");}
				});

			  }
			},
			complete: function(){

			}
		});
	});

	$("#card-unpaid-invoices-trigger").on("click",function(){
		$("#unsolded-invoices-general-modal").openModal({

			ready: function(){
				var $table = $("#unsolded-invoices-table tbody");
			 if($table.attr("changed")==1)
			 {
				$.ajax({
					beforeSend: function(){
						$table.empty();
						$("#loader-unsolded-invoices-modal").removeClass("hidden");
					},
					type:"GET",
					url:'/manager/visit-invoices/get-monthly-unsolded',
					success: function(data){
						if(data==="none")
						{
							Materialize.toast("Aucune Facture Soldée",1500);
						}
						else
						{
							var results = JSON.parse(data);
							console.log(results);
							$.each(results,function(index, value){
								var $tr_element = $("<tr></tr>");
					   				for(var i=1; i<=8;i++)
						   			{
						   					
						   					  var $td_element = $("<td class='zero-padding'>&nbsp;</td>");
						   					  if(i==7)
						   					  $td_element.addClass("pointer-opaq");
						   					
						   					$tr_element.append($td_element);
						   			}
						   		$tr_element.find("td:eq(0)").text(value.code_invoice);
						   		//invoice imge
						   		var $count_invoice = value.invoices_images;

						   		$tr_element.find('td:eq(1)').addClass('medium-cell-row');
					   			for(j=0 ; j<$count_invoice ; j++)
					   			{
					   			   var $evidence = $('<img src="/webroot/Files/manager/'+value.manager_operator.institution.slug+'/invoices_images/'+value.code_invoice+'-'+j+'.jpg" class="materialboxed left" width="25" />').addClass('dmp-cell-tiny-margin');
					   				$tr_element.find("td:eq(1)").append($evidence);
					   				$evidence.materialbox();
					   			}

						   		$tr_element.find("td:eq(2)").text(value.format_amount+" F CFA");

								$tr_element.find("td:eq(3)").text(value.format_created);

						   		switch(value.visit_invoice_type_id)
						   		{
									case 2:
										var $type_invoice='Rendez-Vous';
									break;

									case 1:
										var $type_invoice='Visite';
									break;

									case 3:
										var $type_invoice='Réservation rdv';
									break;

									case 4:
										var $type_invoice='Intervention';
									break;

									default:
										var $type_invoice='Indéfini';
									break;
						   		}
						   		$tr_element.find("td:eq(4)").text($type_invoice);

						   		switch(value.visit_invoice_payment_way_id)
						   		{
									case 1:
										var $way='Cash';
									break;

									case 2:
										var $way='Chèque/CB';
									break;

									case 3:
										var $way='Assurance';
									break;

									case 4:
										var $way='Réservation';
									break;

									case 5:
										var $way='Echelonnement';
									break;

									default:
										var $way='Indéfini';
									break;
						   		}
						   		$tr_element.find("td:eq(5)").text($way);
						   		//build info payment
						   		var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color trigger-unsolded-payment-info-box"></i>').attr("info-payment-id",value.id);
						   		$icon_payments.unbind("click").bind("click",triggerUnSoldedPayment);
						   		$tr_element.find("td:eq(6)").html($icon_payments);
						   		//build menu invoice row
						   		var $menu_trigger = $('<a href="#" data-activates="invoice-sold'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
						   		var $menu_container = $('<ul class="dropdown-content dmp-main-back" id="invoice-sold'+value.id+'"></ul>');
								$('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
								$('<li class="divider"></li>').appendTo($menu_container);
								$('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
								
								$tr_element.find("td:eq(7)").append($menu_trigger)
															.append($menu_container);

						   		$table.append($tr_element);
								$menu_trigger.dropdown();
								
							});
							$table.attr("changed","0");
						}
					},
					complete:function(){
						$("#loader-unsolded-invoices-modal").addClass("hidden");
					},
					error:function(){alert("Erreur Serveur");}
				});

			  }
			},
			complete: function(){

			}
		});
	});



});



