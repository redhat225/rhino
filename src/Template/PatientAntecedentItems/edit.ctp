<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientAntecedentItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentItems form large-9 medium-8 columns content">
    <?= $this->Form->create($patientAntecedentItem) ?>
    <fieldset>
        <legend><?= __('Edit Patient Antecedent Item') ?></legend>
        <?php
            echo $this->Form->input('label_item');
            echo $this->Form->input('patient_antecedent_under_type_id', ['options' => $patientAntecedentUnderTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
