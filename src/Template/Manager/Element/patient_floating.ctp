        <div class="row dmp-main-back-darkened hidden" id="floating-box-patient" style="position:absolute;top:0px;left:0px;width:99.8%;height:1200px;opacity:0.965;border:2px solid #dc6b1d;overflow:auto;" patient-id='0'>
                  <div class="row zero-margin zero-padding" id="content-floating-box-patient">
                        <div class="row zero-margin" id="patient-main-info" style="border-bottom:1.3px solid #dc6b1d;">
                          <div class="col s2 patient-api-variable-info reducable-content" id="patient-evidence-search-single">

                          </div>
                          <div class="col s5 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span id="fullname_patient_selected" class="bold patient-api-variable-info" style="font-size:17px;"></span> <br>
                                  <span id="age_patient_selected_single" class="patient-api-variable-info"></span> <br>
                                  <span id="sexe_patient_selected_single" class="patient-api-variable-info"></span> <br>
                                  <span id="nationality_patient_selected_single" class="patient-api-variable-info"></span> <br>
                                  <span id='contact_single_patient' class="patient-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s3 reducable-content">  
                              <p class="dmp-grey-2-text">
                                   <span id="adress_1_patient_selected_single" class="patient-api-variable-info"></span> <br>
                                   <span id="adress_2_patient_selected_single" class="patient-api-variable-info"></span> <br>
                                   <span id="adress_3_patient_selected_single" class="patient-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s2" id="closer-floating-box-patient-wrapper">
                            
                          <i class="ion-ios-refresh-outline small right close-floating-box-trigger tooltipped" data-tooltip='Rafraîchir' data-delay='5s' data-position="left" id="refresh-floating-box-patient-trigger"></i>
                            <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-patient-trigger"></i>
                             <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-patient-trigger"></i>

                          </div>
                      </div>
    
                      <div class="row zero-margin reducable-content" id="patients-info-wrapper" >
                              <ul class="tabs tabs-fixed-width dmp-main-back-darkened darkened-tabs custom-overflowed-tabs"  ref="#floating-box-patient" style="border-bottom:1px solid #dc6b1d;">
                                <li class="tab col s4" ref="#patient-invoice-info-single"><a class="dmp-grey-2-text" href="#patient-bill-search-patient-single">Factures</a></li>
                                <li class="tab col s4" ref="#patient-single-visits-table-wrapper"><a class="dmp-grey-2-text" href="#patient-alt-search-patient-single">Visites</a></li>
                                <li class="tab col s4" ref="#patient-single-booking-visits-table-wrapper"><a class="dmp-grey-2-text" href="#patient-alt-search-patient-single">Réservations</a></li>
                                <li class="tab col s4" ref="#patient-single-insurance-visits-table-wrapper"><a class="dmp-grey-2-text" href="#patient-alt-search-patient-single">Assurance <i patient-id="0" class="ion-ios-plus-outline dmp-grey-2-text small right" style="margin-right:8px;" id="add-insurance-info-floating"></i></a></li>
                              </ul>
                      </div>

                      <div class="row search-keywords-area dmp-main-back zero-margin reducable-content" style="padding:3px 0px; border-bottom:1px solid white;">

                          <div class="col s6 prefix darkened-input-field filter-by-keywords filter-wrapper">  
                              <div class="col s10 input-field darkened-input-field">
                                  <i class="ion-android-search prefix "></i>
                                  <input type="text" name="search-keywords" style="height:30px;">
                              </div>

                          </div>

                         <div class="col s6 input-field center filter-by-amount filter-wrapper hidden" id="">
                            <div class="col s8">
                               <div class="col s6 left-align">
                                  <span class="dmp-grey-2-text" id="min-value-floating-bills-patient"></span>
                               </div>
                               <div class="col s6 right-align">
                                  <span class="dmp-grey-2-text" id="max-value-floating-bills-patient"></span>
                               </div>
                            </div>                   
          
                            <div class="col s9" style="margin-top:10px;" id="range-amount-filter">
                           </div>

                           <div class="col s12 hidden" style="margin-top:30px;">
                              <input type="hidden" class="range-min" name="range-min">
                              <input type="hidden" class="range-max" name="range-max">
                           </div>

                            <div class="col s3">
                              <button id="trigger-search-amount" class="btn teal white-text">Rechercher</button>
                            </div>
                         </div>

                         <div class="col s6 zero-margin filter-by-dates filter-wrapper hidden">
                               <form id="form-search-by-date-bill-floating">
                                    <div class="col s4 input-field zero-margin">
                                        <h6 class="white-text"><?= h('Date Début') ?></h6>
                                        <input type="date" class="date-filter-bill zero-margin" style="
                                        color:white !important;" required name="begin-date-filter-bills" id="begin-date-filter">
                                    </div>
                                    <div class="col s4 input-field zero-margin">
                                        <h6 class="white-text"><?= h('Date Fin') ?></h6>
                                        <input type="date" class="date-filter-bill zero-margin" style="
                                        color:white !important;" required name="end-date-filter-bills" id="end-date-filter">
                                    </div>
                                    <div class="col s4">
                                       <button type="submit" class="btn white-text" style="margin-top:8%;">Rechercher</button>
                                    </div>
                               </form>
                         </div>

                          <div class="col s2 center">
                            <span style="margin-top:7%;padding: 0 9px;" data-stoppropagation="true" class="btn dmp-main-back dropdown-button" data-activates='dropdown-setting-filter-search-bills' data-beloworigin="true" data-constrainwidth='false' data-gutter="75"><i class="ion-android-settings dmp-orange-color"></i><i class="ion-drag white-text right"></i></span>
                            <!-- Bills Settings search -->
                             <ul id='dropdown-setting-filter-search-bills' class='dropdown-content dmp-main-back setting-filter-search-bills-item-selector'>
                              <li ref=".filter-by-keywords"><a href="#!"><i class="ion-ios-checkmark-empty teal-text left small"></i>Recherche par mots clés</a></li>
                              <li class="divider"></li>
                              <li ref=".filter-by-dates"><a href="#!">Recherche par dates</a></li>
                              <li class="divider"></li>
                              <li ref='.filter-by-amount'><a href="#!">Recherche par montants</a></li>
                            </ul>
                          </div>

                          <div class="col s2 center">
                            <span style="margin-top:10%;padding: 0 9px;">
                                 <i  data-stoppropagation="true" class="dmp-main-back dropdown-button ion-information-circled small white-text pointer-opaq" data-activates='info-search-bills-floating' data-beloworigin="true" data-hover="true" data-constrainwidth='false'></i>
                            </span>


                            <ul id='info-search-bills-floating' class='dropdown-content dmp-main-back setting-filter-search-bills-item-selector'>
                              <li><a href="#!">Par défaut, les factures et visites datent d'un interval de 3 mois</a></li>
                            </ul>
                          </div>  

                      </div>


                    <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="patient-invoice-info-single" style="padding:10px;">


                        <div class="row" id="table-container" style="overflow:auto; height:850px;"> 
                            <table class="MyTable floating-striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="patient-invoice-info-single-table" style="margin-top:30px;">
                                <thead class="dmp-main-back blue-text">
                                    <th class="zero-margin zero-padding"><?= __('N° Facture') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Opérateur') ?></th>
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
                                <tbody class="patient-api-variable-info">

                                </tbody>
                            </table>
                        </div>
                      </div> 


                    <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="patient-single-visits-table-wrapper" style="padding:10px;">
                          <div class="row" id="table-container" style="overflow:auto; height:850px;">
                              <table class="MyTable floating-striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="patient-visits-single-table" style="margin-top:30px;">
                                  <thead class="dmp-main-back blue-text">
                                      <th class="zero-padding"><?= __('Code Visite') ?></th>
                                      <th class="zero-padding"><?= __('Opérateur') ?></th>
                                      <th class="zero-padding"><?= __('Etats') ?></th>
                                      <th class="zero-padding"><?= __('Ordres') ?></th>
                                      <th class="zero-padding"><?= __('Interventions') ?></th>
                                      <th class="zero-padding"><?= __('Actions') ?></th>
                                  </thead>
                                  <tbody class="patient-api-variable-info">

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

                      <div class="row reducable-content custom-overflowed-tabs-content" id="patient-single-booking-visits-table-wrapper">
                                <div class="row center hidden" id="empty-visits-info">
                                        <i class="ion-ios-filing-outline large red-text"></i>
                                        <h5>Aucune réservation disponible</h5>
                
                                </div>
                                 <div class="row" id="table-container" style="overflow:auto;height:850px;">
                                        <table class="MyTable floating-striped striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="patient-visits-single-info-table" style="margin-top:30px;"> 
                                            <thead class="dmp-main-back blue-text">
                                                <th class="zero-padding"><?= __('Code Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Code Visite') ?></th>
                                                <th class="zero-padding"><?= __('Date Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Date Rendez-Vous') ?></th>
                                                <th class="zero-padding"><?= __('Specialité') ?></th>
                                                <th class="zero-padding"><?= __('Praticien') ?></th>
                                                <th class="zero-padding"><?= __('Etat') ?></th>
                                                <th class="zero-padding"><?= __('Action') ?></th>
                                            </thead>
                                            <tbody class="patient-api-variable-info">

                                            </tbody>
                                        </table>
                                </div>
                         </div>


                         <div class="row reducable-content custom-overflowed-tabs-content" id="patient-single-insurance-visits-table-wrapper">
                              <ul class="collection with-header zero-margin patient-api-variable-info" style="border-top:0px;">

                              </ul>
                         </div>

                      <div class="row hidden center error-loader-people" style="margin-top:30%;">
                        <i class="ion-android-people large white-text"></i>
                        <h6 class="dmp-grey-3-text">Une érreur est survenue, veuilez réessayer</h6>
                      </div>

                    </div>


                    <div class="row hidden center loader-people" style="margin-top:30%;" id="loader-floating-box-patient">
                        <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-darkened.gif') ?>
                    </div>

                </div>


                <!-- Modal Structure add a new insurance -->
                <div id="add-insurance-patient-modal" class="modal modal-fixed-footer">
                  <div class="modal-content zero-padding">
                          <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                              <span><i class="ion-plus-round dmp-grey-2-text"></i>    Définir une nouvelle assurance</span>
                          </div>
                          <div class="row" style="padding:40px;" id="add-insurance-floating-wrapper-content">
                              <form id="add-insurance-form">
                                  <div class="container">
                                      <div class="col s12 input-field">
                                            <i class="ion-card prefix"></i>
                                            <input type="text" name="number_card" required class="required" id="card-number-new-insurance" />
                                            <label for="card-number-new-insurance">Numéro de carte</label>
                                      </div>
                                      <div class="col s12 input-field">
                                          <select name="patient_insurer_id" id="select_add_new_insurance">
                                                 <?php foreach ($insurers as $insurer) :?>
                                                          <option value="<?= $insurer->id ?>"><?= $insurer->label ?></option>
                                                 <?php endforeach; ?> 
                                          </select>
                                      </div>
                                      <div class="col s12 input-field">
                                            <h6 class="bold dmp-main-color">Date Expiration</h6>
                                            <input type="date" required name="expired_insurance_date" id="card-number-new-insurance-expiracy" />
                                      </div>
                                  </div>
                              </form>
                              <div class="row center hidden loader">
                                      <div class="progress dmp-orange-back">
                                          <div class="indeterminate grey"></div>
                                      </div>
                                    <span class="dmp-main-color">Enregistrement en cours</span>
                              </div>
                          </div>

                  </div>
                  <div class="modal-footer dmp-main-back">
                    <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-add-insurance">Valider</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-add-insurance">Annuler</a>
                  </div>
                </div>



               <!-- Modal Structure suspend insurance-->
               <div id="suspending-insurance-patient-modal" class="modal modal-fixed-footer">
                    <div class="modal-content zero-padding">
                            <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                                <span><i class="ion-toggle dmp-grey-2-text"></i>    Suspendre assurance</span>
                            </div>
                            <div class="row center zero-margin zero-padding" style="padding:40px;" id="suspending-insurance-floating-wrapper-content">

                            <div class="container content-modal">
                                <i class="ion-toggle large red-text"></i>
                                <h6 class="dmp-main-color zero-margin">Etes-vous sûre de vouloir suspendre l'assurance <span class="insurance_number"></span> ? Elle ne sera plus utilisable dans de futures transactions.</h6>
                            </div>

                            <div class="row center hidden loader">
                                        <div class="progress dmp-orange-back">
                                            <div class="indeterminate grey"></div>
                                        </div>
                                      <span class="dmp-main-color">Suspension en cours</span>
                             </div>

                            </div>
                    </div>

                    <div class="modal-footer dmp-main-back">
                      <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-suspend-insurance">Valider</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-suspend-insurance">Annuler</a>
                    </div>
                </div>


                <!-- Modal Structure Turn On insurance-->
               <div id="turn-on-insurance-patient-modal" class="modal modal-fixed-footer">
                    <div class="modal-content zero-padding">
                            <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                                <span><i class="ion-toggle dmp-grey-2-text"></i>    Levée de suspension assurance</span>
                            </div>
                            <div class="row center zero-margin zero-padding" style="padding:40px;" id="suspending-insurance-floating-wrapper-content">

                            <div class="container content-modal">
                                <i class="ion-toggle large red-text"></i>
                                <h6 class="dmp-main-color zero-margin">Etes-vous sûre de vouloir lever la suspension de cette assurance <span class="insurance_number"></span> ? Elle pourrait être réutilisée dans de futures trtansactions.</h6>
                            </div>

                            <div class="row center hidden loader">
                                        <div class="progress dmp-orange-back">
                                            <div class="indeterminate grey"></div>
                                        </div>
                                      <span class="dmp-main-color">Réctivation en cours</span>
                             </div>

                            </div>
                    </div>

                    <div class="modal-footer dmp-main-back">
                      <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-turn-on-insurance">Valider</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-turn-on-insurance">Annuler</a>
                    </div>
                </div>


               <!-- Modal Structure drop insurance-->
               <div id="drop-insurance-patient-modal" class="modal modal-fixed-footer">
                    <div class="modal-content zero-padding">
                            <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                                <span><i class="ion-close-circled dmp-grey-2-text"></i>    Retirer l'assurance</span>
                            </div>
                            <div class="row center zero-margin zero-padding" style="padding:40px;" id="drop-insurance-floating-wrapper-content">

                                  <div class="container content-modal">
                                      <i class="ion-close-circled large red-text"></i>
                                      <h6 class="dmp-main-color zero-margin">Etes-vous sûre de vouloir supprimer l'assurance <span class="insurance_number"></span> ? Elle ne sera plus utilisable dans de futures transactions.</h6>
                                  </div>

                                 <div class="row center hidden loader">
                                              <div class="progress dmp-orange-back">
                                                  <div class="indeterminate grey"></div>
                                              </div>
                                            <span class="dmp-main-color">Suppression en cours</span>
                                 </div>

                            </div>
                    </div>

                    <div class="modal-footer dmp-main-back">
                      <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-drop-insurance">Valider</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-drop-insurance">Annuler</a>
                    </div>
                </div>


                <!-- Modal Structure pullBack insurance-->
               <div id="pull-back-insurance-patient-modal" class="modal modal-fixed-footer">
                    <div class="modal-content zero-padding">
                            <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                                <span><i class="ion-close-circled dmp-grey-2-text"></i>    Rétablir l'assurance</span>
                            </div>
                            <div class="row center zero-margin zero-padding" style="padding:40px;" id="pull-back-insurance-floating-wrapper-content">

                                  <div class="container content-modal">
                                      <i class="ion-android-checkmark-circle large green-text"></i>
                                      <h6 class="dmp-main-color zero-margin">Etes-vous sûre de vouloir rétablir l'assurance <span class="insurance_number"></span> ? Elle pourra être utilisée dans de futures transactions.</h6>
                                  </div>

                                 <div class="row center hidden loader">
                                              <div class="progress dmp-orange-back">
                                                  <div class="indeterminate grey"></div>
                                              </div>
                                            <span class="dmp-main-color">Rétablissement en cours</span>
                                 </div>

                            </div>
                    </div>

                    <div class="modal-footer dmp-main-back">
                      <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-pull-back-insurance">Valider</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-pull-back-insurance">Annuler</a>
                    </div>
                </div>


               <!-- Modal Structure renew insurance-->
               <div id="renew-insurance-patient-modal" class="modal modal-fixed-footer">
                    <div class="modal-content zero-padding">
                            <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                                <span><i class="ion-ios-refresh-outline dmp-grey-2-text"></i>    Renouveller l'assurance</span>
                            </div>
                            <div class="row center zero-margin zero-padding" style="padding:40px;" id="renew-insurance-floating-wrapper-content">

                                <div class="container content-modal">
                                  <form id="renew-insurance-floating-box-patient-form">
                                    <div class="container">
                                        <div class="col s12 input-field">
                                          <i class="ion-card prefix active"></i>
                                          <input type="text" readonly name="insurance_renew_info" id="insurance_renew_info" value="0" />
                                          <label for="insurance_renew_info" class="active">Numéro de Carte</label>
                                        </div>

                                        <div class="col s12 input-field">
                                          <i class="ion-briefcase prefix active"></i>
                                          <input type="text" readonly name="insurance_renew_insurer_info" id="insurance_renew_insurer_info" value="0" />
                                          <label for="insurance_renew_insurer_info" class="active">Assureur</label>
                                        </div>

                                        <div class="col s12 input-field">
                                            <h6 class="bold dmp-main-color left-align">Date Expiration de la carte</h6>
                                            <input type="date" name='date_renew_insurance' id ='date_renew_insurance'/>
                                        </div>
                                    </div>
                                  </form>

                                </div>

                                 <div class="row center hidden loader">
                                              <div class="progress dmp-orange-back">
                                                  <div class="indeterminate grey"></div>
                                              </div>
                                            <span class="dmp-main-color">Renouvellement en cours</span>
                                 </div>

                            </div>
                    </div>

                    <div class="modal-footer dmp-main-back">
                      <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-renew-insurance">Valider</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-renew-insurance">Annuler</a>
                    </div>
                </div>
