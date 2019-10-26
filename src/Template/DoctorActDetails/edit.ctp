<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $doctorActDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $doctorActDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Doctor Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Acts'), ['controller' => 'DoctorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Act'), ['controller' => 'DoctorActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorActDetail) ?>
    <fieldset>
        <legend><?= __('Edit Doctor Act Detail') ?></legend>
        <?php
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('doctor_act_id', ['options' => $doctorActs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
