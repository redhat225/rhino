<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Books'), ['controller' => 'PatientBooks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Book'), ['controller' => 'PatientBooks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patients index large-9 medium-8 columns content">
    <h3><?= __('Patients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('avatar_patient') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?= $this->Number->format($patient->id) ?></td>
                <td><?= h($patient->code) ?></td>
                <td><?= $patient->has('person') ? $this->Html->link($patient->person->id, ['controller' => 'People', 'action' => 'view', $patient->person->id]) : '' ?></td>
                <td><?= h($patient->username) ?></td>
                <td><?= h($patient->created) ?></td>
                <td><?= h($patient->modified) ?></td>
                <td><?= h($patient->email) ?></td>
                <td><?= h($patient->avatar_patient) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?>
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
