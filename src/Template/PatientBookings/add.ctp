<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Bookings'), ['action' => 'index']) ?></li>
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
<div class="patientBookings form large-9 medium-8 columns content">
    <?= $this->Form->create($patientBooking) ?>
    <fieldset>
        <legend><?= __('Add Patient Booking') ?></legend>
        <?php
            echo $this->Form->input('expected_date_booking');
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('institution_id', ['options' => $institutions]);
            echo $this->Form->input('visit_meeting_id', ['options' => $visitMeetings]);
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
