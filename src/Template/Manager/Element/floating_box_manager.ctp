   <!-- Setting Payment Mode -->
  <div id="setting-visit-payment-mode" class="modal modal-fixed-footer" style="width:60%;">
      <div class="modal-content center">

           <div class="row" id="setting-visit-payment-info-wrapper">
                        <div class="col s12 input-field">
                           <select name="setting-visit-option-payment" id="setting-visit-option-payment" class="browser-default">
                              <option value="" class="center-align">Veuillez sélectionner un moyen de paiement</option>
                              <option value="cash" class="center-align">Paiement Cash</option>
                              <option value="insurance" class="center-align">Assurances</option>
                              <option value="cb" class="center-align">Chèque/CB</option>
                           </select>
                        </div>
                        <div class="col s12 inupt-field setting-visit-payment-mode-infos">
                              <div class="row zero-margin hidden" id="insurange-setting-visit-mode">

                              </div>
                              <div class="row zero-margin hidden" id="cash-setting-visit-mode">

                              </div> 
                              <div class="row zero-margin hidden" id="cb-setting-visit-mode">

                              </div>
                        </div>
             </div>

          <div class="row hidden loader-modal center">
              <div class="progress">
                <div class="indeterminate"></div>
              </div>
              <span class="dmp-main-color">Enregistrement en cours</span>
           </div>
      </div>
      <div class="modal-footer dmp-main-back">
        <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="confirm-setting-visit-mode-payment">Valider</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text right" id="close-setting-visit-mode">Annuler</a>
      </div>
  </div>



 <div id="create-bill-modal" class="modal modal-fixed-footer" style="width: 95%;max-height:88%;height: 88%;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
           <h6 class="dmp-grey-2-text zero-margin left-align" style="padding:10px;">Facturation Visite</h6>
        </div>
        <div class="row zero-margin" id="create-bill-content">
          <div class="row zero-margin dmp-main-back-4">
              <div class="col s3 input-field">
                  <i class="ion-ios-search-strong prefix small" style="top:-6px;"></i>
                  <input type="text"  name="" data-beloworigin="true" data-gutter="45" data-constrainwidth="false" data-alignment="right" data-search-box="#dropdown_acts_floating" class="custom_search_acts-billing_box dropdown-button" data-activates="dropdown_acts_floating" id="" style="border: 2px solid #dc6b1d !important;border-radius: 3px; height:19px;color: white !important; ">

                   <ul id='dropdown_acts_floating' class='dmp-main-back dropdown-content' style="top: 24px !important;left: 55.25px !important;    width: 1110px;opacity:0.9;">

                  </ul>

              </div>
              <div class="col s8 left-align">
                     <i class="ion-android-menu dmp-orange-text small left trigger-menu-acts pointer" data-main-wrapper="#create-bill-modal" style="top:5px;"></i>
                    <!-- Label Invoice -->
                    <div class="col s8 input-field right">
                        <i class="ion-android-textsms small dmp-orange-text prefix"  style="top:-6px;"></i>
                        <input type="text" name="label_create_bill" class="" id="label_create_bill" style="border: 2px solid #dc6b1d !important;border-radius: 3px; height:19px;color: white !important; ">
                    </div>
                     <!-- Acts & items Container -->
                     <div class="row acts-box hidden" style="position:relative;clear:both;">
                          <div class="row dmp-main-back white-text" id="floating-box-item-create-bill" style="position:absolute;padding:15px;width:98%;height:400px; opacity:0.93;top: -40px;left: 29px;">
                              <div class="col s6" id="items-create-bill" style="overflow:auto; height:370px;">

                              </div>
                              <div class="col s6" >
                                   <div class="col s12 input-field">
                                       <i class="ion-ios-search-strong prefix small dmp-orange-text" style="top:-6px;"></i>
                                       <input type="text" name="" class="custom_search_acts-billing_box" data-search-box="#list-item-acts-floating-box" id="" style="border: 2px solid #dc6b1d !important;border-radius: 3px; height:19px;color: white !important; ">
                                   </div>
                                   <div class="col s12" id="list-item-acts-floating-box" style="overflow:auto; height:300px; padding:10px;">
                                      
                                   </div>
                                   <div class="col s12 center">
                                      <div class="preloader-wrapper big active hidden">
                                        <div class="spinner-layer spinner-blue-only" style="border-color:#dc6b1d !important;">
                                          <div class="circle-clipper left">
                                            <div class="circle"></div>
                                          </div><div class="gap-patch">
                                            <div class="circle"></div>
                                          </div><div class="circle-clipper right">
                                            <div class="circle"></div>
                                          </div>
                                        </div>
                                      </div>
                                   </div>
                              </div>
                          </div>

                     </div>
              </div>

              <div class="col s1"> 
                    <i class="ion-ios-plus-outline small dmp-orange-text add-item-bill-create pointer-opaq tooltipped" data-table="#create-bill-modal-table-patient" data-tooltip="ajouter une ligne personnalisé" data-delay="5s" data-position="left"></i>
              </div>
          </div>

          <div class="row">
                <form>
                      <table class="MyTable striped zero-margin bordered bold centered table-space" cellpadding="0" cellspacing="0" id="create-bill-modal-table-patient" style="margin-top:30px;">
                        <thead class="dmp-main-color">
                            <th class="zero-margin" style="padding:10px;"><?= __('Désignation') ?></th>
                            <th class="zero-margin" style="padding:10px;"><?= __('Type') ?></th>
                            <th class="zero-margin" style="padding:10px;"><?= __('Description Additionnelle') ?></th>
                            <th class="zero-margin" style="padding:10px;"><?= __('Quantité')?></th>
                            <th class="zero-margin" style="padding:10px;"><?= __('Montant Unitaire')?></th>
                            <th class="zero-margin" style="padding:10px;"><?= __('Montant Total')?></th>
                        </thead>
                        <tbody visit-id='0'>
          
                        </tbody>
                        <tfoot class="">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="dmp-main-back dmp-grey-2-text">Montant Total</td>
                              <td class="dmp-main-back dmp-grey-2-text"></td>
                              <td></td>
                        </tfoot>
                           <input type="hidden" name="visit_id" id="visit_id_create_bill">
                           <input type="hidden" name="invoice_label" id="visit_create_bill_label">
                      </table>
                </form>
          </div>
        </div>
        <div class="row loader-ajax hidden" style="margin-top:19%;">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Enregistrement en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat white-text left" style="float:none;" id="abort-create-bill">Fermer</a> 
      <a href="#!" class="waves-effect waves-green btn-flat white-text right" style="float:none;" id="trigger-create-bill">Valider</a>
    </div>
