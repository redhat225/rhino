<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Acts'), ['controller' => 'AuxiliaryActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act'), ['controller' => 'AuxiliaryActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryActDetails index large-9 medium-8 columns content">
    <h3><?= __('Auxiliary Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_act_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auxiliaryActDetails as $auxiliaryActDetail): ?>
            <tr>
                <td><?= $this->Number->format($auxiliaryActDetail->id) ?></td>
                <td><?= $auxiliaryActDetail->has('auxiliary') ? $this->Html->link($auxiliaryActDetail->auxiliary->id, ['controller' => 'Auxiliaries', 'action' => 'view', $auxiliaryActDetail->auxiliary->id]) : '' ?></td>
                <td><?= $auxiliaryActDetail->has('auxiliary_act') ? $this->Html->link($auxiliaryActDetail->auxiliary_act->id, ['controller' => 'AuxiliaryActs', 'action' => 'view', $auxiliaryActDetail->auxiliary_act->id]) : '' ?></td>
                <td><?= h($auxiliaryActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auxiliaryActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auxiliaryActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auxiliaryActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryActDetail->id)]) ?>
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
