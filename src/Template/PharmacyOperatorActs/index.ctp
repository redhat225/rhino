<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Act Details'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act Detail'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyOperatorActs index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Operator Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label_pharmacy_op_act') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyOperatorActs as $pharmacyOperatorAct): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyOperatorAct->id) ?></td>
                <td><?= h($pharmacyOperatorAct->label_pharmacy_op_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyOperatorAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyOperatorAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperatorAct->id)]) ?>
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
