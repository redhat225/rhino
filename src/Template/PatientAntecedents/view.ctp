<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Antecedent'), ['action' => 'edit', $patientAntecedent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Antecedent'), ['action' => 'delete', $patientAntecedent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['controller' => 'PatientAntecedentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['controller' => 'PatientAntecedentTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientAntecedents view large-9 medium-8 columns content">
    <h3><?= h($patientAntecedent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $patientAntecedent->has('patient') ? $this->Html->link($patientAntecedent->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientAntecedent->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Antecedent') ?></th>
            <td><?= h($patientAntecedent->scope_antecedent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Antecedent Note') ?></th>
            <td><?= h($patientAntecedent->antecedent_note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientAntecedent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Antecedent Item Id') ?></th>
            <td><?= $this->Number->format($patientAntecedent->patient_antecedent_item_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intensity') ?></th>
            <td><?= $this->Number->format($patientAntecedent->intensity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Begin') ?></th>
            <td><?= h($patientAntecedent->begin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($patientAntecedent->end) ?></td>
        </tr>
    </table>
</div>
