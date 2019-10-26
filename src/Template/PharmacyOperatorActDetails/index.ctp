<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Acts'), ['controller' => 'PharmacyOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act'), ['controller' => 'PharmacyOperatorActs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyOperatorActDetails index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Operator Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_operator_act_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_operator_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyOperatorActDetails as $pharmacyOperatorActDetail): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyOperatorActDetail->id) ?></td>
                <td><?= $pharmacyOperatorActDetail->has('pharmacy_operator_act') ? $this->Html->link($pharmacyOperatorActDetail->pharmacy_operator_act->id, ['controller' => 'PharmacyOperatorActs', 'action' => 'view', $pharmacyOperatorActDetail->pharmacy_operator_act->id]) : '' ?></td>
                <td><?= $pharmacyOperatorActDetail->has('pharmacy_operator') ? $this->Html->link($pharmacyOperatorActDetail->pharmacy_operator->id, ['controller' => 'PharmacyOperators', 'action' => 'view', $pharmacyOperatorActDetail->pharmacy_operator->id]) : '' ?></td>
                <td><?= h($pharmacyOperatorActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyOperatorActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyOperatorActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperatorActDetail->id)]) ?>
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
