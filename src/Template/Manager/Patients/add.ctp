<?php $this->layout('blank'); ?>
<style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
  </style>
<div class="col l12 m12 s12 zero-margin" id="patient-signin-wrapper" style="padding-top:0px; height:1100px; overflow:auto;">
    <div class="row" style="margin:0px 70px;">
        <?= $this->Form->create(null,['id'=>'form-sigin-patient','enctype'=>'multipart/form-data','url'=>'/manager/patients/add','type'=>'POST']) ?>

      <div class="row">
          <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:10px;">
                    <i class="ion-card dmp-main-color medium"></i> Identité</h5>
          <div class="col s3 tooltipped pointer-opaq" data-tooltip='la taille ne devrait pas dépasser 8MB et devra être impérativemenent aux formats png, jpg, jpeg' data-delay='5s' id="patient_identity_wrapper">
              <div class="file-field input-field">
                 <div class="">
                          <p class="center pointer-opaq dmp-main-back" id="image_previews" style="border:2px dashed white;">
                            <i class="ion-ios-contact-outline white-text large"></i>
                         </p>
                         <span class="dmp-main-color bold">Description</span>
                         <input type="file" name="patient_identity" class="required" accept="image/*">
                 </div>
                 <div class="file-path-wrapper">
                        <input class="file-path validate file-path-identity" type="text">
                  </div>
              </div>
          </div>
          <div class="col s9">
             <div class="col s12">  
                 <p class="situation-declaration-signin">  
                      <h6 class="bold dmp-main-color">Civilité</h6>
                      <input type="radio" name="civilite-signin" class="civilite-radio-select" value="Mr" id="civilite-mr">
                      <label for="civilite-mr" class="dmp-main-color bold">Mr</label>

                      <input type="radio" name="civilite-signin" class="civilite-radio-select" value="Mlle" id="civilite-mlle">
                      <label for="civilite-mlle" class="dmp-main-color bold">Mlle</label>

                      <input type="radio" name="civilite-signin" class="civilite-radio-select" value="Mme" id="civilite-mme">
                      <label for="civilite-mme" class="dmp-main-color bold">Mme</label>
                 </p>   
             </div>
              <div class="col s12">   
                <div class="input-field col s6 name-patient-input-area">
                  <i class="ion-android-person small prefix dmp-main-color"></i>
                  <input type="text" id="lastname" name="lastname" class="required name-input-patient-signin" style="text-transform:uppercase;">
                  <label for="lastname" class="bold active"  data-error="invalide" data-success="correct" length="30">Nom</label>
                </div>

                <div class="input-field col s4 hidden" id="name-young-girl">
                  <i class="ion-android-person small prefix dmp-main-color"></i>
                  <input type="text" id="lastname_young" name="lastname_young" class="" style="text-transform:uppercase;">
                  <label for="lastname_young" class="bold active"  data-error="invalide" data-success="correct" length="30">Nom de jeune fille</label>
                </div>

                <div class="input-field col s6 name-patient-input-area">
                  <i class="ion-android-person small prefix dmp-main-color"></i>
                  <input type="text" id="firstname" name="firstname" class="required name-input-patient-signin" style="text-transform:uppercase;">
                  <label for="firstname" class="bold active"  data-error="invalide" data-success="correct" length="100">Prenom(s)</label>
                </div>
              </div> 

              <div class="col s12">
                 <p class="situation-declaration-signin">  
                      <h6 class="bold dmp-main-color">Sexe Descendant</h6>
                      <input type="radio" name="sexe-descendant" class="descendant-sexe-radio-select" value="M" id="sexe-descendant-mr">
                      <label for="sexe-descendant-mr" class="dmp-main-color bold">Homme</label>

                      <input type="radio" name="sexe-descendant" class="descendant-sexe-radio-select" value="F" id="sexe-descendant-mlle">
                      <label for="sexe-descendant-mlle" class="dmp-main-color bold">Femme</label>
                 </p> 
                <div>
                    <div class="input-field col s6">
                        <i class="ion-android-person small prefix dmp-main-color"></i>
                        <input type="text" id="nom_descendant" name="nom_descendant" class="descendant-infos" style="text-transform:uppercase;">
                        <label class="active bold" for="nom_descendant" data-error="invalide" placeholder="(optionnel)" data-success="correct" length="30">Nom descendant</label>
                    </div>

                  <div class="input-field col s6">
                    <i class="ion-android-person small prefix dmp-main-color"></i>
                    <input type="text" id="prenom_descendant" name="prenom_descendant" placeholder="(optionnel)" class="descendant-infos" style="text-transform:uppercase;">
                    <label class="active bold" for="prenom_descendant" class="bold"  data-error="invalide" data-success="correct" length="100">Prenom(s) descendant</label>
                  </div>
                </div>        
              </div>
        
              <div class="col s12">   
                <div class="input-field col s6">
                  <h6 class="dmp-main-color bold">Date de naissance</h6>
                  <i class="ion-android-calendar dmp-main-color smal prefix"></i>
                  <input type="date" name="dateborn" id="dateborn" class="active"/>
                </div>

                <div class="input-field col s6">
                  <h6 class="dmp-main-color bold">Lieu de naissance</h6>
                  <i class="ion-ios-location small prefix dmp-main-color"></i>
                  <input type="text" name="bornplace" id="bornplace" class="required" style="text-transform:uppercase;">
                </div>
              </div>
 
                <div class="input-field col s12">
                    <select name="nationality" id="nationality" class="required">
                          <option value="" selected>Selectionnez</option>
                      <?php foreach ($countries as $country) :?>
                          <option value="<?= $country->country_called_name ?>"><?= $country->label_country.' - '.$country->country_called_name ?></option>
                      <?php endforeach; ?>
                    </select>
                    <label for="nationality" class="bold"  data-error="invalide" data-success="correct">Nationalité</label>
                </div>


              <div class="col s12">     
                  <div class="input-field col s6">
                    <i class="ion-briefcase small prefix dmp-main-color"></i>
                    <input type="text" name="emploi" id="emploi" placeholder="(optionnel)" class="patient_work_info" style="text-transform:uppercase;">
                    <label for="emploi" class="bold active"  data-error="invalide" data-success="correct">Emploi/Activité</label>
                  </div>
                  <div class="col s6 input-field">
                        <i class="ion-briefcase small prefix dmp-main-color"></i>
                        <input type="text" name="emploi-provider" id="emploi-provider" placeholder="(optionnel)" class="patient_work_info" style="text-transform:uppercase;">
                        <label for="emploi-provider" class="bold active"  data-error="invalide" data-success="correct">Nom de la société</label>
                  </div>
              </div>

          </div>
      </div>


    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-levels dmp-main-color medium"></i> Status </h5>
        <div class="col s12">
            <div class="col s6 input-field">
                <select name="status" id="status" class="required">    
                        <option value="">Veuillez sélectionner une valeur</option>
                        <option value="C">Célibataire</option>
                        <option value="M">Marié(e)</option>
                        <option value="D">Divorcé(e)</option>
                        <option value="V">Veuf(ve)</option>
               </select>
               <label for="status" class="bold"  data-error="invalide" data-success="correct">Situation maritale</label>
            </div>
            <div class="col s6 input-field">
               <i class="ion-happy small prefix dmp-main-color"></i>
               <input type="number" name="children" id="children" class="">
               <label for="children" class="bold"  data-error="invalide" data-success="correct">Nombre d'enfants</label> 
            </div>
        </div>

    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-ios-body dmp-main-color medium"></i> Caractéristiques Physiques </h5>
        <div class="row">
                <div class=" input-field col s6">
                       <i class="ion-man small prefix dmp-main-color"></i>
                       <input type="number" name="taille" id="taille" class="required">
                       <label for="taille" class="bold"  data-error="invalide" data-success="correct">Taille</label>
               </div>
               <div class="input-field col s6"> 
                       <select name="peau" id="peau" class="required">    
                                <option value="">Veuillez sélectionner une valeur</option>
                                <option value="noir">noir</option>
                                <option value="blanc">blanc</option>
                                <option value="claire">claire</option>
                                <option value="rouquine">rouquine</option>
                                <option value="autre">autre</option>
                       </select>
                       <label for="peau" class="bold"  data-error="invalide" data-success="correct">Couleur de peau</label>
                </div>
        </div>
    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-android-home dmp-main-color medium"></i> Adresse & Contacts </h5>

        <div class="col s12">   
            <div class="input-field col s4">   
                    <select name="adress-city" id="adress-city" class="required">
                          <option value="" selected>Selectionnez</option>
                            <?php foreach ($countries[0]->country_cities as $city) :?>
                                  <option value="<?= $city->id ?>"><?= $city->label_city ?></option>
                            <?php endforeach; ?>
                    </select>
                    <label for="adress-city" class="bold"  data-error="invalide" data-success="correct">Ville</label>
            </div>
            <div class="input-field col s4"> 
                    <select name="adress-city-township" id="adress-city-township" class="required">
                          <?php foreach ($countries[0]->country_cities as $city):?>
                                      <option value="" selected>Selectionnez</option>
                              <?php foreach ($city->country_townships as $township):?>
                                      <option value="<?= $township->id ?>" data-linked-city='<?= $township->country_city_id ?>'><?= $township->label_township ?>
                                      </option>
                              <?php endforeach; ?>
                          <?php endforeach; ?>
                    </select>
                    <label for="adress-city" class="bold"  data-error="invalide" data-success="correct">Ville</label>
            </div>

            <div class="input-field col s4"> 
               <i class="ion-ios-location-outline small prefix dmp-main-color"></i>
               <input type="text" name="quartier" id="quartier" class="required" style="text-transform:uppercase;">
               <label for="quartier" class="bold"  data-error="invalide" data-success="correct">Quartier</label>
            </div>
        </div>

        <div class="col s12">   
            <div class="input-field col s6"> 
               <i class="ion-ios-telephone small prefix dmp-main-color"></i>
               <input type="tel" name="contact1" placeholder="+225" id="contact1" class="required">
               <label for="contact1" class="bold"   data-error="invalide" data-success="correct">contact1</label>
            </div>

            <div class="input-field col s6"> 
               <i class="ion-ios-telephone small prefix dmp-main-color"></i>
               <input type="tel" name="contact2" placeholder="+225" id="contact2">
               <label for="contact2" class="bold"  data-error="invalide" data-success="correct">contact2(optionnel)</label>
            </div>
        </div>  

      <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                    <i class="ion-cube dmp-main-color medium"></i> Compte </h5>
        <div class="row">
           <div class="col s8">
                  <div class="col s8 input-field">
                      <i class="ion-android-person small prefix dmp-main-color"></i>
                      <input type="text" name="username" id="username" class="required autocomplete">
                      <label for="username" class="bold"  data-error="invalide" data-success="correct">Login</label>
                  </div>
                  <div class="col s4">
                      <i class="ion-ios-loop-strong btn dmp-main-back white-text small tooltipped" id="btn-login-generator" data-tooltip="Générer des suggestions de login" data-delay="5s" data-position="bottom" style="margin-top:30px;"></i>
                      <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-transparent',['class'=>'hidden','id'=>'loader-login-generator','style'=>'margin-top: 45px;']) ?>
                  </div>
              
          </div>

          <div class="input-field col s4">
                  <i class="ion-ios-email small prefix dmp-main-color"></i>
                  <input type="email" name="email" id="email" class="required">
                  <label for="email" class="bold"  data-error="invalide" data-success="correct">E-Mail</label>
          </div>
        </div>

        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:10px;">
              <i class="ion-android-checkmark-circle dmp-main-color medium"></i> Signature</h5>
        <div class="row">
           <div class="col s10">
              <div class="container">
                  <div class="col s12">
                      <div class="row center signature-area" id="edit_signature_patient" style="border:2px dashed #130647;">
                        <i class="ion-edit dmp-main-color large signature-picto"></i>

                      </div>
                      <input type="hidden" id="credential_patient" name="image_data_signature" class="signature_credential">
                      <input type="hidden" id="ence_credential_patient" name="raw_data_signature" class="signature_credential">
                   </div>
              </div>
           </div>

           <div class="col s2 renew-signature-wrapper">
             <span class="renew-signature btn red white-text">Réinitialiser</span>
           </div>


        </div>

        <div class="container center">
                <div class="container">
                     <?= $this->Form->button(__('Créer'),['class'=>'btn dmp-main-back hidden','id'=>'submit-signin-patient']) ?>
                        
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


<?= $this->Html->script('Red/manager/manage-patients-signin') ?>