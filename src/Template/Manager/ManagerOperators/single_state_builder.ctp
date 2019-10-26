<?php $this->layout('blank') ?>
                  <div class="row zero-margin zero-padding" id="content-floating-box-state-generator">
                        <div class="row zero-margin" id="state-generator-main-info" style="border-bottom:1.3px solid white;">
                          <div class="col s2 state-generator-api-variable-info reducable-content" id="state-generator-evidence-search-single">
								<?php if($manager_operator_identity->person->path_pic) :?>
									<?= $this->Html->image('manager/'.$manager_operator_identity->institution->slug.'/manager_identity/'.$manager_operator_identity->person->path_pic,['style'=>'width:150px; margin-top:18px;']) ?>
								<?php else: ?>
									<i class="ion-ios-contact-outline dmp-main-color medium"></i>
								<?php endif;?>
                          </div>
                          <div class="col s5 reducable-content">
                              <p class="dmp-main-color">
                                  <span id="fullname_state-generator_selected" class="bold state-generator-api-variable-info" style="font-size:17px;"><?= h($manager_operator_identity->person->lastname.' '.$manager_operator_identity->person->firstname) ?></span> <br>
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
	
                          <div class="col s3 center">
                          	 <div class="container" style="margin-top:15px;">
	                          	  <i class="ion-android-apps dmp-main-color medium pointer-opaq dropdown-button" data-activates="dropdown-choices-states" data-alignment="right" data-constrainwidth='false' data-beloworigin='true' data-hover='true'></i>
								  
								  <ul id='dropdown-choices-states' class='dropdown-content dmp-main-back' style="width:150px;">
								    <li><a href="<?= $pdf_view_url ?>" target='_blank'>Rendu PDF</a></li>
								  </ul>
                          	 </div>
                          </div>
            
                          <div class="col s2" style="float:right !important;padding-left:0px;" id="closer-floating-box-state-generator-wrapper">
                              <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-state-generator-trigger" style="color:orange !important;"></i>
                              
                              <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-state-generator-trigger" style="color:orange !important;"></i>
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
						

						<h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:10px;">Récapitulatif de l'ensemble des factures emises <i class="ion-chevron-up dmp-orange-text pointer-opaq hide-emitted-bills-state-periodic" style="padding:0 9px;"></i></h5>

				<div class="row zero-margin">
						      <table class="bordered zero-margin" style="margin-top:30px;" id="emitted-bills-state-periodic-manager">
	                                <thead class="dmp-main-color">
	                                    <th class="center-align" style="padding:1px;"><?= __('N° Facture') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Patient') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Code Visite') ?></th>	
	                                    <th class="center-align" style="padding:1px;"><?= __('Emission') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Règlement') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Montant') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Type') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Moyen') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Nbre Paiements') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Paiements réglés') ?></th>
	                                    <th class="center-align" style="padding:1px;"><?= __('Paiements en attente') ?></th>
	                                </thead>
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


								<h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:10px;">Récapitulatif de l'ensemble des paiements en attente <i class="ion-chevron-up dmp-orange-text pointer-opaq hide-unpaided-payments-state-periodic" style="padding:0 9px;"></i></h5>
							    
							    <table id="unpaided-payments-tabe-recap-state" class="striped bordered zero-margin" cellpadding="0" cellspacing="0" style="margin-top:30px;">
							                <thead class="dmp-main-color zero-padding">
							                        <th style="padding:5px;"><?= __('N° Facture') ?></th>
							                        <th style="padding:5px;"><?= __('N° Paiement') ?></th>
							                        <th style="padding:5px;"><?= __('Code Visite') ?></th>
							                        <th style="padding:5px;"><?= __('Date Prévue Règlement') ?></th>
							                        <th style="padding:5px;"><?= __('Montant') ?></th>
							                        <th style="padding:5px;"><?= __('Référence') ?></th>
							                        <th style="padding:5px;"><?= __('Moyen') ?></th>
							                </thead>
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
						<div class="row center zero-margin">
							<div class="col s4 zero-padding zero-margin">									
						       <h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:14.6px;">Etat des recouvrements</h5>
							   <div class="row center">	
							 		<canvas id="pie-state-recovery-bills" style="display:inline-block !important;" height="400" width="400">
							 	
							        </canvas>
							   </div>
							</div>
							<div class="col s8 zero-padding zero-margin">
						       <h5 class="center dmp-grey-2-text dmp-main-back light zero-margin" style="padding:10px;border-left:1px solid white;">Les plus Grandes Transactions journalières <i class="ion-arrow-graph-up-right btn white dmp-main-color pointer-opaq change-graph-view-periodic-state" style="padding:0 9px;"></i></h5>
						       <div class="row center">
						          <canvas id="bars-state-transactions" class="chart-transactions" style="display:inline-block !important;" height="400" width="400">
						       	
						          </canvas>
							      <canvas id="line-state-transactions" style="display:inline-block !important;" class="hide chart-transactions" height="400" width="400">
							   	
							      </canvas>
						       </div>


							</div>
						</div>
                </div>

