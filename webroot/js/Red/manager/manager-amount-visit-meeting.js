$(document).ready(function(){
   	$(".datepicker").pickadate();

	$("#form-visits-viewer").on("submit",function(){
		return null;
	});

	//mangage pricing meeting
	$("#perc_insurance").on("change",function(){
		var $value_perc = parseInt($(this).val());
		var $amount_meeting = parseFloat($("#montant").val());
		if($amount_meeting>0 && $value_perc>0)
		{
			var $part_insurance = (($amount_meeting*$value_perc)/100);
			var $part_insured = ($amount_meeting-$part_insurance);
			$("#amount_insurance_cash").val($part_insurance);
			$("#amount_insurered_cash").val($part_insured);
		}
		else
		{
			Materialize.toast("Veuillez définir le montant de la consultation/spécifier une valeur pourcentage correct",1000);
		}
	});



   //submitting meeting form
 $("#validator-visit-register").on("click",function(e){

   		var $isErrorFree = true;
   		var $form = $("#form-visits-viewer");
   		//checking select_tag_required_value
   		$("select.required",$form).each(function(){
   			if($(this).find('option:checked').val()==="")
   				$isErrorFree = false;
   		});
   		//checking values

   		if($("#patient_id",$form).val()==="" && !$("#anonym_patient_checkbox",$form).prop("checked"))
   		{
   			 if(!$("#search_visit",$form).hasClass("linked-visit"))
   			 {
   			 	$("#search_visit",$form).removeClass("valid").addClass("invalid");  
   			 }
	   		    
   			$isErrorFree = false;
   			Materialize.toast("Veuillez définir un profil de patient",1000);
   		}

   		if($("#anonym_patient_checkbox",$form).prop("checked"))
   		{
   			if($('#age_anonym_patient').val()==="")
   				$isErrorFree = false;

   			if($('#sexe_anonym_patient option:checked').val()==="")
   				$isErrorFree = false;
   		}

   		if($('#visit_type_selection option:checked').text().trim()!=="Urgences")
   		{
   		var $value_payment_method = $(".trigger-payment-method:checked",$form).val().trim();

   		if($value_payment_method=="3")
   		{
   			var $value = $("#insurance_patient_select option:checked",$form).val();
	   		if(!$value)
	   		{
	   			$isErrorFree = false;
	   			Materialize.toast("Veuillez définir une référence d'assurance",1000); 	   			
	   		}
   		}

   		if($value_payment_method!=="4")
   		{
	   		//checking hemodynamic values
	   		$(".hemodynamic-constants",$form).each(function(){
	   			if(validateElement.isValid(this)==false)
	   				$isErrorFree = false;
	   		});   			
   		}


   		if($value_payment_method!=="")
   		{
	   		var amount_meeting = parseFloat($("#montant",$form).val());

	   		if(amount_meeting>0)
	   		{
		   		switch($value_payment_method)
		   		{
		   			case '1':
						var cash_amount = parseFloat($("#amount_cash",$form).val().trim());
						if(cash_amount>0)
						{
							if(cash_amount<amount_meeting)
							{
								$isErrorFree = false;
								Materialize.toast("le montant cash est invalide",1000);							
							}

						}else
						{
							$isErrorFree = false;
							Materialize.toast("Veuillez définir une valeur",1000);
						}
						
		   			break;

		   			case '2':
						var ref_bank = $("#bank_reference",$form).val().trim();
						if(ref_bank==="")
						{
							$isErrorFree = false;
							Materialize.toast("la référence bancaire est invalide",1000);
						}
		   			break;

		   			case '3':
						var amount_insurance_cash = parseFloat($("#amount_insurance_cash",$form).val());
						var amount_insurered_cash = parseFloat($("#amount_insurered_cash",$form).val());
						var amount_insurered_vers = parseFloat($("#amount_insurered_vers",$form).val());
						if(amount_insurance_cash>=0 && amount_insurered_cash>=0 && amount_insurered_vers>=0)
						{
							if(amount_insurered_vers<amount_insurered_cash)
							{
								$isErrorFree = false;
								Materialize.toast("le montant du règlement est incorrect",1000);
							}				
						}
						else
						{
							$isErrorFree = false;
							Materialize.toast("Veuillez définir les valeurs requises",1000);
						}

		   			break;

		   			case '4':
						var date_booking = $('#booking_reference',$form).val();
						if(!(/^\w{4}-\w{2}-\w{2}$/.test(date_booking)))
						{
							$isErrorFree = false;
							Materialize.toast('le formattage de la date est invalide',1000);
						}
						else
						{
							var time_booking = $('#booking_reference_time',$form).val();
							console.log(date_booking);
							if((date_booking=="") || (time_booking==""))
							{
								$isErrorFree = false;
								Materialize.toast("la date/l'heure de reservation ne sont pas spécifiés",1000);
							}
						}

		   			break;

		   			case '5':
		   				var multiple_payment = parseFloat(0); 

						$.each($(".multiple_payment",$form),function(index,value){
							var part_amount = parseFloat($(this).val());
							if(part_amount>0)
							{
							   multiple_payment+=part_amount;
							   	if($(".multiple_payment_date:eq("+index+")",$form).val()==="")
								{
									$isErrorFree = false;
									Materialize.toast("Veuillez spécifier une date pour le règlement de "+part_amount+" F CFA",1500);	
								}
								
							}

						});
						if(multiple_payment<amount_meeting)
						{
							Materialize.toast("le cumul des règlement est inférieur au montant du rendez-vous",1000);
							$isErrorFree = false;
						}
						
		   			break;

		   			default:
						$isErrorFree = false;
		   			break;
		   		}	
	   		}
	   		else
	   		{
	   			if($value_payment_method!=="4")
	   			{
	   				$isErrorFree = false;
	   				Materialize.toast("Montant du rdv invalide",1500);	
	   			}

	   		}
   		}
   		else
   		{
   			$isErrorFree = false;
   			Materialize.toast("Veuilez définir une méthode de paiement",1500);	
   		}

   			}


   		if($isErrorFree)
   		{
   		    if($("#anonym_patient_checkbox",$form).prop("checked"))
  			{
  				$sdk_epad_signature_object = 
  				{
  					'callback_function': 'registerVisit'
  				}
   		    	signPad();
   		 
  			}
   		    else
   		    {
   		    	registerVisit($form);
   		    }	

   		}
   		else
   			return false;
	});
});