</div>



<!-- Reattribute Visit-->
 <div id="reattribute-visit-modal" class="modal modal-fixed-footer" style="width:65%;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
           <h6 class="dmp-grey-2-text zero-margin left-align" style="padding:10px;"> Réattribution Visite</h6>
        </div>
        <div class="row zero-margin" id="reattribute-visit-content">
          <div class="row zero-margin dmp-main-back-4">
              <div class="col s4 input-field">
                  <i class="ion-ios-search-strong prefix small" style="top:-6px;"></i>
                  <input type="text" name="" class="custom_search_single_box" id="" style="border: 2px solid #dc6b1d !important;border-radius: 3px; height:19px;color: white !important; ">
              </div>
              <div class="col s5 zero-margin">
              </div>
          </div>

          <div class="row">
                <table class="MyTable striped zero-margin bordered bold centered table-space" cellpadding="0" cellspacing="0" id="reattribute-visit-table-patient" style="margin-top:30px;">
                  <thead class="dmp-main-color">
                    <th class="zero-margin" style="padding:10px;"><?= __('Photo') ?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Code Patient')?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Nom')?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Prénoms')?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Age') ?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Sexe') ?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Contact(s)') ?></th>
                    <th class="zero-margin" style="padding:10px;"><?= __('Choix') ?></th>
                  </thead>
                  <tbody visit-id='0'>

                  </tbody>
                </table>
                <input type="hidden" id="reattribute-visit-id">
          </div>



        </div>
        <div class="row loader-ajax hidden" style="margin-top:19%;">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Enregistrement en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat white-text" style="float:none;" id="abort-reattribute-visit">Fermer</a>
    </div>
</div>




<!-- Generate End State Bill -->
 <div id="end-state-bill-modal" class="modal modal-fixed-footer" style="width:25%;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
           <h6 class="dmp-grey-2-text zero-margin left-align" style="padding:10px;">Attestation Billet de Sortie</h6>
        </div>
        <div class="row zero-margin" id="end-state-bill-content">
            <i class="ion-android-checkmark-circle green-text large"></i>
            <h6 class="dmp-main-color">Etes-vous sûre de vouloir signer le billet de sortie? La visite sera considérée comme réalisée.</h6>
            <input type="hidden" name="visit_id" id="end-state-visit-id">
        </div>
        <div class="row loader-ajax hidden" style="margin-top:30%;">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Enregistrement en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="waves-effect waves-green btn-flat white-text right" id="trigger-end-state-bill">Valider</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat white-text left" id="abort-end-state-bill">Fermer</a>
    </div>
</div>

<!-- Genral Card Floating Box -->
<!-- Solded Current Month invoice -->
 <div id="solded-invoices-general-modal" class="modal modal-fixed-footer huge-modal" style="width:95% !important;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
          <h6 class="dmp-grey-2-text zero-margin left-align light" style="padding:10px;">Facture Soldée</h6>
        </div>
        <div class="row" id="interventions-visit-modal-info-wrapper">
              <table class="MyTable zero-margin striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="solded-invoices-table" style="margin-top:30px;">
                  <thead class="dmp-main-color">
                    <th class="zero-padding zero-margin"><?= __('Code') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Facture Création')?></th>
                    <th class="zero-padding zero-margin"><?= __('Montant')?></th>
                    <th class="zero-padding zero-margin"><?= __('Règlement')?></th>
                    <th class="zero-padding zero-margin"><?= __('Type') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Moyen') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Paiements') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Actions') ?></th>
                  </thead>
                  <tbody changed='1'>

                  </tbody>
            </table>
        </div>
        <div class="row loader-ajax hidden">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Importation en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat white-text bold">Fermer</a>
    </div>
</div>


<!-- Solded Current Month invoice -->
 <div id="unsolded-invoices-general-modal" class="modal modal-fixed-footer huge-modal" style="width:95% !important;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
          <h6 class="dmp-grey-2-text zero-margin left-align light" style="padding:10px;">Facture Soldée</h6>
        </div>
        <div class="row" id="interventions-visit-modal-info-wrapper">
              <table class="MyTable zero-margin striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="unsolded-invoices-table" style="margin-top:30px;">
                  <thead class="dmp-main-color">
                    <th class="zero-padding zero-margin"><?= __('Code') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Facture Création')?></th>
                    <th class="zero-padding zero-margin"><?= __('Montant')?></th>
                    <th class="zero-padding zero-margin"><?= __('Règlement')?></th>
                    <th class="zero-padding zero-margin"><?= __('Type') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Moyen') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Paiements') ?></th>
                    <th class="zero-padding zero-margin"><?= __('Actions') ?></th>
                  </thead>
                  <tbody changed='1'>

                  </tbody>
            </table>
        </div>
        <div class="row loader-ajax hidden">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Importation en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat white-text bold">Fermer</a>
    </div>
