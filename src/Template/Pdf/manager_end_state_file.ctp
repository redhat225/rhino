
<div class="row zero-padding zero-margin">	
			<div class="row zero-margin zero-padding" id="content-floating-box-order-generator">
			                          
						<div class="col s3 center" style="padding:10px;">
                            <?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution'],['style'=>'width:140px;','fullBase'=>true]) ?>
						</div>

						<div class="col s7 offset-s1 center">
							<h4 class="dmp-main-color bold" style="letter-spacing:1px;"><?= $institution['fullname'] ?></h4>
							
							<h6 class="dmp-main-color"><?= $institution['institution_quarter'].' '.$institution['institution_quarter_extra'].' - '.$institution['institution_adress']['postal_box'].' - Tél:+225 '.$institution['institution_adress']['tel'].' - Fax : +225 '.$institution['institution_adress']['fax'] ?><?= ' Cel: '.$institution['institution_adress']['contact1'].' / '.$institution['institution_adress']['contact2'].' - '.$institution['institution_adress']['website'] ?></h6>
							<br>

						</div>
			</div>

			<div class="row dmp-main-back center zero-padding zero-margin">	
								<h5 class="dmp-grey-2-text bold zero-margin zero-margin" style="padding:10px; font-weight:300;" style="text-transform:uppercase;"><?= $label_order ?></h5>
			</div>
		

		<?php if($data['patient']->id!=0) :?>
			<div class="row zero-padding">
				<div class="col s12">
						<h6 class="dmp-main-color bold left-align" style="padding:10px;">	
							Informations Administratives
					</h6>	
					<div class="col s7">	
							Nom : <span class="dmp-main-color"><?= $data['patient']->person->lastname ?></span>
					</div>

					<div class="col s5">	
							Code Patient: <span class="dmp-main-color"><?= $data['patient']->code ?></span>
					</div>
				</div><?php $now_date = new \DateTime('NOW'); ?>

				<div class="col s12">
					<div class="col s7">
						Prénoms: <span class="dmp-main-color"><?= $data['patient']->person->firstname ?></span> 
					</div>

					<div class="col s4">
					    	<?php 	$created_date= new \DateTime($close_previous_state_order_full->created); ?>
						    Date Entree:  <span class="dmp-main-color"><?= $created_date->format('d-m-Y H:i') ?> </span>
					</div>
				</div>

				<div class="col s12">
						<div class="col s7 left">
						    <?php if(isset($close_previous_state_order->visit_motif)) :?>
							Motif d'entrée: <span class="dmp-main-color"><?= $close_previous_state_order->visit_motif ?> </span>
						    <?php 	else: ?>
									Motif d'entrée: <span class="dmp-main-color"><?= $close_previous_state_order->hospy_motif ?> </span>
						    <?php 	endif; ?>
						</div>


						<div class="col s4">	
								Date Sortie:  <span class="dmp-main-color"><?= $now_date->format('d-m-Y H:i') ?> </span>
						</div>

						<div class="col s3">
						<?php switch($data['patient']->person->sexe){
								case 'M':
									$sexe = 'Homme';
								break;

								case 'F':
									$sexe = 'Femme';
								break;

							}?>
							Sexe: <span class="dmp-main-color"><?= $sexe ?></span>
						</div>
					    <div class="col s2">

						Age:  		<span class="dmp-main-color">				<?php  $dateborn = new \DateTime($data['patient']->person->dateborn); $diff_date= $dateborn->diff($now_date); echo abs($diff_date->format('%Y')).' an(s)'; ?>
						</span>
					   </div>
				</div>

			</div>
		    <?php else: ?>
				<?php $now_date= new \DateTime('now'); ?>
			<div class="row zero-padding">
				<div class="col s12">
						<h6 class="dmp-main-color bold left-align" style="padding:10px;">	
							Informations Administratives
					</h6>	  
					<div class="col s7">	
							Nom : <span class="dmp-main-color">Inconnu</span>
					</div>

					<div class="col s5">	
							Code Patient: <span class="dmp-main-color">Inconnu</span>
					</div>
				</div><?php $now_date = new \DateTime('NOW'); ?>

				<div class="col s12">
					<div class="col s7">
						Prénoms: <span class="dmp-main-color">Inconnu</span> 
					</div>

					<div class="col s4">
					     		<?php 	$created_date= new \DateTime($close_previous_state_order_full->created); ?>
						Date Entree:  <span class="dmp-main-color"><?= $created_date->format('d-m-Y H:i') ?> </span>
					</div>
				</div>

				<div class="col s12">
						<div class="col s7 left">
							Motif d'entrée: <span class="dmp-main-color"><?= $close_previous_state_order->visit_motif ?> </span>
						</div>

						<div class="col s4">
							Date Sortie:  <span class="dmp-main-color"><?= $now_date->format('d-m-Y H:i') ?> </span>
						</div>

						<div class="col s3">
							Age : <span class="dmp-main-color"><?= $close_previous_state_order->age_anonym_patient.' an(s)'  ?></span>
						</div>

						<div class="col s3">
							<?php switch ($close_previous_state_order->sexe_anonym_patient) {
								case 'H':
									$sexe_anonym = 'Homme';
  							    break;
								
								default:
									$sexe_anonym = 'Femme';	
								break;
							} ?>
							Sexe : <span class="dmp-main-color"><?= $sexe_anonym  ?></span>
						</div>
				</div>

			</div>

		<?php endif; ?>
			<div class="row center" style="margin-top:2%;">	
					<div class="col s6 center-align">	
							<h6 class="center-align">Signature &amp; Cachet Medecin/Superviseur Général</h6>
						    <img src="data:image/png;base64,<?= $credentials['signature_path'] ?>" style="text-align:center"/>

					</div>

					<div class="col s6 center-align">	
							Abidjan, le <?= $now_date->format('d-m-Y') ?> 
					</div>
			</div>
</div>