<script>

var $patient_floating_box = $('#floating-box-patient');

  $('#close-floating-box-patient-trigger').on('click',function(){
    $('#floating-box-patient').addClass('hidden');
    $('#floating-box-patient').removeClass('used');
    $('#closer-floating-box-patient-wrapper').removeClass('right');
    $('#reduced-floating-box-patient-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-patient-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-patient').css({'height':'1200px'});
    $('.reducable-content').removeClass('hidden');
    $('#floating-box-patient').attr('patient-id','0');

        if($('#close-floating-box-patient-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-patient-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-patient-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-patient').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-patient-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-patient').css({'height':'50px'});
      $('.reducable-content',$patient_floating_box).addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-patient').hasClass('hidden'))
      {
           $('#closer-floating-box-patient-wrapper').removeClass('right');
      }



      $('#closer-floating-box-patient-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-patient').css({'height':'1100px'});

            $('.reducable-content',$patient_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#patients-info-wrapper li a.active').parent().index();
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$patient_floating_box).trigger('click');

    }

  });

  $('#refresh-floating-box-patient-trigger').on('click',function(){
      var patient_id = $patient_floating_box.attr('patient-id');

      var date_from = new Date();
      date_from.setDate(date_from.getDate() - 90);
      var date_to = new Date();
      date_to.setDate(date_to.getDate() + 90);

      $.ajax({
          beforeSend:function(){
            $patient_floating_box.removeClass('hidden');
            $('#form-search-by-date-bill-floating')[0].reset();
            $('#closer-floating-box-patient-wrapper',$patient_floating_box).addClass('right');
            $('.patient-api-variable-info',$patient_floating_box).empty();
            $('.reducable-content',$patient_floating_box).addClass('hidden');
            $('.loader-people',$patient_floating_box).removeClass('hidden');
          },
          type:'GET',
          url:'/manager/patients/search-single',
          data:'people-id='+patient_id,
          success: function(data){
              if(data!=='ko')
              {
               var results = JSON.parse(data);

                showPatientInfo(results);
              }
          },
          complete: function(){
            $('.loader-people',$patient_floating_box).addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}

      });
  });


  $('#add-insurance-info-floating').on('click',function(){
    var $patient_id = $(this).attr('patient-id');
    var $modal = $('#add-insurance-patient-modal');
    var $form = $('#add-insurance-form');
      $modal.openModal({
          ready: function(){
              $('#trigger-submit-modal-add-insurance').unbind('click').bind('click',function(){
                  var $isErrorFree = true;
                  $('.required',$form).each(function(){
                      if(validateElement.isValid(this)===false)
                        $isErrorFree = false;
                  });

                  if($('select option:checked',$form).length===0)
                    $isErrorFree = false;

                  if(!$('#card-number-new-insurance-expiracy').val())
                    $isErrorFree = false;


                  if($isErrorFree)
                  {
                    $.ajax({
                        beforeSend: function(){
                            $('.modal-footer',$modal).slideUp();
                            $('form',$modal).addClass('hidden');
                            $('.loader',$modal).removeClass('hidden');
                        },
                        url:'/manager/patient-insurances/add',
                        type:'POST',
                        dataType:'text',
                        data:$form.serialize()+'&patient_id='+$patient_id,
                        success: function(data){
                            if(data==='ok')
                            {
                              Materialize.toast('Assurance ajoutée aves succès',2500);
                              $('#close-modal-add-insurance').removeClass('hidden')
                              $('#refresh-floating-box-patient-trigger').trigger('click');
                            }
                            else
                            {
                              if(data==='already')
                                Materialize.toast('Ce numéro de carte existe déjà',2500);
                              else
                                Materialize.toast('Une Erreur est survenue lors de l\'opération',2500);
                            }
                        },
                        complete: function(){
                            $('.modal-footer',$modal).slideDown();
                            $('form',$modal).removeClass('hidden');
                            $('.loader',$modal).addClass('hidden');
                        },
                        error: function(){}
                    }); 
                  }
                  else
                  {
                    Materialize.toast('Veuillez corriger le formaulaire avant validation',2000);
                  }
              });
          },
          complete: function(){},
          dismissible: false
      });
  });


