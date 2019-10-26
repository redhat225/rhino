      <?php $this->layout='dashboard_pdf_manager'; ?>
        <div class="row zero-margin" id="global-state-generator-main-info" style="border-bottom:1.3px solid white;">
                    <div class="col s2 offset-s1 global-state-generator-api-variable-info reducable-content" id="state-generator-evidence-search-single">
                        <?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution'],['style'=>'width:140px;margin-top:20px;','fullBase'=>true]) ?>
                    </div>
        </div>

        <h5 class="dmp-main-color center">Etat Global du <?= $formatted_start_date->format('d-m-Y').' au '.$formatted_end_date->format('d-m-Y') ?></h5>


        <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                  <h5 class="dmp-grey-2-text light zero-margin">Factures</h5>
        </div>

        <div class="row simple_stats_single_visit_wrapper zero-margin">
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures Générées
                           </div>
                           <div class="col s6 center bold">
                             <?= $aggr_transaction[0]->count_invoices ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Montant Total</div>
                          <div class="col s6 center bold"><?= number_format($aggr_transaction[0]->sum_amount,2,',','.').' CFA' ?></div>
                        </div>
                    </div>
                    <div class="row zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures la plus élevée
                           </div>
                           <div class="col s6 center bold">
                             <?= number_format($aggr_transaction[0]->max_invoice_amount,2,',','.').' CFA' ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Factures la moins élevée</div>
                          <div class="col s6 center bold"><?= number_format($aggr_transaction[0]->min_invoice_amount,2,',','.').' CFA' ?></div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures recouvertes
                           </div>
                           <div class="col s6 center bold">
                             <?= $total_invoice_recovered ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Factures non-recouvertes</div>
                          <div class="col s6 center bold"> <?= $total_invoice_unrecovered ?></div>
                        </div>
                    </div>
                    <div class="row zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Paiements Recouverts
                           </div>
                           <div class="col s6 center bold">
                             <?= $total_payment_recovered ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Paiements non-recouverts</div>
                          <div class="col s6 center bold"><?= $total_payment_unrecovered ?></div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Total Recouvert
                           </div>
                           <div class="col s6 center bold">
                             <?= number_format($total_sum_recovered,2,',','.').' CFA'; ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Total non-recouvert</div>
                          <div class="col s6 center bold"><?= number_format($total_sum_unrecovered,2,',','.').' CFA'; ?></div>
                        </div>
                    </div>
        </div>


        <div class="row zero-margin">
                      <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="bills-table" style="margin-top:30px;">
                            <tr class="dmp-main-back dmp-grey-2-text light">
                                <td class="zero-margin zero-padding"><?= __('N° Facture') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Opérateur') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Emission') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Règlement') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Montant') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Type') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Moyen') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Nbre Paiements') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Paiments Réglé(s)') ?></td>
                                <td class="zero-margin zero-padding"><?= __('Paiments Non Réglé(s)') ?></td>
                            </tr>
                            <tbody>
                                <?php foreach ($transactions as $invoice) :?>
                                    <?php switch ($invoice->state) {
                                      case 0:
                                        $color_row = 'light-red-bill';
                                      break;
                                      
                                      case 1:
                                        $color_row = 'light-green-bill';
                                      break;
                                    } ?>
                                    <tr class="<?= $color_row ?>">
                                      <td><?= $invoice->code_invoice ?></td>
                                      <td><?= $invoice->manager_operator->person->lastname.' '.$invoice->manager_operator->person->firstname ?></td>
                                      <td><?= $invoice->formatted_created ?></td>
                                      <td><?= $invoice->formatted_solded ?></td>
                                      <td><?= number_format($invoice->amount,2,',','.') ?></td>
                                      <?php 
                                          switch($invoice->visit_invoice_type_id)
                                          {
                                            case 1:
                                                $visit_type = 'Visite';
                                            break;

                                            case 2:
                                                $visit_type = 'Consultation';
                                            break;

                                            case 3:
                                                $visit_type = 'Réservation';
                                            break;

                                            case 4:
                                                $visit_type = 'Laboratoire';
                                            break;
                                          }

                                          switch($invoice->visit_invoice_payment_way_id)
                                          {
                                            case 0:
                                              $visit_payment_way = 'Indéfini';
                                            break;

                                            case 1:
                                              $visit_payment_way = 'Cash';
                                            break;

                                            case 2:
                                              $visit_payment_way = 'Chèque/CB';
                                            break;

                                            case 3:
                                              $visit_payment_way = 'Assurance';
                                            break;

                                            case 4:
                                              $visit_payment_way = 'Réservation';
                                            break;

                                            case 5:
                                              $visit_payment_way = 'Echelonnement';
                                            break;
                                          }

                                       ?>
                                      <td><?= $visit_type ?></td>
                                      <td><?= $visit_payment_way ?></td>
                                      <td><?= $invoice->count_payments ?></td>
                                      <td><?= $invoice->count_sold ?></td>
                                      <td><?= $invoice->count_unsold ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>



                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                  <h5 class="dmp-grey-2-text light zero-margin">Paiments Non-Recouverts</h5>
                </div>
              <div class="row zero-margin">
                 <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="bills-table" style="margin-top:30px;">
                              <tr class="dmp-main-color">
                                  <td class="zero-margin zero-padding"><?= __('N° Paiement') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('N° Facture') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Date Prévue Règlement') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Montant') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Référence') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Moyen') ?></td>
                              </tr>
                              <tbody>
                              <?php foreach ($transactions as $invoice) :?>
                                      <?php foreach ($invoice->visit_invoice_payments as $payment) :?>
                                              <?php if($payment->state===0) :?>
                                                      <tr>
                                                        <td><?= $payment->code_payment ?></td>
                                                        <td><?= $invoice->code_invoice ?></td>
                                                        <?php $expected_date =new \DateTime($payment->visit_invoice_payment_schedule->expected_date); ?>
                                                        <td><?= $expected_date->format('d-m-Y') ?></td>
                                                        <td><?= number_format($payment->amount,2,',','.').' CFA' ?></td>
                                                        <td><?= $payment->reference_payment ?></td>
                                                        <?php switch($payment->visit_invoice_payment_method_id){
                                                                  case 1:
                                                                        $visit_invoice_payment_method_id = 'Cash';
                                                                  break;

                                                                  case 2:
                                                                      $visit_invoice_payment_method_id ='Chèque/CB';
                                                                  break;
                                                          } ?>
                                                        <td><?= $visit_invoice_payment_method_id ?></td>
                                                      </tr>
                                              <?php endif; ?>
                                      <?php endforeach; ?>
                              <?php endforeach; ?>
                              </tbody>
                  </table>
              </div>

              <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                  <h5 class="dmp-grey-2-text light">Visites</h5>
              </div>


              <div class="row simple_stats_single_visit_wrapper zero-margin">
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Visites Enregistrées
                           </div>
                           <div class="col s6 center bold">
                             <?= $count_registered_visit ?>
                           </div>
                        </div>
                        <div class="col s4">
                           <div class="col s6">
                             Visites En Cours
                           </div>
                           <div class="col s6 center bold">
                             <?= $count_valid_visit ?>
                           </div>
                        </div>
                        <div class="col s4">
                          <div class="col s6">Visites Annulées</div>
                          <div class="col s6 center bold"><?= $count_deleted_visit ?></div>
                        </div>
                    </div>
                    <div class="row zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                            Etat Courant Consultation
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_consultation ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Entrées Consultation</div>
                          <div class="col s6 center bold"><?= $enter_consultation ?></div>
                        </div>
                    </div>
                    <div class="row dmp-main-color dmp-light-back zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Chirurgie
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_surgery ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Chirurgie
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_surgery ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Chirurgie
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_surgery ?>
                            </div>
                        </div>
                    </div>

                    <div class="row dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Hospitalisations
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_hospy ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Hospitalisation
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_hospy ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Hospitalisation
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_hospy ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant MEO
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_meo ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées MEO
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_meo ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties MEO
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_meo ?>
                            </div>
                        </div>
                    </div>
                    <div class="row zero-margin dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Réanimation
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_rea ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Réanimation
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_rea ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Réanimation
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_rea ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-main-color zero-margin dmp-light-back" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Réanimation
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_rea ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Réanimation
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_rea ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Réanimation
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_rea ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Maternité
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_surgery ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Maternité
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_surgery ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Maternité
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_surgery ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-main-color zero-margin dmp-light-back" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Urgences
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_emergency ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Urgences
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_emergency ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Urgences
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_emergency ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Réservation
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_booking ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Réservations En attente de Validation
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_booking ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Réservations Validées
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_booking ?>
                            </div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s4">
                           <div class="col s6">
                             Etat Courant Traumatologie
                           </div>
                           <div class="col s6 center bold">
                             <?= $actual_trauma ?>
                           </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Entrées Traumatologie
                            </div>
                            <div class="col s6 bold">
                             <?= $enter_trauma ?>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="col s6">
                                Sorties Traumatologie
                            </div>
                            <div class="col s6 bold">
                             <?= $exit_trauma ?>
                            </div>
                        </div>
                    </div>
        


              <div class="row zero-margin global-state-visit-table-wrapper-info">
                    <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                       <h5 class="dmp-grey-2-text light zero-margin">Consulations</h5>
                   </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===1) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('-')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>





              <div class="row zero-margin global-state-visit-table-wrapper-info">
                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                    <h5 class="dmp-grey-2-text light zero-margin">Chirurgie</h5>
                </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===2) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>


              <div class="row zero-margin global-state-visit-table-wrapper-info">
                    <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                        <h5 class="dmp-grey-2-text light zero-margin">Hospitalisation</h5>
                    </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===3) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>

              <div class="row zero-margin global-state-visit-table-wrapper-info">
                  <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                      <h5 class="dmp-grey-2-text light zero-margin">MEO</h5>
                  </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===4) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>

              <div class="row zero-margin global-state-visit-table-wrapper-info">
                  <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                      <h5 class="dmp-grey-2-text light zero-margin">Réanimation</h5>
                  </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===5) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>

              <div class="row zero-margin global-state-visit-table-wrapper-info">
                  <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                      <h5 class="dmp-grey-2-text light zero-margin">Maternité</h5>
                  </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===6) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>
              <div class="row zero-margin global-state-visit-table-wrapper-info">
                  <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                      <h5 class="dmp-grey-2-text light zero-margin">Urgences</h5>
                  </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===7) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>

              <div class="row zero-margin global-state-visit-table-wrapper-info">
                      <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                          <h5 class="dmp-grey-2-text light zero-margin">Réservation</h5>
                      </div>  
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===8) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>

              <div class="row zero-margin global-state-visit-table-wrapper-info">
                  <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                      <h5 class="dmp-grey-2-text light zero-margin">Traumatologie</h5>
                  </div>
                            <table class="MyTable striped bordered centered table-space zero-margin highlight">
                                <tr class="centered dmp-main-color">
                                    <td class="zero-padding"><?= __('Code Visite') ?></td>
                                    <td class="zero-padding"><?= __('Opérateur') ?></td>
                                    <td class="zero-padding"><?= __('Patient') ?></td>
                                    <td class="zero-padding"><?= __('Date Entrée') ?></td>
                                    <td class="zero-padding"><?= __('Date Sortie') ?></td>
                                </tr>
                                <tbody>
                                      <?php foreach ($visit_global_info as $visit) :?>
                                            <?php if($visit->visit_states[0]->visit_state_type_id===9) :?>
                                              <tr>
                                                  <td><?= $visit->code_visit ?></td>
                                                  <td><?= $visit->manager_operator->person->lastname.' '.$visit->manager_operator->person->firstname ?></td>
                                                  <td><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></td>
                                                  <?php $state_date_begin = new \DateTime($visit->visit_states[0]->state_begin); ?>
                                                  <?php if($visit->visit_states[0]->state_end) :?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <?php $state_date_end = new \DateTime($visit->visit_states[0]->state_end); ?>
                                                    <td><?= $state_date_end->format('d-m-Y H:i') ?></td>
                                                  <?php else: ?>
                                                    <td><?= $state_date_begin->format('d-m-Y H:i') ?></td>
                                                    <td><?= h(__('En cours')) ?></td>  
                                                  <?php endif; ?>
                                              </tr>
                                            <?php endif; ?>
                                      <?php endforeach; ?>
                                </tbody>
                            </table>
              </div>
        </div>

        <script>
//checking empty row wrapper
    $('.global-state-visit-table-wrapper-info').each(function(){
      if($('table tbody tr',this).length==1)
        $(this).remove();
    });
</script>