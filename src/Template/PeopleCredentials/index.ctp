<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Credential'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleCredentials index large-9 medium-8 columns content">
    <h3><?= __('People Credentials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stamp_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('people_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleCredentials as $peopleCredential): ?>
            <tr>
                <td><?= $this->Number->format($peopleCredential->id) ?></td>
                <td><?= h($peopleCredential->stamp_path) ?></td>
                <td><?= $peopleCredential->has('person') ? $this->Html->link($peopleCredential->person->id, ['controller' => 'People', 'action' => 'view', $peopleCredential->person->id]) : '' ?></td>
                <td><?= h($peopleCredential->created) ?></td>
                <td><?= h($peopleCredential->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleCredential->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleCredential->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleCredential->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleCredential->id)]) ?>
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
