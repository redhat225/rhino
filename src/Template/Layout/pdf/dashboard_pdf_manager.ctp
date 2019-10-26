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

$cakeDescription = "Etats Financier";
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
    <?= $this->Html->meta('icon','dmp1.ico',['fullBase'=>true]) ?>
    <?= $this->Html->css('ionicons-2.0.1/css/ionicons.min',['fullBase'=> true]) ?>
    <?= $this->Html->css('materialize.min',['fullBase'=> true]) ?>
    <?= $this->Html->css('dmp',['fullBase'=> true]) ?>

    <!-- Extra Dependencies -->
    <?= $this->fetch('css') ?>


    <?= $this->Html->script('jquery.min',['fullBase'=> true]) ?>
    <?= $this->Html->script('Materialize/dist/js/materialize.min',['fullBase'=> true]) ?>
    <?= $this->Html->script('Chart.js-master/src/Chart.bundle',['fullBase'=> true]) ?>  
</head>

<body>

  <div class="row zero-margin" id="game-gift-content">
          <div class="col l12 m12 s12" id="dmp-variable-content-main" style="padding:20px 0px 20px 20px; position:relative;">
                <div class="row" id="dmp-variable-content">
                    <?= $this->fetch('content') ?>
                </div>
          </div>
  </div>

  <?= $this->fetch('script') ?>
   
</body>
</html>
