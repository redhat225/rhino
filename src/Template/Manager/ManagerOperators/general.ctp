<?php $this->layout='blank' ?>
		<div class="col s10" id="general-info-wrapper" style="margin-top:40px;">
				  <div class="row item-general-info-wrapper">
				  		<div class="col s12 assets-item-general-info">
						    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
				               <i class="ion-document-text dmp-main-color small"></i>   Factures <?= $name_month ?><i class="ion-ios-minus dmp-main-color small right pointer-opaq trigger-minimization-general-stats"></i>
				            </h5>
				  		</div>

				  		<div class="col s12 content-item-general-info">
					        <div class="col s6">	
							        <div class="card-panel dmp-main-back pointer-opaq section-general-select hoverable" style="width:350px;" id="card-paid-invoices-trigger">
							        	<div class="row zero-margin">
								        	<div class="col s3">
												<i class="ion-document-text white-text large"></i>
											</div>
											<div class="col s4 zero-padding">
												<span>&nbsp;</span> <br> <br>
												<span class="white-text">Factures Réglées</span> <br>
											</div>
											<div class="col s5 center zero-padding">
												<span>&nbsp;</span> <br> <br>
												<span>&nbsp;</span> <br>
												<span class="white-text" style="font-size:60px;" id="paid-invoices-count"><?= $paid_invoices->count() ?></span>
											</div>
							        	</div>
							        </div>

							</div>
							<div class="col s6">
							        <div class="card-panel dmp-orange-back  pointer-opaq section-general-select hoverable" style="width:350px;" id="card-unpaid-invoices-trigger">
							        	<div class="row zero-margin">
								        	<div class="col s3">
												<i class="ion-document-text white-text large"></i>
											</div>
											<div class="col s4 zero-padding">
												<span>&nbsp;</span> <br> <br>
												<span class="white-text">Factures Impayées</span> <br>
											</div>
											<div class="col s5 center zero-padding"> <br>
												<span>&nbsp;</span> <br>
												<span>&nbsp;</span> <br>

												<span class="white-text" style="font-size:60px;" id="unpaid-invoices-count"><?= $unpaid_invoices->count() ?></span>
											</div>
							        	</div>
							        </div>
							        <div class="card-panel-info-box">
			
							        </div>
							</div>
				  		</div>
				     </div>
			<div class="row genral-info-wrapper">
				<div class="col s12 assets-item-general-info">
					  <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
		               <i class="ion-pie-graph dmp-main-color small"></i>  Volume des Transactions<i class="ion-ios-minus dmp-main-color small right pointer-opaq trigger-minimization-general-stats"></i></h5>
				</div>
				<div class="col s12 content-item-general-info">
				   <div class="col s6">	
					        <div class="card-panel dmp-main-back zero-padding" >
					        	<div class="row zero-margin">
						        	<div class="col s5 center">
										<i class="ion-ios-pie white-text large"></i>
									</div>
									<div class="col s7 center">
										<p style="text-align:left; border-bottom:1.4px solid white;">
											<span>&nbsp;</span> <br>
											<span class="white-text">Volume</span> <br>
											<span class="white-text"><?php $now= new \DateTime('NOW');echo $now->format('Y')?></span> <br>
										</p>
										<p style="text-align:left; font-weight:bold;">
											<span id="annual-number-container" annual-number="<?= $annual_number ?>" class="white-text" style="font-size:22px;"><?= number_format($annual_number,2,',','.').' F CFA' ?></span>
										</p>

									</div>
					        	</div>
					        </div>
					</div>
					<div class="col s6">
					        <div class="card-panel dmp-main-back zero-padding" >
					        	<div class="row zero-margin">
						        	<div class="col s5 center">
										<i class="ion-ios-pie-outline white-text large"></i>
									</div>
									<div class="col s7 center">
										<p style="text-align:left; border-bottom:1.4px solid white;">
											<span>&nbsp;</span> <br>
											<span class="white-text">Volume</span> <br>
											<span class="white-text"><?= $name_month ?></span> <br>
										</p>
										<p style="text-align:left; font-weight:bold;">
											<span id="monthly-number-container" class="white-text" style="font-size:22px;" monthly-number="<?= $monthly_number ?>"><?= number_format($monthly_number,2,',','.').' F CFA' ?></span>
										</p>

									</div>
					        	</div>
					        </div>
					</div>
				</div>
			</div>

			<div class="row genral-info-wrapper">
				<div class="col s12 assets-item-general-info">
					<h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
			         <i class="ion-stats-bars dmp-main-color small"></i> Graphes Des Transactions<i class="ion-ios-minus dmp-main-color small right pointer-opaq trigger-minimization-general-stats"></i></h5>
				</div>


				<div class="col s12">
			          <div class="card dmp-main-back darken-1">
			             <div class="card-content white-text">
							<canvas id="monthly-transactions-grouping"></canvas>
			            </div>
			         </div>

				</div>

			</div>




