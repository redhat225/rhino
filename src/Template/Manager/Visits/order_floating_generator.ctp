<?php $this->layout('blank') ?>
  <div class="row content-wrapper" id="content-floating-box-order-generator-wrapper">
		<div class="row zero-margin zero-padding" id="content-floating-box-order-generator">
		                          
					<div class="col s3 center" style="padding:10px;">
						<?= $this->Html->image('manager/'.$visit->manager_operator->institution->slug.'/assets/'.$visit->manager_operator->institution->logo_institution,['style'=>'width:120px;']) ?>
					</div>

					<div class="col s7 center">
						<h4 class="dmp-main-color bold" style="letter-spacing:1px;"><?= $visit->manager_operator->institution->fullname ?></h4>
						
						<h6 class="dmp-main-color"><?= $visit->manager_operator->institution->institution_quarter.' '.$visit->manager_operator->institution->institution_quarter_extra.' - '.$visit->manager_operator->institution->institution_adress->postal_box.' - Tél:+225 '.$visit->manager_operator->institution->institution_adress->tel.' - Fax : +225 '.$visit->manager_operator->institution->institution_adress->fax ?><?= ' Cel: '.$visit->manager_operator->institution->institution_adress->contact1.' / '.$visit->manager_operator->institution->institution_adress->contact2.' - '.$visit->manager_operator->institution->institution_adress->website ?></h6>
						<br>
						<h5 class="dmp-main-color bold zero-margin"><?= $label ?></h5>

					</div>
		           	<div class="col s2" style="float:right !important;padding-left:0px;" id="closer-floating-box-order-generator-wrapper">
		                <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-order-generator-trigger" style="color:orange !important;"></i>
		                              
		                <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-order-generator-trigger" style="color:orange !important;"></i>
		           	</div>
		</div>

		<h5 class="bold dmp-grey-2-text dmp-main-back center" style="padding:10px;font-weight:300;">Renseignements Administratifs</h5>
		<div class="row">
		          <div class="col s2 patient-hospy-api-variable-info reducable-content" id="patient-hospy-evidence-search-single">
		          		<?php if($visit->patient->person->path_pic) :?>
						    <?= $this->Html->image('patient/patient_identity/'.$visit->patient->person->path_pic,['style'=>'width:110px;']) ?>
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
		                                  		 $diff_date = $now->diff($born_date);
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
		                          <div class="col s3 reducable-content">  
		                              <p class="dmp-main-color zero-margin">
		                                   <span id="adress_1_patient-hospy_selected_single" class="patient-hospy-api-variable-info"><?= $visit->patient->person->people_adress->city_quarter.'-'.$visit->patient->person->people_adress->country_township->label_township ?></span> <br>
		                                   <span id="adress_2_patient-hospy_selected_single" class="patient-hospy-api-variable-info bold"><?= $visit->patient->person->people_adress->country_township->country_city->label_city.'-'.$visit->patient->person->people_adress->country_township->country_city->country->label_country ?></span> <br>

		                                   <span class="bold dmp-main-color"><?= $visit->code_visit ?></span>
		                              </p>
		                          </div>
		                    
		</div>


	<form id ="form-hospy-generator">

		<div class="row">
				<div class="row">
					<div class="col s2 input-field">
						<h6 class="bold dmp-main-color">N° Chambre/Bloc</h6>

						<i class="ion-android-clipboard dmp-main-color prefix"></i>
						<input type="number" class="required" name="room_number" id="room_number" />
					</div>
					<div class="col s6 input-field">
						<h6 class="bold dmp-main-color">Descriptif(Optionnel)</h6>
						<i class="ion-social-twitch dmp-main-color prefix"></i>
						<input type="text" class="" name="room_description" id="room_description">
					</div>
					<?php $enter_hospy_date = new \DateTime('NOW'); ?>
					<div class="col s2 input-field">
						<h6 class="bold dmp-main-color">Date Entrée</h6>
						<input type="date" readonly value="<?= $enter_hospy_date->format('Y-m-d') ?>" class="date_hospy_input" name="date_enter_hospie" id="date_enter_hospie">
					</div>
					<div class="col s2 input-field">
						<h6 class="bold dmp-main-color">Date Sortie</h6>
						<input type="date" required class="required date_hospy_input" name="date_eprobably_end_hospie" id="date_probably_end_hospie">
					</div>
				</div>
		</div>

		<h5 class="bold dmp-grey-2-text dmp-main-back center" style="padding:10px;font-weight:300;">Renseignements Médicaux</h5> 

		<div class="row">
				<div class="col s4 input-field">
					<i class="ion-code-working prefix dmp-main-color"></i>
					<input name="hospy_motif" id="hospy_motif" type="text" class="required">
					<label for="hospy_motif">Motif Entrée</label>
				</div>
				<div class="col s4 input-field">
					<i class="ion-fork-repo dmp-main-color prefix"></i>
					<input type="text" name="doctor_adressor" id="doctor_adressor" class="required" />
					<label for="doctor_adressor">Médecin Adresseur</label>
				</div>
				<div class="col s4 input-field">
					<i class="ion-fork-repo dmp-main-color prefix"></i>
					<input type="text" name="doctor_reference" id="doctor_reference" class="required" />
					<label for="doctor_reference">Médecin Référent</label>
				</div>
		</div>

		<div class="row center">
			<div class="col s6 input-field">
				<h6 class="bold dmp-main-color left-align">Mode d'arrivée</h6>
				<?php $transports=[1=>'Consultation',2=>'Ambulance',3=>'SAMU',4=>'Sapeurs Pompiers',5=>'Transfert',6=>'Domicile']; ?>
				<select name="visit_kind_transport_id" class="select_transport_hospy_state" id="">
						<option value="" checked>Selectionnez une valeur</option>
						
					<?php foreach ($transports as $key => $value) :?>
						<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col s6 input-field">
				<h6 class="bold dmp-main-color left-align">Etat Patient</h6>
				<?php $levels = [1=>'stable',2=>'critique',3=>'comma']; ?>
				<select name="visit_level_id" class="select_level_hospy_state" id="">
						<option value="" checked>Selectionnez une valeur</option>
					<?php foreach ($levels as $key => $value) :?>
						<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="row center" style="margin-top:80px;">
			<div class="container">
				<div class="container">
					<div class="container">
							<button class="btn dmp-main-back right" id="validate-hospy-form">Valider</button>
							<button class="btn red left" id="cancel-hospy-form">Annuler</button>
					</div>
				</div>
			</div>
		</div>

		<input type="hidden" name="visit_state_type_id" value="<?= $state ?>">
		<input type="hidden" name="visit_id" value="<?= $visit->id ?>">
		<input type="hidden" name="visit_state_operation" value="<?= $label_hidden ?>">
		<input type="hidden" name="label_order" value="<?= $label ?>">
	</form>
