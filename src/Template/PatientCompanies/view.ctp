<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Company'), ['action' => 'edit', $patientCompany->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Company'), ['action' => 'delete', $patientCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompany->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientCompanies view large-9 medium-8 columns content">
    <h3><?= h($patientCompany->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label Patient Company') ?></th>
            <td><?= h($patientCompany->label_patient_company) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact1') ?></th>
            <td><?= h($patientCompany->contact1) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact2') ?></th>
            <td><?= h($patientCompany->contact2) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientCompany->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Company Details') ?></h4>
        <?php if (!empty($patientCompany->patient_company_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Patient Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientCompany->patient_company_details as $patientCompanyDetails): ?>
            <tr>
                <td><?= h($patientCompanyDetails->id) ?></td>
                <td><?= h($patientCompanyDetails->patient_id) ?></td>
                <td><?= h($patientCompanyDetails->patient_company_id) ?></td>
                <td><?= h($patientCompanyDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientCompanyDetails', 'action' => 'view', $patientCompanyDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientCompanyDetails', 'action' => 'edit', $patientCompanyDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientCompanyDetails', 'action' => 'delete', $patientCompanyDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompanyDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
