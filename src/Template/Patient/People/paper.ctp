  <div class="col l2 m2 s2 center" id="side-control-panel">
          
      <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

      <ul id="game-gift-menu" class="left-align black">  
              <li class="item-selected-reference" reference="antecedents-wrapper"><a href="#!" style="border-top:1px solid white;"><i class="ion-reply-all white-text small"></i>Antécédents Médicaux</a></li>
              <li class="item-selected-reference" reference="next-rdv-wrapper"><a href="#!"><i class="ion-map white-text small"></i>Planning Rdv</a></li>
              <li><a href="/patient/people/view"><i class="ion-ios-skipbackward white-text small"></i>Retour</a></li>
              <li style="border-bottom:1px solid white;"><a href="/patient/patients/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
      </ul>
      
  </div> 

  <div class="col l10 m10 s10 info-dmp-container">      
    
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
                      <?php foreach ($paper->patient->patient_antecedents as $antecedent) :?>
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

      <div class="row information-wrapper" id="next-rdv-wrapper">
            <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                <i class="ion-android-calendar dmp-main-color medium"></i>  Prochains rendez-vous</h5>
            <div class="row extensiveTable">   
                <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
                        <thead class="dmp-main-back blue-text">
                            <th><?= __('Code Rdv') ?></th>
                            <th><?= __('Date de consultation') ?></th>
                            <th><?= __('Praticien') ?></th>
                            <th><?= __('Date prochain rendez-vous') ?></th>
                            <th><?= __('Jours avant échéance') ?></th>
                            <th><?= __('Actions') ?></th>
                        </thead>
                        <tbody>
                            <?php foreach($paper->patient->visits as $visit) :?>
                                <?php foreach ($visit->visit_meetings as $meeting) :?>
                                    <?php if($meeting->next_meeting) :?>
                                        <?php $diff_date= $meeting_date->diff($next_meeting_date);  ?>
                                        <?php if($diff_date->format('%r')==='-') :?>
                                        <tr class="light-red-bill">
                                      <?php else :?>
                                        <tr class="light-green-bill">
                                    <?php endif; ?>
                                          <td><?= $meeting->code_meeting ?></td>
                                          <td><?php
                                              $meeting_date = new \DateTime($meeting->expected_meeting_date);
                                              echo $meeting_date->format('d-m-Y');
                                           ?></td>
                                          <td><?= "Dr. ".$meeting->code_meeting->doctor->person->lastname." ".$meeting->code_meeting->doctor->person->firstname ?></td>
                                          <td>
                                            <?php $next_meeting_date = new \DateTime($meeting->next_meeting);
                                              echo $next_meeting_date->format('d-m-Y'); ?>
                                          </td>
                                          <td>
                                            <?= $diff_date->format("%R %m mois %d jours"); ?>
                                          </td>
                                          <td>
                                            <a href="#!" class="trigger-next-meeting-options dropdown-button" data-activates="dropdown-metting-options<?=$meeting->id ?>" data-constrainwidth="true" ></a>
                                            <ul id="dropdown-metting-options<?=$meeting->id ?>" class="dropdown-content">
                                                <li><a href="#!">Effectuer une réservation</a></li>
                                                <li><a href="#!">Ajouter à mon agenda</a></li>
                                            </ul>
                                          </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                 </table>
            </div>      
        </div>

  </div>

  <?= $this->Html->script('Red/patient/people/paper/paper',['block'=>true]) ?>