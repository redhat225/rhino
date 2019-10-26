<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment Method'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['controller' => 'PharmacyPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['controller' => 'PharmacyPayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyPaymentMethods index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Payment Methods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyPaymentMethods as $pharmacyPaymentMethod): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyPaymentMethod->id) ?></td>
                <td><?= h($pharmacyPaymentMethod->name) ?></td>
                <td><?= h($pharmacyPaymentMethod->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyPaymentMethod->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyPaymentMethod->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyPaymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPaymentMethod->id)]) ?>
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
