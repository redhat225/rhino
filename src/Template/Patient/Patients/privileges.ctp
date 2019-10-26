<div class="col l2 m2 s2 center" id="side-control-panel">
        
    <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">

            <li class="item-selected-reference" reference="active-privilege-wrapper" style="border-top:1px solid white;"><a href="#!"><i class="ion-ios-bookmarks white-text small"></i>Privileges Actifs</a></li>
            <li class="item-selected-reference" reference="setting-privilege-wrapper" ><a href="#!"><i class="ion-ios-bookmarks-outline white-text small"></i>Accorder Privilège</a></li> 

            <li class="item-selected-reference" reference="log-privilege-wrapper"><a href="#!"><i class="ion-ios-copy small"></i>Journal</a></li>
            <li><a href="/patient/patients/view"><i class="ion-skip-backward white-text small"></i>Retour</a></li> 
            <li style="border-bottom:1px solid white;"><a href="/patient/patients/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
    </ul>
</div> 

<div class="col l10 m10 s10 info-dmp-container">

    <div class="row center zero-margin">
        <i class="ion-bookmark accc-huge-icon dmp-main-color"></i>
        <h4 class="bold zero-margin dmp-main-color">Privilèges</h4>
        <h6 class="bold dmp-grey-text">Activez, désactivez des privilèges actifs, consulter votre journal de privilèges</h6>
    </div>


    <div class="row information-wrapper" id="active-privilege-wrapper">
            <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
            <i class="ion-ios-bookmarks dmp-main-color medium"></i> Privilèges actifs</h5>
            <div class="row extensiveTable" style="height:340px;">   
              <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
                    <thead class="dmp-main-back blue-text">
                        <th><?= __('Photo') ?></th>
                        <th><?= __('Praticien') ?></th>
                        <th><?= __('Date Initialisation') ?></th>
                        <th><?= __('Validité (jours)') ?></th>
                        <th><?= __('Date Expiration') ?></th>
                         <th><?= __('Durée Avant Expiration') ?></th>
                        <th><?= __('Tracking Code') ?></th>
                        <th><?= __('Action') ?></th>
                    </thead>
                    <tbody>
                        <?php  foreach ($privileges as $privilege) :?>
                            <?php   
                                    $privilege_created = new \DateTime($privilege->created);
                                    $privilege_expired = new \DateTime($privilege->created." + ".$privilege->delay."days");

                                    $result_diff_date = $privilege_expired->diff(new \DateTime('NOW'));
                             ?>
                            <?php if(($privilege->abort===0) && ($result_diff_date->format("%R")==="-")) :?>

                            <tr class="dmp-grey-text">
                                <td>
                                    <?php if($privilege->doctor->person->pic!==null) :?>
                                        <?php $url="doctor/doctors-identity/".$privilege->doctor->person->path_pic; ?>
                                        <?= $this->Html->image($url,['style'=>'width:80px;']) ?>
                                    <?php else : ?>
                                        <i class="ion-ios-contact-outline dmp-main-color medium"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?= "Dr. ".$privilege->doctor->person->lastname." ".$privilege->doctor->person->firstname ?></td>
                                <td><?= $privilege_created->format("d-m-Y H:i:s") ?></td>
                                <td><?= $privilege->delay ?></td>
                                <td><?= $privilege_expired->format("d-m-Y H:i:s") ?></td>
                                <td><?= $result_diff_date->format("%R %d jour(s) %Hh:%imn");?></td>
                                <td><?= $privilege->tracking_code ?></td>
                                <td>
                                     <a href="#!" class="btn dmp-main-back dropdown-button" data-activates="menu-notifications-<?= $privilege->id ?>" style="padding:3px;" data-constrainwidth="false" data-gutter="30"><i class="ion-android-menu white-text" style="font-size:1.8rem;" ></i></a>
                                     <ul class="dropdown-content" id="menu-notifications-<?= $privilege->id ?>">
                                       <li style="width:190px !important; text-align:left;" ><a href="#!" line-value="<?= $privilege->id ?>" class="dmp-grey-text increase-piod-validity">augmenter la periode</a></li>
                                       <li style="width:190px !important; text-align:left;" ><a href="#!" diary-id="<?= $privilege->id ?>" class="dmp-grey-text revok-privilege-validity">Révoquer le privilege</a>
                                       </li>
                                     </ul>                                    
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
             </table>
        </div>      
    </div>



    <div class="row information-wrapper" id="setting-privilege-wrapper">
            <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
            <i class="ion-ios-bookmarks-outline dmp-main-color medium"></i> Accorder des Privilèges</h5>

            <div class="row">
                <div class="col s6 input-field">
                    <i class="ion-chatbubble-working dmp-main-color small prefix"></i>
                    <input type="text" name="search-doctor-privilege" id="search-doctor-privilege" />
                    <label for="seach-doctor-privilege">Mots clé(s)</label>
                </div>
            </div>

            <div class="row extensiveTable" style="height:340px;">   
               <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
                    <thead class="dmp-main-back blue-text">
                        <th><?= __('Photo') ?></th>
                        <th><?= $this->Paginator->sort('People.lastname','Nom') ?></th>
                        <th><?= $this->Paginator->sort('People.firstname','Prénom(s)') ?></th>
                        <th><?= __('Spécialités') ?></th>
                        <th><?= __('Contact 1') ?></th>
                        <th><?= __('Contact 2') ?></th>
                        <th><?= __('Actions') ?></th>
                    </thead>
                    <tbody>
                      <?php foreach ($doctors as $doctor) :?>
                            <tr doctor-id="<?= $doctor->id ?>" class="doctor-item-search dmp-grey-text" tag="<?= $doctor->person->lastname." ".$doctor->person->firstname?>">
                            <?php if($doctor->avatar_doctor) :?>
                                <td>
                                    <?= $this->Html->image('doctor/doctor_identity/'.$doctor->avatar_doctor,['style'=>'width:75px;']) ?>
                                </td>
                            <?php else: ?>
                                <td><i class="ion-ios-contact-outline medium dmp-main-color"></i></td>
                            <?php endif; ?>
                                <td><?= h($doctor->person->lastname) ?></td>
                                <td><?= h($doctor->person->firstname) ?></td>
                                <td>
                                    <?php foreach ($doctor->doctor_specialities as $speciality) :?>
                                           <?= $speciality->label_doctor_speciality ?> <br/> 
                                    <?php endforeach; ?>
                                </td>
                                <td><?= h($doctor->person->people_contact->contact1) ?></td>
                                <td><?= h($doctor->person->people_contact->contact2) ?></td>

                                <td>
                                    <a href="#" data-activates="trigger-privilege-doctor-<?= $doctor->id ?>" data-beloworigin="true" data-constrainwidth="false" class="btn white dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>
                                    <ul id="trigger-privilege-doctor-<?= $doctor->id ?>" class="dropdown-content">
                                        <li class="setting-privilege-trigger"><a href="#!" class="dmp-grey-text">Accorder Privilège</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </td>
                            </tr>
                      <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
    </div>




    <div class="row information-wrapper" id="log-privilege-wrapper">
       <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
       <i class="ion-ios-copy dmp-main-color medium"></i>Journal</h5>
        <div class="row extensiveTable" style="height:340px;">   
               <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
                    <thead class="dmp-main-back blue-text">
                        <th><?= __('Photo') ?></th>
                        <th><?= __('Praticien') ?></th>
                        <th><?= __('Date Initialisation') ?></th>
                        <th><?= __('Validité (jours)') ?></th>
                        <th><?= __('Date Expiration') ?></th>
                        <th><?= __('Tracking Code') ?></th>
                        <th><?= __('Status') ?></th>
                    </thead>
                    <tbody>
                        <?php  foreach ($privileges as $privilege) :?>
                            <?php   
                                    $privilege_created = new \DateTime($privilege->created);
                                    $privilege_expired = new \DateTime($privilege->created." + ".$privilege->delay."days");
                             ?>
                            <tr class="dmp-grey-text">
                                <td>
                                    <?php if($privilege->doctor->person->pic!==null) :?>
                                        <?php $url="doctor/doctors-identity/".$privilege->doctor->person->path_pic; ?>
                                        <?= $this->Html->image($url,['style'=>'width:80px;']) ?>
                                    <?php else : ?>
                                        <i class="ion-ios-contact-outline dmp-main-color medium"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?= "Dr. ".$privilege->doctor->person->lastname." ".$privilege->doctor->person->firstname ?></td>
                                <td><?= $privilege_created->format("d-m-Y H:i:s") ?></td>
                                <td><?= $privilege->delay ?></td>
                                <td><?= $privilege_expired->format("d-m-Y H:i:s") ?></td>
                                <td><?= $privilege->tracking_code ?></td>
                                <?php if($privilege->abort===0) :?>
                                <td><?php $result_diff_date = $privilege_expired->diff(new \DateTime('NOW'));  
                                    if($result_diff_date->format("%R")==="-") echo "Actif"; else echo "Expiré";
                                ?></td>
                                <?php else: ?>
                                    <td><?= h("Révoqué") ?></td>
                                <?php endif; ?>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
             </table>
        </div>       
    </div>

    <!-- Setting Privilege -->
  <div id="setting-privilege-box-info" class="modal modal-fixed-footer" style="width:30% !important;">
    <div class="modal-content">
      <div class="row center zero-margin" id="setting-privilege-form-wrapper">
          <div class="container">
                    <?= $this->Form->create(null,['id'=>'form-setting-privilege']) ?>
                        <i class="ion-bookmark dmp-main-color medium "></i>
                        <h5 class="dmp-grey-text zero-margin">Définir Privilege</h5> 
                        <div class="col s12 input-field" style="margin-top:25px;">
                            <h6 class="dmp-main-color" style="text-align:left;">Période(jours)</h6>
                            <i class="ion-android-stopwatch dmp-main-color smal prefix"></i>
                            <input type="number" name="validity" id="validity" class="required" min="1" max="10"/>
                            <label for="validity"></label>
                            <p class="dmp-grey-text right-align" style="border:1.9px dashed red; padding:5px;"><i class="ion-android-alert small red-text left" style="padding:8px;"></i> La période est comprise entre 1 et 10 jours</p>
                        </div>
                        <input type="hidden" id="doctor_id_setting_privilege" name="doctor_id_setting_privilege">   
                    <?= $this->Form->end() ?>  
          </div>
      </div>

        <div class="row center hidden" id="loader-privilege-modal">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                <span class="dmp-grey-text">Enregistrement en cours</span>
            </div>

    </div>
      <div class="modal-footer dmp-main-back white-text">
          <a href="#!" id="confirm-setting-privilege" class="waves-effect waves-green btn-flat left white dmp-main-color bold">Valider</a>
          <a href="#!" id="cancel-setting-privilege" class="modal-action modal-close waves-effect waves-red btn-flat right white dmp-main-color bold">Annuler</a>
      </div>
  </div>
    

  <!-- Increase Period -->
  <div id="increase-box-info" class="modal modal-fixed-footer" style="width:35%;">
    <div class="modal-content">
      <div class="row center zero-margin" id="increase-period-form-wrapper">
          <div class="container">
              <div class="container">
                    <?= $this->Form->create(null,['id'=>'form-increase-validity']) ?>
                     <i class="ion-android-stopwatch dmp-main-color medium"></i>
                     <h5 class="dmp-grey-text zero-margin">Veuillez définir le quotient à incrémenter</h5> 
                        <div class="col s12 input-field" style="margin-top:25px;">
                            <h6 class="dmp-main-color" style="text-align:left;">Période</h6>
                            <i class="ion-android-stopwatch dmp-main-color smal prefix"></i>
                            <input type="number" name="validity_increase" id="validity_increase" class="" />
                            <label for="validity"></label>
                        </div>
                        <input type="hidden" id="diary_id_increase" name="diary_id_increase">  
                    <?= $this->Form->end() ?>  

                
              </div>

          </div>
            <div class="col s12 center zero-padding">
                <p class="dmp-grey-text left-align" style="border:1.9px dashed red; padding:5px;"><i class="ion-android-alert small red-text left" style="padding:2px;"></i> La période à incrémenter est comprise entre 1 et 10 jours <br> Si vous définissez une valeur entrainant l'invalidité du privilège vous devriez en définir un nouveau.</p>                       
            </div>
      </div>

        <div class="row center hidden" id="loader-increase-privilege-modal">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                <span class="dmp-grey-text">Enregistrement en cours</span>
        </div>

    </div>
      <div class="modal-footer dmp-main-back white-text">
          <a href="#!" id="confirm-increase-validity" class="waves-effect waves-green btn-flat left white dmp-main-color bold">Valider</a>
          <a href="#!" id="cancel-increase-validity" class="modal-action modal-close waves-effect waves-red btn-flat right white dmp-main-color bold">Annuler</a>
      </div>
  </div>

    <!-- Turn OFF Privilege -->
  <div id="turn-off-box-info" class="modal modal-fixed-footer" style="width:35%;">
    <div class="modal-content">
      <div class="row center zero-margin" id="revok-privilege-form-wrapper">
          <div class="container">
                     <div class="col s12 center">
                            <p class="bold left-align" style="border:2.2px dashed red; padding:10px;"> 
                                <i class="ion-android-warning medium red-text left" style="margin-top: 40px;margin-bottom:79px;"> </i>
                             Etes-vous sûre de vouloir effectuer cette action? les privilèges de consultation pour ce medecin seront révoqués et vous aurez besoin d'initialiser de nouveaux privilèges de consultation ultérieurement après cette action.
                            </p>                         
                     </div>
                    <input type="hidden" name="force_off" id="force_off">
          </div>
      </div>

        <div class="row center hidden" id="loader-remove-privilege-modal">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                <span class="dmp-grey-text">Enregistrement en cours</span>
        </div>

    </div>
      <div class="modal-footer dmp-main-back white-text">
          <a href="#!" id="confirm-turnoff-privilege" class="waves-effect waves-green btn-flat left white dmp-main-color bold">Valider</a>
          <a href="#!" id="cancel-turnoff-privilege" class="modal-action modal-close waves-effect waves-red btn-flat right white dmp-main-color bold">Annuler</a>
      </div>
  </div>


</div>

<?= $this->Html->script('Red/patient/patients/privilege',['block'=>true]) ?>