function turnOffInsurance(){
  var $insurance_id = $(this).attr('insurance-id');
  var $modal = $('#suspending-insurance-patient-modal');
  $('#suspending-insurance-patient-modal').openModal({
      ready: function(){
        $('#trigger-submit-modal-suspend-insurance').unbind('click').bind('click',function(){
            $.ajax({
                  beforeSend: function(){
                    $('.content-modal',$modal).addClass('hidden');
                    $('.loader',$modal).removeClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                  },
                  url: '/manager/patients/manage-insurance',
                  type:'POST',
                  data:'insurance-id='+$insurance_id+'&manage_state=turn-off',
                  dataType:'text',
                  success: function(data){
                      if(data==='ok')
                      {
                        Materialize.toast('Opération réussie',1500);
                        $('#close-modal-suspend-insurance').trigger('click');
                        $('#refresh-floating-box-patient-trigger').trigger('click');
                      }
                      else
                      {
                        Materialize.toast('une érreur est survenue lors de l\'opération, veuillez réessayer',1500);
                      }
                  },
                  complete: function(){
                    $('.content-modal',$modal).removeClass('hidden');
                    $('.loader',$modal).addClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                  },
                  error: function(){alert('une érreur est survenue lors de l\'opération, veuillez réessayer');}
            });
        });
      },
      complete: function(){

      }
  });
}
function dropOffInsurance(){
  var $insurance_id = $(this).attr('insurance-id');
  var $modal = $('#drop-insurance-patient-modal');
    $modal.openModal({
      ready: function(){
        $('#trigger-submit-modal-drop-insurance').unbind('click').bind('click',function(){
            $.ajax({
                  beforeSend: function(){
                    $('.content-modal',$modal).addClass('hidden');
                    $('.loader',$modal).removeClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                  },
                  url: '/manager/patients/manage-insurance',
                  type:'POST',
                  data:'insurance-id='+$insurance_id+'&manage_state=drop-off',
                  dataType:'text',
                  success: function(data){
                      if(data==='ok')
                      {
                        Materialize.toast('Opération réussie',1500);
                        $('#close-modal-drop-insurance').trigger('click');
                        $('#refresh-floating-box-patient-trigger').trigger('click');

                      }
                      else
                      {
                        Materialize.toast('Une Erreur est survenue lors de l\'opération',1500);
                      }
                  },
                  complete: function(){
                    $('.content-modal',$modal).removeClass('hidden');
                    $('.loader',$modal).addClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                  },
                  error: function(){alert('une Erreur est survenue lors de l\'opération, veuillez réessayer');}
            });
        });
      },
      complete: function(){

      }
    });
}

