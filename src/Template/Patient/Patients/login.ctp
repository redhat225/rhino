<?php $this->assign('title',"Authentification Patient"); ?>

<div class="container">
		<div class="container">
		  <div class="row center">
		     <div class="container">
		     	<div class="container">
					<?= $this->Html->image('assets_dmp/dmp.png',['style'=>'width:226px;']) ?>	     		
		     	</div>
		     </div>
		  </div>
		  <div class="row center">
		  <div class="container">
		  		<?= $this->Form->create(null,['id'=>'authentification-form','class'=>'login-dmp-form','target'=>'patient']) ?>

					<div class="input-field col s12">
						 <i class="prefix small ion-ios-person"></i>
					     <input id="username" name="username" type="text" class="required">
					     <label for="username">Nom Utilisateur</label>
				    </div>
				    <div class="input-field col s12">
						 <i class="prefix small ion-android-lock"></i>
					     <input id="password" name="password" type="password" class="required">
					     <label for="password">Mot de Passe</label>
				    </div>

				    <button type="submit" id="submit-login-admin" class="btn submit-button bold dmp-main-color">Connexion</button>
				   	 <div class="loaderAjax">
							  <div class="progress">
							      <div class="indeterminate"></div>
							  </div>
				      		<span class="white-text">Authentification en cours</span>
				      </div>
				<?= $this->Form->end() ?>



				<div class="row center" style="margin-top:29px;">	
					<p class="">
					   <?= $this->Html->link('Mot de passe oublié',['action' => 'forgotten'],['class'=>'white-text']) ?>
					</p>
					<p class="">
						<a href="#!" id="set-doctor-privilege-link" class="white-text">Accorder des privilèges</a>
					</p>			 
				</div>


		  	 
		    </div>	  	
		  </div>
		</div>
	</div>

</div>

<!-- Modal BoX Structure -->
  <div id="mainModal-suiviAdmin" class="modal white center-align">
        <div class="modal-content">
        		<p class="center">
					<?= $this->Html->image('assets_dmp/dmp2.png',['class'=>'reduced-icon-card']); ?> 
				</p>
            <h6 class="dmp-main-color modal-text bold acc-small-top-margin"></h6>
        </div>
        <div class="modal-footer dmp-main-back">
            <a href="#!" class="modal-action white-text modal-close waves-effect waves-green bold">OK</a>
        </div>
  </div>


  <!-- Modal BoX-Patients-Privilege Structure -->
  <div id="modal-box-privilege-doctor" class="modal white center-align modal-fixed-footer">
        <div class="modal-content">

            <div class="container">
            	<div class="container">
            		<?= $this->Form->create(null,['id'=>'form-set-privilege-doctor']) ?>
						    <i class="ion-ios-bookmarks dmp-main-color large"></i>
            				<h5 class="dmp-main-color modal-text bold acc-small-top-margin">Accorder des privilèges-medecin</h5>
							<div class="input-field col s12">
								 <i class="prefix small ion-ios-person"></i>
							     <input id="username" name="username" type="text" class="required">
							     <label for="username">Nom Utilisateur</label>
						    </div>
						    <div class="input-field col s12">
								 <i class="prefix small ion-android-lock"></i>
							     <input id="password" name="password" type="password" class="required">
							     <label for="password">Mot de Passe</label>
						    </div>

							<div class="col s12 input-field">
								<div class="row" id="search-doctor-wrapper">
									<input type="text" class="dropdown-button" data-beloworigin="true" autocomplete="off" name="search-doctor" data-activates="dropdown1" id="search-doctor" style="background:white !important;color:#130647 !important;font-weight:bold;">
		                        	<label for="search-doctor" style="color:blue !important; font-weight:bold; font-size:15px;">Rechercher un praticien</label>

				                     <ul id='dropdown1' class='dropdown-content' style="width:auto !important;">
				                     	<?php foreach ($doctors as $doctor) :?>
												<li value="<?= $doctor->id ?>" name="<?= strtoupper($doctor->person->nom)." ".strtoupper($doctor->person->prenom) ?>"><a href="" class="dmp-main-color bold">Dr. <?= $doctor->person->nom." ".$doctor->person->prenom ?></a></li>
										<?php endforeach; ?>
				                     </ul> 									
								</div>
								<div class="row hidden" id="search-doctor-result-wrapper">
									<input type="text" disabled id="doctor_name">
			                     	<input type="hidden" name="doctor_id" id="doctor_id" />
			                     	<a href="#!" class="btn dmp-main-back white-text" id="reset-form-search-doctor">Changer</a>
								</div>
							</div>
            		<?= $this->Form->end() ?>
            				<div class="col s12 hidden" id="loader-privilege">
								<?= $this->Html->image("assets_dmp/ajax_loader/loader-circle-blue.gif") ?>
								<h4 class="dmp-main-color bold">Enregistrement en cours ...</h4>
							</div>
            	</div>
            </div>
        </div>

	

        <div class="modal-footer dmp-main-back">
            <a href="#!" id="valid-privilege-doctor-trigger" class="white-text waves-effect btn-flat waves-green bold">Valider</a>
            <a href="#!" id="close-modal-privilege" class="modal-action white-text btn-flat modal-close waves-effect waves-red bold left">Annuler</a>
        </div>
  </div>
<?php $this->Html->script('Red/authentification',['block' => true]); ?>
<?php $this->Html->script('Red/patient/authentication-privilege-doctor',['block'=>true]); ?>
