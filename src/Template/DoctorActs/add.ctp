<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doctor Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Act Details'), ['controller' => 'DoctorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Act Detail'), ['controller' => 'DoctorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorActs form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorAct) ?>
    <fieldset>
        <legend><?= __('Add Doctor Act') ?></legend>
        <?php
            echo $this->Form->input('label_doctor_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
