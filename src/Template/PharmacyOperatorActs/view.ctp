<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Operator Act'), ['action' => 'edit', $pharmacyOperatorAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Operator Act'), ['action' => 'delete', $pharmacyOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperatorAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Act Details'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act Detail'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyOperatorActs view large-9 medium-8 columns content">
    <h3><?= h($pharmacyOperatorAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label Pharmacy Op Act') ?></th>
            <td><?= h($pharmacyOperatorAct->label_pharmacy_op_act) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyOperatorAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Operator Act Details') ?></h4>
        <?php if (!empty($pharmacyOperatorAct->pharmacy_operator_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pharmacy Operator Act Id') ?></th>
                <th><?= __('Pharmacy Operator Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyOperatorAct->pharmacy_operator_act_details as $pharmacyOperatorActDetails): ?>
            <tr>
                <td><?= h($pharmacyOperatorActDetails->id) ?></td>
                <td><?= h($pharmacyOperatorActDetails->pharmacy_operator_act_id) ?></td>
                <td><?= h($pharmacyOperatorActDetails->pharmacy_operator_id) ?></td>
                <td><?= h($pharmacyOperatorActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'view', $pharmacyOperatorActDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'edit', $pharmacyOperatorActDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'delete', $pharmacyOperatorActDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperatorActDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
