<div class="col l2 m2 s2 center" id="side-control-panel">
  
<!-- Patient Infos -->
  <li style="list-style-type:none; border-bottom:1px solid white;">     
               <?php if($patient->person->path_pic==null) :?>
                  <a href="/pics/add" class="pointer">
                      <i class="ion-ios-contact-outline white-text large pointer"></i>
                 </a>
               <?php   else: ?>
                      <p style="width:210px;" class="center-align center"> 
                           <?= $this->Html->image('patient/patient_identity/'.$patient->person->path_pic) ?>
                      </p>
              <?php  endif; ?>
              <p class="center-align center">
                <span class="white-text"><?= $patient->person->lastname.' '.$patient->person->firstname ?></span>
              </p>
  </li>

  
 <h5 class="white-text" style="font-size:1.5rem;"><i class="ion-map white-text" style="margin-right:3px;"></i><?= h(__('Procédure')) ?></h5>
    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-menu-visit-add blocked" style="border-top:1px solid white;"><a href="#!"><i class="ion-android-list small"></i><span>Histoire de la maladie</span></a></li>
       <li class="item-menu-visit-add blocked"><a href="#!"><i class="ion-android-list small"></i><span>Examens</span></a></li>
       <li class="item-menu-visit-add blocked"><a href="#!"><i class="ion-android-calendar small"></i><span>Prochain Rdv</span></a></li>
       <li class="item-menu-visit-add blocked" style="border-bottom:1px solid white;"><a href="#!"><i class="ion-checkmark-round small"></i><span>Validation</span></a></li>
        <h5 class="white-text center" style="font-size:1.5rem;"><?= h(__('Actions')) ?></h5>
       <li class="put-top-border"><a href="/doctor/patients/book"><i class="ion-ios-book small"></i><span>Carnet Patient</span></a></li>
       <li class=""><a href="/doctor/patients/view"><i class="ion-android-folder-open small"></i><span>Dossier Patient</span></a></li>
       <li class=""><a href="#!"><i class="ion-android-refresh small"></i><span>Vider/Recommencer</span></a></li>
       <li style="border-bottom:1px solid white;"><a href="/doctor/doctors/general"><i class="ion-android-home small"></i><span>Ecran de bord</span></a></li>
    </ul>   
</div> 

