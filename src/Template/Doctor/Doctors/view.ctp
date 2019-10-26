<div class="col l2 m2 s2 center" id="side-control-panel">

    <li style="list-style-type:none; border-bottom:1px solid white;">     
        <p>
            <?php if(!(empty($doctor->avatar_doctor))) :?> 
                 <?= $this->Html->image('doctor/doctor_avatar/'.$doctor->avatar_doctor,['style'=>'width: 100px;','alt'=>'votre avatar','class'=>'circle']) ?>
            <?php else: ?>
                  <i class="ion-ios-contact white-text large pointer"></i>
             <?php endif; ?> 
        </p>
    </li>
    <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-selected-reference" reference="account-wrapper" style="border-top:1px solid white;"><a href="#!"><i class="ion-cube white-text small"></i>Mon Compte</a></li>
        <li reference='privileges-meetings' class="item-selected-reference"><a href="#!" ><i class="ion-bookmark white-text small"></i>privilèges de consultation</a></li>
        <li><a href="/doctor/doctors/edit"><i class="ion-edit white-text small"></i>Modifier mon compte</a></li>
        <li><a href="/doctor/doctors/log-access"><i class="ion-document-text white-text small"></i>Journal de consultation</a></li>        

        <li style="border-bottom:1px solid white;"><?= $this->Html->link(__('Revenir à l\'écran de bord'), ['controller' => 'doctors','action'=>'general']) ?> </li>
    </ul>
</div> 

<div class="col l10 m10 s10 info-dmp-container">

   <div class="row information-wrapper" id="account-wrapper">
          <h5 class="dmp-main-color bold"><i class="ion-cube dmp-main-color medium" style="padding-right:10px;"></i><?= h(__('Mon Compte')) ?></h5>
        <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0" id="">
              <thead class="dmp-main-back white-text">
              <th><?= __('Login') ?></th>
              <th><?= __('email') ?></th>
              <th><?= __('Code doctor') ?></th>
              <th><?= __('Date de création du compte') ?></th>
            </thead>
              <tbody> 
                <td><?= h($doctor->username) ?></td>             
                <td><?= h($doctor->email) ?></td>
                <td><?= h($doctor->code); ?></td>
                <td>
                    <?php 
                        $date = new \DateTime($doctor->created);
                     ?>
                    <?= h($date->format('d-m-Y à H:i')) ?>
                      
                    </td>
              </tbody>
        </table>
          <div class="container">
            <div class="container">
                    <p class="dmp-info-bubble bold"> 
                  <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                  Les informations critiques relatives à dans votre compte comme votre login et votre mot de passe sont confidentiels et ne doivent en aucun cas être partagées au risque de vous faire pirater votre compte.
                  Votre code doctor est un identifiant unique permettant votre reconnaissance dans la base du dossier médical personnnel.
              </p>
            </div>
          </div>
    </div>

    <div class="row information-wrapper" id="privileges-meetings">
        <h5 class="dmp-main-color bold"><i class="ion-bookmark dmp-main-color medium" style="padding-right:10px;"></i><?= h(__(' Privilèges De Consultation Actifs')) ?></h5>
      <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0" id="">
          <thead class="dmp-main-back white-text">
            <th><?= __('Patient') ?></th>
            <th><?= __('Contacts') ?></th>
            <th><?= __('Date Attribution') ?></th>
            <th><?= __('Validité') ?></th>
            <th><?= __('Date Expiration') ?></th>
            <th><?= __('Tracking Code') ?></th>
          </thead>
          <tbody> 
              <?php foreach ($privileges as $privilege) :?>
                <?php if($privilege->result==='-') :?>
                <tr>
                  <td><?= h($privilege->patient->person->lastname.' '.$privilege->patient->person->firstname) ?></td>             
                  <td><?= h($privilege->patient->person->people_contact->contact1).'<br/>'.h($privilege->patient->person->people_contact->contact2) ?></td>
                  <td>
                    <?php $date_created_privilege = new \DateTime($privilege->created); echo h($date_created_privilege->format('d-m-Y H:i:s')); ?>
                  </td>
                  <td>
                    <?= h($privilege->delay.' jour(s)')  ?>
                  </td>
                  <td>
                    <?php $dat_exp_privilege = new \DateTime($privilege->created.' + '.$privilege->delay.'days'); echo h($dat_exp_privilege->format('d-m-Y H:i:s')) ?>
                  </td>
                  <td>
                    <?= h($privilege->tracking_code) ?>
                  </td>
                </tr>
              <?php endif; ?>
              <?php endforeach; ?>

            </tbody>
      </table>
        <div class="container">
          <div class="container">
                  <p class="dmp-info-bubble bold"> 
                <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
                  Les privilèges de consultation représentent des accès aux dossiers du patient. Le tracking code est un identifiant sous lequel seront enregistrés toutes vos actions lors de la manipulation des dossiers patients.
            </p>
          </div>
        </div>
    </div>



</div>
