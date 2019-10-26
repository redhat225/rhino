<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Companies'), ['controller' => 'PatientCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company'), ['controller' => 'PatientCompanies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientCompanyDetails index large-9 medium-8 columns content">
    <h3><?= __('Patient Company Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('patient_id') ?></th>
                <th><?= $this->Paginator->sort('patient_company_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientCompanyDetails as $patientCompanyDetail): ?>
            <tr>
                <td><?= $this->Number->format($patientCompanyDetail->id) ?></td>
                <td><?= $patientCompanyDetail->has('patient') ? $this->Html->link($patientCompanyDetail->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientCompanyDetail->patient->id]) : '' ?></td>
                <td><?= $patientCompanyDetail->has('patient_company') ? $this->Html->link($patientCompanyDetail->patient_company->id, ['controller' => 'PatientCompanies', 'action' => 'view', $patientCompanyDetail->patient_company->id]) : '' ?></td>
                <td><?= h($patientCompanyDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientCompanyDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientCompanyDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientCompanyDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompanyDetail->id)]) ?>
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
