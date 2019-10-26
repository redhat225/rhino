<div class="col l2 m2 s2 center" id="side-control-panel">
        
          <li style="list-style-type:none; border-bottom:1px solid white;">     
               <?php if($patient->person->path_pic==null) :?>
                  <a href="#!" class="pointer">
                      <i class="ion-ios-contact-outline white-text large pointer"></i>
                 </a>
               <?php   else: ?>
                      <p style="width:200px;"> 
                           <?= $this->Html->image('patient/patient_identity/'.$patient->person->path_pic) ?>
                      </p>
              <?php  endif; ?>
         </li>

   <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">

        <li class="item-selected-reference" reference="visits-informations" style="border-top:1px solid white;" class="select-item-list"><a href="#!"><i class="ion-android-map small white-text"></i>Visites</a></li>

        <li class="item-selected-reference" reference="general-informations" class="select-item-list"><a href="#!"><i class="ion-information-circled small white-text"></i>Informations Générales</a></li>
        
      <li class="item-selected-reference" reference="antecedents-wrapper" class="select-item-list"><a href="#!"><i class="ion-reply-all small white-text"></i>Antecedents</a></li>

        <li class="" class="select-item-list" id='carnet-generator' id-patient='<?= $patient->id ?>'><a href="#!"><span id='loader-carnet-generator' class="hidden"><?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif') ?></span><i class="ion-ios-book small white-text" id='asset-carnet-generator'></i>Carnet Patient</a></li>


          <li style="border-bottom:1px solid white;"><a href="/doctor/doctors/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
    </ul>    