<!-- 
			<div class="row genral-info-wrapper">
				<div class="col s12 assets-item-general-info">
								    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
		               <i class="ion-crop dmp-main-color small"></i>  Sections<i class="ion-ios-minus dmp-main-color small right pointer-opaq trigger-minimization-general-stats"></i></h5>
				</div>
				<div class="col s12 content-item-general-info">
				   <div class="col s6">	
					        <div class="card-panel dmp-main-back" >
					        	<div class="row zero-margin">
						        	<div class="col s5 center">
										<i class="ion-erlenmeyer-flask-bubbles white-text large"></i>
									</div>
									<div class="col s7 center">
										<p style="text-align:left; border-bottom:1.4px solid white;">
											<span>&nbsp;</span> <br>
											<span class="white-text">Laboratoire</span> <br>
										</p>
									</div>
					        	</div>
					        </div>
					</div>
				    <div class="col s6">	
					        <div class="card-panel dmp-main-back" >
					        	<div class="row zero-margin">
						        	<div class="col s5 center">
										<i class="ion-ios-medical white-text large"></i>
									</div>
									<div class="col s7 center">
										<p style="text-align:left; border-bottom:1.4px solid white;">
											<span>&nbsp;</span> <br>
											<span class="white-text">Pharmacie</span> <br>
										</p>
									</div>
					        	</div>
					        </div>
					</div>
				</div>
			</div> -->

		</div>
		<div class="col s2 center" style="margin-top:40px;">
			 <?php if($institution->logo_institution!==null) :?>
				<?php $url='manager/'.$institution->slug.'/assets/'.$institution->logo_institution; ?>
				<?= $this->Html->image($url,['style'=>'width:105px;']) ?>
			 <?php else: ?>
			 	<p class="pointer-opaq">
				 	<i class="ion-image dmp-main-color large"></i>
				 	<h6 class="dmp-main-color bold">Logo Institution</h5>
			 	</p>
			 <?php endif; ?>
		</div> 
	
<?= $this->Html->script('Red/manager/manager-operators/dashboard-engine') ?>
<?= $this->Html->script('Red/manager/manager-operators/manage_payments') ?>


<script>
Chart.defaults.global.defaultFontColor='#fff';
$.get('/manager/manager-operators/general-stats',function(data){
	if(data!==false)
	{
		var array_bars_labels = new Array();
		var array_bars_values = new Array();
		var results = JSON.parse(data);
		var label = results[0];

		$.each(JSON.parse(results[1]), function(index, value){
			array_bars_values.push(value.amount);
			array_bars_labels.push(value.formatted_created);
		});	
		// building charts
		var lineChart = $('#monthly-transactions-grouping');
		var lineChart = new Chart(lineChart,{
				type:'line',
				data:{
					labels: array_bars_labels,
					datasets:[{
						label:'Transactions du mois de '+label,
						data: array_bars_values,
		            	fill: true,
		            	lineTension: 0.1,
		            	backgroundColor: "rgba(75,192,192,1)",
		            	borderColor: "#dc6b1d",
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
		            	defaultFontColor:'white'
					}
					]
				},
				options:{
					responsive: true
				}
		});
	}
	else
	  return false;
});

</script>