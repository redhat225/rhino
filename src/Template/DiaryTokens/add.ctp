<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaryTokens form large-9 medium-8 columns content">
    <?= $this->Form->create($diaryToken) ?>
    <fieldset>
        <legend><?= __('Add Diary Token') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('diary_token');
            echo $this->Form->input('delay');
            echo $this->Form->input('tracking_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
