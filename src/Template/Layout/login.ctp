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
?>
<!DOCTYPE html>
<html style="background:url('webroot/img/assets_dmp/family.jpg') repeat-x 1%;">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    
    <?= $this->Html->css('ionicons-2.0.1/css/ionicons.min') ?>
    <?= $this->Html->css('materialize.min') ?>
    <?= $this->Html->css('dmp') ?>

    <?= $this->fetch('css') ?>

    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('Materialize/dist/js/materialize.min') ?>

</head>

<body>
    <?= $this->Flash->render() ?>
    
    <div class="acc-small-top-margin" style="top: -25px;margin-top: 70px !important;position: relative;">
        <?= $this->fetch('content') ?>
    </div>
    

    <?= $this->fetch('script') ?>
</body>
  <footer class="page-footer zero-margin zero-padding dmp-main-back" style="position:absolute;bottom:0px;width:100%;">
          <div class="footer-copyright">
            <div class="container">
            © 2017 Dossier Médical Personnel
            <a class="grey-text text-lighten-4 right" href="http://www.vne-ci.com">Virtual Network Entreprise</a>
            </div>
          </div>
        </footer>
</html>
