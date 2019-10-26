<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution Adress'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionAdresses index large-9 medium-8 columns content">
    <h3><?= __('Institution Adresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_box') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutionAdresses as $institutionAdress): ?>
            <tr>
                <td><?= $this->Number->format($institutionAdress->id) ?></td>
                <td><?= h($institutionAdress->fax) ?></td>
                <td><?= h($institutionAdress->postal_box) ?></td>
                <td><?= h($institutionAdress->contact1) ?></td>
                <td><?= h($institutionAdress->contact2) ?></td>
                <td><?= $institutionAdress->has('institution') ? $this->Html->link($institutionAdress->institution->id, ['controller' => 'Institutions', 'action' => 'view', $institutionAdress->institution->id]) : '' ?></td>
                <td><?= h($institutionAdress->email) ?></td>
                <td><?= h($institutionAdress->website) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institutionAdress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institutionAdress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institutionAdress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionAdress->id)]) ?>
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
