<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Company Detail'), ['action' => 'edit', $patientCompanyDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Company Detail'), ['action' => 'delete', $patientCompanyDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompanyDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Companies'), ['controller' => 'PatientCompanies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Company'), ['controller' => 'PatientCompanies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientCompanyDetails view large-9 medium-8 columns content">
    <h3><?= h($patientCompanyDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Patient') ?></th>
            <td><?= $patientCompanyDetail->has('patient') ? $this->Html->link($patientCompanyDetail->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientCompanyDetail->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Patient Company') ?></th>
            <td><?= $patientCompanyDetail->has('patient_company') ? $this->Html->link($patientCompanyDetail->patient_company->id, ['controller' => 'PatientCompanies', 'action' => 'view', $patientCompanyDetail->patient_company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientCompanyDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($patientCompanyDetail->created) ?></td>
        </tr>
    </table>
</div>
