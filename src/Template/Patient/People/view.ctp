<div class="col l2 m2 s2 center" id="side-control-panel">
        
          <li style="list-style-type:none; border-bottom:1px solid white;">     
               <?php if($people->path_pic==null) :?>
                  <a href="/pics/add" class="pointer">
                      <i class="ion-ios-contact-outline white-text large pointer"></i>
                 </a>
               <?php   else: ?>
                      <p style="width:200px;"> 
                           <?= $this->Html->image('patient/patient_identity/'.$people->path_pic,['style'=>'border-radius:10px;']) ?>
                      </p>
              <?php  endif; ?>
         </li>

            <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-selected-reference" reference="general-informations" style="border-top:1px solid white;" class="select-item-list"><a href="#!"><i class="ion-clipboard small white-text"></i>Informations Générales</a></li>
        
        <?php if($people->path_pic==null) :?>
            <li><a href=""><i class="ion-ios-contact white-text small"></i>Définir une photo d'identité</a></li>
        <?php else: ?>
            <li><a href="/patient/people/edit-pic"><i class="ion-ios-contact-outline small white-text"></i>Modifier ma photo d'identité</a></li>
        <?php endif; ?>

            <li><a href="/patient/people/paper"><i class="ion-document-text white-text small"></i>Journal</a></li>
            <li reference="insurance-informations" class="item-selected-reference"><a href="#!"><i class="ion-umbrella white-text small"></i>Assurances</a></li>
            <li><a href="/patient/patients/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
    </ul>
    
</div> 

<div class="col l10 m10 s10 info-dmp-container">      

<div class="row information-wrapper" id="general-informations">
        
      <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                    <i class="ion-card dmp-main-color medium"></i> Identité</h5>
    <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0" id="">
            <thead class="dmp-main-back blue-text">
                <th><?= __('Nom') ?></th>
                <th><?= __('Prenom') ?></th>
                <th><?= __('Sexe') ?></th>
                <th><?= __('Lieunaiss') ?></th>
                <th><?= __('Emploi') ?></th>
                <th><?= __('Compagnie') ?></th>
                <th><?= __('Ethnie') ?></th>
                <th><?= __('Datenaiss') ?></th>
                <th><?= __('Age') ?></th>
                <th><?= __('Groupe Sanguin') ?></th>
            </thead>
            <tbody>
                <tr>
                    <td><?= h($people->lastname) ?></td>
                    <td><?= h($people->firstname) ?></td>
                    <td><?= h($people->sexe) ?></td>
                    <td><?= h($people->bornplace) ?></td>
                    <td>
                        <?= h($people->patient->patient_companies[0]->_joinData->fonction) ?>
                    </td>
                    <td>
                        <?= h($people->patient->patient_companies[0]->label_patient_company) ?>
                    </td>
                    <td><?= h($people->ethnie) ?></td>
                    <td><?= h($people->formatted_born) ?></td>
                    <td>
                        <?php 
                            $nowDate = new \DateTime('NOW');
                            $diff_Date = $nowDate->diff($people->dateborn);
                            echo $diff_Date->format("%r %Y an(s) %m mois");
                         ?>
                    </td>
                    <td><?= h($people->blood.$people->rhesus) ?></td>
                </tr>
            </tbody>
    </table>

    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                    <i class="ion-ios-body dmp-main-color medium"></i> Caractéristiques Physiques</h5>

    <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0">
            <thead class="dmp-main-back blue-text">
                <th><?= __('Taille') ?></th>
                <th><?= __('Yeux') ?></th>
                <th><?= __('Peau') ?></th>
                <th><?= __('Cheveux') ?></th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $people->people_attribute->height." m" ?></td>
                    <td><?= $people->people_attribute->eyes ?></td>
                    <td><?= $people->people_attribute->skin ?></td>
                    <td><?= $people->people_attribute->haircolour ?></td>
                </tr>
            </tbody>
    </table>

    <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                    <i class="ion-android-home dmp-main-color medium"></i> Adresse</h5>

    <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0">
            <thead class="dmp-main-back blue-text">
                 <th><?= __('Contact 1') ?></th>
                <th><?= __('Contact 2') ?></th>
                <th><?= __('Quartier') ?></th>
                <th><?= __('Ville') ?></th>
                <th><?= __('Boîte Postale') ?></th>
                <th><?= __('Pays') ?></th>
            </thead>
            <tbody>
                <tr>
                     <td><?= $people->people_contact->contact1 ?></td>
                     <td><?= $people->people_contact->contact1 ?></td>
                    <td><?= $people->people_adress->city_quarter ?></td>
                    <td><?= $people->people_adress->city ?></td>
                    <td><?= $people->people_adress->postal_adress ?></td>
                    <td><?= $people->people_adress->country ?></td>
                </tr>
            </tbody>
    </table>
</div>

<div class="row information-wrapper" id="insurance-informations">
        <h5 class="dmp-main-color bold" style="border-bottom:2px solid #130647; margin-bottom:40px;">
                    <i class="ion-umbrella dmp-main-color medium"></i>Assurances</h5>

    <table class="MyTable striped bordered bold centered table-space" cellpadding="0" cellspacing="0">
            <thead class="dmp-main-back blue-text">
                <th><?= __('Assureur') ?></th>
                <th><?= __('Denomination') ?></th>
                <th><?= __('Numéro assuré') ?></th>
                <th><?= __('Date Expiration') ?></th>
                <th><?= __('Durée avant Expiration') ?></th>
                <th><?= __('Status') ?></th>
             </thead>
            <tbody>
                <?php foreach ($people->patient->patient_insurances as $insurance): ?>
                    <tr>
                        <td>
                            <?= $this->Html->image('insurances/insurances-logo/'.$insurance->patient_insurer->logo_insurance,['style'=>'width:170px;']) ?>
                        </td>
                        <td> <?= $insurance->patient_insurer->label ?></td>
                        <td><?= $insurance->number_card ?></td>
                        <td><?php
                                $expInsurance = new \DateTime($insurance->expired_insurance_date);
                                echo $expInsurance->format('d-m-Y');
                         ?></td>

                         <td>
                             <?php 
                                    $now= new \DateTime('NOW');
                                    $interval = $now->diff($expInsurance);
                                    echo $interval->format('%r%y an(s) %m moi(s) %a jour(s)');
                              ?>
                         </td>

                         <td>
                             <?php 
                                if($interval->format("%R")==="+")
                                    echo "Actif";
                                else
                                    echo "Expiré";
                              ?>
                         </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

</div>

</div>


