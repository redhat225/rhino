<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Booking'), ['action' => 'edit', $patientBooking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Booking'), ['action' => 'delete', $patientBooking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBooking->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Booking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientBookings view large-9 medium-8 columns content">
    <h3><?= h($patientBooking->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $patientBooking->has('doctor') ? $this->Html->link($patientBooking->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $patientBooking->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $patientBooking->has('patient') ? $this->Html->link($patientBooking->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientBooking->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $patientBooking->has('institution') ? $this->Html->link($patientBooking->institution->id, ['controller' => 'Institutions', 'action' => 'view', $patientBooking->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Meeting') ?></th>
            <td><?= $patientBooking->has('visit_meeting') ? $this->Html->link($patientBooking->visit_meeting->id, ['controller' => 'VisitMeetings', 'action' => 'view', $patientBooking->visit_meeting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientBooking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Number->format($patientBooking->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientBooking->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($patientBooking->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Date Booking') ?></th>
            <td><?= h($patientBooking->expected_date_booking) ?></td>
        </tr>
    </table>
</div>
