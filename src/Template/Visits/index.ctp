<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['action' => 'add']) ?></li>
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
<div class="visits index large-9 medium-8 columns content">
    <h3><?= __('Visits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_motif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_visit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visits as $visit): ?>
            <tr>
                <td><?= $this->Number->format($visit->id) ?></td>
                <td><?= h($visit->visit_motif) ?></td>
                <td><?= h($visit->code_visit) ?></td>
                <td><?= h($visit->created) ?></td>
                <td><?= h($visit->modified) ?></td>
                <td><?= h($visit->deleted) ?></td>
                <td><?= $visit->has('patient') ? $this->Html->link($visit->patient->id, ['controller' => 'Patients', 'action' => 'view', $visit->patient->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visit->id)]) ?>
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
