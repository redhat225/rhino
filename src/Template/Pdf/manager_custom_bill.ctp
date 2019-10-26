<div class="row zero-padding white zero-margin" style="height:150px !important;">	
			<div class="row zero-margin zero-padding" id="content-floating-box-order-generator">
			                          
						<div class="col s2 center" style="padding:10px;">
                            <?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution'],['style'=>'width:140px;','fullBase'=>true]) ?>
						</div>

						<div class="col s9 offset-s1 center">
							<h5 class="dmp-main-color bold" style="letter-spacing:1px;"><?= $institution['fullname'] ?></h5>
							
							<span class="dmp-main-color"><?= $institution['institution_quarter'].' '.$institution['institution_quarter_extra'].' - '.$institution['institution_adress']['postal_box'].' - Tél:+225 '.$institution['institution_adress']['tel'].' - Fax : +225 '.$institution['institution_adress']['fax'] ?><?= ' Cel: '.$institution['institution_adress']['contact1'].' / '.$institution['institution_adress']['contact2'].' - '.$institution['institution_adress']['website'] ?></span>
							<br>

						</div>
			</div>

			<div class="row center zero-margin white">	
					<h5 class="dmp-main-color" style="font-weight:300;"><?= $visit_invoice->invoice_label ?></h5>
			</div>
			
			<div class="row dmp-main-back">
				<h6 class="left dmp-grey-2-text" style="padding:5px;font-weight:300;">Informations Administratives</h6>
				<h6 class="right dmp-grey-2-text" style="padding:5px;font-weight:300;">Facture - <span><?= $visit_invoice->code_invoice ?></span></h6>

			</div>


			<div class="row white">
			    <div class="col s12">
					<?php $now_date = new \DateTime('NOW'); ?>
					<div class="col s5 left-align">Visite: <span class="dmp-main-color"><?= $visit->code_visit ?></span></div>
					<div class="col s4 left-align">Date: <span class="dmp-main-color"><?= $now_date->format('d-m-Y H:i') ?></span></div>
					<div class="col s3 left-align">Etat: <span class="dmp-main-color"><?= $visit->visit_states[0]->visit_state_type->label_state_type ?></span></div>
			    </div>
			    <div class="col s12">
					<div class="col s3">
						Nom : <span class="dmp-main-color" style="text-transform:uppercase;"><?= $visit->patient->person->lastname; ?></span>
					</div>
					<div class="col s9">
						Prénoms : <span class="dmp-main-color"><?= $visit->patient->person->firstname; ?></span>
					</div>
			    </div>

			    <div class="col s12">
			    	<div class="col s5">
						Code Patient : <span class="dmp-main-color" style="text-transform:uppercase;"><?= $visit->patient->code; ?></span>
					</div>
				   <div class="col s3">
					<?php $dateborn = new \DateTime($visit->patient->person->dateborn); $diff_date = $dateborn->diff($now_date); ?>
						Age: <span class="dmp-main-color"><?= round($diff_date->format('%Y')).' an(s)'; ?></span>
					</div>
					<div class="col s4">
					<?php switch($visit->patient->person->sexe){case'M':$sexe_patient = 'Homme'; break; case'F':$sexe_patient = 'Femme'; break;} ?>
						Sexe: <span class="dmp-main-color"><?= $sexe_patient ?></span>
					</div>

			    </div>

			</div>

			<h6 class="dmp-main-back dmp-grey-2-text zero-margin" style="padding:5px;">Contenu Facture</h6>
			<div class="row white">
			<table class="MyTable striped zero-margin bordered bold centered table-space white" cellpadding="0" cellspacing="0" id="reattribute-visit-table-patient" style="margin-top:30px;">
	                  <thead class="dmp-main-color white">
	                    <th class="zero-margin" style="padding:10px;"><?= __('Désignation') ?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Type')?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Description')?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Qte')?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Mt unitaire') ?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Mt HT') ?></th>
	                    <th class="zero-margin" style="padding:10px;"><?= __('Mt TTC') ?></th>
	                  </thead>
	                  <tbody class="white">
	                  <?php $sum=0; ?>
	                  		<?php if($visit_invoice->visit_invoice_items) :?>
								<?php foreach ($visit_invoice->visit_invoice_items as $item):?>
									<tr>
										<td style="text-align:left !important;"><?= $item->label_item ?></td>
										<td><?= $item->_joinData->label ?></td>
										<td><?= $item->_joinData->details ?></td>
										<td><?= $item->_joinData->qty ?></td>
										<td><?= number_format($item->_joinData->amount,2,',','.') ?></td>
										<td><?=number_format(($item->_joinData->qty*$item->_joinData->amount)-($item->_joinData->qty*$item->_joinData->amount*0.18),2,',','.') ?></td>
										<td><?= number_format(($item->_joinData->qty*$item->_joinData->amount),2,',','.') ?></td>
										<?php $sum+=($item->_joinData->qty*$item->_joinData->amount); ?>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>

	                  		<?php if($visit_invoice->visit_acts) :?>
									<?php foreach ($visit_invoice->visit_acts as $act):?>
										<tr>
											<td style="text-align:left !important;"><?= $act->label ?></td>
											<td><?= $act->_joinData->label ?></td>
											<td><?= $act->_joinData->details ?></td>
											<td><?= $act->_joinData->qty ?></td>
											<td><?= number_format($act->_joinData->amount,2,',','.') ?></td>
											<td><?= number_format(($act->_joinData->qty*$act->_joinData->amount)-($act->_joinData->qty*$act->_joinData->amount*0.18),2,',','.') ?></td>
											<td><?= number_format(($act->_joinData->qty*$act->_joinData->amount),2,',','.') ?></td>
											<?php $sum+=($act->_joinData->qty*$act->_joinData->amount); ?>
										</tr>
									<?php endforeach; ?>
							<?php endif; ?>

	                  		<?php if($visit_invoice->label_type_custom_bill) :?>

								<?php $length_custom = count($visit_invoice->label_type_custom_bill); ?>
								<?php for($i=0; $i<$length_custom; $i++) :?>
									<tr>
										<td style="text-align:left !important;"><?= $visit_invoice->label_type_custom_bill[$i] ?></td>
										<td><?= $visit_invoice->label_type_custom_bill[$i] ?></td>
										<td><?= $visit_invoice->description_custom_bill[$i] ?></td>
										<td><?= $visit_invoice->qte_custom_item[$i] ?></td>
										<td><?= number_format( $visit_invoice->unit_price_custom_item[$i],2,',','.') ?></td>
										<td><?= number_format(($visit_invoice->unit_price_custom_item[$i]*$visit_invoice->qte_custom_item[$i])-($visit_invoice->unit_price_custom_item[$i]*$visit_invoice->qte_custom_item[$i]*0.18),2,',','.') ?></td>
										<td><?= number_format(($visit_invoice->qte_custom_item[$i]*$visit_invoice->unit_price_custom_item[$i]),2,',','.') ?></td>
										<?php $sum+=($visit_invoice->qte_custom_item[$i]*$visit_invoice->unit_price_custom_item[$i]); ?>
									</tr>
								<?php endfor; ?>

							<?php endif; ?>
	                  </tbody>
	                  <tfoot>
	                    <tr>
		                  	<td class="white"></td>
		                  	<td class="white"></td>
		                  	<td class="white"></td>
		                  	<td colspan="2" class="dmp-main-back dmp-grey-2-text">Montant HT</td>
		                  	<td colspan="2" class="dmp-main-back dmp-grey-2-text" style="text-align:right !important;"><?= number_format($sum-($sum*0.18),2,',','.').' F CFA' ?></td>
	                    </tr>
	                    <tr>
		                  	<td class="white"></td>
		                  	<td class="white"></td>
		                  	<td class="white"></td>
		                  	<td colspan="2" class="dmp-main-back dmp-grey-2-text">Montant TTC</td>
		                  	<td colspan="2" class="dmp-main-back dmp-grey-2-text" style="text-align:right !important;"><?= number_format($sum,2,',','.').' F CFA'; ?></td>
	                    </tr>
	                  </tfoot>
	            </table>
			</div>			

		
</div>

