<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Examiner Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Role Details'), ['controller' => 'ExaminerRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Role Detail'), ['controller' => 'ExaminerRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($examinerRole) ?>
    <fieldset>
        <legend><?= __('Add Examiner Role') ?></legend>
        <?php
            echo $this->Form->input('label_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
