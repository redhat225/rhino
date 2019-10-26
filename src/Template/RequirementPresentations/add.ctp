<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Presentations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementPresentations form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementPresentation) ?>
    <fieldset>
        <legend><?= __('Add Requirement Presentation') ?></legend>
        <?php
            echo $this->Form->input('presentation_description');
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
            echo $this->Form->input('presentation_code');
            echo $this->Form->input('presentation_administration_status');
            echo $this->Form->input('presentation_administration_state');
            echo $this->Form->input('presentation_administration_date');
            echo $this->Form->input('presentation_price');
            echo $this->Form->input('presentation_renewal_indications');
            echo $this->Form->input('presentation_agreement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
