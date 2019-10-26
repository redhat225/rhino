<div class="col l2 m2 s2 center" id="side-control-panel">

    <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">
        
       <li style="border-bottom:1px solid white;border-top:1px solid white;"><a href="/manager/manager-operators/general"><i class="ion-android-home small"></i><span>Ecran de bord</span></a>
       </li>
    </ul>
</div>


<div class="col l10 m10 s10 info-dmp-scrollable-container zero-margin">
        <div class="row center lh-1">
              <i class="ion-android-add-circle pink-text medium"></i>
              <i class="ion-folder dmp-main-color accc-huge-icon"></i>
              <h4 class="zero-margin dmp-main-color">Formulaire enregistrement nouvelle visite</h4>
         </div>
      

      <div class="container accc-row-padding">
         <?= $this->Form->create(null,['class'=>'admin-form dash-form','id'=>'form-visits-add']) ?>

          <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                <i class="ion-ios-person dmp-main-color medium"></i> Patient</h5>

            <div class="row"> 
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
                    
                    <div class="col s12"> 
                        <p style="padding:10px; border:1.5px dashed blue;font-weight:bold;">Entrez l'un des deux contacts lors de l'enregistrement du patient dans le fichier du dossier médical personnel <br> *La case à cocher "Patient Anonyme" convient dans des cas où le patient est non identifié dans le fichier du système par exemple.</p>
                    </div>
                      
                  
                      
                  </div>
                  <div class="col s12 hidden center" id="patient_search_result_wrapper"> 
                      <div class="card-panel orange lighten-4">
                          <div class="row" id="description-patients-found"> 
                            <div class="col s3 center" id="pics-patients-found">
                              <img src="" style="width:100%;">
                            </div>
                            <div class="col s9 bold" id="identity-patients-found"  style="border-left:1.7px solid white;">  
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

  
           <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;" id="myIsam">
                <i class="ion-ios-information-outline dmp-main-color medium"></i> Renseignements cliniques </h5>
                  <div class="row" id="type-visit-wrapper">
                          <div class="col s4">
                              <h6 class="bold dmp-main-color">Definissez le type de dossier</h6>
                              <select name="visit_type_id" id="visit_type_id" class="required materialize-textarea" literal-name="Type de dossier">
                                <option value="">Veuillez sélectionner un type</option>
                                <?php foreach ($visit_types as $type) :?>
                                  <option value="<?= $type->id  ?>"><?= $type->label ?></option>
                                <?php endforeach; ?>
                              </select>                           
                          </div>

                          <div class="col s4">
                            <h6 class="bold dmp-main-color">Mode d'arrivé</h6>
                            <select name="visit_kind_transport_id" id="visit_kind_transport_id" class="required materialize-textarea" literal-name="Mode d'arrivée">
                                <option value="">Veuillez définir une valeur</option>
                                <?php foreach ($visit_kind_transports as $transport) :?>
                                  <option value="<?= $transport->id  ?>"><?= $transport->label ?></option>
                                <?php endforeach; ?>
                            </select>
                           </div>

                            <div class="col s4">
                                      <h6 class="bold dmp-main-color">Etat du Patient</h6>
                                      <select name="visit_level_id" id="visit_level_id" class="required materialize-textarea" literal-name="Etat du patient">
                                        <option value="">Veuillez sélectionner un etat</option>
                                          <?php foreach ($visit_levels as $level) :?>
                                            <option value="<?= $level->id  ?>"><?= $level->label ?></option>
                                          <?php endforeach; ?>
                                      </select>
                            </div>
                          
                    </div> 

                    <div class="row" id="info-visit-wrapper">
                          <div class="col s6 input-field">
                             <i class="prefix dmp-main-color small ion-ios-medical"></i>
                             <input type="text" name="visit_motif" id="visit_motif" length="100" class="required">
                             <label for="visit_motif">Motif d'Entrée</label>
                          </div>
                          <div class="col s6 input-field">
                             <i class="prefix dmp-main-color small ion-ios-grid-view"></i>
                             <input type="text" name="visit_specialities" id="visit_specialities" length="100" data-activates="dropdown-specialities" class="dropdown-button required" data-beloworigin="true" autocomplete="off" placeholder="veuillez définir la spécialité reliée au dossier">

                             <label for="visit_specialities"></label>

                             <ul id="dropdown-specialities" class="dropdown-content">
                               <?php foreach ($visit_specialities as $speciality) :?>
                                  <li class="item-visit-speciality" speciality-id="<?= $speciality->id ?>" speciality-label="<?= $speciality->libelle ?>" speciality-alias="<?= $speciality->alias ?>"><a href="#!"><?= $speciality->libelle ?></a></li>
                                <?php endforeach; ?>
                             </ul>
                             <input type="hidden" name="visit_speciality_id" id="visit_speciality_id" class="visit_hidden_input">
                             <input type="hidden" name="visit_speciality_alias" id="visit_speciality_alias" class="visit_hidden_input">
                          </div>
                    </div>

              <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                <i class="ion-ios-medkit dmp-main-color medium"></i> Actes Médicaux </h5>
                    <div class="row center" id="medical-acts-wrapper">   
                        <span class="bold">Voulez-vous définir des actes médicaux ?</span> 

                       <div class="switch" id="acts-medical-turn">
                        <label>Non<input type="checkbox"><span class="lever"></span>Oui</label>
                       </div>

                        <div class="row hidden" id="medical-acts-table">    
                          <table class="MyTable striped bordered bold centered table-space acc-medium-top-margin" cellpadding="0" cellspacing="0" id="antecedents-adding-content-table-wrapper">
                             <thead class="dmp-main-back blue-text">
                                    <th class="add-act-item-trigger zero-padding"><i class="ion-plus-circled white-tex small pointer-opaq"></i></th>
                                    <th class="zero-padding"><?= __('Acte') ?></th>
                                    <th class="zero-padding"><?= __('Renseignements complémentaires') ?></th>
                                    <th class="zero-padding"><?= __('Retirer item') ?></th>
                                </thead>   
                                <tbody id="acts-adding-content">
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>  
              
              <div class="container center">
                      <div class="container">
                           <button class="btn dmp-main-back white-text left" type="submit">Créer</button>
                           <button class="btn red white-text right" type="reset">Annuler</button>
                           <?= $this->Form->end() ?>     
                      </div>
              </div>
       
          <?= $this->Form->end() ?>
   </div>




    </div>


  <!--Confirmation Box -->
  <div id="confirm-signin-patient" class="modal white center-align">
        <div class="modal-content">
          <div class="container">
              <p class="dmp-info-bubble bold" style="margin-top:15px !important; border: 2px dashed red !important;"> 
                  <i class="ion-android-warning medium red-text left" style="margin-bottom: 25px;"> </i>
                    La confirmation de l'inscription empêchera toute modification ultérieure de votre part. Voulez-vous continuer? 
              </p>  
          </div>

        </div>
        <div class="modal-footer dmp-main-back center">
            <a href="#!" class="left modal-action white-text modal-close waves-effect btn-flat bold" id="submit-signin-patient-trigger">Valider</a>
            <a href="#!" class="right modal-action white-text modal-close waves-effect btn-flat bold">Annuler</a>
        </div>
      
  </div>


<?php $this->Html->script('Red/manager/manager_visit_create',['block'=>true]) ?>