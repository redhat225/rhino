<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meeting Constants'), ['controller' => 'VisitMeetingConstants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting Constant'), ['controller' => 'VisitMeetingConstants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitMeetings form large-9 medium-8 columns content">
    <?= $this->Form->create($visitMeeting) ?>
    <fieldset>
        <legend><?= __('Add Visit Meeting') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('visit_id', ['options' => $visits]);
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('visit_invoice_id');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('diary');
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('expected_meeting_date');
            echo $this->Form->input('next_meeting', ['empty' => true]);
            echo $this->Form->input('done');
            echo $this->Form->input('manager_operator_id');
            echo $this->Form->input('visit_meeting_type_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
