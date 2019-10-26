<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Examiner Institutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerInstitutions form large-9 medium-8 columns content">
    <?= $this->Form->create($examinerInstitution) ?>
    <fieldset>
        <legend><?= __('Add Examiner Institution') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('path_logo');
            echo $this->Form->input('institution_id', ['options' => $institutions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
