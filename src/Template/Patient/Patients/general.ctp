<div class="row center accc-row-padding">
	<div class="container accc-row-padding">
					<?= $this->Html->image('assets_dmp/dmp2.png',['style'=>'width:200px;']) ?>
	       	       	<div class="row">
		  				<h4 class="bold dmp-main-color zero-margin">Tableau de bord</h4>
		  				<h6 class="bold accc-small-bottom-margin">Bienvenue <?= h($user['person']['lastname']." ". $user['person']['firstname']) ?> dans votre dossier médical personnnel</h6>
					</div>

				    <div class="col s12">
							  <a href="/patient/people/view" class="none-decoration dmp-main-color bold">
								  <div class="col l4 m4 s12">
			  							<div class="card gg-card center courrierArrive pointer choice-general" id="suivi-courrier-arrive">
				  							<div class="card-content admin-accc-general-card">
				  								<i class="ion-card large dmp-main-color"></i>
				  								<p class="bold title-card-alt">
				  									Identité
				  								</p>
				  							</div>
			  							</div>
			  						</div>
								</a>
		
								<a href="/patient/patients/view" class="none-decoration dmp-main-color bold">
											<div class="col l4 m4 s12">
			  							<div class="card gg-card center courrierDepart pointer choice-general" id="suivi-courrier-depart">
				  							<div class="card-content admin-accc-general-card">
				  								<i class="ion-cube large dmp-main-color"></i>
				  								<p class="bold title-card-alt">
				  									Mon Compte
				  								</p>
				  							</div>
			  							</div>
			  						</div>
								</a>

			 					<a href="#!" class="dmp-main-color bold" id="carnet-generator" idpatient="<?= $user['id'] ?>">
				  						<div class="col l4 m4 s12">
				  							<div class="card gg-card center researches-courrier pointer choice-general" id="suivi-archives-admin">
					  							<div class="card-content admin-accc-general-card">
					  								<?= $this->Html->image('assets_dmp/ajax_loader/loader-orange.gif',['style'=>'width:100px;','id'=>'loader-carnet-generator','class'=>'hidden']) ?>
					  								<i class="ion-ios-book large dmp-main-color" id='asset-carnet-generator'></i>
					  								<p class="bold title-card-alt">
					  									Carnet De Santé
					  								</p>

					  							</div>
				  							</div>
				  						</div>
								   </a>
				 </div>

					 <div class="col s12">
									  <a href="/patient/patient-bookings" class="dmp-main-color bold">
					  						<div class="col l4 m4 s12">
					  							<div class="card gg-card center pointer choice-general">
						  							<div class="card-content admin-accc-general-card">

						  								<i class="ion-clipboard large dmp-main-color"></i>
						  								<p class="bold title-card-alt">
						  									Réservations
						  								</p>
						  							</div>
					  							</div>
					  						</div>
									   </a>
					 </div>


  	</div>
</div>


<?php// if($publisher) :?>
	  <!-- Publisher Structure -->
<!--   <div id="publisher" class="modal">
    <div class="modal-content zero-margin zero-padding" style="overflow-x:auto;overflow-y:hidden;height:309px;width:717px;">
       <?= $this->Html->image('pubs/saham-insurance-1.jpg',['style'=>'width:717px; height:309px;']) ?>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat white-text">Fermer</a>
    </div>
  </div>

  <script>

  		$("#publisher").openModal({
  			dismissible : false
  		});

  </script> -->
<?php //endif; ?>

<?php $this->Html->script("Red/patient/dash-patient",['block'=>true]) ?>
