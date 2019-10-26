<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['controller' => 'PatientAntecedentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['controller' => 'PatientAntecedentTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Items'), ['controller' => 'PatientAntecedentItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Item'), ['controller' => 'PatientAntecedentItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentUnderTypes index large-9 medium-8 columns content">
    <h3><?= __('Patient Antecedent Under Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_antecedent_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_under_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientAntecedentUnderTypes as $patientAntecedentUnderType): ?>
            <tr>
                <td><?= $this->Number->format($patientAntecedentUnderType->id) ?></td>
                <td><?= $patientAntecedentUnderType->has('patient_antecedent_type') ? $this->Html->link($patientAntecedentUnderType->patient_antecedent_type->id, ['controller' => 'PatientAntecedentTypes', 'action' => 'view', $patientAntecedentUnderType->patient_antecedent_type->id]) : '' ?></td>
                <td><?= h($patientAntecedentUnderType->label_under_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientAntecedentUnderType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientAntecedentUnderType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientAntecedentUnderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentUnderType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