</div> 


  <div class="col l10 m10 s10 info-dmp-container">      

    <div class="row information-wrapper" id="visits-informations">
        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-android-map dmp-main-color medium"></i> Visites</h5>
       
        <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
                <thead class="dmp-main-back blue-text">
                    <th><?= __('Code visite') ?></th>
                    <th><?= __('Date Création') ?></th>
                    <th><?= __('Motif') ?></th>
                    <th><?= __('Etablissement') ?></th>
                    <th><?= __('Type') ?></th>
                    <th><?= __('Rendez-vous') ?></th>
                    <th><?= __('Interventions') ?></th>
                    <th><?= __('+Infos') ?></th>
                </thead>
                <tbody>
                <?php foreach ($visits as $visit) :?>
                    <tr class="dmp-grey-text" visit-id ="<?= $visit->id ?>">
                        <td style="padding:2px;"><?= $visit->code_visit ?></td>
                        <td style="padding:2px;"><?php $visit_created = new \DateTime($visit->created); echo $visit_created->format('d-m-Y H:i:s'); ?></td>
                        <td style="padding:2px;"><?= $visit->visit_motif ?></td>
                        <td style="padding:2px;"><?= $visit->manager_operator->institution->fullname ?></td>
                        <td style="padding:2px;"><?= $visit->visit_type->label ?></td>
                        <td style="padding:2px;"><i class="ion-ios-information dmp-main-color small pointer-opaq visit-meetings-info-trigger"></i></td>
                        <td style="padding:2px;"><i class="ion-ios-information dmp-main-color small pointer-opaq intervention-info-trigger"></i></td>
                        <td style="padding:2px;"><i class="ion-ios-information dmp-main-color small pointer-opaq more-visit-info-trigger"></i></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
        </table>

    </div>


  <div class="row information-wrapper" id="general-informations">
        
          <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
          <i class="ion-card dmp-main-color medium"></i> Identité</h5>
          <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
                  <thead class="dmp-main-back blue-text">
                      <th><?= __('Nom') ?></th>
                      <th><?= __('Prenom') ?></th>
                      <th><?= __('Sexe') ?></th>
                      <th><?= __('Lieunaiss') ?></th>
                      <th><?= __('Emploi') ?></th>
                      <th><?= __('Compagnie') ?></th>
                      <th><?= __('Ethnie') ?></th>
                      <th><?= __('Datenaiss') ?></th>
                      <th><?= __('Age') ?></th>
                      <th><?= __('Groupe Sanguin') ?></th>
                  </thead>
                  <tbody>
                      <tr>
                          <td><?= h($patient->person->lastname) ?></td>
                          <td><?= h($patient->person->firstname) ?></td>
                          <td><?= h($patient->person->sexe) ?></td>
                          <td><?= h($patient->person->bornplace) ?></td>
                          <td>
                              <?= h($patient->patient_companies[0]->_joinData->fonction) ?>
                          </td>
                          <td>
                              <?= h($patient->patient_companies[0]->label_patient_company) ?>
                          </td>
                          <td><?= h($patient->person->ethnie) ?></td>
                          <td><?php $dateborn=new \DateTime($patient->person->dateborn); echo $dateborn->format('d-m-Y'); ?></td>
                          <td>
                              <?php 
                                  $nowDate = new \DateTime('NOW');
                                  $diff_Date = $nowDate->diff($patient->person->dateborn);
                                  echo $diff_Date->format("%Y an(s) %m mois");
                               ?>
                          </td>
                          <td><?= h($patient->person->blood.$patient->person->rhesus) ?></td>
                      </tr>
                  </tbody>
          </table>

          <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                          <i class="ion-ios-body dmp-main-color medium"></i> Caractéristiques Physiques</h5>

          <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0">
                  <thead class="dmp-main-back blue-text">
                      <th><?= __('Taille') ?></th>
                      <th><?= __('Yeux') ?></th>
                      <th><?= __('Peau') ?></th>
                      <th><?= __('Cheveux') ?></th>
                  </thead>
                  <tbody>
                      <tr>
                          <td><?= $patient->person->people_attribute->height." m" ?></td>
                          <td><?= $patient->person->people_attribute->eyes ?></td>
                          <td><?= $patient->person->people_attribute->skin ?></td>
                          <td><?= $patient->person->people_attribute->haircolour ?></td>
                      </tr>
                  </tbody>
          </table>

          <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                          <i class="ion-android-home dmp-main-color medium"></i> Adresse</h5>

          <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0">
                  <thead class="dmp-main-back blue-text">
                       <th><?= __('Contact 1') ?></th>
                      <th><?= __('Contact 2') ?></th>
                      <th><?= __('Quartier') ?></th>
                      <th><?= __('Ville') ?></th>
                      <th><?= __('Boîte Postale') ?></th>
                      <th><?= __('Pays') ?></th>
                  </thead>
                  <tbody>
                      <tr>
                           <td><?= $patient->person->people_contact->contact1 ?></td>
                           <td><?= $patient->person->people_contact->contact1 ?></td>
                          <td><?= $patient->person->people_adress->city_quarter ?></td>
                          <td><?= $patient->person->people_adress->city ?></td>
                          <td><?= $patient->person->people_adress->postal_adress ?></td>
                          <td><?= $patient->person->people_adress->country ?></td>
                      </tr>
                  </tbody>
          </table>