$('#renew-insurance-floating-box-patient-form').on('submit',function(e){
  e.preventDefault();
});

function refreshInsurance()
{
  var $insurance_id = $(this).attr('insurance-id');
  var $modal = $('#renew-insurance-patient-modal');
  var $number_card = $(this).parents('li').find('.card_insurance_number').text().trim();
  var $label_insurer = $(this).parents('li').find('.card_insurer_label').text().trim();

    $modal.openModal({
      ready: function(){
        $('#insurance_renew_info').val($number_card);
        $('#insurance_renew_insurer_info').val($label_insurer);
        $('#trigger-submit-modal-renew-insurance').unbind('click').bind('click',function(){
          var $isErrorFree = true;
          if(!$('#date_renew_insurance').val())
            $isErrorFree = false;

          if($isErrorFree)
          {
            var $form = $('#renew-insurance-floating-box-patient-form');
            $.ajax({
                  beforeSend: function(){
                    $('.content-modal',$modal).addClass('hidden');
                    $('.loader',$modal).removeClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                  },
                  url: '/manager/patients/manage-insurance',
                  type:'POST',
                  data:'insurance-id='+$insurance_id+'&manage_state=renew'+'&renew_info='+$form.serialize(),
                  dataType:'text',
                  success: function(data){
                      if(data==='ok')
                      {
                        Materialize.toast('Opération réussie',1500);
                        $('#close-modal-renew-insurance').trigger('click');
                        $('#refresh-floating-box-patient-trigger').trigger('click');
                      }
                      else
                      {
                        Materialize.toast('Une Erreur est survenue lors de l\'opération',1500);
                      }
                  },
                  complete: function(){
                    $('.content-modal',$modal).removeClass('hidden');
                    $('.loader',$modal).addClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                  },
                  error: function(){alert('une Erreur est survenue lors de l\'opération, veuillez réessayer');}
            });
          }
          else
          {
            Materialize.toast('Veuillez corriger le formauaire avant envoi', 2000);
            return false;
          }

        });
      },
      complete: function(){

      }
    });
}


