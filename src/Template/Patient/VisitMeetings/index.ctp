  <div class="col l2 m2 s2 center" id="side-control-panel">
          
      <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

      <ul id="game-gift-menu" class="left-align black">  
              <li class="item-selected-reference" reference="booking-wrapper"><a href="#!" style="border-top:1px solid white;"><i class="ion-reply-all white-text small"></i>Réservations</a></li>
              <li class="item-selected-reference" reference="next-rdv-wrapper"><a href="#!"><i class="ion-map white-text small"></i>Faire une réservation</a></li>
              <li><a href="/patient/patients/general"><i class="ion-ios-skipbackward white-text small"></i>Retour</a></li>
              <li style="border-bottom:1px solid white;"><a href="/patient/patients/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
      </ul>

  </div> 

  <div class="col l10 m10 s10 info-dmp-container">
    <div class="row information-wrapper" id="booking-wrapper">
        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-clipboard dmp-main-color medium"></i> Réservations <i class="ion-ios-information orange-text darken-3 right medium trigger-info-booking pointer-opaq"></i></h5>
          
          <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
              <thead class="dmp-main-back blue-text">
                        <th><?= __('Code Rdv') ?></th>
                        <th><?= __('Code Visite') ?></th>
                        <th><?= $this->Paginator->sort('VisitMeetings.created','Date Réservation') ?></th>
                        <th><?= $this->Paginator->sort('VisitMeetings.expected_meeting_date','Date prochaine de rdv') ?></th>
                        <th><?= __('Praticien') ?></th>
                        <th><?= __('Spécialité') ?></th>
                        <th><?= __('Etablissement') ?></th>
                        <th><?= __('Actions') ?></th>
              </thead>
              <tbody>
                  <?php foreach($visitMeetings as $meeting) :?>
                        <?php 
                            switch($meeting->visit_meeting_kind_id)
                            {
                              case 2:
                                $row_color = "light-green-bill";
                              break;

                              case 3:
                                $row_color = "light-orange-bill";
                              break;

                              case 4:
                                $row_color = "light-red-bill";
                              break;
                            }
                         ?>

                    <tr class="<?= $row_color ?> dmp-grey-text" rdv-en-date="<?= $meeting->expected_meeting_date ?>">
                        <td><?= $meeting->code_meeting ?></td>
                        <td><?= $meeting->visit->code_visit ?></td>
                        <td><?php $created_booking_date = new DateTime($meeting->created); echo $created_booking_date->format('d-m-Y H:i:s') ?></td>
                        <td ><?php $future_rdv_date = new \DateTime($meeting->expected_meeting_date); echo $future_rdv_date->format('d-m-Y'); ?></td>
                        <td><?= "Dr. ".$meeting->doctor->person->lastname." ".$meeting->doctor->person->firstname ?></td>
                        <td><?= $meeting->visit_meeting_speciality->label ?></td>
                        <td><?= $meeting->visit->manager_operator->institution->fullname ?></td>
                        <td>
                          <?php if($meeting->visit_meeting_kind_id==3) :?>
                          <a href="#" data-activates="booking-<?= $meeting->id  ?>" data-beloworigin="true" data-constrainwidth="false" class="btn white dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>
                          <ul class="dropdown-content" id="booking-<?= $meeting->id  ?>">
                            <li><a href="#!" id-meeting="booking-<?= $meeting->id ?>" class="dmp-grey-text edit-booking-patient-trigger">Modifier La réservation</a></li>
                            <li ><a href="#!" id-meeting="<?= $meeting->id ?>" class="dmp-grey-text cancel-booking-patient-trigger">Annuler La réservation</a></li>
                          </ul>
                        <?php endif; ?>
                        </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
      </table>

      <div class="container">
        <div class="container">
          <div class="container center">
                                <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Suivant') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter('{{page}} sur {{pages}}') ?></p>
            </div> 
          </div>
   
        </div>
      </div>

    </div>


</div>

