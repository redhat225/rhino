<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Booking'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientBookings index large-9 medium-8 columns content">
    <h3><?= __('Patient Bookings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_date_booking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_meeting_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientBookings as $patientBooking): ?>
            <tr>
                <td><?= $this->Number->format($patientBooking->id) ?></td>
                <td><?= h($patientBooking->created) ?></td>
                <td><?= h($patientBooking->modified) ?></td>
                <td><?= h($patientBooking->expected_date_booking) ?></td>
                <td><?= $patientBooking->has('doctor') ? $this->Html->link($patientBooking->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $patientBooking->doctor->id]) : '' ?></td>
                <td><?= $patientBooking->has('patient') ? $this->Html->link($patientBooking->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientBooking->patient->id]) : '' ?></td>
                <td><?= $patientBooking->has('institution') ? $this->Html->link($patientBooking->institution->id, ['controller' => 'Institutions', 'action' => 'view', $patientBooking->institution->id]) : '' ?></td>
                <td><?= $patientBooking->has('visit_meeting') ? $this->Html->link($patientBooking->visit_meeting->id, ['controller' => 'VisitMeetings', 'action' => 'view', $patientBooking->visit_meeting->id]) : '' ?></td>
                <td><?= $this->Number->format($patientBooking->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientBooking->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientBooking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientBooking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBooking->id)]) ?>
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
