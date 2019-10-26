<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Work'), ['action' => 'edit', $patientWork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Work'), ['action' => 'delete', $patientWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientWork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Works'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Work'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientWorks view large-9 medium-8 columns content">
    <h3><?= h($patientWork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $patientWork->has('patient') ? $this->Html->link($patientWork->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientWork->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Label') ?></th>
            <td><?= h($patientWork->work_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Company') ?></th>
            <td><?= h($patientWork->work_company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientWork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientWork->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($patientWork->modified) ?></td>
        </tr>
    </table>
</div>
