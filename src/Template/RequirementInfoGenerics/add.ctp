<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generic Groups'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic Group'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInfoGenerics form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementInfoGeneric) ?>
    <fieldset>
        <legend><?= __('Add Requirement Info Generic') ?></legend>
        <?php
            echo $this->Form->input('generic_type');
            echo $this->Form->input('requirement_info_generic_group_id', ['options' => $requirementInfoGenericGroups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
