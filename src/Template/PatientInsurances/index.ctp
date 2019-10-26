<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['controller' => 'PatientInsurers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Insurer'), ['controller' => 'PatientInsurers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientInsurances index large-9 medium-8 columns content">
    <h3><?= __('Patient Insurances') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_card') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_insurer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expired_insurance_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientInsurances as $patientInsurance): ?>
            <tr>
                <td><?= $this->Number->format($patientInsurance->id) ?></td>
                <td><?= h($patientInsurance->number_card) ?></td>
                <td><?= $patientInsurance->has('patient_insurer') ? $this->Html->link($patientInsurance->patient_insurer->id, ['controller' => 'PatientInsurers', 'action' => 'view', $patientInsurance->patient_insurer->id]) : '' ?></td>
                <td><?= $this->Number->format($patientInsurance->patient_id) ?></td>
                <td><?= h($patientInsurance->created) ?></td>
                <td><?= h($patientInsurance->modified) ?></td>
                <td><?= h($patientInsurance->deleted) ?></td>
                <td><?= h($patientInsurance->expired_insurance_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientInsurance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientInsurance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientInsurance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurance->id)]) ?>
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