<div class="col l10 m10 s10 info-dmp-container">
      <div class="row center lh-1">
        <i class="ion-plus-circled pink-text medium"></i>
        <i class="ion-android-map dmp-main-color accc-huge-icon"></i>
            <h4 class="zero-margin">Nouveau rendez-vous</h4>
            <h6 class="dmp-main-color bold">Veuillez définir les informations relatives à l'enregistrement d'une nouveau rendez-vous</h6>
      </div>

      <div class="row" id="visit-registering-wrapper">
        <?= $this->Form->create(null,['class'=>'admin-form dash-form','id'=>'visit-new-form']) ?>
            

            <div class="container validation-container" id="visit-registering-observations-wrapper" identifier="0">
              <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647;">
                    <i class="ion-ios-plus ion-plus-circled pink-text small"></i><i class="ion-document-text dmp-main-color medium"></i> Histoire de la maladie </h5>
                <div class="container">
                    <div class="input-field col s12">
                         <i class="ion-document-text small prefix dmp-main-color"></i>
                         <textarea id="compterendu" name="diary" class="materialize-textarea required" length="1500"></textarea>
                         <label for="compterendu" class="bold"  data-error="invalide" data-success="correct">Contenu</label>
                         <?= $this->Form->button(__('Suivant'),['class'=>'btn dmp-next-button right','type'=>'button']) ?>
                        
                        <p class="dmp-info-bubble bold" style="margin-top:150px !important;"> 
                          <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                            L'histoire de la maladie doit comprendre au minimum 10 et au maximum 1500 caractères. Certains symboles ne sont pas pris en compte comme le signe '=' , pour en savoir plus sur les symbôles non pris en charge dans les formulaires, veuillez cliquer sur le bouton ci-dessous.
                        </p>
                    </div>
                </div>
            </div>


        <div class="input-field col s12 hidden validation-container" id="visit-registering-exams-wrapper" identifier="1">
                <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; ">
                    <i class="ion-ios-plus ion-plus-circled pink-text small"></i><i class="ion-android-list dmp-main-color medium"></i> Examens</h5>

             <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="add-exams-table" style="margin-top:30px;">
                    <thead class="dmp-main-back blue-text">
                        <th><i class="ion-ios-plus ion-plus-circled white-color small pointer add-exams-item"></i></th>
                        <th><?= __('Renseignements cliniques') ?></th>
                        <th><?= __('Type') ?></th>
                        <th><?= __('Sous-Type') ?></th>
                        <th><?= __('Retirer') ?></th>
                    </thead>
                    <tbody id="exams-adding-content">

                    </tbody>
                </table>

                    <?= $this->Form->button(__('Suivant'),['class'=>'btn dmp-next-button right','type'=>'button']) ?>

                <div class="container"> 
                        <div class="container"> 
                            <p class="dmp-info-bubble bold" style="margin-top:150px !important;"> 
                            <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                                Pour ajouter une nouvel examen, cliquez sur l'icone '+'. Pour retirer une prescription(annuler), cliquez sur la croix 'x'.
                                Si des champs restent incomplets lors de l'ajout d'une nouvelle prescription, le formulaire sera invalidé.
                            </p>
                        </div>
                </div>          

            </div>


          <div class="input-field col s12 hidden validation-container" id="visit-registering-next-visit-wrapper" identifier="2">
              <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; ">
                <i class="ion-android-calendar dmp-main-color medium"></i>Prochain Rendez-vous</h5>
                          <div class="col s12 input-field" style="margin-top:25px;">
                                   <i class="ion-android-calendar dmp-main-color smal prefix"></i>
                                   <input type="date" name="next_meeting" id="next_visit" class="datepicker" />
                                   <label for="next_visit">Date prochain rdv</label>
                           </div>
                           <div class="col s12">
                              <p>
                                <input type="checkbox" id="calendar-manager" />
                                <label for="calendar-manager">Ajouter cette date à mon planning</label>
                              </p>
                           </div>
             <?= $this->Form->button(__('Suivant'),['class'=>'btn dmp-next-button right','type'=>'button']) ?> 
           </div>

            <div class="input-field col s12 hidden validation-container" id="visit-registering-validation-wrapper" identifier="3">
                <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; ">
                <i class="ion-checkmark-round dmp-main-color medium"></i> Validation </h5>

                <div class="container">
                      <div class="container center">
                          <?= $this->Form->button(__('Annuler'),['class'=>'dmp-reset-button warning-abort-visit-trigger','style'=>'padding:15px 40px 15px 40px;margin-right:70px;','type'=>'button']) ?>    
                          <?= $this->Form->button(__('Valider'),['class'=>'dmp-submit-button','style'=>'padding:15px 40px 15px 40px;']) ?>    
                          <p class="dmp-info-bubble bold" style="margin-top:15px !important;"> 
                              <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                              La validation du formulaire clos le processus d'enregistrement d'une visite, s'il advient des érreurs, les étapes concernées seront marquées en rouge dans le menu contextuel à gauche de votre écran. A noter qu'un formulaire invalidé ne peut être enregistré.
                          </p>  

                     </div>
                </div>
            </div>     
                        <?= $this->Form->end() ?>
         </div>  
      </div>



  <!--Warning Abort visit modal Box Structure -->
  <div id="warning-abort-visit-dmp" class="modal white center-align">
        <div class="modal-content">
          <div class="container">
              <p class="dmp-info-bubble bold" style="margin-top:15px !important; border: 2px dashed red !important;"> 
                  <i class="ion-android-warning medium red-text left" style="margin-bottom: 25px;"> </i>
                  L'annulation du formulaire provoquera sa destruction et une redirection vers l'interface de consultation du dossier du patient. Voulez-vous continuer? 
              </p>  
          </div>

        </div>
        <div class="modal-footer dmp-main-back center">
            <a href="/doctor/passages/view/<?php echo $passage; ?>/<?php echo $patient; ?>" class="left modal-action white-text modal-close waves-effect btn-flat bold">Valider</a>
            <a href="#!" class="right modal-action white-text modal-close waves-effect btn-flat bold">Annuler</a>
        </div>
      
  </div>

<?= $this->Html->script('Red/doctor/visit-meetings/visit-meetings',['block'=>true]) ?>