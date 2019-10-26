<div class="col l2 m2 s2 center" id="side-control-panel">
        
          <li style="list-style-type:none; border-bottom:1px solid white;">     
               <?php if($people->path_pic==null) :?>
                  <a href="/doctor/people/edit-pic" class="pointer">
                      <i class="ion-ios-contact-outline white-text large pointer"></i>
                 </a>
               <?php   else: ?>
                      <p style="width:200px;"> 
                           <?= $this->Html->image('doctor/doctor_identity/'.$people->path_pic,['style'=>'border-radius:10px;']) ?>
                      </p>
              <?php  endif; ?>
         </li>

   <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  
        <li class="item-selected-reference" reference="general-informations" style="border-top:1px solid white;" class="select-item-list"><a href="#!"><i class="ion-clipboard small white-text"></i>Informations Générales</a></li>
        
        <?php if($people->path_pic==null) :?>
            <li><a href=""><i class="ion-ios-contact white-text small"></i>Définir une photo d'identité</a></li>
        <?php else: ?>
            <li><a href="/doctor/people/edit-pic"><i class="ion-ios-contact-outline small white-text"></i>Modifier ma photo d'identité</a></li>
        <?php endif; ?>

          <li><a href="/doctor/doctors/general"><i class="ion-home white-text small"></i>Retour à l'écran de bord</a></li>
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
                    <th><?= __('Datenaiss') ?></th>
                    <th><?= __('Age') ?></th>
                    <th><?= __('Spécialités') ?></th>
                    <th><?= __('Groupe Sanguin') ?></th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($people->lastname) ?></td>
                        <td><?= h($people->firstname) ?></td>
                        <td><?php 
                            if($people->sexe=='M')
                            echo h('Homme'); else echo h('Femme'); ?></td>
                        <td><?= h($people->bornplace) ?></td>
                        <td><?= h($people->formatted_born) ?></td>
                        <td>
                            <?php 
                                $nowDate = new \DateTime('NOW');
                                $diff_Date = $nowDate->diff($people->dateborn);
                                echo $diff_Date->format("%Y ans");
                             ?>
                        </td>
                        <td>
                        <?php foreach ($people->doctor->doctor_specialities as $speciality) :?>
                                <?= $speciality->label_doctor_speciality.'<br/>' ?> 
                          <?php endforeach; ?>
                        </td>
                        <td><?= h($people->blood.$people->rhesus) ?></td>
                    </tr>
                </tbody>
        </table>

    </div>

  </div>