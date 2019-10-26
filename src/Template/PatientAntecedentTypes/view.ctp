<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Antecedent Type'), ['action' => 'edit', $patientAntecedentType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Antecedent Type'), ['action' => 'delete', $patientAntecedentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientAntecedentTypes view large-9 medium-8 columns content">
    <h3><?= h($patientAntecedentType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Antecedent Type') ?></th>
            <td><?= h($patientAntecedentType->label_antecedent_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientAntecedentType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Antecedent Under Types') ?></h4>
        <?php if (!empty($patientAntecedentType->patient_antecedent_under_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Antecedent Type Id') ?></th>
                <th scope="col"><?= __('Label Under Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientAntecedentType->patient_antecedent_under_types as $patientAntecedentUnderTypes): ?>
            <tr>
                <td><?= h($patientAntecedentUnderTypes->id) ?></td>
                <td><?= h($patientAntecedentUnderTypes->patient_antecedent_type_id) ?></td>
                <td><?= h($patientAntecedentUnderTypes->label_under_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'view', $patientAntecedentUnderTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'edit', $patientAntecedentUnderTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'delete', $patientAntecedentUnderTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentUnderTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
