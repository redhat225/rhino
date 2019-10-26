<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treatment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatments form large-9 medium-8 columns content">
    <?= $this->Form->create($treatment) ?>
    <fieldset>
        <legend><?= __('Edit Treatment') ?></legend>
        <?php
            echo $this->Form->input('visit_intervention_doctor_id');
            echo $this->Form->input('description');
            echo $this->Form->input('diary');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
