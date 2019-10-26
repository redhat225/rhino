<nav id="nav-index-game" class="dmp-main-back" style="line-height:54px !important;">
        <div class="nav-wrapper">
        
            <ul class="nav-mobile right">

                  <!-- Rendering cells -->
                  <!-- Rdv Cell -->
                  <?php $cell = $this->cell('InboxDoctor::meeting',[$doctor_id]); ?>
                  <?= $cell ?>

                <li><a href="/patient/patients/logout" class="btn white dmp-main-color white deconnect-plateform-link bold">Deconnexion</a>
                </li>

               
            </ul>
            
            <ul class="nav-mobile left">
                <li style="padding-left:10px !important;"><i data-activates="slide-out" class="button-collapse ion-android-menu white-text medium pointer"></i></li>
            </ul>

        </div>  
    </nav>