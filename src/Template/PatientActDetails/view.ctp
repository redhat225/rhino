<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Act Detail'), ['action' => 'edit', $patientActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Act Detail'), ['action' => 'delete', $patientActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Acts'), ['controller' => 'PatientActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Act'), ['controller' => 'PatientActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientActDetails view large-9 medium-8 columns content">
    <h3><?= h($patientActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $patientActDetail->has('patient') ? $this->Html->link($patientActDetail->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientActDetail->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Act') ?></th>
            <td><?= $patientActDetail->has('patient_act') ? $this->Html->link($patientActDetail->patient_act->id, ['controller' => 'PatientActs', 'action' => 'view', $patientActDetail->patient_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientActDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientActDetail->created) ?></td>
        </tr>
    </table>
</div>
