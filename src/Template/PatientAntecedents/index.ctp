<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['controller' => 'PatientAntecedentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['controller' => 'PatientAntecedentTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedents index large-9 medium-8 columns content">
    <h3><?= __('Patient Antecedents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_antecedent_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_antecedent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intensity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('antecedent_note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('begin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientAntecedents as $patientAntecedent): ?>
            <tr>
                <td><?= $this->Number->format($patientAntecedent->id) ?></td>
                <td><?= $patientAntecedent->has('patient') ? $this->Html->link($patientAntecedent->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientAntecedent->patient->id]) : '' ?></td>
                <td><?= $this->Number->format($patientAntecedent->patient_antecedent_item_id) ?></td>
                <td><?= h($patientAntecedent->scope_antecedent) ?></td>
                <td><?= $this->Number->format($patientAntecedent->intensity) ?></td>
                <td><?= h($patientAntecedent->antecedent_note) ?></td>
                <td><?= h($patientAntecedent->begin) ?></td>
                <td><?= h($patientAntecedent->end) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientAntecedent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientAntecedent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientAntecedent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedent->id)]) ?>
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
