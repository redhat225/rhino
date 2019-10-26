          <?php $this->layout="blank"; ?>

          <form id="change-mode-payment-form" action="/manager/visit-invoices/change-payment-mode" type="POST">
                                <div class="col s12 input-field">
                                    <h6 class="left-align bold dmp-main-color">Définir l'assurance</h6>
                                       <div class="collection">
                                             <?php foreach ($insurances as $insurance) :?>
                                                <a href="#!" class="collection-item"><span class="insurance_number_change_payment_mode"><?= h($insurance->number_card) ?></span> <span class="insurer_number_change_payment_mode"><?= h('-'.$insurance->patient_insurer->label) ?></span></a>
                                             <?php endforeach; ?>
                                        </div>
                                </div>
                                <div class="col s12">
                                    <div class="col s6 input-field">
                                        <h6 class="left-align">Montant de la transaction</h6>
                                        <input type="number"  id="amount-bill-change-mode" name="amount-bill-change-mode" class="required" />
                                    </div>

                                    <div class="col s6 input-field">
                                        <i class="ion-contrast prefix small dmp-main-color"></i>
                                        <input type="number"  name="perc_insurance_change_mode" id="perc_insurance_change_mode" min="0" max="100" class="required" />
                                        <label for="perc_insurance_change_mode">% Assur</label>
                                    </div>
                               </div>

                                <div class="col s12">
                                                                        <div class="col s4 input-field">
                                                                                <h6 class="left-align bold dmp-main-color">Part Assurance</h6>
                                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                                <input type="number" class="" name="amount_insurance_cash_change_mode" id="amount_insurance_cash_change_mode" readonly   class="required"/>
                                                                                <label for="amount_insurance_cash_change_mode"></label>
                                                                         </div>
                                                                         <div class="col s4 input-field">
                                                                                <h6 class="left-align bold dmp-main-color">Part Assuré</h6>
                                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                                <input type="number" class="" name="amount_insurered_change_mode" id="amount_insurered_cash_change_mode" readonly   class="required"/>
                                                                                <label for="amount_insurered_cash_change_mode"></label>
                                                                         </div>
                                                                         <div class="col s4 input-field">
                                                                                <h6 class="bold dmp-main-color left">Montant Versé (F CFA)</h6>
                                                                                <input type="number" class="required" name="amount_insurered_vers_change_mode" id="amount_insurered_vers_change_mode"/>
                                                                                <label for="amount_insurered_vers_change_mode"></label>
                                                                        </div>
                                                                </div>

                                                                <div class="col s12 input-field">
                                                                    <input type="hidden" class="hidden-change-payment-mode" name="id-bill" id="id-bill-change-payment-mode">
                                                                    <input type="hidden" class="hidden-change-payment-mode" name="id-patient" id="id-patient-change-payment-mode"><input type="hidden" class="hidden-change-payment-mode" name="type" value="insurance">
                                                                    <input type="hidden" name="insurance_patient_select" id="insurance_patient_select_change_mode">
                                                                </div>
          </form>


<script>
    $('#perc_insurance_change_mode').unbind('change').bind('change',function()
    {
        var $value = parseFloat($(this).val());
        var $amount = parseFloat($('#amount-bill-change-mode').val());
        var $part_insurance = $amount-($amount*($value/100));
        var $part_insured = $amount-$part_insurance;
        $('#amount_insurance_cash_change_mode').val($part_insured);
        $('#amount_insurered_cash_change_mode').val($part_insurance);
    });

    $('#change-mode-payment-form .collection-item').on('click',function(){
        $('#change-mode-payment-form .collection-item').removeClass('active');
           $(this).addClass('active insurances-items');
           $('#insurance_patient_select_change_mode').val($(this).find('.insurance_number_change_payment_mode').text().trim());
    });

    $('#confirm-change-mode-payment').unbind('click').bind('click',function(){
        var $kind_change = $('#change-option-payment option:checked').val();
        var $modal = $('#change-payment-mode');
        switch($kind_change)
        {
            case 'assurance':
               var $perc = parseFloat($('#perc_insurance_change_mode').val());
               var $isErrorFree = true;

               var $form = $('#change-mode-payment-form');

               $(".required",$form).each(function(){
                    if(validateElement.isValid(this)===false)
                        $isErrorFree = false;
               });

               if( $('.insurances-items',$form).length==0 || $('.insurances-items',$form).length>1)
               {
                    $isErrorFree = false;
               }

               if($isErrorFree)
               {
                   if($perc!==100)
                   {
                        var $amount_receive = parseFloat($('#amount_insurered_vers_change_mode').val());
                        if($amount_receive < $('#amount_insurered_cash_change_mode').val())
                        {
                            $isErrorFree = false;
                            Materialize.toast('le montant versé est inférieur au montant réclamé',3000);
                        }
                   }
               }

               if($isErrorFree)
               {
                    $.ajax({
                        beforeSend : function(){
                            $('.modal-footer',$modal).slideUp();
                            $('.loader-modal',$modal).removeClass('hidden');
                            $('#change-payment-info-wrapper').addClass('hidden');
                        },
                        url:'/manager/visit-invoices/change-payment-mode',
                        type:'POST',
                        data:$form.serialize(),
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
                        error: function(){
                            alert('Une errreur est survenue lors de l\'opération, veuillez réessayer');
                        },
                        complete: function(){
                            $('.modal-footer',$modal).slideDown();
                            $('.loader-modal',$modal).addClass('hidden');
                            $('#change-payment-info-wrapper').removeClass('hidden');

                        }
                    });
               }
               else
               {
                    Materialize.toast('Veuillez corriger le formulaire avant l\'envoi',1000);
               }

            break;
        }
        
    });
</script>
                                                           