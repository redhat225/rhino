<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['action' => 'add']) ?></li>
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
<div class="visitMeetings index large-9 medium-8 columns content">
    <h3><?= __('Visit Meetings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_meeting_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('next_meeting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('done') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_operator_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_meeting_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitMeetings as $visitMeeting): ?>
            <tr>
                <td><?= $this->Number->format($visitMeeting->id) ?></td>
                <td><?= $visitMeeting->has('visit') ? $this->Html->link($visitMeeting->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitMeeting->visit->id]) : '' ?></td>
                <td><?= $visitMeeting->has('doctor') ? $this->Html->link($visitMeeting->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $visitMeeting->doctor->id]) : '' ?></td>
                <td><?= $this->Number->format($visitMeeting->visit_invoice_id) ?></td>
                <td><?= h($visitMeeting->created) ?></td>
                <td><?= h($visitMeeting->modified) ?></td>
                <td><?= h($visitMeeting->deleted) ?></td>
                <td><?= h($visitMeeting->diary) ?></td>
                <td><?= $visitMeeting->has('patient') ? $this->Html->link($visitMeeting->patient->id, ['controller' => 'Patients', 'action' => 'view', $visitMeeting->patient->id]) : '' ?></td>
                <td><?= h($visitMeeting->expected_meeting_date) ?></td>
                <td><?= h($visitMeeting->next_meeting) ?></td>
                <td><?= $this->Number->format($visitMeeting->done) ?></td>
                <td><?= $this->Number->format($visitMeeting->manager_operator_id) ?></td>
                <td><?= $this->Number->format($visitMeeting->visit_meeting_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitMeeting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitMeeting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitMeeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeeting->id)]) ?>
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
