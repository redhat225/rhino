        <div class="row zero-margin" id="global-state-generator-main-info" style="border-bottom:1.3px solid white;">
                    <div class="col s2 offset-s1 global-state-generator-api-variable-info reducable-content" id="state-generator-evidence-search-single">
                        <?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution'],['style'=>'width:110px;margin-top:20px;']) ?>
                    </div>

                  <div class="col s2" style="float:right !important;padding-left:0px;" id="closer-floating-box-global-state-generator-wrapper">
                              <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-global-state-generator-trigger" style="color:orange !important;"></i>
                              
                              <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-global-state-generator-trigger" style="color:orange !important;"></i>
                    </div>
                    <div class="col s3 center right">
                       <div class="container" style="margin-top:15px;">
                          <i class="ion-android-apps dmp-main-color medium pointer-opaq dropdown-button" data-activates="dropdown-choices-states" data-alignment="right" data-constrainwidth='false' data-beloworigin='true' data-hover='true'></i>
                          <ul id='dropdown-choices-states' class='dropdown-content dmp-main-back' style="width:100px;">
                            <li><a href="<?= $pdf_view_url ?>" target='_blank'>Rendu PDF</a></li>
                          </ul>
                       </div>
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

        <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
              <h5 class="dmp-grey-2-text light zero-margin">Tendances des Transactions</h5>
        </div>
        <canvas id="line-state-transactions">
          
        </canvas>

<script>
    array_bars_values = new Array();
    array_bars_labels = new Array();
    <?php foreach ($visit_global_grouping_info as $invoice) :?>
        array_bars_values.push(<?= $invoice->total_sum ?>);
        array_bars_labels.push("<?= $invoice->created_date ?>");
    <?php endforeach; ?>
    var lineChart = $('#line-state-transactions');
    var lineChart = new Chart(lineChart,{
        type:'line',
        data:{
          labels: array_bars_labels,
          datasets:[{
            label: 'Transactions du <?= $formatted_start_date->format('d-m-y') ?> au <?= $formatted_end_date->format('d-m-y') ?>',
            data: array_bars_values,
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: "rgba(75,192,192,0.4)",
                  borderColor: "rgba(75,192,192,1)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "#dc6b1d",
                  pointBackgroundColor: "#dc6b1d",
                  pointBorderWidth: 5,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
          }
          ]
        },    
        options:{
          responsive: true
        }
    });
</script>


<script>
//checking empty row wrapper
    $('.global-state-visit-table-wrapper-info').each(function(){
      if($('table tbody tr',this).length==1)
        $(this).remove();
    });



  var $global_state_generator_floating_box = $('#floating-box-global-state-generator');

  $('#close-floating-box-global-state-generator-trigger').on('click',function(){
    $('#floating-box-global-state-generator').addClass('hidden');
    $('#floating-box-global-state-generator').removeClass('used');
    $('#closer-floating-box-global-state-generator-wrapper').removeClass('right');
    $('#reduced-floating-box-global-state-generator-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-global-state-generator-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-global-state-generator').css({'height':'1200px'});
    $('.reducable-content').removeClass('hidden');
    $('#floating-box-global-state-generator').attr('global-state-generator-id','0');

        if($('#close-floating-box-global-state-generator-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-global-state-generator-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-global-state-generator-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-global-state-generator').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-global-state-generator-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-global-state-generator').css({'height':'50px'});
      $('.reducable-content',$global_state_generator_floating_box).addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-global-state-generator').hasClass('hidden'))
      {
           $('#closer-floating-box-global-state-generator-wrapper').removeClass('right');
      }



      $('#closer-floating-box-global-state-generator-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-global-state-generator').css({'height':'1200px'});

            $('.reducable-content',$global_state_generator_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#global-state-generators-info-wrapper li a.active').parent().index();
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$global_state_generator_floating_box).trigger('click');

    }

  });


  $('.change-graph-view-periodic-global-state').on('click',function(e){
  		e.preventDefault();
  		if($(this).hasClass('ion-arrow-graph-up-right'))
  		{
  				$(this).removeClass('ion-arrow-graph-up-right').addClass('ion-podium');
				$('#bars-global-state-transactions').addClass('hide');
				$('#line-global-state-transactions').removeClass('hide');

  		}
  		else
  		{
  				$(this).addClass('ion-arrow-graph-up-right').removeClass('ion-podium');
				$('#line-global-state-transactions').addClass('hide');
				$('#bars-global-state-transactions').removeClass('hide');
  		}
  });


  $('.hide-emitted-bills-global-state-periodic').on('click',function(){
  		if($(this).hasClass('ion-chevron-up'))
  		{
  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
  			$('#emitted-bills-global-state-periodic-manager').fadeOut('fast');
  		}
  		else
  		{
  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
  			$('#emitted-bills-global-state-periodic-manager').fadeIn('fast');


  		}
  });

    $('.hide-unpaided-payments-global-state-periodic').on('click',function(){
  		if($(this).hasClass('ion-chevron-up'))
  		{
  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
  			$('#unpaided-payments-tabe-recap-global-state').fadeOut('fast');
  		}
  		else
  		{
  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
  			$('#unpaided-payments-tabe-recap-global-state').fadeIn('fast');
  		}
  });

    $('.dropdown-button').dropdown();

</script>