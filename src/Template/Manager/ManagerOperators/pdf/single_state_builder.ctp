<?php $this->layout('dashboard_pdf_manager') ?>
                  <div class="row zero-margin zero-padding" id="content-floating-box-state-generator">
                        <div class="row zero-margin" id="state-generator-main-info" style="border-bottom:1.3px solid white;">
                          <div class="col s2 state-generator-api-variable-info reducable-content" id="state-generator-evidence-search-single">
								<?php if($manager_operator_identity->person->path_pic) :?>
									<?= $this->Html->image('manager/'.$manager_operator_identity->institution->slug.'/manager_identity/'.$manager_operator_identity->person->path_pic,['style'=>'width:150px; margin-top:18px;','fullBase'=>true]) ?>
								<?php else: ?>
									<i class="ion-ios-contact-outline dmp-main-color medium"></i>
								<?php endif;?>
                          </div>
                          <div class="col s5 offset-s1 reducable-content">
                              <p class="dmp-main-color">
                                  <span id="fullname_state-generator_selected" class="light state-generator-api-variable-info" style="font-size:17px;"><?= h($manager_operator_identity->person->lastname.' '.$manager_operator_identity->person->firstname) ?></span> <br>
                                  <span id="age_state-generator_selected_single" class="state-generator-api-variable-info">
                                  	<?php $age = new \DateTime($manager_operator_identity->person->dateborn);
                                  		$now_date = new \DateTime('NOW');
                                  		$diff_date = $age->diff($now_date);
                                  		echo $diff_date->format('%Y'.' ans');
                                  	 ?>
                                  </span> <br>
                                  <span id="sexe_state-generator_selected_single" class="state-generator-api-variable-info">
                                  	<?php switch ($manager_operator_identity->person->sexe) {
                                  		case 'M':
                                  			echo 'Homme';
                                  		break;
                                  		
                                  		case 'F':
                                  			echo 'Femme';
                                  		break;
                                  	} ?>
                                  </span> <br>
                                  <span id="nationality_state-generator_selected_single" class="state-generator-api-variable-info">
                                  	<?= h($manager_operator_identity->person->nationality) ?>
                                  </span> <br>
                                  <span id='role_single_state-generator' class="state-generator-api-variable-info">
										<?= h(__('Manager')) ?>
                                  </span> <br>
                              </p>
                          </div>

                          <div class="col s3 offset-s1 right">
									<?= $this->Html->image('manager/'.$manager_operator_identity->institution->slug.'/assets/'.$manager_operator_identity->institution->logo_institution,['style'=>'width:110px; margin-top:18px;margin-bottom:20px','fullBase'=>true]) ?>
                          </div>
            
                      </div>
                </div>
                <div class="row center zero-margin dmp-main-back" style="border:2px solid #133f52;">
                	<h5 class="dmp-grey-2-text light">Etat Périodique du <?= h($formatted_start_date->format('d-m-Y').' au '.$formatted_end_date->format('d-m-Y')) ?></h5>
                </div>

                <div class="row bills-statistics-wrapper">
                    <?php 
                    $total_amount = 0;$total_bills = 0;$recovered_bills=0;$unrecovered_bills=0;$unrecovered_amount=0;$recovered_amount=0;$paid_payments=0; $unpaid_payments = 0; $total_payments=0;

                    foreach ($manager_operator_operations as $operation) {
                    	$total_amount+=$operation->amount;
                    	$total_bills++;

                    	if($operation->state===1)
                    	{
                    		$recovered_bills++;
                    	}
                    	else
                    	{
                    		$unrecovered_bills++;
                    	}

                    	foreach ($operation->visit_invoice_payments as $payment) {
                    		$total_payments++;
                    		if($payment->state===1)
                    		{
								$recovered_amount+=$payment->amount;
								$paid_payments++;
                    		}
                    		else
                    		{
                    			$unrecovered_amount+=$payment->amount;
                    			$unpaid_payments++;
                    		}
                    	}

                    } 

                    ?>
						<table class="striped bordered" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td style="text-transform:uppercase;">Chiffre d'affaire</td>
									<td class="bold dmp-grey-text"><?= number_format($total_amount,2,',','.').' F CFA' ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Factures Emises</td>
									<td class="bold dmp-grey-text"><?= h(__($total_bills)) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Factures Recouvrées</td>
									<td class="bold dmp-grey-text"><?= h(__($recovered_bills)) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Factures Non Recouvrées</td>
									<td class="bold dmp-grey-text"><?= h(__($unrecovered_bills)) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Montant Total Recouvré</td>
									<td class="bold dmp-grey-text"><?= h(__(number_format($recovered_amount,2,',','.').' F CFA')) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Montant Total Non recouvré</td>
									<td class="bold dmp-grey-text"><?= h(__(number_format($unrecovered_amount,2,',','.').' F CFA')) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Paiements Réglés</td>
									<td class="bold dmp-grey-text"><?= h(__($paid_payments)) ?></td>
								</tr>								
								<tr>
									<td style="text-transform:uppercase;">Paiements en atente de règlement</td>
									<td class="bold dmp-grey-text"><?= h(__($unpaid_payments)) ?></td>
								</tr>
								<tr>
									<td style="text-transform:uppercase;">Taux de Recouvrement</td>
									<td class="bold dmp-grey-text"><?= round(($paid_payments * 100)/$total_payments,2).' % ' ?></td>
								</tr>
							</tbody>
						</table>
						

						<h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:10px;">Récapitulatif de l'ensemble des factures emises</h5>

				<div class="row zero-margin">
						      <table class="bordered zero-margin" style="margin-top:30px;" id="emitted-bills-state-periodic-manager">
	                                <tbody class="dmp-main-color bold">
		                                 <tr>
		                                    <td  class="center-align" style="padding:1px;"><?= __('N° Facture') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Patient') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Code Visite') ?></td>	
		                                    <td  class="center-align" style="padding:1px;"><?= __('Emission') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Règlement') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Montant') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Type') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Moyen') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Nbre Paiements') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Paiements réglés') ?></td>
		                                    <td  class="center-align" style="padding:1px;"><?= __('Paiements en attente') ?></td>
		                                 </tr>
	                                </tbody>
	                                <tbody class="manager-api-variable-info">
										<?php foreach ($manager_operator_operations as $operation) :?>
											   <?php if($operation->sold_date) :?>
												<tr class="light-green-bill dmp-main-color" style="font-weight:500;">
											<?php else: ?>
												<tr class="light-red-bill dmp-main-color" style="font-weight:500;">
											<?php endif; ?>
													<td class=""><?= $operation->code_invoice ?></td>
													<td class="center-align"><?= $operation->visit->patient->person->lastname.' '.$operation->visit->patient->person->firstname ?></td>
													<td class="center-align"><?= $operation->visit->code_visit ?></td>
													<td class="center-align"><?= $operation->formatted_created ?></td>
													<?php if($operation->formatted_solded) :?>
													    <td><?= $operation->formatted_solded ?></td>
													<?php else: ?>
														<td>&nbsp;</td>
													<?php endif; ?>
													<td class="center-align"><?= number_format($operation->amount,2,',','.').' F CFA' ?></td>
													<td class="center-align"><?php 
														switch($operation->visit_invoice_type_id)
														{	
															case 1:
																 echo 'Visite';
															break;

															case 2:
																 echo 'Consultation';
															break;

															case 3:
																echo 'Réservation';
															break;

															case 4:
																echo 'Laboratoire';
															break;
														}
													 ?></td>
													 <td class="center-align"><?php
													 	switch($operation->visit_invoice_payment_way_id)
														{	
															case 1:
																 echo 'Cash';
															break;

															case 2:
																 echo 'Chèque/CB';
															break;

															case 3:
																echo 'Assurance';
															break;

															case 4:
																echo 'Réservation';
															break;

															case 5:
																echo 'Echelonnement';
															break;
														}
													  ?></td>
													   <td class="center-align"><?= h(__($operation->count_payments)) ?></td>
	   												   
	   												   <?php if($operation->count_sold) :?>
										  			      <td class="center-align"><?= h(__($operation->count_sold)) ?></td>
										  			   <?php else :?>
										  			      <td class="center-align">0</td>
										  			   <?php endif; ?>

													   <?php if($operation->count_unsold) :?>
										  			      <td class="center-align"><?= h(__($operation->count_unsold)) ?></td>
										  			   <?php else :?>
										  			      <td class="center-align">0</td>

										  			   <?php endif;?>
												</tr>
										<?php endforeach; ?>
	                                </tbody>
	                            </table>


								<h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:10px;">Récapitulatif de l'ensemble des paiements en attente</h5>
							    
							    <table id="unpaided-payments-tabe-recap-state" class="striped bordered zero-margin" cellpadding="0" cellspacing="0" style="margin-top:30px;">
							                <tbody>
							                	<tr>
							                        <td style="padding:5px;"><?= __('N° Facture') ?></td>
							                        <td style="padding:5px;"><?= __('N° Paiement') ?></td>
							                        <td style="padding:5px;"><?= __('Code Visite') ?></td>
							                        <td style="padding:5px;"><?= __('Date Prévue Règlement') ?></td>
							                        <td style="padding:5px;"><?= __('Montant') ?></td>
							                        <td style="padding:5px;"><?= __('Référence') ?></td>
							                        <td style="padding:5px;"><?= __('Moyen') ?></td>
							                	</tr>
							                </tbody>
							                <tbody>
												<?php foreach ($manager_operator_operations as $operation) :?>
													<?php foreach ($operation->visit_invoice_payments as $payment) :?>
														 <?php if ($payment->state===0) :?>
																<tr class="dmp-main-color" style="font-weight:500;">
																	<td><?= $operation->code_invoice ?></td>
																	<td><?= $payment->code_payment ?></td>
																	<td><?= $operation->visit->code_visit ?></td>
																	<td><?php $expected_date = new \DateTime($payment->visit_invoice_payment_schedule->expected_date);
																		echo $expected_date->format('d-m-Y');
																	 ?></td>
																	<td><?= number_format($payment->amount,2,',','.').' F CFA' ?></td>
																	<td><?= $payment->reference_payment ?></td>
																	<td><?php
																		switch($payment->visit_invoice_payment_method_id)
																		{
																			case 1:
																				echo 'Cash';
																			break;

																			case 2:
																				echo 'Banque(Chèque/CB)';
																			break;
																		}
																	 ?></td>
																</tr>
														 <?php endif; ?>
													<?php endforeach; ?>
												<?php endforeach; ?>
							                </tbody>
							     </table>
						</div>