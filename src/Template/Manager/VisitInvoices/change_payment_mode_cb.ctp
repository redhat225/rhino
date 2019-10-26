<?php $this->layout="blank"; ?>
    <form id="change-mode-payment-cb-form" action="/manager/visit-invoices/change-payment-mode" type="POST">
			    <div class="col s12 input-field">
			         <i class="ion-cash prefix small dmp-main-color"></i>
			         <input type="number" class="required" name="amount_cash_cb" id="amount_cash_cb" />
			        <label for="amount_cash_cb">Montant de la transaction</label>
			    </div>
			<div class="col s12 input-field">
			     <i class="ion-information-circled prefix small dmp-main-color"></i>
			     <input type="text" class="required" name="bank_reference_change_mode" id="bank_reference_change_mode"/>
			     <label for="bank_reference_change_mode">Référence</label>
			 </div>


			 <div class="col s12 input-field">
			         <input type="hidden" class="hidden-change-payment-mode" name="id-bill" id="id-bill-change-payment-mode">
			         <input type="hidden" class="hidden-change-payment-mode" name="id-patient" id="id-patient-change-payment-mode"><input type="hidden" class="hidden-change-payment-mode" name="type" value="cb">
			 </div>
  </form>



 <script>
 	    $('#confirm-change-mode-payment').unbind('click').bind('click',function(){
        var $modal = $('#change-payment-mode');
        var $isErrorFree = true;

        var $form = $('#change-mode-payment-cb-form');

        $('.required',$form).each(function(){
            if(validateElement.isValid(this)===false)
                $isErrorFree = false;
        });

        if($isErrorFree)
        {
            $.ajax({
                beforeSend: function(){
                    $form.addClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                    $('.loader-modal',$modal).removeClass('hidden');
                },
                url:'/manager/visit-invoices/change-payment-mode',
                type:'POST',
                data: $form.serialize(),
                dataType:'Text',
                success: function(data){
                	if(data==="ko")
                	{
                		Materialize.toast('Une Erreur est survenue lors de l\'opération, veuilez réessayer',3500);
                	}
                	else
                	{
                		Materialize.toast('Opération réussie',3500);
                        $('#refresh-visits-infos').trigger('click');
                		$('#bill-info-loader-icon').trigger('click');
                		$('#close-change-mode').trigger('click');
                            if(!$('#floating-box-patient').hasClass('hidden'))
                        $('#refresh-floating-box-patient-trigger').trigger('click');
                		window.open(data);
                	}
                },
                complete: function(data){
                    $form.removeClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                    $('.loader-modal',$modal).addClass('hidden');

                },
                error: function(){alert('Une érreur est survenue lors de l\'opération, veuillez réessayer');}
            });
        }
        else
        {
            return false;
        }
    });
 </script>