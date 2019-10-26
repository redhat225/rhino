<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Intervention Doctors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Bookings'), ['controller' => 'PatientBookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Booking'), ['controller' => 'PatientBookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Doctor Details'), ['controller' => 'VisitActDoctorDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Doctor Detail'), ['controller' => 'VisitActDoctorDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Notes'), ['controller' => 'VisitNotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Note'), ['controller' => 'VisitNotes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInterventionDoctors form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInterventionDoctor) ?>
    <fieldset>
        <legend><?= __('Add Visit Intervention Doctor') ?></legend>
        <?php
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('visit_id', ['options' => $visits]);
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('intervention_history_illness');
            echo $this->Form->input('intervention_report_exam');
            echo $this->Form->input('intervention_done');
            echo $this->Form->input('visit_invoice_id', ['options' => $visitInvoices, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
