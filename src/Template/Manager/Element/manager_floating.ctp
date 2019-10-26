<div class="row dmp-main-back-darkened hidden" id="floating-box-manager" style="position:absolute;top:0px;left:0px;width:99.8%;height:1200px;opacity:0.965;border:2px solid #dc6b1d;overflow:auto;" people-id='0' manager-id='0'>
                  <div class="row zero-margin zero-padding" id="content-floating-box-manager">
                        <div class="row zero-margin" id="manager-main-info" style="border-bottom:1.3px solid #dc6b1d;">
                          <div class="col s2 manager-api-variable-info reducable-content" id="manager-evidence-search-single">

                          </div>
                          <div class="col s5 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span id="fullname_manager_selected" class="bold manager-api-variable-info" style="font-size:17px;"></span> <br>
                                  <span id="age_manager_selected_single" class="manager-api-variable-info"></span> <br>
                                  <span id="sexe_manager_selected_single" class="manager-api-variable-info"></span> <br>
                                  <span id="nationality_manager_selected_single" class="manager-api-variable-info"></span> <br>
                                  <span id='contact_single_manager' class="manager-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s3 reducable-content">  
                              <p class="dmp-grey-2-text">
                                   <span id="adress_1_manager_selected_single" class="manager-api-variable-info"></span> <br>
                                   <span id="adress_2_manager_selected_single" class="manager-api-variable-info"></span> <br>
                                   <span id="adress_3_manager_selected_single" class="manager-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s2" id="closer-floating-box-manager-wrapper">
                            
                          <i class="ion-ios-refresh-outline small right close-floating-box-trigger tooltipped" data-tooltip='Rafraîchir' data-delay='5s' data-position="left" id="refresh-floating-box-manager-trigger"></i>
                            <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-manager-trigger"></i>
                             <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-manager-trigger"></i>

                          </div>
                      </div>
    
                      <div class="row zero-margin reducable-content" id="managers-info-wrapper" >
                              <ul class="tabs tabs-fixed-width dmp-main-back-darkened darkened-tabs custom-overflowed-tabs"  ref="#floating-box-manager" style="border-bottom:1px solid #dc6b1d;">
                                <li class="tab col s4" ref="#manager-invoice-info-single"><a class="dmp-grey-2-text" href="#manager-bill-search-manager-single">Factures</a></li>
                                <li class="tab col s4" ref="#manager-privilege-table-wrapper"><a class="dmp-grey-2-text" href="#manager-alt-search-manager-single">Rôles &amp; Privilèges</a></li>
                                <li class="tab col s4" ref="#manager-single-state-table-wrapper"><a class="dmp-grey-2-text" href="#manager-alt-search-manager-single">Etats</a></li>
                                <li class="tab col s4" ref="#manager-notifications-table-wrapper"><a class="dmp-grey-2-text" href="#manager-alt-search-manager-single">Notifications</a></li>
                              </ul>
                      </div>


                      <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="manager-invoice-info-single" style="padding:10px;">
                        <div class="row" id="table-container" style="overflow:auto; height:750px;">
                            <table class="MyTable floating-striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="manager-invoice-info-single-table" style="margin-top:30px;">
                                <thead class="dmp-main-back blue-text">
                                    <th class="zero-margin zero-padding"><?= __('N° Facture') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Patient') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Code Visite') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Facture') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Emission') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Règlement') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Montant') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Type') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Moyen') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Paiements') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Action') ?></th>
                                </thead>
                                <tbody class="manager-api-variable-info">

                                </tbody>
                            </table>
                        </div>
                      </div> 


                    <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="manager-privilege-table-wrapper" style="padding:10px;">
                          <div class="row" id="table-container" style="overflow:auto; height:850px;">
                              <table class="MyTable floating-striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="manager-visits-single-table" style="margin-top:30px;">
                                  <thead class="dmp-main-back blue-text">
                                      <th class="zero-padding"><?= __('Code Visite') ?></th>
                                      <th class="zero-padding"><?= __('Opérateur') ?></th>
                                      <th class="zero-padding"><?= __('Etats') ?></th>
                                      <th class="zero-padding"><?= __('Ordres') ?></th>
                                      <th class="zero-padding"><?= __('Interventions') ?></th>
                                      <th class="zero-padding"><?= __('Actions') ?></th>
                                  </thead>
                                  <tbody class="manager-api-variable-info">

                                  </tbody>
                              </table>
                          </div>
                          <div class="row center hidden">
                              <p class="dmp-grey-2-text">
                                 <h5>Aucune visite enregistrée</h5>
                                 <i class="ion-ios-filing-outline large dmp-grey-2-text">
                                    
                                 </i>
                              </p>
                          </div>
                     </div> 

                      <div class="row reducable-content custom-overflowed-tabs-content" id="manager-single-booking-visits-table-wrapper">
                                <div class="row center hidden" id="empty-visits-info">
                                        <i class="ion-ios-filing-outline large red-text"></i>
                                        <h5>Aucune réservation disponible</h5>
                
                                </div>
                                 <div class="row" id="table-container" style="overflow:auto;height:850px;">
                                        <table class="MyTable floating-striped striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="manager-visits-single-info-table" style="margin-top:30px;">
                                            <thead class="dmp-main-back blue-text">
                                                <th class="zero-padding"><?= __('Code Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Code Visite') ?></th>
                                                <th class="zero-padding"><?= __('Date Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Specialité') ?></th>
                                                <th class="zero-padding"><?= __('Praticien') ?></th>
                                                <th class="zero-padding"><?= __('Etat') ?></th>
                                                <th class="zero-padding"><?= __('Action') ?></th>
                                            </thead>
                                            <tbody class="manager-api-variable-info">

                                            </tbody>
                                        </table>
                                </div>
                         </div>


                         <div class="row reducable-content custom-overflowed-tabs-content" id="manager-single-state-table-wrapper">
                                  <div class="row generator-state center">
                                     <div class="col s6">
                                        <p style="position:relative;">
                                          <i class="ion-podium dmp-grey-2-text large"></i>
                                          <i class="ion-android-time dmp-grey-2-text small" style="top: 30px;position: absolute;"></i>
                                        </p>
                                          <button class="btn state-choice-trigger-floating-manager" ref="periodic-state-manager">Etat Périodique</button>
                                     </div>
                                     <div class="col s6">
                                        <p style="position:relative;">
                                          <i class="ion-podium dmp-grey-2-text large"></i>
                                          <i class="ion-arrow-swap dmp-grey-2-text small" style="top: 30px;position: absolute;"></i>
                                        </p>
                                          <button class="btn state-choice-trigger-floating-manager" ref="comparative-state-manager">Etat Pério-Comparatif</button>
                                     </div>
                                  </div>

                                <div class="row center hidden state-manager-choice-floating" id="periodic-state-manager">
                                    <div class="row state-genrator-panel-wrapper"> 
                                      <div class="container">
                                            <div class="container">
                                                 <p style="position:relative;">
                                                    <i class="ion-podium dmp-grey-2-text large"></i>
                                                    <i class="ion-android-time dmp-grey-2-text small" style="top: 30px;position: absolute;"></i>
                                                    <h5 class="dmp-grey-2-text">Etat Périodique</h5>
                                                </p>
                                                <form id="form-periodic-state-manager">
                                                    <div class="col s6 input-field darkened-input-field">
                                                          <h6 class="dmp-grey-2-text left-align">Période début</h6>
                                                         <input type="date" name="start-date-state" required style="color:white !important;">
                                                    </div>
                                                    <div class="col s6 input-field darkened-input-field">
                                                        <h6 class="dmp-grey-2-text left-align">Période fin</h6>
                                                         <input type="date" name="end-date-state" required style="color:white !important;">
                                                    </div>
                                                    <div class="col s6">
                                                         <button type="submit" class="btn waves-green" style="margin-top:30px;">Générer</button>
                                                    </div>
                                                    <div class="col s6">
                                                         <button type="reset" class="btn dmp-orange-back" style="margin-top:30px;">Retour</button>
                                                    </div>
                                                </form>
                                            </div>
                                      </div>
                                    </div>

                                    <div class="row center hidden loader" style="margin-top:30%;">
                                          <div class="progress dmp-orange-back">
                                              <div class="indeterminate grey"></div>
                                          </div>
                                        <span class="dmp-grey-2-text">Génération en cours</span>
                                     </div>

                                </div>

                                <div class="row center hidden state-manager-choice-floating" id="comparative-state-manager">
                                        <div class="container">
                                          <div class="container">
                                              <p style="position:relative;">
                                                  <i class="ion-podium dmp-grey-2-text large"></i>
                                                  <i class="ion-arrow-swap dmp-grey-2-text small" style="top: 30px;position: absolute;"></i>
                                                  <h5 class="dmp-grey-2-text">Etat Pério-Comparatif</h5>
                                              </p>
                                            <form id="comparative-state-manager-form">
                                                 <div class="col s12 input-field">
                                                    <h6 class="dmp-grey-2-text left-align">Acteurs</h6>
                                                    <select name="comparative-state-manager-multiple-select" id="comparative-state-manager-multiple-select" multiple="">
                                                        <?php foreach ($managers as $manager):?>
                                                            <?php if(!$manager->id === $manager_id) :?>
                                                              <option value="<?= $manager->id  ?>"><?= h($manager->person->lastname.' '.$manager->person->firstname) ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                 </div>
                                                 <div class="col s12">
                                                      <div class="col s6 input-field">
                                                          <h6 class="dmp-grey-2-text darkened-input-field left-align darkened-input-field">Période début</h6>
                                                           <input type="date" style="color:white !important;">
                                                      </div>
                                                      <div class="col s6 input-field darkened-input-field">
                                                          <h6 class="bold dmp-grey-2-text left-align">Période fin</h6>
                                                           <input type="date"  style="color:white !important;">
                                                      </div>
                                                      <div class="col s12 center">
                                                          <div class="col s6">
                                                               <button type="submit" class="btn waves-green" style="margin-top:30px;">Générer</button>
                                                          </div>
                                                          <div class="col s6">
                                                           <button type="reset" class="btn dmp-orange-back" style="margin-top:30px;">Retour</button>
                                                          </div>
                                                      </div>
                                                 </div>
                                            </form>
                                          </div>
                                      </div>
                                </div>
                         </div>

                      <div class="row hidden center error-loader-people" style="margin-top:30%;">
                        <i class="ion-android-people large white-text"></i>
                        <h6 class="dmp-grey-3-text">Une érreur est survenue, veuilez réessayer</h6>
                      </div>

                    </div>


                    <div class="row hidden center loader-people" style="margin-top:30%;" id="loader-floating-box-manager">
                        <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-darkened.gif') ?>
                    </div>

                </div>
