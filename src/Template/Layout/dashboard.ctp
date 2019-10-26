<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = "Dossier Médical Personnel";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title','Accueil') ?>
    </title>
    <?= $this->Html->meta('icon','/favicon_darkened.ico') ?>

    <?= $this->Html->css('ionicons-2.0.1/css/ionicons.min') ?>
    <?= $this->Html->css('materialize.min') ?>
    <?= $this->Html->css('../js/jquery-ui-1.12.1.custom/jquery-ui.min') ?>
    <?= $this->Html->css('../js/jquery-ui-1.12.1.custom/jquery-ui.theme.min') ?>
    <?= $this->Html->css('../js/jquery-ui-1.12.1.custom/jquery-ui.structure.min') ?>
    <?= $this->Html->css('dmp') ?>
    <?= $this->Html->css('../js/Materialize/extras/noUiSlider/nouislider') ?>
    
    <!-- Extra Dependencies -->
    <?= $this->fetch('css') ?>

    
    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('jquery-ui-1.12.1.custom/jquery-ui.min') ?>
    <?= $this->Html->script('Materialize/dist/js/materialize.min') ?>
    <?= $this->Html->script('Red/dash-asset-manager')?>
    <?= $this->Html->script('Red/'.$prefix.'/routing') ?>
    <?= $this->Html->script('Chart.js-master/src/Chart.bundle') ?>
    <?= $this->Html->script('sdk_epad') ?>
</head>

<body>
    <!-- Custom Navbar -->
    <?= $this->element('navbar_dashboard') ?>
    <?= $this->Flash->render() ?>

  <div class="row zero-margin" id="game-gift-content">
          <div class="col l2 m2 s2 center dmp-main-back" id="side-control-panel" style="padding-top:0px;">
            <?= $this->element('side_control_panel') ?>
          </div>
          <div class="col l10 m10 s10" id="dmp-variable-content-main" style="padding:0px 0px 20px 20px; position:relative;">

                <div class="row" id="dmp-variable-content">
                    <?= $this->fetch('content') ?>
                </div>
                

                <!-- Manager Requirement Search Results -->
                <?= $this->element('requirement_floating_box') ?>
                <!-- Invoice Search Result -->
                <?= $this->element('invoice_floating_box') ?>
                <!-- Patient Floating Box  -->
                <?= $this->element('patient_floating') ?>
                <!-- Manager Floating -->
                <?= $this->element('manager_floating') ?>
                <!-- Doctor Floating -->
                <?= $this->element('doctor_floating') ?>
                <!-- State Generator Floating -->
                <?= $this->element('state_generator_floating') ?>
                <!-- Order Generator Floating -->
                <?= $this->element('order_floating') ?>
                <!-- State Visit Stats Floating -->
                <?= $this->element('state_visit_generator') ?>
                <!-- Global State Generator Floating -->
                <?= $this->element('global_state_generator') ?>


                 <!-- Floating Left Panel Hider -->
                <?= $this->element('left_panel_hider') ?> 
                 <!-- Others Foating Boxes -->
                <?= $this->element('floating_box_manager') ?>

          </div>
  

  </div>    

    <!--Dynamic SideNav -->
    <?= $this->element("sidenav_dashboard") ?>
  
    <?= $this->Html->script('red/custom-tabs-management') ?>
    
    
    <?= $this->fetch('script') ?>
</body>
<footer class="page-footer gdb-alt zero-margin zero-padding white-text dmp-orange-back" style="width:16.7%;">
    <div class="footer-copyright" style="height: 30px;line-height: 30px;">
        <div class="row white-text">
            <div class="col s3"><i class="ion-ios-settings dmp-grey-2-text pointer-opaq tooltipped" data-tooltip="Paramètres"></i></div>
            <div class="col s3"><i class="ion-eye-disabled dmp-grey-2-text pointer-opaq tooltipped" data-tooltip="Masquer le Quick Menu"></i></div>
            <div class="col s3"><i class="ion-information-circled dmp-grey-2-text pointer-opaq tooltipped" data-tooltip="A propos"></i></div>
            <div class="col s3"><a href="/manager/manager-operators/logout" class="dmp-grey-2-text"><i class="ion-power dmp-grey-2-text pointer-opaq tooltipped" data-tooltip="Déconnexion"></i></a></div>
        </div>
    </div>
</footer> 

</html>
