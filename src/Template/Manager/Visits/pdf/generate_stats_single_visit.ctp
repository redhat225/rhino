<?php $this->layout('dashboard_pdf_manager') ?>

              <div class="row zero-margin zero-padding light" id="content-floating-box-stats-single-visit-generator">
                     <div class="row zero-margin" id="stats-single-visit-generator-main-info" style="border-bottom:1.3px solid white;">
                          <div class="col s2 stats-single-visit-generator-api-variable-info reducable-content" id="stats-single-visit-generator-evidence-search-single">
                      								<?php if($visit_info->patient->person->path_pic) :?>
                      									<?= $this->Html->image('patient/patient_identity/'.$visit_info->patient->person->path_pic,['style'=>'width:130px; margin-top:15px;','fullBase'=>true]) ?>
                      								<?php else: ?>
                      									<i class="ion-ios-contact-outline dmp-main-color medium"></i>
                      								<?php endif;?>
                            </div>
                            <div class="col s5 reducable-content">
                                      <p class="dmp-main-color">
                                          <span id="fullname_stats-single-visit-generator_selected" class="bold stats-single-visit-generator-api-variable-info" style="font-size:17px;"><?= h($visit_info->patient->person->lastname.' '.$visit_info->patient->person->firstname) ?></span> <br>
                                          <span id="age_stats-single-visit-generator_selected_single" class="stats-single-visit-generator-api-variable-info">
                                          	<?php $age = new \DateTime($visit_info->patient->person->dateborn);
                                          		$now_date = new \DateTime('NOW');
                                          		$diff_date = $age->diff($now_date);
                                          		echo $diff_date->format('%Y'.' ans');
                                          	 ?>
                                          </span> <br>
                                          <span id="sexe_stats-single-visit-generator_selected_single" class="stats-single-visit-generator-api-variable-info">
                                          	<?php switch ($visit_info->patient->person->sexe) {
                                          		case 'H':
                                          			echo 'Homme';
                                          		break;
                                          		
                                          		case 'F':
                                          			echo 'Femme';
                                          		break;
                                          	} ?>
                                          </span> <br>
                                          <span id="nationality_stats-single-visit-generator_selected_single" class="stats-single-visit-generator-api-variable-info">
                                          	<?= h($visit_info->patient->person->nationality) ?>
                                          </span> <br>
                                          <span id='role_single_stats-single-visit-generator' class="stats-single-visit-generator-api-variable-info bold">
        										              <?= h(__($visit_info->patient->code)) ?>
                                          </span> <br>
                                      </p>
                            </div>

                            <div class="col s5 right-align">
                            	<?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution'],['width'=>'140px;','fullBase'=>true]) ?>
                            </div>
                    </div>
                </div>

                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                	<h5 class="dmp-grey-2-text light">Etat Total Facturation Visite <?= $visit_info->code_visit ?></h5>
                </div>
               
                <div class="row simple_stats_single_visit_wrapper zero-margin">
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures Générées
                           </div>
                           <div class="col s6 center bold">
                             <?= $visit_info_additional->count_invoice ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Montant Total</div>
                          <div class="col s6 center bold"><?= number_format($visit_info_additional->sum_invoices,2,',','.').' CFA' ?></div>
                        </div>
                    </div>
                    <div class="row zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures la plus élevée
                           </div>
                           <div class="col s6 center bold">
                             <?= number_format($visit_info_additional->max_amount_invoice,2,',','.').' CFA' ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Factures la moins élevée</div>
                          <div class="col s6 center bold"><?= number_format($visit_info_additional->min_amount_invoice,2,',','.').' CFA' ?></div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Factures recouvertes
                           </div>
                           <div class="col s6 center bold">
                             <?= $visit_info->countdown_invoice_recovered ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Factures non-recouvertes</div>
                          <div class="col s6 center bold"> <?= $visit_info->countdown_invoice_unrecovered ?></div>
                        </div>
                    </div>
                    <div class="row zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Paiements Recouverts
                           </div>
                           <div class="col s6 center bold">
                             <?= $visit_info->count_sold_payment ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Paiements non-recouverts</div>
                          <div class="col s6 center bold"><?= $visit_info->count_unsold_payment ?></div>
                        </div>
                    </div>
                    <div class="row dmp-light-back dmp-main-color zero-margin" style="padding:5px;">
                        <div class="col s6">
                           <div class="col s6">
                             Total Recouvert
                           </div>
                           <div class="col s6 center bold">
                             <?= number_format($visit_info->sum_sold_payment,2,',','.').' CFA'; ?>
                           </div>
                        </div>
                        <div class="col s6">
                          <div class="col s6">Total non-recouvert</div>
                          <div class="col s6 center bold"><?= number_format($visit_info->sum_unsold_payment,2,',','.').' CFA'; ?></div>
                        </div>
                    </div>
                </div>

                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                  <h5 class="dmp-grey-2-text light">Factures</h5>
                </div>

                <div class="row zero-margin">
                      <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="bills-table" style="margin-top:30px;">
                            <tr class="dmp-main-color">
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
                                <?php foreach ($visit_info->visit_invoices as $invoice) :?>
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
                                      <td><?= $invoice->count_sold_payment_single ?></td>
                                      <td><?= $invoice->count_unsold_payment_single ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>

                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                  <h5 class="dmp-grey-2-text light">Paiments Non-Recouverts</h5>
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
                              <?php foreach ($visit_info->visit_invoices as $invoice) :?>
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
                  <h5 class="dmp-grey-2-text light">Récapitulatif des Transferts</h5>
                </div>

              <div class="row zero-margin">
                 <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="bills-table" style="margin-top:30px;">
                              <tr class="dmp-main-color">
                                  <td class="zero-margin zero-padding"><?= __('Etat') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Date Entree') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Date Sortie') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Temps Effectué') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Etat d\'entrée') ?></td>
                                  <td class="zero-margin zero-padding"><?= __('Moyen d\'arrivé') ?></td>
                              </tr>
                              <tbody>
                              <?php foreach ($visit_info->visit_states as $state) :?>
                                    <tr>
                                      <td><?= $state->visit_state_type->label_state_type ?></td>
                                      <?php $state_enter_date = new \DateTime($state->state_begin); ?>
                                      
                                      <td><?= $state_enter_date->format('d-m-Y H:i') ?></td>
                                      <?php if($state->state_end):?>
                                        <?php $state_end_date = new \DateTime($state->state_end);  ?>
                                        <td><?= $state_end_date->format('d-m-Y H:i') ?></td>
                                      <?php else: ?>
                                          <td><?= h(__('En Cours')) ?></td>
                                      <?php endif; ?>

                                      <?php if($state->state_end):?>
                                        <?php $enter_date_state = new \DateTime($state->state_begin); $diff_state = $enter_date_state->diff(new \DateTime($state->state_end)); ?>
                                        <td><?= $diff_state->format('%Y an(s) %m moi(s) %d jour(s) %h  heure(s) %i minute(s)') ?></td>
                                      <?php else: ?>
                                        <?php $enter_date_state = new \DateTime($state->state_begin); $diff_state = $enter_date_state->diff(new \DateTime('NOW')); ?>
                                        <td><?= $diff_state->format('%Y an(s) %m moi(s) %d jour(s) %h  heure(s) %i minute(s)') ?></td>
                                      <?php endif; ?>
                                      <td>
                                        <?= $state->visit_level->label ?>
                                      </td>
                                      <td><?= $state->visit_kind_transport->label ?></td>
                                    </tr>
                              <?php endforeach; ?>
                              </tbody>
                  </table>
              </div>