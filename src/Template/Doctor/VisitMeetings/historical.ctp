<div class="col l2 m2 s2 center" id="side-control-panel">
        
   <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-selected-reference" reference="meetings-informations" style="border-top:1px solid white;" class="select-item-list"><a href="#!"><i class="ion-clipboard small white-text"></i>Rendez-Vous</a></li>

        <li class="item-selected-reference" reference="interventions-informations" style="border-top:1px solid white;" class="select-item-list"><a href="#!"><i class="ion-android-warning small white-text"></i>Interventions</a></li>
        
        <li><a href="/doctor/doctors/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
    </ul>    

</div> 


  <div class="col l10 m10 s10 info-dmp-container">      

    <div class="row information-wrapper" id="meetings-informations">
        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
        <i class="ion-reply-all dmp-main-color medium"></i> Historique des rendez-vous</h5>
      

        <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
                <!-- Meeting infos -->
                <thead class="meeting_info_thead dmp-main-back blue-text">
                    <th class="grey dmp-main-color"><?= __('rendez-vous') ?></th>
                    <th><?= __('Code Rdv') ?></th>
                    <th><?= __('Code Visite') ?></th>
                    <th><?= __('Date de consultation') ?></th>
                    <th><?= __('Date prochain rdv') ?></th>
                    <th><?= __('Etablissement') ?></th>
                    <th><?= __('Patient') ?></th>
                    <th><?= __('Actions') ?></th>
                </thead>
                  
                  <?php $countdown = 1; ?>
                  <?php foreach($historical_meeting as $meeting) :?>
                       <tbody class="meeting_info_tbody" index='<?= $countdown ?>'>
                          <tr class="dmp-grey-text">
                                <td><i class="ion-ios-plus trigger-get-more-meeting pointer-opaq small"></i></td>
                                <td><?= $meeting->code_meeting ?></td>
                                <td><?= $meeting->visit->code_visit ?></td>
                                <td><?php $date_rdv = new \DateTime($meeting->modified); echo $date_rdv->format('d-m-Y H:i:s') ?></td>
                                <?php if($meeting->next_meeting) :?>
                                <td><?php $newt_meeting_date = new \DateTime($meeting->next_meeting); echo $newt_meeting_date->format('d-m-Y') ?></td>
                              <?php else: ?>
                                <td><i class="dmp-main-color small"></i></td>
                              <?php endif; ?>
                                <td><?= $meeting->visit->manager_operator->institution->fullname ?></td>
                                <td><?= $meeting->patient->person->lastname.' '.$meeting->patient->person->firstname ?></td>
                                <td>&nbsp;</td>
                          </tr>
                      </tbody>
                      <thead class="hidden treatment_info_thead dmp-main-back blue-text" index='<?= $countdown ?>'>
                          <th colspan="2" class="grey dmp-main-color bold"><?= __('Traitement') ?></th>
                          <th><?= __('Description') ?></th>
                          <th><?= __('Date Prescription') ?></th>
                          <th><?= __('Date de fin') ?></th>
                          <th><?= __('Période restante') ?></th>
                          <th colspan="2"><?= __('Actions') ?></th>
                      </thead>
                      <tbody class="hidden treatment_info_tbody" index='<?= $countdown ?>'>
                            <tr class="dmp-grey-text">
                                <td colspan="2">&nbsp;</td>
                                <td><?= $meeting->treatment->description ?></td>
                                <?php if($meeting->description==='') :?>
                                   <td><i class="ion-minus dmp-main-color small"></i></td>
                                   <td><i class="ion-minus dmp-main-color small"></i></td>
                                   <td><i class="ion-minus dmp-main-color small"></i></td>
                                <?php else: ?>
                                   <td><?php $date_begin_treatment = new \DateTime ($meeting->treatment->modified); echo $date_begin_treatment->format('d-m-Y H:i:s'); ?></td>
                                   <td><?php $date_end_treatment = new \DateTime ($meeting->treatment->exp); echo $date_end_treatment->format('d-m-Y H:i:s'); ?></td>
                                   <td>
                                     <?php $diff_treatment = $date_end_treatment->diff($date_begin_treatment); echo $diff_treatment->format('%R %m mois %d jour(s)'); ?>
                                   </td>
                                <?php endif; ?>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                      </tbody> 

                      <thead class="hidden exams_info_thead dmp-main-back blue-text" index='<?= $countdown ?>'>
                          <th><i class="ion-ios-plus-outline small dmp-main-color add-exams-item pointer-opaq tooltipped" data-tooltip='Ajouter un examen' data-deay='50' data-position='tight'></i></th>
                          <th class="grey dmp-main-color bold"><?= __('  Examens') ?></th>
                          <th><?= __('Type Examen') ?></th>
                          <th><?= __('Code Examen') ?></th>
                          <th><?= __('Renseignements Cliniques') ?></th>
                          <th><?= __('Interpretation') ?></th>
                          <th><?= __('Résultats') ?></th>
                          <th><?= __('Actions') ?></th>
                      </thead>
                      <tbody class="hidden exams_info_tbody" index='<?= $countdown ?>'>
                          <?php foreach ($meeting->exams as $exam) :?>
                                <tr>
                                   <td>&nbsp;</td>
                                   <td><?= $exam->exam_under_type->label_exam_under_type ?></td>
                                   <td><?= $exam->exam_under_type->exam_type->label_exam_type ?></td>
                                   <td><?= $exam->codexam ?></td>
                                   <td><?= $exam->obs_exam ?></td>
                                   <td><?= $exam->result_exam ?></td>
                                   <td>&nbsp;</td>
                                   <td>&nbsp;</td>
                                </tr>
                          <?php endforeach; ?>
                      </tbody>


                      <thead class="hidden requirements_info_thead dmp-main-back blue-text" index='<?= $countdown ?>'>
                          <th colspan="2" class="grey dmp-main-color"><?= __('Prescriptions') ?></th>
                          <th><?= __('Posologie') ?></th>
                          <th><?= __('Date Prescription') ?></th>
                          <th colspan="2"><?= __('Observations') ?></th>
                          <th><?= __('Actions') ?></th>
                      </thead>

                      <tbody class="hidden requirements_info_tbody" index='<?= $countdown ?>' style='border-bottom:2.8px solid orange;'>
                         <?php foreach ($meeting->treatment->treatment_requirements as $requirement) :?>
                          <tr>
                            <td colspan="2"><?= $requirement->label_requirement ?></td>
                            <td colspan="2"><?= $requirement->posologie_requirement ?></td>
                            <td><?php $date_set_req = new \DateTime ($requirement->created); echo $date_set_req->format('d-m-Y H:i:s'); ?></td>
                            <td colspan="2"><?= $requirement->obs_requirement ?></td>
                            <td>&nbsp;</td>
                          </tr>

                         <?php endforeach; ?>
                      </tbody>


                  <?php $countdown++; ?>
                  <?php endforeach; ?>
                
        </table>

    </div>

  </div>

  <?= $this->Html->script('Red/doctor/visit-meetings/historical') ?>
  <?= $this->Html->script('Red/doctor/patients/view') ?>