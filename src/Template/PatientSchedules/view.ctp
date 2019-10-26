<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Schedule'), ['action' => 'edit', $patientSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Schedule'), ['action' => 'delete', $patientSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientSchedules view large-9 medium-8 columns content">
    <h3><?= h($patientSchedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $patientSchedule->has('patient') ? $this->Html->link($patientSchedule->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientSchedule->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule Type') ?></th>
            <td><?= h($patientSchedule->schedule_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientSchedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($patientSchedule->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Schedule Content') ?></h4>
        <?= $this->Text->autoParagraph(h($patientSchedule->schedule_content)); ?>
    </div>
</div>
