<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auxiliary Act Detail'), ['action' => 'edit', $auxiliaryActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auxiliary Act Detail'), ['action' => 'delete', $auxiliaryActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Acts'), ['controller' => 'AuxiliaryActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Act'), ['controller' => 'AuxiliaryActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auxiliaryActDetails view large-9 medium-8 columns content">
    <h3><?= h($auxiliaryActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auxiliary') ?></th>
            <td><?= $auxiliaryActDetail->has('auxiliary') ? $this->Html->link($auxiliaryActDetail->auxiliary->id, ['controller' => 'Auxiliaries', 'action' => 'view', $auxiliaryActDetail->auxiliary->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auxiliary Act') ?></th>
            <td><?= $auxiliaryActDetail->has('auxiliary_act') ? $this->Html->link($auxiliaryActDetail->auxiliary_act->id, ['controller' => 'AuxiliaryActs', 'action' => 'view', $auxiliaryActDetail->auxiliary_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auxiliaryActDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($auxiliaryActDetail->created) ?></td>
        </tr>
    </table>
</div>
