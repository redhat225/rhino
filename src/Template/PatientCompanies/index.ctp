<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientCompanies index large-9 medium-8 columns content">
    <h3><?= __('Patient Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label_patient_company') ?></th>
                <th><?= $this->Paginator->sort('contact1') ?></th>
                <th><?= $this->Paginator->sort('contact2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientCompanies as $patientCompany): ?>
            <tr>
                <td><?= $this->Number->format($patientCompany->id) ?></td>
                <td><?= h($patientCompany->label_patient_company) ?></td>
                <td><?= h($patientCompany->contact1) ?></td>
                <td><?= h($patientCompany->contact2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientCompany->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientCompany->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompany->id)]) ?>
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
