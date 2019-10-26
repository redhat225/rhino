	  <div class="row content-wrapper" id="content-floating-box-order-generator-wrapper">
			<div class="row zero-margin zero-padding" id="content-floating-box-order-generator">
			                          
						<div class="col s3 center" style="padding:10px;">
                            <?= $this->Html->image('manager/'.$visit->manager_operator->institution->slug.'/assets/'.$visit->manager_operator->institution->logo_institution,['style'=>'width:120px;','fullBase'=>true]) ?>
						</div>

						<div class="col s9 center">
							<h5 class="dmp-main-color bold" style="letter-spacing:1px;"><?= $visit->manager_operator->institution->fullname ?></h5>
							
							<h8 class="dmp-main-color"><?= $visit->manager_operator->institution->institution_quarter.' '.$visit->manager_operator->institution->institution_quarter_extra.' - '.$visit->manager_operator->institution->institution_adress->postal_box.' - Tél:+225 '.$visit->manager_operator->institution->institution_adress->tel.' - Fax : +225 '.$visit->manager_operator->institution->institution_adress->fax ?><?= ' Cel: '.$visit->manager_operator->institution->institution_adress->contact1.' / '.$visit->manager_operator->institution->institution_adress->contact2.' - '.$visit->manager_operator->institution->institution_adress->website ?></h8>
							<br><br>
							<h5 class="dmp-main-color bold zero-margin"><?= $data['label_order'] ?></h5>

						</div>
			</div>

			<h5 class="dmp-grey-2-text dmp-main-back center" style="padding:5px;font-weight:100 !important;">Renseignements Administratifs</h5>
			<div class="row zero-margin" style="padding-top:16px;">
			          <div class="col s3 patient-hospy-api-variable-info reducable-content" id="patient-hospy-evidence-search-single">
			          		<?php if($visit->patient->person->path_pic) :?>
							    <?= $this->Html->image('patient/patient_identity/'.$visit->patient->person->path_pic,['style'=>'width:110px;','fullBase'=>true]) ?>
							<?php else: ?>
								<i class="ion-ios-contact medium dmp-main-color"></i>
							<?php endif; ?>
			          </div>
			          <div class="col s5 reducable-content">
			                              <p class="dmp-main-color zero-margin">
			                                  <span id="fullname_patient-hospy_selected" class="bold patient-hospy-api-variable-info" style="font-size:17px;"><?= $visit->patient->person->lastname.' '.$visit->patient->person->firstname ?></span> <br>
			                                  <span id="age_patient-hospy_selected_single" class="patient-hospy-api-variable-info">
			                                  	<?php $now = new \DateTime();
			                                  		 $born_date = new DateTime($visit->patient->person->dateborn);
			                                  		 $diff_date = $born_date->diff($now);
			                                  		 echo abs($diff_date->format('%Y')).' an(s)';
			                                  	 ?>
			                                  </span> <br>
			                                  <span id="sexe_patient-hospy_selected_single" class="patient-hospy-api-variable-info">
			                                  	<?php switch($visit->patient->person->sexe){
			                                  		case 'M':
			                                  			echo 'Homme';
			                                  		break;

			                                  		case 'F':
			                                  			echo 'Femme';
			                                  		break;
			                                  		} ?>
			                                  </span> <br>
			                                  <span id="nationality_patient-hospy_selected_single" class="patient-hospy-api-variable-info">
			                                  	<?= $visit->patient->person->nationality ?>
			                                  </span> <br>
			                                  <span id='contact_single_patient-hospy' class="patient-hospy-api-variable-info">
			                                  	<?php if($visit->patient->person->people_contact->contact2) :?>
			                                  		<?= $visit->patient->person->people_contact->contact1.'/'.$visit->patient->person->people_contact->contact2 ?>
												<?php else: ?>
													<?= $visit->patient->person->people_contact->contact1 ?>
			                                  	<?php endif; ?>
			                                  </span> <br>
			                              </p>
			                          </div>
			              <div class="col s4 reducable-content">  
			                              <p class="dmp-main-color zero-margin">
			                                   <span id="adress_1_patient-hospy_selected_single" class="patient-hospy-api-variable-info"><?= $visit->patient->person->people_adress->city_quarter.'-'.$visit->patient->person->people_adress->country_township->label_township ?></span> <br>
			                                   <span id="adress_2_patient-hospy_selected_single" class="patient-hospy-api-variable-info bold"><?= $visit->patient->person->people_adress->country_township->country_city->label_city.'-'.$visit->patient->person->people_adress->country_township->country_city->country->label_country ?></span> <br>

			                                   <span class="bold dmp-main-color"><?= $visit->code_visit ?></span>
			                              </p>
			                </div>
			                    
			</div>
			<div class="row zero-margin">
					<div class="row center">
						<div class="col s2 input-field">
							<h6 class="bold dmp-main-color">N° Chambre/Bloc</h6>
							<i class="ion-android-clipboard dmp-main-color prefix"></i>
							<input type="number" class="required" readonly value="<?= $data['room_number'] ?>" name="room_number" id="room_number" style="border:0px !important;"/>
						</div>
						<div class="col s5 input-field">
							<h6 class="bold dmp-main-color">Descriptif(Optionnel)</h6>
							<i class="ion-social-twitch dmp-main-color prefix"></i>
							<textarea type="text" class="materialize-textarea" readonly value="<?= $data['room_description'] ?>" name="room_description" id="room_description" style="border:0px !important;"></textarea>
						</div>
						<div class="col s3 input-field">
							<h6 class="bold dmp-main-color">Date Entrée</h6>
							<?php $now_date = new \DateTime(); ?>
							<input type="date" style="border:0px !important;" readonly value="<?= $now_date->format('d-m-Y H:i') ?>" required class="required date_hospy_input" name="date_enter_hospie" id="date_enter_hospie">
						</div>
						<div class="col s2 input-field">
							<h6 class="bold dmp-main-color">Date Sortie</h6>
							<?php $end_date = new \DateTime($data['date_eprobably_end_hospie']); ?>
							<input type="date" style="border:0px !important;" readonly value="<?= $end_date->format('d-m-Y'); ?>" required class="required date_hospy_input" name="date_eprobably_end_hospie" id="date_probably_end_hospie">
						</div>
					</div>
			</div>

			<h5 class="dmp-grey-2-text dmp-main-back center zero-margin" style="padding:5px;font-weight:300;">Renseignements Médicaux</h5> 

			<div class="row zero-margin center" style="padding-top:14px;">
					<div class="col s4 input-field">
						<h6 class="bold dmp-main-color">Motif Entrée</h6>
						<i class="ion-code-working prefix dmp-main-color"></i>
						<input style="border:0px !important;" name="hospy_motif" id="hospy_motif" readonly value="<?= $data['hospy_motif'] ?>" class="materialize-textarea required">
					</div>
					<div class="col s4 input-field">
						<h6 class="bold dmp-main-color">Médecin Adresseur</h6>
						<i class="ion-fork-repo dmp-main-color prefix"></i>
						<input style="border:0px !important;" type="text" readonly value="<?= $data['doctor_adressor'] ?>" name="doctor_adressor" id="doctor_adressor" class="required" />
					</div>
					<div class="col s4 input-field">
						<h6 class="bold dmp-main-color">Médecin Référent</h6>
						<i class="ion-fork-repo dmp-main-color prefix"></i>
						<input style="border:0px !important;" type="text" readonly value="<?= $data['doctor_reference'] ?>" name="doctor_reference" id="doctor_reference" class="required" />
					</div>
			</div>

		<div class="row center zero-margin zero-padding">
		    <div class="col s6 input-field zero-margin zero-padding">
		    	<h6 class="dmp-main-color bold">Mode d'arrivée</h6>
		    	<?php switch ($data['visit_kind_transport_id'])
		    	{
		    		case 1:
		    			echo 'Consultation';
		    		break;

		    		case 2:
		    			echo 'Ambulance';
		    		break;

		    		case 3:
		    			echo 'SAMU';
		    		break;

		    		case 4:
		    			echo 'Sapeurs-Pompiers';
		    		break;

		    		case 5:
		    			echo 'Transfert';
		    		break;

		    		case 6:
		    			echo 'Domicile';
		    		break;
		    		
		    	} ?>
		    </div>

		    <div class="col s6 input-field zero-margin zero-padding">
		    		<h6 class="dmp-main-color bold">Etat du Patient</h6>
					<?php switch ($data['visit_level_id']){
		    		case 1:
		    			echo 'Stable';
		    		break;

		    		case 2:
		    			echo 'Critique';
		    		break;

		    		case 3:
		    			echo 'Comma';
		    		break;
						} ?>
		    </div>
		</div>
</div>

			<div class="row center zero-margin">	
					<div class="col s6 center-align">	
							<h6 class="center-align">Signature &amp; Cachet Medecin/Superviseur Général</h6>
						    <img src="data:image/png;base64,<?= $credentials['signature_path'] ?>" style="text-align:center;width:50%;"/>

					</div>
					<div class="col s6 center-align">
						<?= 'Fait à Abidjan le '.$now_date->format('d-m-Y'); ?>
					</div>
			</div>