<script>

var $manager_floating_box = $('#floating-box-manager');

  $('#close-floating-box-manager-trigger').on('click',function(){
    $('#floating-box-manager').addClass('hidden');
    $('#floating-box-manager').removeClass('used');
    $('#closer-floating-box-manager-wrapper').removeClass('right');
    $('#reduced-floating-box-manager-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-manager-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-manager').css({'height':'1200px'});
    $('.reducable-content').removeClass('hidden');
    $('#floating-box-manager').attr('people-id','0');

        if($('#close-floating-box-manager-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-manager-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-manager-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-manager').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-manager-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-manager').css({'height':'50px'});
      $('.reducable-content',$manager_floating_box).addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-manager').hasClass('hidden'))
      {
           $('#closer-floating-box-manager-wrapper').removeClass('right');
      }



      $('#closer-floating-box-manager-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-manager').css({'height':'1200px'});

            $('.reducable-content',$manager_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#managers-info-wrapper li a.active').parent().index();
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$manager_floating_box).trigger('click');

    }

  });

  $('#refresh-floating-box-manager-trigger').on('click',function(){
      var manager_id = $manager_floating_box.attr('people-id');

      $.ajax({
          beforeSend:function(){
            $manager_floating_box.removeClass('hidden');
            $('#closer-floating-box-manager-wrapper',$manager_floating_box).addClass('right');
            $('.manager-api-variable-info',$manager_floating_box).empty();
            $('.reducable-content',$manager_floating_box).addClass('hidden');
            $('.loader-people',$manager_floating_box).removeClass('hidden');
          },
          type:'GET',
          url:'/manager/manager-operators/search-single',
          data:'people-id='+manager_id,
          success: function(data){
              if(data!=='ko')
              {
               var results = JSON.parse(data);

                showManagerInfo(results);
              }
          },
          complete: function(){
            $('.loader-people',$manager_floating_box).addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}

      });
  });

  $('#form-periodic-state-manager').on('submit',function(e){
      e.preventDefault();
      var $form = $('#form-periodic-state-manager');
      var $wrapper = $('#periodic-state-manager');
      $.ajax({
            beforeSend: function(){
              $('.state-genrator-panel-wrapper',$wrapper).addClass('hidden');
              $('.loader',$wrapper).removeClass('hidden');
            },
            type:'POST',
            url: '/manager/manager-operators/single-state-builder',
            dataType:'Text',
            data: $form.serialize()+'&manager-id='+$('#floating-box-manager').attr('manager-id'),
            success: function(data){
                if(data!=='ko')
                {
                      $('#floating-box-state-generator').empty();
                      $('#floating-box-state-generator').removeClass('hidden');
                      $('#floating-box-state-generator').append(data);
                }
                else
                  Materialize.toast('La génération de l\'état périodique a échoué, veuillez réessayer',1500);
            },
            complete: function(){
              $('.state-genrator-panel-wrapper',$wrapper).removeClass('hidden');
              $('.loader',$wrapper).addClass('hidden');
            },    
            error: function(){
                alert('Une érreur est survenu lors de la génération des états périodique, veuillez réessayer/contacter le support');
            }
      });

    });

  $('.state-choice-trigger-floating-manager').on('click',function(){
      var ref = $(this).attr('ref');
      $('.state-manager-choice-floating').addClass('hidden');
      $('.generator-state').addClass('hidden');
      $('.state-manager-choice-floating').each(function(){
          if($(this).attr('id')===ref)
            $(this).removeClass('hidden');
      });
  });

  $('.state-manager-choice-floating button[type="reset"]').on('click',function(){
      $('.state-manager-choice-floating').addClass('hidden');
      $('.generator-state').removeClass('hidden');
  });



</script>
