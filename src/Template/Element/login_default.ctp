<style>
	.smooth-transition-authentication{
		transition-duration: 0.3s;
		background: #f9a61a !important;
		cursor: pointer;
	}

	.smooth-background-transition{
			transition-duration: 0.3s;
		background: #16495F !important;

	}
</style>

<div class="container center">
		<div class="container">
		   <div class="container">
			  <div class="container dmp-main-back" style="margin-top:10%;padding:20px 0px 10px 0px; border-radius:0.5%;opacity:0.88;">
				<?= $this->Html->image('assets_dmp/dmp-original.png',['style'=>'width:200px;position:relative;margin-left:3%;']) ?>
					<form method="post" accept-charset="utf-8" id="authentification-form" class="login-dmp-form" target="<?= $target ?>">
						<div class='row' style="margin:10px 35px;">
							<div class="input-field col s12 zero-padding">
								 <i class="prefix small ion-ios-person" style="background:#3a3a3a;border-bottom:33px solid #3a3a3a;height:30px;font-size:1.6rem;"></i>
							     <input id="username" placeholder="Login" name="username" type="text" style="color:#133f52 !important; font-weight:500;height:33px;" class="required">
						    </div>
						    <div class="input-field col s12 zero-padding">
								 <i class="prefix small ion-android-lock" style="background:#3a3a3a;border-bottom:33px solid #3a3a3a;height:30px;font-size:1.6rem;"></i>
							     <input id="password" placeholder="Mot de Passe" name="password" type="password" style=" color:#133f52 !important; font-weight:500;height:33px;" class="required">
						    </div>

						    <button style='margin-top:30px; border:2px solid #f9a61a;border-color:#f9a61a;border-radius:0px;background-color: transparent;margin-left:5%; font-weight: 400;' type="submit" class="submit-login-admin btn bold light-text white-text">Connexion</button>
						</div>
					</form>

						<div class="loaderAjax" style="margin-top:13%;">
							  <div class="preloader-wrapper big active" style="width: 80px;height: 80px;">
							    <div class="spinner-layer spinner-blue-only" style="border-color:#dc6b1d;">
							      <div class="circle-clipper left">
							        <div class="circle"></div>
							      </div><div class="gap-patch">
							        <div class="circle"></div>
							      </div><div class="circle-clipper right">
							        <div class="circle"></div>
							      </div>
							    </div>
							  </div>
						  </div>

					<div class="row center submit-login-admin" style="margin-top:29px;margin-left:1%;">	
						<p class="">
						   <?= $this->Html->link('Mot de passe oublié',['action' => 'forgotten'],['class'=>'white-text']) ?>
						</p>		 
					</div>
			    </div>
		   </div>
		</div>
	</div>

	<!-- Modal BoX Structure -->
  <div id="mainModal-suiviAdmin" class="modal white center-align" style="width:30%;">
        <div class="modal-content zero-padding dmp-main-back">
        	<div class="row dmp-main-back">
        		<h6 class="dmp-grey-2-text zero-margin left-align" style="padding:5px;">Authentification Echouée</h6>
        	</div>
        	<?= $this->Html->image('assets_dmp/dmp-original',['style'=>'width:180px;']) ?>
            <h6 class="zero-margin dmp-grey-2-text modal-text acc-small-top-margin authentication-failure-message" style="padding-top:5px;padding-bottom:50px;"></h6>
        </div>
        <div class="modal-footer dmp-orange-back">
            <a href="#!" class="modal-action white-text modal-close waves-effect waves-white">Fermer</a>
        </div>
  </div>
<?php $this->Html->script('Red/authentification',['block' => true]); ?>
<script>
$('button').hover(function(){$(this).addClass('smooth-transition-authentication');},function(){$(this).removeClass('smooth-transition-authentication');});
</script>