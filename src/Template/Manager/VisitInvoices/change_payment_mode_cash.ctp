    <?php $this->layout="blank"; ?>
    <form id="change-mode-payment-cash-form" action="/manager/visit-invoices/change-payment-mode" type="POST">
        <div class="col s12">
             <div class="col s6 input-field">
                 <i class="ion-arrow-right-c prefix small dmp-main-color"></i>
                 <input type="number" name="amount_cash_booking_mode" id="amount_cash_booking_mode" class="required" />
                <label for="amount_cash_booking_mode">Montant de la transaction</label>
             </div>

             <div class="col s6 input-field">
                 <i class="ion-arrow-right-c prefix small dmp-main-color"></i>
                 <input type="number" name="amount_cash_change_mode" id="amount_cash_change_mode" class="required" />
                <label for="amount_cash_change_mode">Specifiez le montant versé</label>
             </div>
        </div>


         <div class="col s12 input-field">
                 <input type="hidden" class="hidden-change-payment-mode" name="id-bill" id="id-bill-change-payment-mode">
                 <input type="hidden" class="hidden-change-payment-mode" name="id-patient" id="id-patient-change-payment-mode"><input type="hidden" class="hidden-change-payment-mode" name="type" value="cash">
         </div>
    </form>


 <script>
    $('#confirm-change-mode-payment').unbind('click').bind('click',function(){
        var $modal = $('#change-payment-mode');
        var $isErrorFree = true;

        var $form = $('#change-mode-payment-cash-form');

        $('.required',$form).each(function(){
            if(validateElement.isValid(this)===false)
                $isErrorFree = false;
        });

        var $amount = parseFloat($('#amount_cash_booking_mode').val());
        var $amount_receive = parseFloat($('#amount_cash_change_mode').val());
         if($amount_receive<$amount)
                $isErrorFree = false;



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
                        $('#close-change-mode').trigger('click');
                        $('#bill-info-loader-icon').trigger('click');
                        $('#refresh-visits-infos').trigger('click');
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
 