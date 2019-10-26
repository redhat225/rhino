<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generic Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generics'), ['controller' => 'RequirementInfoGenerics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic'), ['controller' => 'RequirementInfoGenerics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInfoGenericGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementInfoGenericGroup) ?>
    <fieldset>
        <legend><?= __('Add Requirement Info Generic Group') ?></legend>
        <?php
            echo $this->Form->input('group_label');
            echo $this->Form->input('group_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