</div>



<!-- Change State Visit -->
  <!-- Modal Structure -->
  <div id="change-state-visit-modal" class="modal modal-fixed-footer">
      <div class="modal-content zero-padding">
        <div class="row dmp-main-back zero-margin" style="">
            <h6 class="dmp-grey-2-text zero-margin" style="padding:15px;">Changement etat-visite</h6>
        </div>
        <div class="row" style="padding:30px; " id="change-state-wrapper">
           <form id="form-change-visit-state">
               <h6 class="bold dmp-main-color">Etat</h6>
               <select name="next_state_choice" id="next_state_choice">
                     <option value="" selected>Veuillez sélectionnez un etat</option>
                  <?php foreach($visit_state_types_full as $state) :?>
                      <?php if($state->id!=1 && $state->id!=7 && $state->id!=8) :?>
                      <option value="<?= $state->id ?>"><?= $state->label_state_type ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
               </select>
           </form>

          <div class="row info-wrapper dmp-main-color" style="border:1.5px dashed red;padding:5px;margin-top:35px;">
            <p>Le changement d'un etat implique d'importantes manipulations comme la génération de justificatifs, preuves (ex: bille de sortie, attestations)</p>
          </div>


        </div>
        <div class="row center loader hidden" style="margin-top:10%;">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                  <span class="dmp-main-color center-align center">Changement en cours</span>
         </div>
      </div>
      <div class="modal-footer dmp-main-back">
        <a href="#!" class="modal-action modal-close waves-effect white-text waves-green btn-flat left" id="change-state-visit-cancel-trigger">Annuler</a>
        <a href="#!" class="waves-effect waves-green btn-flat white-text right" id="change-state-visit-trigger">Valider</a>
      </div>
  </div>


<!-- showing orders for the selected visit  -->
 <div id="orders-visit-modal" class="modal modal-fixed-footer huge-modal" style="width:95% !important;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
           <h6 class="dmp-grey-2-text zero-margin left-align" style="padding:10px;">Ordres-Visites</h6>
        </div>
        <div class="row zero-margin" id="orders-visit-modal-info-wrapper">
              <table class="MyTable striped zero-margin bordered bold centered table-space" cellpadding="0" cellspacing="0" id="orders-visit-table-floating" style="margin-top:30px;">
              <thead class="dmp-main-color">
                  <th style="padding:5px;"><?= __('Etat') ?></th>
                  <th style="padding:5px;"><?= __('Ordre') ?></th>
                  <th style="padding:5px;"><?= __('Date de délivrance') ?></th>
                  <th style="padding:5px;"><?= __('Aperçu') ?></th>
                  <th style="padding:5px;"><?= __('Actions') ?></th>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <div class="row loader-ajax hidden">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                  <span class="dmp-main-color center-align center">Importation en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat white-text bold">Fermer</a>
    </div>
</div>

<!-- showing interventions info for the selected visit  -->
 <div id="interventions-visit-modal" class="modal modal-fixed-footer huge-modal" style="width:95% !important;">
    <div class="modal-content center">
        <h5 class="dmp-main-color">Interventions - Visite <span id="interventions-visit-modal-invoice-info" invoice-id="0"></span></h5>
        <div class="row" id="interventions-visit-modal-info-wrapper">
          <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="interventions-visit-table" style="margin-top:30px;">
          <thead class="dmp-main-back blue-text">
            <th class="zero-padding zero-margin"><?= __('N°') ?></th>
            <th class="zero-padding zero-margin"><?= __('Date Création')?></th>
            <th class="zero-padding zero-margin"><?= __('Date Résolution')?></th>
            <th class="zero-padding zero-margin"><?= __('Catégorie')?></th>
            <th class="zero-padding zero-margin"><?= __('Actes') ?></th>
            <th class="zero-padding zero-margin"><?= __('Responsable') ?></th>
            <th class="zero-padding zero-margin"><?= __('Facture') ?></th>
            <th class="zero-padding zero-margin"><?= __('Actions') ?></th>
          </thead>
          <tbody visit-id='0'>

          </tbody>
        </table>
        </div>
        <div class="row loader-ajax hidden">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                  <span class="dmp-main-color center-align center">Importation en cours</span>
        </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat white-text bold">Fermer</a>
    </div>
</div>

<!-- Create Payment solded invoices modal boxes -->
 <div id="solded-payments-general-modal" class="modal modal-fixed-footer" style="width:70% !important;">
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
          <h6 class="dmp-grey-2-text zero-margin left-align light" style="padding:10px;">Paiements soldés</h6>
        </div>
          <div class="row" id="solded-payments-info-wrapper">
                <table class="MyTable striped zero-margin bordered bold centered table-space" cellpadding="0" cellspacing="0" id="solded-payments-table" style="margin-top:30px;">
                    <thead class="dmp-main-color">
                        <th class="zero-margin zero-padding"><?= __('N° Paiement') ?></th>
                        <th class="zero-margin zero-padding"><?= __('Reçu') ?></th>
                        <th class="zero-margin zero-padding"><?= __('Date Génération') ?></th>
                        <th class="zero-margin zero-padding"><?= __('Date Paiement') ?></th>
                        <th class="zero-margin zero-padding"><?= __('Montant') ?></th>
                        <th class="zero-margin zero-padding"><?= __('Action') ?></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
          </div>
                    <div class="row" id="loader-solded-payment-modal">
                              <div class="progress">
                                  <div class="indeterminate"></div>
                              </div>
                            <span class="dmp-main-color">Importation en cours</span>
                      </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat white-text bold">Fermer</a>
    </div>