function pullBackInsurance(){
  var $insurance_id = $(this).attr('insurance-id');
  var $modal = $('#pull-back-insurance-patient-modal');
  $modal.openModal({
      ready: function(){
        $('#trigger-submit-modal-pull-back-insurance').unbind('click').bind('click',function(){
            $.ajax({
                  beforeSend: function(){
                    $('.content-modal',$modal).addClass('hidden');
                    $('.loader',$modal).removeClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                  },
                  url: '/manager/patients/manage-insurance',
                  type:'POST',
                  data:'insurance-id='+$insurance_id+'&manage_state=drop-in',
                  dataType:'text',
                  success: function(data){
                      if(data==='ok')
                      {
                        Materialize.toast('Opération réussie',1500);
                        $('#close-modal-pull-back-insurance').trigger('click');
                        $('#refresh-floating-box-patient-trigger').trigger('click');
                      }
                      else
                      {
                        Materialize.toast('une érreur est survenue lors de l\'opération, veuillez réessayer',1500);
                      }
                  },
                  complete: function(){
                    $('.content-modal',$modal).removeClass('hidden');
                    $('.loader',$modal).addClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                  },
                  error: function(){alert('une érreur est survenue lors de l\'opération, veuillez réessayer');}
            });
        });
      },
      complete: function(){

      }
  });
}


