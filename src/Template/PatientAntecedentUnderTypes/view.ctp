<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Antecedent Under Type'), ['action' => 'edit', $patientAntecedentUnderType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Antecedent Under Type'), ['action' => 'delete', $patientAntecedentUnderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentUnderType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['controller' => 'PatientAntecedentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['controller' => 'PatientAntecedentTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Items'), ['controller' => 'PatientAntecedentItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Item'), ['controller' => 'PatientAntecedentItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientAntecedentUnderTypes view large-9 medium-8 columns content">
    <h3><?= h($patientAntecedentUnderType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient Antecedent Type') ?></th>
            <td><?= $patientAntecedentUnderType->has('patient_antecedent_type') ? $this->Html->link($patientAntecedentUnderType->patient_antecedent_type->id, ['controller' => 'PatientAntecedentTypes', 'action' => 'view', $patientAntecedentUnderType->patient_antecedent_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label Under Type') ?></th>
            <td><?= h($patientAntecedentUnderType->label_under_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientAntecedentUnderType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Antecedent Items') ?></h4>
        <?php if (!empty($patientAntecedentUnderType->patient_antecedent_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label Item') ?></th>
                <th scope="col"><?= __('Patient Antecedent Under Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientAntecedentUnderType->patient_antecedent_items as $patientAntecedentItems): ?>
            <tr>
                <td><?= h($patientAntecedentItems->id) ?></td>
                <td><?= h($patientAntecedentItems->label_item) ?></td>
                <td><?= h($patientAntecedentItems->patient_antecedent_under_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientAntecedentItems', 'action' => 'view', $patientAntecedentItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientAntecedentItems', 'action' => 'edit', $patientAntecedentItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientAntecedentItems', 'action' => 'delete', $patientAntecedentItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