</div>
  <!-- Create Payment non_solded modal boxes -->
 <div id="unsolded-payments-general-modal" class="modal modal-fixed-footer" style="width:70% !important;"   >
    <div class="modal-content center zero-padding">
        <div class="row dmp-main-back zero-margin">
          <h6 class="dmp-grey-2-text zero-margin left-align light" style="padding:10px;">Paiements non soldés</h6>
        </div>
      <div class="row" id="unsolded-payments-info-wrapper">
            <table class="MyTable zero-margin striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="unsolded-payments-table" style="margin-top:30px;">
                <thead class="dmp-main-color">
                        <th><?= __('N° Paiement') ?></th>
                        <th><?= __('Date Prévue Règlement') ?></th>
                        <th><?= __('Date Règlement') ?></th>
                        <th><?= __('Montant') ?></th>
                        <th><?= __('Référence') ?></th>
                        <th><?= __('Moyen') ?></th>
                        <th><?= __('Preuve') ?></th>
                        <th><?= __('Actions') ?></th>
                </thead>
                <tbody>

                </tbody>
            </table>
      </div>
                     <div class="row" id="loader-non-solded-payment-modal">
                              <div class="progress">
                                  <div class="indeterminate"></div>
                              </div>
                            <span class="dmp-main-color">Importation en cours</span>
                      </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text">Fermer</a>
    </div>
  </div>

   <!-- Cancel Booking modal box -->
  <div id="cancel-booking-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
          <div class="row" id="content-cancel-booking">
                <i class="ion-ios-close-outline red-text large"></i>
              <h5 class="dmp-main-color zero-margin">Annulation de la réservation</h5>
              <p>Etes-vous sûre de vouloir annuler la réservation ?</p>
              <input type="hidden" id="cancel-booking-input" name="cancel-booking-input">
          </div>
          <div class="row hidden" id="loader-cancel-booking">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
                <span class="dmp-main-color">Annulation en cours</span>
          </div>

        </div>
        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="cancel-booking-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="cancel-booking-abort-trigger">Annuler</a>
        </div>
  </div>

  <!-- Revalidate Booking modal box -->
  <div id="revalidate-booking-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
          <div class="row" id="content-revalidate-booking">
                <i class="ion-android-checkmark-circle green-text large"></i>
              <h5 class="dmp-main-color zero-margin">Reconduire la réservation</h5>
              <p>Etes-vous sûre de vouloir reconduire la réservation ?</p>
              <input type="hidden" id="revalidate-booking-input" name="revalidate-booking-input">
          </div>
          <div class="row hidden" id="loader-revalidate-booking">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
                <span class="dmp-main-color">changements en cours</span>
          </div>

        </div>
        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="revalidate-booking-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="revalidate-booking-abort-trigger">Annuler</a>
        </div>
  </div>



  <!-- Update Validate Booking Info modal box -->
  <div id="update-validate-booking-modal-box" class="modal modal-fixed-footer" style="width:50%;">
        <div class="modal-content center">
          <div class="row" id="content-update-validate-booking">
                <i class="ion-bookmark dmp-main-color large"></i>
              <h5 class="dmp-main-color zero-margin">Modifier les infos réservations</h5>
                 
         <div class="col s12">
                  <div class="col s6 input-field" style="margin-top:25px;">
                      <h6 class="bold left-align dmp-main-color">Praticien</h6>
                      <input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search_doctor_floating_box" data-activates="dropdown1-floating-box" id="search_doctor_floating_box" style="background:white !important;color:#130647 !important;font-weight:bold;">
                        <ul id='dropdown1-floating-box' class='dropdown-content' style="width:auto !important;">
                              <?php foreach($doctors as $doctor) :?>
                                      <li class="doctor-item-floating-box" tag="<?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?>" tag-id="<?= $doctor->id ?>"><span class="item-selected-dropdown dmp-main-back white-text"><?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?></span>
                                      </li>
                              <?php endforeach; ?>
                         </ul>
                      <input type="hidden" name="doctor_id_floating_box" id="doctor_id_floating_box" value='0'>       
                  </div>
                      <div class="col s6 zero-padding zero-margin" id='content-speciality' style="margin-top:25px !important;">
                               <h6 class="dmp-main-color bold left-align">Spécialité</h6>
                              <input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search_speciality_floating_box" data-activates="dropdown-speciality-floating-box" id="search_speciality_floating_box" style="background:white !important;color:#130647 !important;font-weight:bold;">
                              <ul id='dropdown-speciality-floating-box' class='dropdown-content' style="width:auto !important;">
                                  <?php foreach($specialities as $speciality) :?>
                                          <li class="speciality-item-floating-box" alias="<?= $speciality->alias ?>" tag="<?= $speciality->libelle ?>" tag-id="<?= $speciality->id ?>"><span class="item-selected-dropdown dmp-main-back white-text"><?= $speciality->libelle ?></span>
                                          </li>
                                  <?php endforeach; ?>
                              </ul>
                              <input type="hidden" name="visit_speciality_id_floating_box" id='visit_speciality_id_floating_box' value="0">
                              <input type="hidden" name="visit_speciality_id_floating_box_tag" id='visit_speciality_id_floating_box_tag' value="0">
                      <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif',['class'=>'hidden','id'=>'floating-box-booking-img']) ?>
                      </div>
           </div>

              <input type="hidden" id="update-validate-booking-input" name="update-validate-booking-input">
          </div>
          <div class="row hidden" id="loader-update-validate-booking">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
                <span class="dmp-main-color">changements en cours</span>
          </div>

        </div>
        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="update-validate-booking-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="update-validate-booking-abort-trigger">Annuler</a>
        </div>
  </div>

  <!-- Replan Visit/Booking -->
    <div id="replan-visit-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center" id='content-replan-visit'>
          <div class="row" id="content-replan-visit-replan">
              <i class="ion-android-calendar dmp-main-color large"></i>
              <h5 class="dmp-main-color zero-margin">Replanification Visite</h5>
              <form action="" id="replan-visit-form">
                  <div class="col s12 input-field">
                      <h6>Date ultérieure de visite</h6>
                      <input type="date"  class="" required="required" value="" id="expected_date_replan_visit" name="expected_date_replan_visit"/>
                      <input type="time" class="" required="required" id="expected_time_replan_visit" name="expected_time_replan_visit">
                  </div>
                  <input type="hidden" id="visit_id_replan" name="visit_id_replan">
              </form>
          </div>
          <div class="row hidden" id="loader-replan">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
                <span class="dmp-main-color">Modification en cours</span>
          </div>
        </div>

        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="replan-visit-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="replan-visit-abort-trigger">Annuler</a>
        </div>
  </div>



   <!-- Replan Payment modal box -->
  <div id="replan-payment-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
          <div class="row" id="content-replan-payment">
                <i class="ion-android-calendar dmp-main-color large"></i>
              <h5 class="dmp-main-color zero-margin">Replanification Paiement</h5>
            <form id="form-replan-payment">
                <div class="col s12 input-field">
                    <h6>Date prévue de règlement</h6>
                    <input type="date"  class="" required value="" name="expected_date"/>
                </div>
                <div class="col s12 input-field">
                    <h6>Moyen de paiement</h6>
                    <input type="radio" name="payment_way" value="1" id="payment_way_1">
                    <label for="payment_way_1">Cash</label>
                    
                    <input type="radio" name="payment_way" value="2" id="payment_way_2">
                    <label for="payment_way_2">Chèque/CB</label>        
                </div>
                <input type="hidden" id="invoice_id_replan" name="invoice_id_replan">
            </form>
              
          </div>
          <div class="row hidden" id="loader-replan-payment">
                  <div class="progress dmp-orange-back">
                      <div class="indeterminate grey"></div>
                  </div>
                <span class="dmp-main-color light">Enregistrement en cours</span>
          </div>

        </div>
        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="replan-payment-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="replan-payment-abort-trigger">Annuler</a>
        </div>
  </div>


  <!-- Get Payment modal box -->
  <div id="get-payment-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
          <div class="row" id="content-get-payment">
            <i class="ion-ios-checkmark-outline green-text large"></i>
            <h5 class="dmp-main-color zero-margin">Encaissement Paiement</h5>
            <form id="form-get-payment">
                <div class="col s12 input-field">
                    <h6 class="dmp-main-color left-align">Montant Facture</h6>
                    <input type="number"  class="required" disabled value="" name="amount" id="amount"/>
                    <h6 class="dmp-main-color left-align">Montant Versement</h6>
                    <input type="number"  class="required" value="" name="amount_receive" id="amount_receive"/>
                </div>
                <div class="col s12 input-field">
                    <h6>Veuillez procéder à la validation ci-dessous afin de recouvrir le paiement</h6>
                </div>
                <input type="hidden" id="get_payment_id" name="get_payment_id">
            </form>
              
          </div>
          <div class="row hidden" id="loader-get-payment">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
                <span class="dmp-main-color">Enregistrement en cours</span>
          </div>

        </div>
        <div class="modal-footer dmp-main-back">
          <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="get-payment-confirm-trigger">Valider</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="get-payment-abort-trigger">Annuler</a>
        </div>
  </div>

  <!-- Change Payment Mode -->
  <div id="change-payment-mode" class="modal modal-fixed-footer" style="width:60%;">
      <div class="modal-content center">

           <div class="row" id="change-payment-info-wrapper">
                        <div class="col s12 input-field">
                           <select name="change-option-payment" id="change-option-payment" class="browser-default">
                              <option value="" class="center-align">Veuillez sélectionner un moyen de paiement</option>
                              <option value="cash" class="center-align">Paiement Cash</option>
                              <option value="assurance" class="center-align">Assurances</option>
                              <option value="cheque" class="center-align">Chèque/CB</option>
                           </select>
                        </div>
                        <div class="col s12 inupt-field change-payment-mode-infos">
                              <div class="row zero-margin hidden" id="insurange-change-mode">
                                    
                              </div>
                              <div class="row zero-margin hidden" id="cash-change-mode">
                                    
                              </div> 
                        </div>
             </div>

          <div class="row hidden loader-modal center">
              <div class="progress">
                <div class="indeterminate"></div>
              </div>
              <span class="dmp-main-color">Enregistrement en cours</span>
           </div>
      </div>
      <div class="modal-footer dmp-main-back">
        <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="confirm-change-mode-payment">Valider</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text right" id="close-change-mode">Annuler</a>
      </div>
  </div>


