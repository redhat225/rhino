<div class="col l2 m2 s2 center" id="side-control-panel">

    <li style="list-style-type:none; border-bottom:1px solid white;">     
        <p>
            <?php if(!(empty($patient->avatar_patient))) :?> 
                 <?= $this->Html->image('patient/patient_avatar/'.$patient->avatar_patient,['style'=>'width: 100px;','alt'=>'votre avatar','class'=>'circle']) ?>
            <?php else: ?>
                  <i class="ion-ios-contact white-text large pointer"></i>
             <?php endif; ?> 
        </p>
    </li>
    <h5 class="white-text" style="font-size:1.3rem; "><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  

        <li style="border-top:1px solid white;"><a href="/patient/patients/view"><i class="ion-ios-skipbackward white-text small"></i>Retour</a></li>
        <li style="border-bottom:1px solid white;"><a href="/patient/patients/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
    </ul>
</div> 

<div class="col l10 m10 s10 info-dmp-container">


  <div class="container">
    <div class="container">
          <h5 class="dmp-main-color bold" style="border-bottom:2px solid grey;"><i class="ion-edit dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Modifier mon Compte')) ?></h5>
       <?= $this->Form->create(null,['class'=>'admin-form dash-form','id'=>'edit-patient-account-form','type'=>'file']) ?>

                 <h6 class="dmp-main-color bold" style="border-bottom:1px dashed navy;"><i class="ion-ios-contact dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Avatar')) ?></h6>
                  <?php if(!(empty($patient->avatar_patient))) :?>
                  <div class="col s12">
                    <?= $this->Html->image('patient/patient_avatar/'.$patient->avatar_patient,['class'=>'circle','width'=>'100px;']) ?>
                  </div>
                  <?php endif; ?>              
    
                  <div class="file-field input-field">
                      <div class="btn">
                        <span>Avatar</span>
                        <input type="file" name="avatar_file" id="avatar_file" class="" accepts="image/*">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                  </div>


                  <h6 class="dmp-main-color bold" style="border-bottom:1px dashed navy;"><i class="ion-ios-checkmark-outline dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Login')) ?></h6>
                    
                    <div class="input-field col s12">
                         <input id="username" name="username" type="text" class="required" length="25" value="<?= $patient->username ?>"/>
                         <label for="username" class="bold"  data-error="invalide" data-success="correct">Modifier login</label>
                    </div>
                  
                     <h6 class="dmp-main-color bold"><i class="ion-android-lock dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Modifier mot de passe')) ?></h6>
                 

                    <div class="input-field col s12">
                         <input id="new_password" name="new_password" type="password" class="password-alter" length="25" />
                         <label for="new_password" class="bold"  data-error="invalide" data-success="correct">Nouveau</label>
                    </div>

                    <div class="input-field col s12">
                         <input id="conf_new_password" name="conf_new_password" type="password" class="password-alter" length="25" />
                         <label for="conf_new_password" class="bold"  data-error="invalide" data-success="correct">Ressaisir</label>
                    </div>


                   <h6 class="dmp-main-color bold" style="border-bottom:1px dashed navy;"><i class="ion-ios-checkmark-outline dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Validation')) ?></h6>

                    <div class="input-field col s12">
                         <input id="old_password" type="password" name="old_password" class="required" length="25" />
                         <label for="old_password" class="bold"  data-error="invalide" data-success="correct">Mot de passe de confirmation</label>
                    </div>
                  
                  <div class="col s12">
                    <button class="btn dmp-main-back white-text left" type="submit">Modifier</button>
                    <button class="btn red white-text right" type="reset">Annuler</button>  
                  </div>


      <?= $this->Form->end() ?>      
    </div>
  </div>

    

  <div class="container" style="clear:both; margin-top:200px;">
    <div class="container">
            <p class="dmp-info-bubble bold"> 
          <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 30px;"> </i>
          Les informations modifiables sur vvotre compte sont votre login et votre mot de passe.
          Certaines informations comme l'adresse e-mail requiert une mise en relation avec le support pour une eventuelle modification.
      </p>
    </div>
  </div>

</div>

<?= $this->Html->script('Red/patient/patients/edit',['block'=>true]) ?>
