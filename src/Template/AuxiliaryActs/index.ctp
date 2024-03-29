<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryActs index large-9 medium-8 columns content">
    <h3><?= __('Auxiliary Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_act') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auxiliaryActs as $auxiliaryAct): ?>
            <tr>
                <td><?= $this->Number->format($auxiliaryAct->id) ?></td>
                <td><?= h($auxiliaryAct->label_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auxiliaryAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auxiliaryAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auxiliaryAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryAct->id)]) ?>
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
