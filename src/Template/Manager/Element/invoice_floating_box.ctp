                <div class="row dmp-main-back-darkened hidden" id="floating-box-2" style="position:absolute;top:0px;left:0px;width:99.8%;height:1200px;opacity:0.965;border:2px solid #dc6b1d;overflow:auto;">
                  <div class="row zero-margin zero-padding" id="content-floating-box-2">
                                        <div class="row zero-margin" id="invoice-main-info" style="border-bottom:1.2px solid white;">
                          <div class="col s2 invoice-api-variable-info reducable-content" id="invoice-evidence-search-single">

                          </div>
                          <div class="col s6 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span id="code_invoice_selected" class="bold invoice-api-variable-info"></span> <br>
                                  <span class="white-text">Code Visite: </span> <span id="code_visit_selected_single" class="invoice-api-variable-info"></span> <br>
                                   <span class="white-text">Opérateur</span> <span id='operator_single_invoice' class="invoice-api-variable-info"></span> <br>
                                   <span class="white-text">Emission:</span> <span id='single_invoice_emitted_date' class="invoice-api-variable-info"></span> <br>
                                    <span class="white-text">Règlement:</span> <span id='single_invoice_sold_date' class="invoice-api-variable-info"></span> 
                              </p>
                          </div>
                          <div class="col s3 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span class="white-text">Montant: </span> <span id="amount_invoice_selected_single" class="invoice-api-variable-info"></span> <br>
                                   <span class="white-text">Type: </span> <span id='type_single_invoice' class="invoice-api-variable-info"></span> <br>
                                   <span class="white-text">Moyen de Règlement:</span> <span id='way_invoice_single' class="invoice-api-variable-info"></span>
                              </p>
                          </div>
                          <div class="col s2" id="closer-floating-box-2-wrapper">
                            <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-2-trigger"></i>
                             <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-2-trigger"></i>

                          </div>
                      </div>
    
                      <div class="row zero-margin reducable-content" id="invoices-info-wrapper" >
                              <ul class="tabs tabs-fixed-width dmp-main-back-darkened darkened-tabs custom-overflowed-tabs"  ref="#floating-box-2" style="border-bottom:1px solid white;">
                                <li class="tab col s6"><a class="active dmp-grey-2-text" href="#patient-bill-search-invoice-single">Patient</a></li>
                                <li class="tab col s6"><a class="dmp-grey-2-text" href="#payments-search-invoice-single">Paiements</a></li>
                              </ul>
                      </div>
  

                      <div class="section zero-padding reducable-content" id="patient-bill-search-invoice-single" style="padding:10px;">
                        <div class="row" id="table-container">
                            <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="patients-table-single-invoice" style="margin-top:30px;">
                                <thead class="dmp-main-back blue-text">
                                    <th class="zero-margin"><?= __('Photo') ?></th>
                                    <th class="zero-margin"><?= __('Nom') ?></th>
                                    <th class="zero-margin"><?= __('Prénom(s)') ?></th>
                                    <th class="zero-margin"><?= __('Age') ?></th>
                                    <th class="zero-margin"><?= __('Sexe') ?></th>
                                    <th class="zero-margin"><?= __('Contact(s)') ?></th>
                                </thead>
                                <tbody class="invoice-api-variable-info">

                                </tbody>
                            </table>
                        </div>
                      </div> 

                    <div class="section zero-padding reducable-content" id="payments-search-invoice-single" style="padding:10px;">
                        <div class="row" id="table-container">
                            <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="payments-table-single-invoice" style="margin-top:30px;">
                                <thead class="dmp-main-back blue-text">
                                    <th class="zero-margin"><?= __('N°¨Paiement') ?></th>
                                    <th class="zero-margin"><?= __('Preuve') ?></th>
                                    <th class="zero-margin"><?= __('Date Prévue Règlement') ?></th>
                                    <th class="zero-margin"><?= __('Date Règlement') ?></th>
                                    <th class="zero-margin"><?= __('Montant') ?></th>
                                    <th class="zero-margin"><?= __('Référence') ?></th>
                                </thead>
                                <tbody class="invoice-api-variable-info">

                                </tbody>
                            </table>
                        </div>
                      </div> 

                      <div class="row hidden center" style="margin-top:20%;" id="error-conatiner-floating-box-2">
                        <i class="ion-document-text large white-text"></i>
                        <h6 class="dmp-grey-2-text">Une érreur est survenue, veuilez réessayer</h6>
                      </div>
                    </div>


                    <div class="row hidden center" style="margin-top:30%;" id="loader-floating-box-2">
                        <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-darkened.gif') ?>
                    </div>

                </div>
<script>
  $('#close-floating-box-2-trigger').on('click',function(){
    $('#floating-box-2').addClass('hidden');
    $('#floating-box-2').removeClass('used');
    $('#closer-floating-box-2-wrapper').removeClass('right');
    $('#reduced-floating-box-2-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-2-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-2').css({'height':'1200px'});
    $('.reducable-content').removeClass('hidden');

        if($('#close-floating-box-2-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-2-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-2-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-2').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-2-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-2').css({'height':'50px'});
      $('.reducable-content').addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-2').hasClass('hidden'))
      {
            $('.reducable-content').removeClass('hidden');
           $('#closer-floating-box-2-wrapper').removeClass('right');
      }

      $('#closer-floating-box-2-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-2').css({'height':'650px'});
      $('.reducable-content').removeClass('hidden');

    }

  });
</script>
