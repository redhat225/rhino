<?php $this->layout='blank'; ?>

<div class="row general-manager-wrapper">
	
	<div class="row identity-manager-wrapper">
		<h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
			<i class="ion-card dmp-main-color"></i>   Identité
		</h5>

		<div class="col s12">
			<div class="col s3 identity_image">
				<?= $this->Html->image('manager/'.$manager['institution']['slug'].'/manager_identity/'.$manager['person']['path_pic'],['style'=>'width:200px;']) ?>
			</div>

			<div class="col s4 identity_explicit">
				<span class="dmp-main-color bold"><?= strtoupper($manager['person']['lastname']) ?></span> <span class="dmp-main-color"><?= $manager['person']['firstname']  ?></span>
				 <br>
				<?php $now_date = new \DateTime($manager['person']['dateborn']); $diff_date= $now_date->diff(new \DateTime('NOW'));?>
				<span class="dmp-main-color bold"><?= $manager['person']['nationality'] ?></span>
				<span class="dmp-main-color bold"><?= $diff_date->format('%Y an(s)')  ?></span> <br>
				<?php 
					switch($manager['person']['sexe'])
					{
						case 'F':
							$sexe_manager = 'Femme';
						break;

						default:
							$sexe_manager = 'Homme';
						break;
					}

					switch($manager['person']['people_situation']['status'])
					{
						case 'C':
						  $status = 'Célibataire';
						break;

						case 'M':
						  $status = 'Marié(e)';
						break;

						case 'D':
						  $status = 'Divorcé(e)';
						break;

						case 'V':
						  $status = 'Veuf(ve)';
						break;
					}

					if($manager['person']['people_situation']['children']>0)
					{
						$children = $manager['person']['people_situation']['children'].' enfant(s)';
					}
					else
					{
						$children = 'sans enfants';
					}

				 ?>
				<span class="dmp-main-color bold"><?= $sexe_manager ?></span> <br>
				<span class="dmp-main-color bold"><?= $status.'-'.$children ?></span> <br>
				<span class="dmp-main-color bold"><?= 'Né(e) à'.$manager['person']['bornplace'] ?></span> <br>
				<?php if($manager['person']['lastname_young']) :?>
					<span class="dmp-main-color"><?= 'Nom de jeune fille: '.$manager['person']['lastname_young'] ?></span> <br>
				<?php endif; ?>
				
			</div>

			<div class="col s3">
				<span class="dmp-main-color"><?= $manager['person']['people_adress']['city_quarter'].'-'.$manager['person']['people_adress']['country_township']['label_township'] ?></span> <br>
				<span class="dmp-main-color bold"><?= $manager['person']['people_adress']['country_township']['country_city']['label_city'] ?></span> <br> <br>

				<span class="dmp-main-color"><?= $manager['email'] ?></span> <br>
				<span class="dmp-main-color"><?= $manager['person']['people_contact']['contact2']?$manager['person']['people_contact']['contact1'].' / '.$manager['person']['people_contact']['contact2']:$manager['person']['people_contact']['contact1'] ?></span> <br>
			</div>

			<div class="col s2 center">
				<?= $this->Html->image('manager/'.$manager['institution']['slug'].'/assets/'.$manager['institution']['logo_institution'],['style'=>'width:120px;']) ?>
			</div>
		</div>


	</div>


		<div class="row account-manager-wrapper">
		     <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
			       <i class="ion-cube dmp-main-color"></i>  Compte
		     </h5>

		     <div class="row account-manager-info-wrapper">   
			     <div class="col s12 account-manager-static-info">
				     	<div class="col s2 avatar_manager">
				     		<?php if($manager['avatar_manager']) :?>
								<?= $this->Html->image('manager/'.$manager['institution']['slug'].'/manager_avatar/'.$manager['avatar_manager'],['style'=>'width:110px;','class'=>'circle tooltipped avatar_manager_preview avatar_file pointer-opaq','data-tooltip'=>'Changez votre avatar!']) ?>
				     		<?php else :?>
								<?= $this->Html->image('manager/'.$manager['institution']['slug'].'/manager_avatar/unknow.png'.$manager['avatar_manager'],['style'=>'width:110px;','class'=>'circle tooltipped avatar_file pointer-opaq','data-tooltip'=>'Définissez votre avatar!']) ?>
				     		<?php endif; ?>
				     	</div>

				     	<div class="col s4">
				     	  <?= h(__('Nom Utilisateur: ')) ?> <span class="dmp-main-color bold username_manager_area" data-username="<?= $manager['username'] ?>"><?= $manager['username'] ?></span> <br>
				     	  <?= h(__('Code Manager: ')) ?> <span class="dmp-main-color bold code_manager_area" data-code="<?= $manager['code'] ?>"><?= $manager['code'] ?></span>  <br> 
				     	  <?= h(__('Email: ')) ?> <span class="dmp-main-color bold email_manager_area" data-email="<?= $manager['email'] ?>"><?= $manager['email'] ?></span>
				     	</div>

				     	<div class="col s4">
				     		<?php $formatted_login_date = new \DateTime($manager['created']); ?>
				     		<span class="dmp-main-color">Date Inscription: </span> <span class="dmp-main-color bold"><?= $formatted_login_date->format('d-m-Y H:i') ?></span> <br>
				     		<?php $formatted_update_date = new \DateTime($manager['modified']); ?>
				     		<span class="dmp-main-color">Date Dernière Modification: </span> <span class="dmp-main-color bold"><?= $formatted_update_date->format('d-m-Y H:i') ?></span>
				     	</div>

				     	<div class="col s2">
				     		<button id="change-account-info-trigger" class=" btn dmp-main-back">Changer</button>
				     	</div>
			     </div>
			    
			     <div class="col s12 account-manager-update-info hidden">
			     		<?= $this->Form->create(null,['url'=>'/manager/manager-operators/account','enctype'=>'multipart/form-data','type'=>'POST','id'=>'manager-account-update-form']) ?>
			     		<div class="row">
			
					         <div class="col s2 tooltipped pointer-opaq" data-tooltip='la taille ne devrait pas dépasser 8MB et devra être impérativemenent aux formats png, jpg, jpeg' data-delay='5s' id="manager_avatar_wrapper">
					              <h6 class="bold dmp-main-color">Avatar</h6>
					          	  <div class="actual_avatar_field pointer-opaq" style="margin-top:5%;">
					          	  	
					          	  </div>
					              <div class="file-field input-field update_avatar_field hidden" style="margin-top:5%;">
					                 <div class="">
					                          <p class="center pointer-opaq dmp-main-back" id="image_previews" style="border:2px dashed white;width: 140px;border-radius: 50%;">
					                            <i class="ion-android-contact white-text large"></i>
					                         </p>
					                         <span class="dmp-main-color bold">Description</span>
					                         <input type="file" name="uploaded_avatar_manager" class='' id="update_avatar_field_manager" accept="image/*">
					                 </div>
					                 <div class="file-path-wrapper">
					                        <input class="file-path validate file-path-identity" type="text">
					                  </div>
					              </div>
					          </div>

					          <div class="col s3">
						             <h6 class="bold dmp-main-color">Utilisateur</h6>
						          	 <div class="col s12 input-field" style="margin-top:5%;">
						          	 	<i class="ion-ios-person prefix"></i>
						          	 	<input type="text" name="username" id="username" class="required" required />
						          	 	<label for="username" class="active">Nom Utilisateur</label>
						          	 </div>

						          	 <div class="col s12 input-field">
						          	 	<i class="prefix ion-ios-email"></i>
						          	 	<input type="email" name="email" id="email" class="required" required />
						          	 	<label for="email" class="active">E-Mail</label>
						          	 </div>
					          </div>

					          <div class="col s3">
					          <h6 class="bold dmp-main-color">Accès</h6>
					          	 <div class="col s12 input-field" style="margin-top:5%;">
					          	 	<i class="prefix ion-lock-combination"></i>
					          	 	<input type="password" name="old_password" id="old_password"  class="manager_password_input_area" />
					          	 	<label for="old_password">Ancien mot de passe</label>
					          	 </div>

					          	 <div class="col s12 input-field">
					          	 	<i class="prefix ion-lock-combination"></i>
					          	 	<input type="password" name="new_password" id="new_password" class="manager_password_input_area new_manager_password_input_area" />
					          	 	<label for="new_password">Nouveau Mot de Passe</label>
					          	 </div>

					          	<div class="col s12 input-field">

					          	 	<i class="prefix ion-android-checkmark-circle"></i>
					          	 	<input type="password" name="conf_new_password" id="conf_new_password" class="manager_password_input_area" />
					          	 	<label for="conf_new_password">Confirmation</label>
					          	 </div>
					          </div>

					          <div class="col s3">
					          <h6 class="bold dmp-main-color">contrôle de sécurité</h6>
									<div class="col s12" style="border:2px dashed #dc6b1d;border-radius:5px;padding:2px;margin-top:10%;">
											<ul class="list-authorization-set">
												<li>
													<span class="left-align" style="margin-left:10px;">
														<i class="ion-close-round red-text authentication-account-spec-1"></i>
													</span> 
													<span class="right-align" style="margin-left:13px;">Minimum 8 caractères(<25)</span>
												</li>
												<li>
													<span class="left-align" style="margin-left:10px;">
														<i class="ion-close-round red-text authentication-account-spec-2"></i>
													</span> 
													<span class="right-align" style="margin-left:13px;">Inclure une/plusieurs lettres minuscules</span>
												</li>
												<li>
													<span class="left-align" style="margin-left:10px;">
														<i class="ion-close-round red-text authentication-account-spec-3"></i>
													</span> 
													<span class="right-align" style="margin-left:13px;">Inclure une/plusieurs lettres majuscules</span>
												</li>
												<li>
													<span class="left-align" style="margin-left:10px;"><i class="ion-close-round red-text authentication-account-spec-4"></i></span> 
													<span class="right-align" style="margin-left:13px;">Inclure un/plusieurs chiffres</span>
												</li>
											</ul>
									</div>
					          </div>
			     		</div>
			     		<div class="row center">
			     				 <button class="btn dmp-main-back">Valider</button>
					          	 <button class="btn red" type="reset" style="margin-left:50px;">Annuler</button>
			     		</div>
			     		<input type="hidden" value="<?= $manager['id'] ?>" name="manager_id" />
			     	</form>
			     	<?= $this->Form->end() ?>
			     </div>
			  </div>
		</div>
		
		<div class="row credentials-manager-wrapper">
			 <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;">
			       <i class="ion-key dmp-main-color"></i>  Signature Biométrique
		     </h5>
		     <div class="col s12">
		     	 <div class="col s5 center" style="background: #efefef;">
					<img src="data:image/png;base64,<?= $manager['person']['people_credential']['signature_path'] ?>" style="text-align:center;width:55%;"/> <br>	

					<button class="btn dmp-main-back white-text">Changer</button>
		     	 </div>
		     	 <div class="col s7">
		     	 	<div class="container" style="border:2px dashed #130647;padding:10px;">
		     	 		<p class="dmp-main-color"><i class="ion-lightbulb dmp-orange-text left" style="font-size:3.2rem;">	</i> La signature est automatiquement apposéee sur toute opération impliquant la production d'un justificatif documentaire</p> <br>		

		     	 		<p class="dmp-main-color" style="margin-top:0px;"><i class="ion-checkmark-circled dmp-orange-text left" style="font-size:3.2rem;">	</i>La signature est aux normes ENCE, performé par IntegriSign qui lui garantisse une authenticité approuvée sur n'importe quel document numérique</p> 
		     	 	</div>
		     	 </div>
		     </div>
		</div>