function turnOnInsurance(){
  var $insurance_id = $(this).attr('insurance-id');
  var $modal = $('#turn-on-insurance-patient-modal');
  $modal.openModal({
      ready: function(){
        $('#trigger-submit-modal-turn-on-insurance').unbind('click').bind('click',function(){
            $.ajax({
                  beforeSend: function(){
                    $('.content-modal',$modal).addClass('hidden');
                    $('.loader',$modal).removeClass('hidden');
                    $('.modal-footer',$modal).slideUp();
                  },
                  url: '/manager/patients/manage-insurance',
                  type:'POST',
                  data:'insurance-id='+$insurance_id+'&manage_state=turn-on',
                  dataType:'text',
                  success: function(data){
                      if(data==='ok')
                      {
                        Materialize.toast('Opération réussie',1500);
                        $('#close-modal-turn-on-insurance').trigger('click');
                        $('#refresh-floating-box-patient-trigger').trigger('click');
                      }
                      else
                      {
                        Materialize.toast('une érreur est survenue lors de l\'opération, veuillez réessayer',1500);
                      }
                  },
                  complete: function(){
                    $('.content-modal',$modal).removeClass('hidden');
                    $('.loader',$modal).addClass('hidden');
                    $('.modal-footer',$modal).slideDown();
                  },
                  error: function(){alert('une érreur est survenue lors de l\'opération, veuillez réessayer');}
            });
        });
      },
      complete: function(){

      }
  });
}


