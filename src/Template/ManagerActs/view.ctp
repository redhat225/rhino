<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager Act'), ['action' => 'edit', $managerAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager Act'), ['action' => 'delete', $managerAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manager Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Act'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managerActs view large-9 medium-8 columns content">
    <h3><?= h($managerAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Manager Act') ?></th>
            <td><?= h($managerAct->label_manager_act) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($managerAct->id) ?></td>
        </tr>
    </table>
</div>