</div>

<script>
$('.tooltipped').tooltip();
var $form = $('#manager-account-update-form');
var $isPassword_secure = true;

$('#change-account-info-trigger').unbind('click').bind('click', function(){
	var $wrapper = $('.account-manager-static-info');
	var $update_wrapper = $('.account-manager-update-info');
	if($('.avatar_manager_preview',$wrapper))
		var $image_url_avatar_manager = $('.avatar_manager_preview').attr('src');
	else
		var image_url_avatar_manager = false;

	var username = $('.username_manager_area').attr('data-username');
	var code_manager_area = $('.code_manager_area').attr('data-code');
	var email_manager_area = $('.email_manager_area').attr('data-email');

	$('#username').val(username);
	$('#email').val(email_manager_area);
	
	if(typeof($('.avatar_manager_preview').attr('src'))!=='undefined')
	{
		var file = $('.avatar_manager_preview').attr('src');
		var $img = $('<img />').attr('src',file).attr('style','width:100%;');
		$('.actual_avatar_field').empty().append($img);
	}
	else
	{
		$('.actual_avatar_field').trigger('click');
	}

   $wrapper.slideUp();
   $update_wrapper.slideDown();
});



$('.avatar_file').unbind('click').bind('click',function(){
	$('#change-account-info-trigger').trigger('click');
	if($(this).hasClass('avatar_manager_preview'))
		$('.actual_avatar_field').trigger('click');
	$('#update_avatar_field_manager').trigger('click');
});



