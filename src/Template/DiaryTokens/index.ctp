<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Diary Token'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaryTokens index large-9 medium-8 columns content">
    <h3><?= __('Diary Tokens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diary_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tracking_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diaryTokens as $diaryToken): ?>
            <tr>
                <td><?= $this->Number->format($diaryToken->id) ?></td>
                <td><?= $diaryToken->has('patient') ? $this->Html->link($diaryToken->patient->id, ['controller' => 'Patients', 'action' => 'view', $diaryToken->patient->id]) : '' ?></td>
                <td><?= $diaryToken->has('doctor') ? $this->Html->link($diaryToken->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $diaryToken->doctor->id]) : '' ?></td>
                <td><?= h($diaryToken->diary_token) ?></td>
                <td><?= $this->Number->format($diaryToken->delay) ?></td>
                <td><?= h($diaryToken->tracking_code) ?></td>
                <td><?= h($diaryToken->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $diaryToken->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diaryToken->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diaryToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryToken->id)]) ?>
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
