<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Insurance'), ['action' => 'edit', $patientInsurance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Insurance'), ['action' => 'delete', $patientInsurance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['controller' => 'PatientInsurers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Insurer'), ['controller' => 'PatientInsurers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientInsurances view large-9 medium-8 columns content">
    <h3><?= h($patientInsurance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number Card') ?></th>
            <td><?= h($patientInsurance->number_card) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Insurer') ?></th>
            <td><?= $patientInsurance->has('patient_insurer') ? $this->Html->link($patientInsurance->patient_insurer->id, ['controller' => 'PatientInsurers', 'action' => 'view', $patientInsurance->patient_insurer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientInsurance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Id') ?></th>
            <td><?= $this->Number->format($patientInsurance->patient_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientInsurance->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($patientInsurance->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($patientInsurance->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expired Insurance Date') ?></th>
            <td><?= h($patientInsurance->expired_insurance_date) ?></td>
        </tr>
    </table>
</div>