</div>

        <div class="row center loader hidden" style="margin-top:40%;" id="loader-change-state-floating-box">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <span class="dmp-main-color center-align center">Enregistrement en cours</span>
         </div>

<script>

$('select').material_select();

	var $order_generator_floating_box = $('#floating-box-order-generator');

	  $('#close-floating-box-order-generator-trigger').on('click',function(){
	    $('#floating-box-order-generator').addClass('hidden');
	    $('#floating-box-order-generator').removeClass('used');
	    $('#closer-floating-box-order-generator-wrapper').removeClass('right');
	    $('#reduced-floating-box-order-generator-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
	    $('#reduced-floating-box-order-generator-trigger').attr('data-tooltip','Réduire');
	    $('#floating-box-order-generator').css({'height':'1200px'});
	    $('.reducable-content').removeClass('hidden');
	    $('#floating-box-order-generator').attr('order-generator-id','0');

	        if($('#close-floating-box-order-generator-trigger').hasClass('ion-ios-plus-outline'))
	            $('#close-floating-box-order-generator-trigger').trigger('click');
	  }); 

	  $('#reduced-floating-box-order-generator-trigger').on('click',function(){
	    if($(this).hasClass('ion-ios-minus-outline'))
	    {

	      if($('#error-conatiner-floating-box-order-generator').hasClass('hidden'))
	              $('.reducable-content').addClass('hidden');

	      $('#closer-floating-box-order-generator-wrapper').addClass('right');
	      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
	      $(this).attr('data-tooltip','Dérouler');
	      $('#floating-box-order-generator').css({'height':'50px'});
	      $('.reducable-content',$order_generator_floating_box).addClass('hidden');
	    }
	    else
	    {
	      if($('#error-conatiner-floating-box-order-generator').hasClass('hidden'))
	      {
	           $('#closer-floating-box-order-generator-wrapper').removeClass('right');
	      }



	      $('#closer-floating-box-order-generator-wrapper').removeClass('right');
	      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
	      $(this).attr('data-tooltip','Réduire');
	      $('#floating-box-order-generator').css({'height':'1200px'});

	            $('.reducable-content',$order_generator_floating_box).removeClass('hidden');
	      var $current_selected_tabs= $('#order-generators-info-wrapper li a.active').parent().index();
	      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$order_generator_floating_box).trigger('click');

	    }

	  });


	  $('.change-graph-view-periodic-order').on('click',function(e){
	  		e.preventDefault();
	  		if($(this).hasClass('ion-arrow-graph-up-right'))
	  		{
	  				$(this).removeClass('ion-arrow-graph-up-right').addClass('ion-podium');
					$('#bars-order-transactions').addClass('hide');
					$('#line-order-transactions').removeClass('hide');

	  		}
	  		else
	  		{
	  				$(this).addClass('ion-arrow-graph-up-right').removeClass('ion-podium');
					$('#line-order-transactions').addClass('hide');
					$('#bars-order-transactions').removeClass('hide');
	  		}
	  });


	  $('.hide-emitted-bills-order-periodic').on('click',function(){
	  		if($(this).hasClass('ion-chevron-up'))
	  		{
	  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
	  			$('#emitted-bills-order-periodic-manager').fadeOut('fast');
	  		}
	  		else
	  		{
	  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
	  			$('#emitted-bills-order-periodic-manager').fadeIn('fast');


	  		}
	  });

	    $('.hide-unpaided-payments-order-periodic').on('click',function(){
	  		if($(this).hasClass('ion-chevron-up'))
	  		{
	  			$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down');
	  			$('#unpaided-payments-tabe-recap-order').fadeOut('fast');
	  		}
	  		else
	  		{
	  			$(this).addClass('ion-chevron-up').removeClass('ion-chevron-down');
	  			$('#unpaided-payments-tabe-recap-order').fadeIn('fast');
	  		}
	  });

	    $('.dropdown-button').dropdown();

	$('#form-hospy-generator').on('submit',function(e){
		e.preventDefault();
	});

	$('.psychiatric_following_input').on('change', function(){
		var $current_value = $('.psychiatric_following_input:checked').val();
		switch($current_value)
		{
			case 'oui':
				$('#psychiatric_following_doctor').addClass('required');
			break;

			case 'non':
				$('#psychiatric_following_doctor').removeClass('required').removeClass('invalid').removeClass('valid');
			break;	
		}
	});

	$('#validate-hospy-form').on('click',function(e){
		e.preventDefault();
		var $form = $('#form-hospy-generator');
		var $isErrorFree = true;

		$('.required',$form).each(function(){
			if(validateElement.isValid(this)===false)
				$isErrorFree = false;
		});


		$('.date_hospy_input', $form).each(function(){
				if(/^[2]\d{3}-\d{2}-\d{2}$/.test($(this).val().trim())===false)
					$isErrorFree = false;
			});

		if($('.select_transport_hospy_state option:checked', $form).val()=="")
			$isErrorFree = false;
		
		if($('.select_level_hospy_state option:checked', $form).val()=="")
			$isErrorFree = false;

		if($isErrorFree)
		{
			$.ajax({
				beforeSend: function(){
					$('#content-floating-box-order-generator-wrapper').addClass('hidden');
					$('#loader-change-state-floating-box').removeClass('hidden');
				},
				type:'POST',
				url:'/manager/visits/generate-state',
				dataType:'Text',
				data: $form.serialize(),
				success: function(data){
					if(data==='ok')
					{
						$('#cancel-hospy-form').trigger('click');
						Materialize.toast('Enregistré avec success',2000,'dmp-main-back');
						if($('#floating-box-patient').hasClass('hidden'))
						{
							$('#floating-box-patient').trigger('click');
						}

						$('#refresh-visits-infos').trigger('click');
					}
					else
					{
						Materialize.toast('Une Erreur est survenue lors de l\'opération, veuillez réessayer');
					}
				},
				error: function(){

				},
				complete: function(){
					$('#content-floating-box-order-generator-wrapper').removeClass('hidden');
					$('#loader-change-state-floating-box').addClass('hidden');

				}
			});
		}
		else
		{
			Materialize.toast('Veuillez corriger le formulaire',1000);
			return null;
		}

	});


	$('#cancel-hospy-form').on('click',function(){
		$('#close-floating-box-order-generator-trigger').trigger('click');
	});

</script>