<!-- Get Patients Infos -->
  <div id="get-patient-info-modal-box" class="modal modal-fixed-footer" style="width:20%;">
      <div class="modal-content center">
          <div class="row" id="patient-info-wrapper">
            <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="patient-info-table" style="margin-top:30px;">
            <thead class="dmp-main-back blue-text">
                <th><?= __('Photo') ?></th>
                <th><?= __('Nom') ?></th>
                <th><?= __('Prénom') ?></th>
                <th><?= __('Age') ?></th>
                <th><?= __('Sexe') ?></th>
                <th><?= __('Actions') ?></th>
            </thead>
            <tbody>

            </tbody>
          </table>
          </div>
            <div class="row hidden" id="loader-patient-payment-modal">
          <div class="progress">
            <div class="indeterminate"></div>
          </div>
             <span class="dmp-main-color">Importation en cours</span>
         </div>
      </div>
      <div class="modal-footer dmp-main-back">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text right" id="close-modal-get-patient">Fermer</a>
      </div>
  </div>



    <!-- Create Rdv Modal-Boxes -->
  <!-- Structure -->
  <div id="manage-visits-modal-wrapper" class="modal huge-modal modal-fixed-footer" style="width:95% !important;">
    <div class="modal-content zero-padding">
          <div class="row choice-wrapper-box-set" id="show-manage-visits-wrapper">
                <div class="row" id="form-visitsviewer-wrapper">
                        <?= $this->Form->create(null,['class'=>'admin-form dash-form','id'=>'form-visits-viewer']) ?>
                        <div class="container"> 

                        <div class="row" id="search_doctor_box">
                                      <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
                                       <i class="ion-fork-repo dmp-main-color medium"></i> Praticien & Spécialité</h5>
                                            <div class="row" id="search-doctor-wrapper">
                                                <div class="col s12">
                                                    <div class="col s6 input-field" id='doctor-container'>
                                                        <h6>Praticien</h6>
                                                        <input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search_doctor" data-activates="dropdown1" id="search_doctor" style="background:white !important;color:#130647 !important;font-weight:bold;">
                                                        <ul id='dropdown1' class='dropdown-content' style="width:auto !important;">
                                                            <?php foreach($doctors as $doctor) :?>
                                                                    <li class="doctor-item" tag="<?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?>" tag-id="<?= $doctor->id ?>"><span class="item-selected-dropdown dmp-main-back white-text"><?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?></span>
                                                                    </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <input type="hidden" name="doctor_id" id="doctor_id" value='0'>       
                                                    </div>
                                                    <div class="col s6 input-field" id='speciality-container'>
                                                        <div class="col s12 zero-padding zero-margin" id='content-speciality'>
                                                                <h6 class="dmp-main-color bold">Spécialité</h6>
                                                                <input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search_speciality" data-activates="dropdown-speciality" id="search_speciality" style="background:white !important;color:#130647 !important;font-weight:bold;">
                                                                <ul id='dropdown-speciality' class='dropdown-content' style="width:auto !important;">
                                                                    <?php foreach($specialities as $speciality) :?>
                                                                            <li class="speciality-item" alias="<?= $speciality->alias ?>" tag="<?= $speciality->libelle ?>" tag-id="<?= $speciality->id ?>"><span class="item-selected-dropdown dmp-main-back white-text"><?= $speciality->libelle ?></span>
                                                                            </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                                <input type="hidden" name="visit_speciality_id" id='visit_speciality_id'>
                                                                <input type="hidden" name="visit_speciality_tag" id='visit_speciality_tag'>
                                                        </div>
                                                        <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif',['class'=>'hidden']) ?>
                                                    </div>
                                                </div>

                                                <div class="col s12">
                                                    <div class="col s6 input-field">
                                                          <h6 class="dmp-main-color bold">Motif de Visite</h6>

                                                          <i class="ion-android-textsms prefix small dmp-main-color"></i>
                                                          <input type="text" id="visit_motif" name="visit_motif" class="required" value="Consultation" />
                                                    </div>
                                                    <div class="col s6 input-field">
                                                            <h6 class="dmp-main-color bold">Type de Visite</h6>
                                                            <select name="visit_type_id" id="visit_type_selection">
                                                                <?php foreach ($visit_state_types as $type) :?>
                                                                   <option value="<?= $type->id ?>"><?= $type->label_state_type ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                    </div>
                                                </div>

                                                <div class="col s12">
                                                  <div class="col s6 input-field">
                                                            <h6 class="dmp-main-color bold">Etat du patient</h6>
                                                            <select name="visit_level_id" id="">
                                                                <?php foreach ($visit_levels as $level) :?>
                                                                   <option value="<?= $level->id ?>"><?= $level->label ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                    </div>
                                                

                                                  <div class="col s6 input-field">
                                                            <h6 class="dmp-main-color bold">Moyen d'arrivé</h6>
                                                            <select name="visit_kind_transport_id" id="">
                                                                <?php foreach ($visit_kind_transports as $transport) :?>
                                                                   <option value="<?= $transport->id ?>"><?= $transport->label ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>              
                                </div>

                          <div class="row" id="info-patient-wrapper">
                             <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                                <i class="ion-ios-person dmp-main-color medium"></i> Patient</h5>
                                  <div class="col s12 input-field" id="patient_search_number_wrapper">
                                      <div class="col s7" id="patient_search_box"> 
                                          <i class="ion-ios-telephone prefix small dmp-main-color"></i>
                                          <input type="number" id="patient_number" class="required"/>
                                          <label for="patient_number">Contact Patient</label>
                                      </div>
                                      <div class="col s1 hidden" id="patient_search_loader_wrapper"> 
                                            <p><?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif') ?></p>
                                      </div>
                                      <div class="col s4"> 
                                           <input type="checkbox" class="filled-in" id="anonym_patient_checkbox" value="1"/>
                                           <label for="anonym_patient_checkbox">Patient Anonyme*</label>   
                                      </div>

                                      <div class="col s12 hidden" id="patient_anonym_infos">
                                          <div class="col s6 input-field">
                                              <h6 class="bold dmp-main-color">Age</h6>
                                              <input type="number" name="age_anonym_patient" class="" id="age_anonym_patient" />
                                          </div>
                                          <div class="col s6 input-field">
                                              <h6 class="bold dmp-main-color">Sexe</h6>
                                              <select name="sexe_anonym_patient" id="sexe_anonym_patient">
                                                  <option value="">Définissez une valeur</option>
                                                  <option value="H">Homme</option>
                                                  <option value="F">Femme</option>
                                              </select> 
                                          </div>
                                          <input type="hidden" name="signature_anonym" id="signature_anonym">
                                      </div>
                                    
                                    <div class="col s12"> 
                                        <p style="padding:10px; border:1.5px dashed blue;font-weight:bold;">*La case à cocher "Patient Anonyme" convient dans des cas où le patient est non identifié dans le fichier du système par exemple.</p>
                                    </div>
                                  </div>

                                  <div class="col s12 hidden center" id="patient_search_result_wrapper"> 
                                      <div class="card-panel orange lighten-4">
                                          <div class="row" id="description-patients-found"> 
                                            <div class="col s5 center" id="pics-patients-found">
                                              <img src="" style="width:100%;">
                                            </div>
                                            <div class="col s7 bold" id="identity-patients-found"  style="border-left:1.7px solid white;">  
                                              <p>&nbsp;</p>
                                              <p>&nbsp;</p>
                                              <p>&nbsp;</p>
                                              <p>&nbsp;</p>
                                              <p>&nbsp;</p>
                                            </div>

                                          </div>
                                      </div>
                                      <button class="btn dmp-main-back white-text" id="change-patient-trigger">Changer</button>
                                      <input type="hidden" id="patient_id" name="patient_id">
                                  </div>
                            </div>

                          <div class="row hidden" id="additional-info">
                                <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                                    <i class="ion-ios-pricetags dmp-main-color medium"></i> Items Additionnels </h5>
                                <div class="row center">   
                                            <span class="bold">Voulez-Vous inscrire d'autres items à la facture ?</span> 
                                   <div class="switch" id="item-visit-turn">
                                    <label>Non<input type="checkbox">
                                    <span class="lever"></span>
                                    Oui</label>
                                  </div>
                                    <div class="row items-visit-infos-wrapper hidden" id="items-visit-adding-content-table-main-container">    
                                      <table class="MyTable striped bordered bold centered table-space acc-medium-top-margin" cellpadding="0" cellspacing="0" id="items-visit-adding-content-table-wrapper">
                                         <thead class="dmp-main-back blue-text zero-padding">
                                                <th class="add-items-visit-item-trigger zero-padding zero-margin"><i class="ion-plus-circled white-tex small pointer-opaq"></i></th>
                                                <th class="zero-padding zero-margin"><?= __('Item') ?></th>
                                                <th class="zero-padding zero-margin"><?= __('Montant Unitaire') ?></th>
                                                <th class="zero-padding zero-margin"><?= __('Qte') ?></th>
                                                <th class="zero-padding zero-margin"><?= __('Montant Total') ?></th>
                                                <th class="zero-padding zero-margin"><?= __('Retirer') ?></th>
                                            </thead>   
                                            <tbody id="items-visit-adding-content">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div>

                
                            <div class="row" id="visit-bill-wrapper">
                                        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
                                        <i class="ion-cash dmp-main-color medium"></i> Facturation</h5>
                                                <div class="input-field col s12" id="montant-wrapper">
                                                     <i class="ion-calculator small prefix dmp-main-color"></i>
                                                     <input id="montant" name="montant" type="number" class="required">
                                                     <label for="montant" class="bold"  data-error="invalide" data-success="correct">Montant du rendez-vous</label>
                                                </div>
                                                    
                                                <div class="input-field col s12" style="margin-top:20px; padding:15px;">
                                                      <div class="col s3">
                                                          <h6 class="dmp-main-color bold">Définissez le moyen de paiement</h6>
                                                          <p>
                                                            <input name="visit_invoice_payment_way_id" class="trigger-payment-method" reference="cash-payment-wrapper" type="radio" id="payment1" value="1"/>
                                                            <label for="payment1">Comptant (Cash)</label>
                                                          </p>
                                                           <p>
                                                            <input name="visit_invoice_payment_way_id" class="trigger-payment-method" reference="bank-payment-wrapper" type="radio" id="payment2" value="2"/>
                                                            <label for="payment2">Chèque/CB</label>
                                                          </p>
                                                          <p>
                                                            <input name="visit_invoice_payment_way_id" class="trigger-payment-method" reference="insurance-payment-wrapper" type="radio" id="payment3" value="3"/>
                                                            <label for="payment3">Assurance</label>
                                                          </p>
                                                          <p>
                                                            <input name="visit_invoice_payment_way_id" class="trigger-payment-method" reference="reservation-payment-wrapper" type="radio" id="payment4" value="4"/>
                                                            <label for="payment4">Réservation</label>
                                                          </p>
                                                          <p>
                                                            <input name="visit_invoice_payment_way_id" class="trigger-payment-method" reference="credit-payment-wrapper" type="radio" id="payment5" value="5"/>
                                                            <label for="payment5">Crédit</label>
                                                          </p>
                                                      </div>
                                                      <div class="col s9 zero-padding">

                                                          <div class="col s12 payment-method-wrapper" id="cash-payment-wrapper">
                                                            <h6 class="dmp-main-color bold">Paiement Cash</h6>
                                                            <div class="col s12 input-field">
                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                <input type="number" class="" name="amount_cash" id="amount_cash"/>
                                                                <label for="amount_cash">Specifiez le montant versé</label>
                                                            </div>
                                                          </div>

                                                          <div class="col s12 payment-method-wrapper" id="insurance-payment-wrapper">
                                                            <h6 class="dmp-main-color bold">Assurance</h6>

                                                                <div class="col s12 input-field">
                                                                    <h6>Définissez l'assurance</h6>
                                                                    <select name="insurance_patient_select" id="insurance_patient_select" class="">
                                                                        
                                                                    </select>
                                                                </div>

                                                                <div class="col s12 input-field">
                                                                    <i class="ion-contrast prefix small dmp-main-color"></i>
                                                                    <input type="number" name="perc_insurance" id="perc_insurance" min="0" max="100"/>
                                                                    <label for="perc_insurance">% Assur</label>
                                                                </div>

                                                                <div class="col s12 input-field">
                                                                    <h6>Part Assurance</h6>
                                                                    <i class="ion-cash prefix small dmp-main-color"></i>
                                                                    <input type="number" class="" name="amount_insurance_cash" id="amount_insurance_cash" disabled />
                                                                    <label for="amount_insurance_cash"></label>
                                                                </div>
                                                                <div class="col s12">
                                                                    <div class="col s6 input-field">
                                                                        <h6>Part Assuré</h6>
                                                                        <i class="ion-cash prefix small dmp-main-color"></i>
                                                                        <input type="number" class="" name="amount_insurered" id="amount_insurered_cash" disabled />
                                                                        <label for="amount_insurered_cash"></label>
                                                                    </div>
                                                                    <div class="col s6 input-field">
                                                                        <h6>Mnt Versé</h6>
                                                                        <i class="ion-cash prefix small dmp-main-color"></i>
                                                                        <input type="number" class="" name="amount_insurered_vers" id="amount_insurered_vers"/>
                                                                        <label for="amount_insurered_vers"></label>
                                                                    </div>
                                                                </div>
                                                          </div>

                                                          <div class="col s12 payment-method-wrapper" id="reservation-payment-wrapper">
                                                            <h6 class="dmp-main-color bold">Réservation</h6>
                                                            <div class="col s12 input-field">
                                                                <h6>Date rdv</h6>
                                                                <i class="ion-calendar prefix small dmp-main-color"></i>
                                                                <input type="date" class="" required name="booking_reference" id="booking_reference"/>

                                                                <h6>Heure rdv</h6>
                                                                <i class="ion-ios-time prefix small dmp-main-color"></i>
                                                                <input type="time" class="" required name="booking_reference_time" id="booking_reference_time"/>
                                                            </div>
                                                          </div>

                                                          <div class="col s12 payment-method-wrapper" id="bank-payment-wrapper">
                                                            <h6 class="dmp-main-color bold">Banque</h6>
                                                            <div class="col s12 input-field">
                                                                <i class="ion-information-circled prefix small dmp-main-color"></i>
                                                                <input type="text" class="" name="bank_reference" id="bank_reference"/>
                                                                <label for="bank_reference">Référence</label>
                                                            </div>
                                                          </div>

                                                        <div class="col s12 payment-method-wrapper" id="credit-payment-wrapper">
                                                            <h6 class="dmp-main-color bold">Echelonnement</h6>
                                                        
                                                        <div class="col s12">
                                                            <div class="col s6 input-field">
                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                <input type="number" class="multiple_payment" name="multiple_payment[]" id="first_payment"/>
                                                                <label for="first_payment" class="active">1er Vers</label>
                                                            </div>

                                                            <div class="col s6 input-field">
                                                                <h6>Date de règlement</h6>
                                                                <input type="date" class="multiple_payment_date" name="multiple_payment_dates[]" id="first_payment_date"/>
                                                            </div>  
                                                        </div>

                                                        <div class="col s12">
                                                            <div class="col s6 input-field">
                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                <input type="number" class="multiple_payment" name="multiple_payment[]" id="second_payment"/>
                                                                <label for="second_payment" class="active">2e Vers</label>
                                                            </div>

                                                            <div class="col s6 input-field">
                                                                <h6>Date de règlement</h6>
                                                                <input type="date" class="multiple_payment_date" name="multiple_payment_dates[]" id="second_payment_date"/>
                                                            </div>  
                                                        </div>

                                                        <div class="col s12">
                                                            <div class="col s6 input-field">
                                                                <i class="ion-cash prefix small dmp-main-color"></i>
                                                                <input type="number" class="multiple_payment" name="multiple_payment[]" id="last_payment"/>
                                                                <label for="last_payment">3e Vers</label>
                                                            </div>

                                                            <div class="col s6 input-field">
                                                                <h6>Date de règlement</h6>
                                                                <input type="date" class="multiple_payment_date" name="multiple_payment_dates[]" id="last_payment_date"/>
                                                            </div>  
                                                        </div>
                                                         
                                                         </div>

                                                      </div>
                                                </div>

                                               

                                              <div class="col s12">
                                                  <p class="dmp-info-bubble bold" style="margin-top:55px !important;"> 
                                                          <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                                                          Le montant de la consultation est exprimé en FCFA (XOF) , le numéro du ticket de caisse est fonction de l'établissement où la consultation est éffectuée.
                                                  </p>                     
                                              </div>                        
                                   </div>
                          
                       </div>
                        <?= $this->Form->end() ?>
                </div>
                  <div class="row hidden" id="loader-wrapper">
                    <div class="container">
                          <div class="progress">
                              <div class="indeterminate"></div>
                          </div>
                        <span class="dmp-main-color">Enregistrement en cours</span>
                    </div>
                  </div>
          </div>
    </div>

    <div class="modal-footer dmp-main-back white-text">
      <span class="waves-effect waves-blue btn-flat white bold dmp-main-color left" id="validator-visit-register">Valider</span>
      <span class="modal-action modal-close waves-effect waves-red btn-flat white bold dmp-main-color right" id="cancel-visit-register">Annuler</span>
    </div>
  </div>


  <script>
  $('.trigger-payment-method').on('click',function(){
      if($(this).attr('id')==="payment4")
      {
        $('#montant').removeClass('required');
        $('#montant-wrapper').addClass('hidden');
      }
      else
      {
        $('#montant').addClass('required');
        $('#montant-wrapper').removeClass('hidden');
      }

  });
  $('#about-dmp-info').on('click',function(){
      $('#about-dmp').openModal();
  });
</script>