$('#manager-account-update-form button[type="reset"]').unbind('click').bind('click', function(){
	$('.account-manager-update-info').slideUp();
	$('.account-manager-static-info').slideDown();
	$('.actual_avatar_field').slideDown();
	$('.update_avatar_field').slideUp();

	var $icon = $('<i class="ion-android-contact white-text large"></i>');
	$('#image_previews').empty().append($icon).addClass('dmp-main-back');

});

$('.actual_avatar_field').unbind('click')
							.bind('click', function(){
								$(this).slideUp();
								$('.update_avatar_field').slideDown();
							});



$('input[name="uploaded_avatar_manager"]',$form).on('change',function(e){
  	 		var files = $(this)[0].files;
  	 		$image_preview = $('#image_previews');
  	 		$('i, img',$image_preview).remove(); 
  	 		
  	 		$image_preview.slideUp();
  	 		if(files.length > 0)
  	 		{
  	 			var file = files[0];
  	 			var $img = $('<img />').attr('src',window.URL.createObjectURL(file)).attr('style','width:100%;');
  	 			$image_preview.append($img);
  	 			$image_preview.removeClass('dmp-main-back');
  	 		}
  	 		else
  	 		{
  	 			var icon = $('<i class="ion-android-contact white-text large"></i>');
  	 			$image_preview.append(icon);
  	 			$image_preview.addClass('dmp-main-back');
  	 		}
  	 		$image_preview.slideDown();

  	 });



