<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Payment Method'), ['action' => 'edit', $pharmacyPaymentMethod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Payment Method'), ['action' => 'delete', $pharmacyPaymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPaymentMethod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Payment Methods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Payment Method'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['controller' => 'PharmacyPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['controller' => 'PharmacyPayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyPaymentMethods view large-9 medium-8 columns content">
    <h3><?= h($pharmacyPaymentMethod->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pharmacyPaymentMethod->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyPaymentMethod->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyPaymentMethod->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Payments') ?></h4>
        <?php if (!empty($pharmacyPaymentMethod->pharmacy_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Pharmacy Payment Method Id') ?></th>
                <th><?= __('Pharmacy Invoice Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyPaymentMethod->pharmacy_payments as $pharmacyPayments): ?>
            <tr>
                <td><?= h($pharmacyPayments->id) ?></td>
                <td><?= h($pharmacyPayments->code) ?></td>
                <td><?= h($pharmacyPayments->amount) ?></td>
                <td><?= h($pharmacyPayments->pharmacy_payment_method_id) ?></td>
                <td><?= h($pharmacyPayments->pharmacy_invoice_id) ?></td>
                <td><?= h($pharmacyPayments->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyPayments', 'action' => 'view', $pharmacyPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyPayments', 'action' => 'edit', $pharmacyPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyPayments', 'action' => 'delete', $pharmacyPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
