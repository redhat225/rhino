<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Intervention Doctor'), ['action' => 'add']) ?></li>
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
<div class="visitInterventionDoctors index large-9 medium-8 columns content">
    <h3><?= __('Visit Intervention Doctors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intervention_done') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInterventionDoctors as $visitInterventionDoctor): ?>
            <tr>
                <td><?= $this->Number->format($visitInterventionDoctor->id) ?></td>
                <td><?= $visitInterventionDoctor->has('doctor') ? $this->Html->link($visitInterventionDoctor->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $visitInterventionDoctor->doctor->id]) : '' ?></td>
                <td><?= $visitInterventionDoctor->has('visit') ? $this->Html->link($visitInterventionDoctor->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitInterventionDoctor->visit->id]) : '' ?></td>
                <td><?= h($visitInterventionDoctor->created) ?></td>
                <td><?= h($visitInterventionDoctor->modified) ?></td>
                <td><?= h($visitInterventionDoctor->deleted) ?></td>
                <td><?= h($visitInterventionDoctor->intervention_done) ?></td>
                <td><?= $visitInterventionDoctor->has('visit_invoice') ? $this->Html->link($visitInterventionDoctor->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInterventionDoctor->visit_invoice->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInterventionDoctor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInterventionDoctor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInterventionDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInterventionDoctor->id)]) ?>
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
