<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auxiliary Act'), ['action' => 'edit', $auxiliaryAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auxiliary Act'), ['action' => 'delete', $auxiliaryAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auxiliaryActs view large-9 medium-8 columns content">
    <h3><?= h($auxiliaryAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Act') ?></th>
            <td><?= h($auxiliaryAct->label_act) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auxiliaryAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Auxiliary Act Details') ?></h4>
        <?php if (!empty($auxiliaryAct->auxiliary_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Auxiliary Act Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliaryAct->auxiliary_act_details as $auxiliaryActDetails): ?>
            <tr>
                <td><?= h($auxiliaryActDetails->id) ?></td>
                <td><?= h($auxiliaryActDetails->auxiliary_id) ?></td>
                <td><?= h($auxiliaryActDetails->auxiliary_act_id) ?></td>
                <td><?= h($auxiliaryActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AuxiliaryActDetails', 'action' => 'view', $auxiliaryActDetails->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AuxiliaryActDetails', 'action' => 'edit', $auxiliaryActDetails->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuxiliaryActDetails', 'action' => 'delete', $auxiliaryActDetails->], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryActDetails->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
