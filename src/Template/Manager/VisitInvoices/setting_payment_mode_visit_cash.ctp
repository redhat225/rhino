<?php $this->layout='blank' ?>
<form class="setting_payment_mode_visit_form">
	
	<div class="col s5 input-field">
		<h6 class="bold dmp-main-color">Montant Facture</h6>
	    <input type="number" readonly name="cash_setting_visit_mode_input" id="cash_setting_visit_mode_input" class="amount_setting_visit_mode" value="<?= $amount  ?>">
	</div>
	
	<div class="col s5 input-field">
		<h6 class="bold dmp-main-color">Montant Versé</h6>
 		<input type="number" name="amount_receive" class="required" id="amount_receive_setting_visit_mode_cash"/>
	</div>

	<input type="hidden" name="visit_invoice_id" value="<?= $visit_invoice_id ?>">
	<input type="hidden" name="type" value="<?= $type ?>">
</form>


<script>
	$('#confirm-setting-visit-mode-payment').unbind('click').bind('click',function(){
		var $modal = $('#setting-visit-payment-mode');
		var $form = $('.setting_payment_mode_visit_form');
		var $isErrorFree = true;
		if(validateElement.isValid($('input:eq(1)',$form))===false)
			$isErrorFree = false;

		if($('#cash_setting_visit_mode_input').val() > $('#amount_receive_setting_visit_mode_cash').val())
			$isErrorFree =false;

		if($isErrorFree)
		{
			$.ajax({
				beforeSend: function(){
					$('#setting-visit-payment-info-wrapper').addClass('hidden');
					$('.modal-footer',$modal).slideUp();
					$('.loader-modal',$modal).removeClass('hidden');
				},
				url:'/manager/visit-invoices/setting-visit-payment-mode',
				type:'POST',
				dataType:'Text',
				data:$form.serialize(),
				success: function(data){
					if(data==='ok')
					{
						Materialize.toast('Enregistrement réussi',2000,'notification-back-color1');
						$('#close-setting-visit-mode').trigger('click');
						$('#refresh-bills-infos').trigger('click');

						if(!$('#floating-box-patient').hasClass('hidden'))
							$('#refresh-floating-box-patient-trigger').trigger('click');
					}
					else
					{
						if(data==='ko')
						{
							Materialize.toast('Enregistrement échoué, Veuillez réessayer',2000,'notification-back-color2');
						}

						if(data==='down')
						{
							Materialize.toast('La procédure d\'enregistrement du ticket à échoué , vueillez réessayer',2000,'notification-back-color2');

						}
					}
				},
				complete: function(){
					$('.loader-modal',$modal).addClass('hidden');
					$('.modal-footer',$modal).slideDown();
					$('#setting-visit-payment-info-wrapper').removeClass('hidden');
				}
			});
		}
		else
		{
			Materialize.toast('Veuillez corriger le formulaire avant envoi',2000,'red');
		}


	});	

	$('.setting_payment_mode_visit_form').on('submit', function(e){
		return false;
	});
</script>