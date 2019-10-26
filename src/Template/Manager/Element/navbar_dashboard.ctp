  <style>
  nav, nav .nav-wrapper i, nav a.button-collapse, nav a.button-collapse i{
    height: 42px;
    line-height: 42px;
  }
  .navigation-subitem-link:hover{
    color:#133f52;
  }
</style>

    <nav id="nav-index-game" class="dmp-main-back-darkened" style="line-height:42px !important;height:42px;">
        <div class="nav-wrapper">
            <ul class="nav-mobile left dmp-orange-back" style='width: 16.7%;'>
                    <li class="light dmp-grey-2-text"> <span style="margin-left:15px;">Espace Manager</span></li>
                     <!-- Dropdown menu manager -->
                    <li id='menu-home-navbar' data-stoppropagation='true' data-hover='true' data-beloworigin='true' data-constrainwidth='false' data-alignment="right" class="right dropdown-button" data-activates='dropdown-manager-menu' style="height:42px !important; border-right:1px solid #dc6b1d;">         <span class="dmp-grey-2-text pointer-opaq" style="line-height:42px;display:inline-block; width:64px;"><i class="ion-android-apps dmp-grey-2-text small center"></i></span>
                    </li>

                      <!-- Dropdown menu structure -->
                      <ul id='dropdown-manager-menu' class='dropdown-content navbar-top-menu dmp-main-back'>
                           <li id='manage-visits-modal-trigger'><span class="white-text">Enregistrer une visite</span></li>
                           <li class="divider"></li>
                           <li><span class="white-text"><a class="navigation-subitem left-align navigation-subitem-link" href="#add-patient" style="background:transparent;color">Créer un nouveau dossier patient</a></span></li>
                      </ul>
            </ul>

            <ul class="nav-mobile center">

            </ul>

            <ul class="nav-mobile right dmp-grey-2-text">
               <li style="margin-right:35px;">
                  <i class="ion-ios-email pointer-opaq dmp-grey-2-text small" style="font-size: 1.6rem;"></i>
               </li>

               <li style="margin-right:35px;">
                  <i class="ion-android-notifications-none pointer-opaq dmp-grey-2-text small" style="font-size: 1.6rem;"></i>
               </li>
           
              <li style="margin-right:10px;" class="custom-item-navigation pointer-opaq tooltipped" data-tooltip='Mon compte' href="#account"> 
                  <div class="chip dmp-main-color">
                  <?=$this->Html->image('manager/'.$manager['institution']['slug'].'/manager_avatar/'.$manager['avatar_manager'],['class'=>'circle']) ?>
                  <?= strtoupper($manager['person']['lastname']).' '.$manager['person']['firstname'] ?>
                </div>    
              </li>
                  
              <li class="dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-activates="account-manager-dropdown" style="margin-right:15px;"><i class="ion-chevron-down pointer-opaq dmp-grey-2-text small" style="font-size: 1.3rem;"></i>
              </li>
            </ul>
            <!-- Dropdown Account Content -->
             <ul id='account-manager-dropdown' class='dropdown-content dmp-main-back'>
                <li><a href="#account" class="custom-item-navigation white-text"><i class="ion-card white-text left" style="font-size:1.45rem;"></i>Compte</a></li>
                <li><a href="#!" class="white-text"><i class="ion-android-settings white-text left" style="font-size:1.45rem;"></i>Options</a></li>
                <li class="divider"></li>
                <li><a href="/manager/manager-operators/logout" class="white-text"><i class="ion-power white-text left" style="font-size:1.45rem;"></i>Déconnexion</a></li>
            </ul>
        </div>  
    </nav>



  <!-- About Dmp -->
   <div id="about-dmp" class="modal modal-fixed-footer dmp-main-back" style="width:40% !important;" >
      <div class="modal-content center" style="padding-bottom:0px;">
            <?= $this->Html->image('assets_dmp/dmp-original.png',['style'=>'width:170px;']) ?>
        <div class="row" id="content-about-wrapper">
                  <h6 class="dmp-grey-2-text" style="margin-left: 5%;margin-top: 15px;line-height: 1.2rem;font-size: 0.95rem;margin-right: 5%;text-align: justify;letter-spacing: 1px;"> 
                   Dossier Médical Personnel est une marque déposé de Virtual Network Entreprise.Toute reprise non consenti du logo officiel, des logos partenaires et des pictogrammes sponsorisés est exposé à des poursuites judiciaires. <br>  <br>
                    <br>  
                   <span class="left">Tous droits réservés</span> <a class="right pointer-opaq dmp-grey-2-text" target="_blank" href="http://www.vne-ci.com">© 2017 Virtual Network Entreprise</a>
                 </h6>

        </div>
      </div>
      <div class="modal-footer dmp-orange-back center">
        <a href="#!" class="modal-action modal-close waves-effect waves-white btn-flat white-text center" style="float:none !important;">Fermer</a>
      </div>
  </div>  


<?= $this->Html->script('Red/manager/manager-operators/general/navbar',['block'=>true]) ?>
<?= $this->Html->script('Red/manager/manager-general-search') ?>
<?= $this->Html->script('Red/manager/manager-amount-visit-meeting') ?>

