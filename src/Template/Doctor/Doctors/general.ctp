<div class="row center accc-row-padding">
	<div class="container accc-row-padding">
					<?= $this->Html->image('assets_dmp/dmp2.png',['style'=>'width:200px;']) ?>
	       	       	<div class="row">
		  				<h4 class="bold dmp-main-color zero-margin">Tableau de bord</h4>
		  				<h6 class="bold accc-small-bottom-margin">Bienvenue Dr. <?= h($user['person']['lastname']." ". $user['person']['firstname']) ?> dans la gestion des dossiers médicaux</h6>
					</div>

				    <div class="col s12">
							  <a href="/doctor/people/view" class="none-decoration dmp-main-color bold">
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
		
								<a href="/doctor/doctors/view" class="none-decoration dmp-main-color bold">
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

								<a href="/doctor/visit-meetings/historical" class="none-decoration dmp-main-color bold">
											<div class="col l4 m4 s12">
			  							<div class="card gg-card center courrierDepart pointer choice-general" id="suivi-courrier-depart">
				  							<div class="card-content admin-accc-general-card">
				  								<i class="ion-pull-request large dmp-main-color"></i>
				  								<p class="bold title-card-alt">
				  									Historique des consultations
				  								</p>
				  							</div>
			  							</div>
			  						</div>
								</a>
				 </div>

					 <div class="col s12">

								<a href="/doctor/doctors/planning" class="none-decoration dmp-main-color bold">
											<div class="col l4 m4 s12">
			  							<div class="card gg-card center courrierDepart pointer choice-general" id="suivi-courrier-depart">
				  							<div class="card-content admin-accc-general-card">
				  								<i class="ion-map large dmp-main-color"></i>
				  								<p class="bold title-card-alt">
				  									Planning
				  								</p>
				  							</div>
			  							</div>
			  						</div>
								</a>

								<a href="/doctor/doctors/notifications" class="none-decoration dmp-main-color bold">
											<div class="col l4 m4 s12">
			  							<div class="card gg-card center courrierDepart pointer choice-general" id="suivi-courrier-depart">
				  							<div class="card-content admin-accc-general-card">
				  								<i class="ion-android-notifications large dmp-main-color"></i>
				  								<p class="bold title-card-alt">
				  									Notifications
				  								</p>
				  							</div>
			  							</div>
			  						</div>
								</a>
					 </div>


  	</div>
</div>
