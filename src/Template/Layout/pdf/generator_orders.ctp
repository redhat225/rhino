<?= $this->Html->css('materialize.min',['fullBase'=> true]) ?>
<?= $this->Html->css('dmp',['fullBase'=> true]) ?>

<div class="row white" style="font-weight:300;">
		<?= $this->fetch('content') ?>
</div>



<?= $this->Html->script('jquery.min',['fullBase'=> true]) ?>
<?= $this->Html->script('Materialize/dist/js/materialize.min',['fullBase'=> true]) ?>