<!-- Modal Box Areas -->

  <!-- Cancel Booking modal box -->
  <div id="cancel-booking-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
            <div class="row" id="content-cancel-booking">
                <i class="ion-ios-close red-text large"></i>
                <h5 class="dmp-main-color zero-margin">Annulation de la réservation</h5>
                <p>Etes-vous sûre de vouloir annuler la réservation ?</p>
            </div>
            <div class="row hidden" id="loader-cancel-booking">
              <div class="progress">
                  <div class="indeterminate"></div>
              </div>
                <span class="dmp-grey-text">Annulation en cours</span>
            </div>

        </div>
        <div class="modal-footer dmp-main-back">
            <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="cancel-booking-confirm-trigger">Valider</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="cancel-booking-abort-trigger">Annuler</a>
        </div>
  </div>

  <!-- Edit Booking modal box -->
  <div id="edit-booking-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
            <div class="row" id="edit-content-booking">

                  <div class="col s12 input-field zero-margin">
                      <h6 class="dmp-grey-text left bold">Date de réservation</h6>
                      <input type="date" name="expected_meeting_date" required id="expected_meeting_date"/>
                      
                      <h6 class="dmp-grey-text left bold">Heure de réservation</h6>
                      <input type="time" name="expected_meeting_time" required id="expected_meeting_time"/>
                  </div>

                  <div class="col s12 input-field">
                      <h6 class="dmp-grey-text left-align bold"> praticien </h6>
                          <input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search_doctor" data-activates="dropdown1" id="search_doctor" style="background:white !important;color:#130647 !important;font-weight:bold;"/>
                                <ul id='dropdown1' class='dropdown-content' style="width:auto !important;">
                                    <?php foreach($doctors as $doctor) :?>
                                        <li class="doctor-item" tag="<?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?>" tag-id="<?= $doctor->id ?>"><a href="#!"><?= $doctor->person->lastname ?> <?= $doctor->person->firstname ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <input type="hidden" name="doctor_id" id="doctor_id">     
                  </div>

                  <div class="col s12 input-field">
                      <h6 class="dmp-main-color left bold">Spécialité</h6>
                      <select name="visit_meeting_speciality_id" id="visit_meeting_speciality_id" class="required">
                      <option value="">Selectionnez une valeur</option>
                          <?php foreach ($visit_meeting_specialities as $speciality) :?>
                              <option value="<?= $speciality->id ?>"> <?= $speciality->label ?> </option>
                          <?php endforeach; ?>
                      </select>
                      <input type="hidden" name="visit_meeting_speciality_name" id="visit_meeting_speciality_name">
                  </div>
            </div>

            <div class="row hidden" id="loader-edit-booking">
              <div class="progress">
                  <div class="indeterminate"></div>
              </div>
                <span class="dmp-grey-text">Annulation en cours</span>
            </div>

        </div>
        <div class="modal-footer dmp-main-back">
            <a href="#!" class="waves-effect waves-green btn-flat white-text left" id="edit-booking-confirm-trigger">Valider</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-red white-text right btn-flat" id="edit-booking-abort-trigger">Annuler</a>
        </div>
  </div>

     <!-- Table row Reservations legend -->
  <div id="info-booking-modal-box" class="modal modal-fixed-footer" style="width:20%;">
        <div class="modal-content center">
            <div class="row" id="content-info-booking">
                <i class="ion-ios-information-outline orange-text darken-2 medium"></i>
                <h5 class="dmp-grey-text zero-margin">Légende</h5>
                <div class="row" id="legend-booking-info">
                  <p class="align-left"> <br>
                    <span class="dmp-grey-text left"><i class="ion-record green-text light-2"></i> Réservation Validée</span> <br> <br>
                    <span class="dmp-grey-text left"><i class="ion-record orange-text light-2"></i> En attente de validation</span> <br> <br>
                    <span class="dmp-grey-text left"><i class="ion-record red-text light-2"></i> Réservation annulée</span>
                  </p>
                </div>
            </div>
        </div>
        <div class="modal-footer dmp-main-back">
            <a href="#!" class=" modal-action modal-close waves-effect white-text right btn-flat">Fermer</a>
        </div>
  </div>



<?= $this->Html->script('Red/patient/visit-meetings/index',['block'=>true]) ?>