function registerVisit($form){
				$.ajax({
					beforeSend : function(){
						$("#loader-wrapper").removeClass('hidden');
						$("#form-visitsviewer-wrapper").addClass("hidden");
					},
					type:'POST',
					data : $form.serialize(),
					url: "/manager/visit-invoices/add-visit",
					dataType:"text",
					success:function(data){

						if(data==="ko")
						{
							Materialize.toast("Une erreur est survenue/données incorrectes, veuillez réessayer ou contacter le support",1000);
						}
						else
						{
							if(data==="ok")
							{
								Materialize.toast("urgence enregistrée avec succès",1000);
							}
							else
							{
								Materialize.toast("rendez-vous enregistré avec succès",1000);

							// $("#cancel-visit-register").trigger('click');
							// window.open(data);
							}
							
						}
					},
					complete : function(){
						$("#loader-wrapper").addClass("hidden");
						$("#form-visitsviewer-wrapper").removeClass("hidden");
					}
				});
}


							 //   //refresh cards paid unpaid invoices
							 //   if(($value_payment_method==1) || ($value_payment_method==3 && $("#perc_insurance").val!=="100"))
							 //   {
								// var $new_value=parseInt($("#paid-invoices-count").text().trim());
								// $("#paid-invoices-count").text($new_value+1);
								// $("#invoice-solded-content").attr("changed","1");

							 //   }
							 //   else
							 //   {
								// var $new_value=parseInt($("#unpaid-invoices-count").text().trim());
								// $("#unpaid-invoices-count").text($new_value+1);
								// $("#invoice-unsolded-content").attr("changed","1");
							 //   } 
							 //   //refresh CA
							 //   var annuel_number =parseFloat($("#annual-number-container").attr("annual-number"))+parseFloat($("#montant").val());
							 //   var monthly_number =parseFloat($("#monthly-number-container").attr("monthly-number"))+parseFloat($("#montant").val());
