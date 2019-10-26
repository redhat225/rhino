<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Situation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleSituations index large-9 medium-8 columns content">
    <h3><?= __('People Situations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('children') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleSituations as $peopleSituation): ?>
            <tr>
                <td><?= $this->Number->format($peopleSituation->id) ?></td>
                <td><?= $peopleSituation->has('person') ? $this->Html->link($peopleSituation->person->id, ['controller' => 'People', 'action' => 'view', $peopleSituation->person->id]) : '' ?></td>
                <td><?= h($peopleSituation->status) ?></td>
                <td><?= $this->Number->format($peopleSituation->children) ?></td>
                <td><?= h($peopleSituation->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleSituation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleSituation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleSituation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleSituation->id)]) ?>
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