$('#add-insurance-form').on('submit',function(e){
    e.preventDefault();

});


//Managing Research Filters
var $wrapper_filtering = $patient_floating_box;

$('.setting-filter-search-bills-item-selector li').on('click',function(){
   var ref = $(this).attr('ref');
   var selected_item_icon = $('<i class="ion-ios-checkmark-empty teal-text left small"></i>');
   $('.setting-filter-search-bills-item-selector li').find('i').remove();
   $(this).find('a').append(selected_item_icon);
   $('.filter-wrapper',$wrapper_filtering).addClass('hidden');
   $(ref,$wrapper_filtering).removeClass('hidden'); 
});

// Search By Keywords
$('input[name="search-keywords"]',$wrapper_filtering).on('keyup',function(){
    var $value = $(this).val().toLowerCase().trim();
    if($value.length>1)
    { 

      $('table tbody tr',$wrapper_filtering).each(function(){
          var $classExp = $(this).attr("tags").toLowerCase().trim();
          var regExp = new RegExp($value);
          if(regExp.test($classExp))
            $(this).removeClass("hidden");
          else
            $(this).addClass("hidden");
      });
    }
    else
    {
      $('table tbody tr',$wrapper_filtering).removeClass('hidden');
      return null;
    }
});

$('#form-search-by-date-bill-floating').on('submit',function(e){
    e.preventDefault();
    var $form = $(this);
    var $isErrorFree = true;
    $('input[type="date"]',$form).each(function(){
        if($(this).val().match(!/^\w{4}-\w{2}-\w{2}$/))
          $isErrorFree = false;
    });

    var date_from = $('input[type="date"]:eq(0)',$form).val()+' 00:00:00';
    var date_to = $('input[type="date"]:eq(1)',$form).val()+' 00:00:00';

    if($isErrorFree)
    {

      $.ajax({
          beforeSend:function(){
            $patient_floating_box.removeClass('hidden');
            $('#closer-floating-box-patient-wrapper',$patient_floating_box).addClass('right');
            $('.patient-api-variable-info',$patient_floating_box).empty();
            $('.reducable-content',$patient_floating_box).addClass('hidden');
            $('.loader-people',$patient_floating_box).removeClass('hidden');
          },
          type:'GET',
          url:'/manager/patients/search-single',
          data:'people-id='+$patient_floating_box.attr('patient-id')+'&date-from='+date_from+'&date-to='+date_to,
          success: function(data){
              if(data!=='ko')
              {
                var results = JSON.parse(data);
                showPatientInfo(results);
              }
          },
          complete: function(){
            $('.loader-people',$patient_floating_box).addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}

      });
    }
    else
    {
      Materialize.toast('Veuillez corriger le formulaire avant envoi',2000);
    }
});



  $("#trigger-search-amount").on("click",function(){
      $.ajax({
          beforeSend:function(){
            $patient_floating_box.removeClass('hidden');
            $('#closer-floating-box-patient-wrapper',$patient_floating_box).addClass('right');
            $('.patient-api-variable-info',$patient_floating_box).empty();
            $('.reducable-content',$patient_floating_box).addClass('hidden');
            $('.loader-people',$patient_floating_box).removeClass('hidden');
          },
          type:'GET',
          url:'/manager/patients/search-single',
          data:'people-id='+$patient_floating_box.attr('patient-id')+'&min='+parseFloat($(".range-min").val()*1000)+"&max="+parseFloat($(".range-max").val()*1000),
          success: function(data){
              if(data!=='ko')
              {
                var results = JSON.parse(data);
                showPatientInfo(results);
              }
          },
          complete: function(){
            $('.loader-people',$patient_floating_box).addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}
      });
  });



</script>
<?= $this->Html->script('Red/manager/visit-invoices/index',['block'=>true]) ?>
<?= $this->Html->script('Red/manager/manager-operators/manage_payments',['block'=>true]) ?>
<?= $this->Html->script('Materialize/extras/noUiSlider/nouislider.min',['block'=>true]) ?>
