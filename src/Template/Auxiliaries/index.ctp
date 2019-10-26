<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Constants'), ['controller' => 'VisitConstants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Constant'), ['controller' => 'VisitConstants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Intervention Auxiliaries'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Intervention Auxiliary'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Tasks'), ['controller' => 'VisitTasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Task'), ['controller' => 'VisitTasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaries index large-9 medium-8 columns content">
    <h3><?= __('Auxiliaries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('people_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_auxiliary') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auxiliaries as $auxiliary): ?>
            <tr>
                <td><?= $this->Number->format($auxiliary->id) ?></td>
                <td><?= h($auxiliary->code) ?></td>
                <td><?= h($auxiliary->username) ?></td>
                <td><?= h($auxiliary->password) ?></td>
                <td><?= $auxiliary->has('person') ? $this->Html->link($auxiliary->person->id, ['controller' => 'People', 'action' => 'view', $auxiliary->person->id]) : '' ?></td>
                <td><?= h($auxiliary->email) ?></td>
                <td><?= h($auxiliary->avatar_auxiliary) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auxiliary->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auxiliary->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auxiliary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliary->id)]) ?>
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