<!-- Charts Builder -->
<script>
var ctx = document.getElementById("pie-state-recovery-bills");


var pieChart = new Chart(ctx, {
		type:'pie',
		data:{
			labels:['Total Recouvert', 'Total non-recouvert'],
			datasets:[{
				data: [<?php echo $recovered_amount ?>,<?php echo $unrecovered_amount ?>],
				backgroundColor: ['#133f52','#dc6b1d']
			}]
		},
		options:{
			responsive:false
		}
});

//multicharts drawing

array_bars_values = new Array();
array_bars_labels = new Array();
<?php foreach ($manager_operator_bars_charts as $invoice) :?>
		array_bars_values.push(<?= $invoice->total_sum ?>);
		array_bars_labels.push("<?= $invoice->created_date ?>");
<?php endforeach; ?>

var barChart = $('#bars-state-transactions');
var barChart = new Chart(barChart, {
    type:'horizontalBar',
    data:{
        labels: array_bars_labels,
        datasets: [{
        	label: 'Transactions du <?= $formatted_start_date->format('d-m-y') ?> au <?= $formatted_end_date->format('d-m-y') ?>',
            data: array_bars_values,
            backgroundColor: '#7db1c8',
            borderWidth: 8,
            hoverBorderColor:'#cccccc',
            hoverBackgroundColor: '#dc6b1d',
        }]
    },
    options:{
    	responsive: false
    }
});

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
			responsive: false
		}
});

</script>
<script>

var $state_generator_floating_box = $('#floating-box-state-generator');

  $('#close-floating-box-state-generator-trigger').on('click',function(){
    $('#floating-box-state-generator').addClass('hidden');
    $('#floating-box-state-generator').removeClass('used');
    $('#closer-floating-box-state-generator-wrapper').removeClass('right');
    $('#reduced-floating-box-state-generator-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-state-generator-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-state-generator').css({'height':'1200px'});
    $('.reducable-content').removeClass('hidden');
    $('#floating-box-state-generator').attr('state-generator-id','0');

        if($('#close-floating-box-state-generator-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-state-generator-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-state-generator-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-state-generator').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-state-generator-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-state-generator').css({'height':'50px'});
      $('.reducable-content',$state_generator_floating_box).addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-state-generator').hasClass('hidden'))
      {
           $('#closer-floating-box-state-generator-wrapper').removeClass('right');
      }



      $('#closer-floating-box-state-generator-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-state-generator').css({'height':'1200px'});

            $('.reducable-content',$state_generator_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#state-generators-info-wrapper li a.active').parent().index();
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$state_generator_floating_box).trigger('click');

    }

  });


  $('.change-graph-view-periodic-state').on('click',function(e){
  		e.preventDefault();
  		if($(this).hasClass('ion-arrow-graph-up-right'))
  		{
  				$(this).removeClass('ion-arrow-graph-up-right').addClass('ion-podium');
				$('#bars-state-transactions').addClass('hide');
				$('#line-state-transactions').removeClass('hide');

  		}
  		else
  		{
  				$(this).addClass('ion-arrow-graph-up-right').removeClass('ion-podium');
				$('#line-state-transactions').addClass('hide');
				$('#bars-state-transactions').removeClass('hide');
  		}
  });


  $('.hide-emitted-bills-state-periodic').on('click',function(){
  		if($(this).hasClass('ion-chevron-up'))
  		{
  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
  			$('#emitted-bills-state-periodic-manager').fadeOut('fast');
  		}
  		else
  		{
  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
  			$('#emitted-bills-state-periodic-manager').fadeIn('fast');


  		}
  });

    $('.hide-unpaided-payments-state-periodic').on('click',function(){
  		if($(this).hasClass('ion-chevron-up'))
  		{
  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
  			$('#unpaided-payments-tabe-recap-state').fadeOut('fast');
  		}
  		else
  		{
  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
  			$('#unpaided-payments-tabe-recap-state').fadeIn('fast');
  		}
  });

    $('.dropdown-button').dropdown();

</script>