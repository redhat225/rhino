<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Operator Act Detail'), ['action' => 'edit', $pharmacyOperatorActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Operator Act Detail'), ['action' => 'delete', $pharmacyOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperatorActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Acts'), ['controller' => 'PharmacyOperatorActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act'), ['controller' => 'PharmacyOperatorActs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyOperatorActDetails view large-9 medium-8 columns content">
    <h3><?= h($pharmacyOperatorActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pharmacy Operator Act') ?></th>
            <td><?= $pharmacyOperatorActDetail->has('pharmacy_operator_act') ? $this->Html->link($pharmacyOperatorActDetail->pharmacy_operator_act->id, ['controller' => 'PharmacyOperatorActs', 'action' => 'view', $pharmacyOperatorActDetail->pharmacy_operator_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Operator') ?></th>
            <td><?= $pharmacyOperatorActDetail->has('pharmacy_operator') ? $this->Html->link($pharmacyOperatorActDetail->pharmacy_operator->id, ['controller' => 'PharmacyOperators', 'action' => 'view', $pharmacyOperatorActDetail->pharmacy_operator->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyOperatorActDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyOperatorActDetail->created) ?></td>
        </tr>
    </table>
</div>