</div>

    <div class="row information-wrapper" id="antecedents-wrapper">
      <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
      <i class="ion-reply-all dmp-main-color medium"></i> Antécédents Médicaux</h5>
      <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
              <thead class="dmp-main-back blue-text">
                        <th><?= __('Description') ?></th>
                        <th><?= __('Type') ?></th>
                        <th><?= __('Traitement') ?></th>
                        <th><?= __('Date de début') ?></th>
                        <th><?= __('Date de fin') ?></th>
                        <th><?= __('Durée') ?></th>
              </thead>
              <tbody>
                      <?php foreach ($patient->patient_antecedents as $antecedent) :?>
                          <tr>
                            <td><?= $antecedent->description_antecedent ?></td>
                            <td><?= $antecedent->patient_antecedent_type->label_antecedent_type ?></td>
                            <td><?= $antecedent->treatment_antecedent ?></td>
                            <td><?php $begin_date = new \DateTime($antecedent->begin); echo $begin_date->format('d-m-Y')  ?></td>
                            <td>
                              <?php if($antecedent->end) :?>
                              <?php $end_date = new \DateTime($antecedent->end); echo $end_date->format('d-m-Y')  ?>
                                <?php else: ?>
                                    <?= h("Indéfini") ?>
                                <?php endif; ?>
                              </td>
                            <td>
                              <?php if($antecedent->end) :?>
                              <?php 
                                $diff_date = $begin_date->diff($end_date);
                                echo $diff_date->format('%R %Y an(s) %m mois %d jours');
                               ?>
                             <?php else: ?>
                              <?php
                                $nowDate = new \DateTime('NOW'); 
                                $diff_date = $nowDate->diff($end_date);
                                echo $diff_date->format('%R %Y an(s) %m mois %d jours');
                               ?>
                             <?php endif; ?>
                            </td>
                          </tr>
                      <?php endforeach; ?>
              </tbody>
          </table>
      </div>

  </div>

   <!-- Meeting-visit modal info-box -->
  <div id="meeting_visit_info_modal" class="modal modal-fixed-footer" style='width:85%;'>
    <div class="modal-content">
        
      <div class="row" id="visit-meetings-info">
        <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="meeting_visit_info_table">
                <thead class="dmp-main-back blue-text">
                    <th><?= __('Code rendez-vous') ?></th>
                    <th><?= __('Date Consultation') ?></th>
                    <th><?= __('Praticien') ?></th>
                    <th><?= __('Etablissement') ?></th>
                    <th><?= __('Traitement') ?></th>
                    <th><?= __('Examens') ?></th>
                    <th><?= __('Prescriptions') ?></th>
                    <th><?= __('Actions') ?></th>
                </thead>
                <tbody>
                  
                </tbody>
        </table>
      </div>

      <div class="row loader-modal-box hidden center">
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

     <!-- exam-visit modal info-box -->
  <div id="exam_visit_info_modal" class="modal modal-fixed-footer" style='width:70%;'>
    <div class="modal-content">
        
      <div class="row" id="exam-meetings-info">
        <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="exam_visit_info_table">
                <thead class="dmp-main-back blue-text">
                    <th visit-meeting-id='0'><i class="ion-ios-plus ion-plus-circled white-color small pointer add-exams-item"></i></th>
                    <th><?= __('Code Examen') ?></th>
                    <th><?= __('Renseignements Cliniques') ?></th>
                    <th><?= __('Examen') ?></th>
                    <th><?= __('Interpretation') ?></th>
                    <th><?= __('Résultats') ?></th>
                    <th><?= __('Actions') ?></th>
                </thead>
                <tbody>
                  
                </tbody>
        </table>
      </div>

      <div class="row loader-modal-box hidden center">
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


     <!-- requirements-visit modal info-box -->
  <div id="requirement_visit_info_modal" class="modal modal-fixed-footer" style='width:70%;'>
    <div class="modal-content">
        
      <div class="row" id="requirement-meetings-info">
        <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="requirement-visit-table">
                <thead class="dmp-main-back blue-text">
                    <th treatment-id='0' class="tooltipped" data-tooltip='ajouter une prescription' data-delay='50' data-position='right'><i class="ion-ios-plus ion-plus-circled white-color small pointer add-requirement-item"></i></th>
                    <th><?= __('Prescription') ?></th>
                    <th><?= __('Posologie') ?></th>
                    <th><?= __('Observations') ?></th>
                    <th><?= __('Actions') ?></th>
                </thead>
                <tbody>
                  
                </tbody>
        </table>
      </div>

      <div class="row loader-modal-box hidden center">
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

  <!-- treatment-confirm-edit modal info-box -->
  <div id="treatment_visit_info_modal" class="modal modal-fixed-footer" style='width:30%;'>
    <div class="modal-content">
        
      <div class="row center dmp-grey-text" id="treatment-meetings-info">
          <i class="ion-ios-checkmark-outline green-text large"></i>
          <p class="dmp-grey-text">
            Etes-vous sûre de vouloir valider la rédaction de cet traitement? il sera impossible de faire des changements, vous pourrez néanmoins écrire des notes correctives.
          </p>

      </div>

      <div class="row loader-modal-box hidden center">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color">Enregistrement en cours</span>
      </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="trigger-confirm-edit-treatment">Valider</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text right" id='cancel-confirm-edit-treatment'>Annuler</a>
    </div>
  </div>

  <?= $this->Html->script('Red/doctor/patients/view',['block'=>true]) ?>
      