$('.manager_password_input_area').unbind('change').bind('change', function(){
	var $value = $(this).val();

	if($value.length>0)
		$('.manager_password_input_area').addClass('required');
	else
		$('.manager_password_input_area').removeClass('required').removeClass('invalid');
});


$('.new_manager_password_input_area').unbind('keyup').bind('keyup',function(e){
	var $value = $(this).val();
	

	if(/[A-Z]+/.test($value))
	{
	    $('.authentication-account-spec-3').removeClass('ion-close-round').removeClass('red-text')
												.addClass('ion-checkmark green-text');
												$isPassword_secure = true;
	}
	else
	{
	    $('.authentication-account-spec-3').removeClass('ion-checkmark').removeClass('green-text')
												.addClass('ion-close-round red-text');
												$isPassword_secure = false;
	}

	if(/[a-z]+/.test($value))
	{
	    $('.authentication-account-spec-2').removeClass('ion-close-round').removeClass('red-text')
												.addClass('ion-checkmark green-text');
												$isPassword_secure = true;
	}
	else
	{
	    $('.authentication-account-spec-2').removeClass('ion-checkmark').removeClass('green-text')
												.addClass('ion-close-round red-text');
												$isPassword_secure = false;
	}

	if(/[0-9]+/.test($value))
	{
	    $('.authentication-account-spec-4').removeClass('ion-close-round').removeClass('red-text')
												.addClass('ion-checkmark green-text');
												$isPassword_secure = true;

	}
	else
	{
	    $('.authentication-account-spec-4').removeClass('ion-checkmark').removeClass('green-text')
												.addClass('ion-close-round red-text');
												$isPassword_secure = false;
	}

	if($value.length>=8 && $value.length<=25)
	{
		$('.authentication-account-spec-1').removeClass('ion-close-round').removeClass('red-text')
												.addClass('ion-checkmark green-text');
												$isPassword_secure = true;
	}
	else
	{
		$('.authentication-account-spec-1').removeClass('ion-checkmark').removeClass('green-text')
												.addClass('ion-close-round red-text');
												$isPassword_secure = false;
	}



});


$('#manager-account-update-form').on('submit', function(e){
	var $form = $(this);
	var $isErrorFree = true;


	$('.required', $form).each(function(){
		if(validateElement.isValid(this)===false)
			$isErrorFree = false;
	});

	if($('.manager_password_input_area').hasClass('required'))
	{
		if($('#new_password').val()!==$('#conf_new_password').val())
		{
			$isErrorFree = false;
			Materialize.toast('les mots de passe ne sont pas identiques',2000,'notification-back-color2');
		}
	}
	else
	{
		$isPassword_secure = true;
	}

	if(!$isPassword_secure)
	{
			$isErrorFree = false;
			Materialize.toast('le nouveau mot de passe ne répond pas aux contraintes de sécurité',2000,'notification-back-color2');
	}

	if($isErrorFree)
	{
		return true;
	}
	else
	{
	  e.preventDefault();
	}
});
</script>






