<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['controller' => 'VisitKindTransports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['controller' => 'VisitKindTransports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['controller' => 'VisitLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Level'), ['controller' => 'VisitLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Specialities'), ['controller' => 'VisitSpecialities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Speciality'), ['controller' => 'VisitSpecialities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['controller' => 'VisitActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act'), ['controller' => 'VisitActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visits form large-9 medium-8 columns content">
    <?= $this->Form->create($visit) ?>
    <fieldset>
        <legend><?= __('Add Visit') ?></legend>
        <?php
            echo $this->Form->input('visit_motif');
            echo $this->Form->input('code_visit');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('visit_acts._ids', ['options' => $visitActs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
