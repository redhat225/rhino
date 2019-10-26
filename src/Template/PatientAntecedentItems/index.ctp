<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentItems index large-9 medium-8 columns content">
    <h3><?= __('Patient Antecedent Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_antecedent_under_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientAntecedentItems as $patientAntecedentItem): ?>
            <tr>
                <td><?= $this->Number->format($patientAntecedentItem->id) ?></td>
                <td><?= h($patientAntecedentItem->label_item) ?></td>
                <td><?= $patientAntecedentItem->has('patient_antecedent_under_type') ? $this->Html->link($patientAntecedentItem->patient_antecedent_under_type->id, ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'view', $patientAntecedentItem->patient_antecedent_under_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientAntecedentItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientAntecedentItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientAntecedentItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentItem->id)]) ?>
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
