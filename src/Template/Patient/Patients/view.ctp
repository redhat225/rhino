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
    <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-selected-reference" reference="account-wrapper" style="border-top:1px solid white;"><a href="#!"><i class="ion-cube white-text small"></i>Mon Compte</a></li>
        <li><a href="/patient/patients/edit"><i class="ion-edit white-text small"></i>Modifier mon compte</a></li>
        <li><a href="/patient/patients/log-access"><i class="ion-document-text white-text small"></i>Journal de consultation</a></li>        
        <li><a href="/patient/patients/privileges"><i class="ion-ios-bookmarks white-text small"></i>Gestion des privilèges</a></li>
        <li style="border-bottom:1px solid white;"><?= $this->Html->link(__('Revenir à l\'écran de bord'), ['controller' => 'Patients','action'=>'general']) ?> </li>
    </ul>
</div> 

<div class="col l10 m10 s10 info-dmp-container">

    <div class="row information-wrapper" id="account-wrapper">
        <h5 class="dmp-main-color bold"><i class="ion-cube dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Mon Compte')) ?></h5>
      <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0" id="">
              <thead class="dmp-main-back white-text">
            <th><?= __('Login') ?></th>
            <th><?= __('email') ?></th>
            <th><?= __('Code Patient') ?></th>
            <th><?= __('Date de création du compte') ?></th>
          </thead>
            <tbody> 
              <td><?= h($patient->username) ?></td>             
              <td><?= h($patient->email) ?></td>
              <td><?= h($patient->code); ?></td>
              <td>
                  <?php 
                      $date = new \DateTime($patient->created);
                   ?>
                  <?= h($date->format('d-m-Y à H:i')) ?>
                    
                  </td>
            </tbody>
      </table>
    </div>

<div class="container">
  <div class="container">
          <p class="dmp-info-bubble bold"> 
        <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
        Les informations critiques relatives à dans votre compte comme votre login et votre mot de passe sont confidentiels et ne doivent en aucun cas être partagées au risque de vous faire pirater votre compte.
        Votre code patient est un identifiant unique permettant votre reconnaissance dans la base du dossier médical personnnel.
    </p>
  </div>
</div>

</div>
