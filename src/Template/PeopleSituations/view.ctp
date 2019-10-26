<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Situation'), ['action' => 'edit', $peopleSituation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Situation'), ['action' => 'delete', $peopleSituation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleSituation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Situations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Situation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleSituations view large-9 medium-8 columns content">
    <h3><?= h($peopleSituation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $peopleSituation->has('person') ? $this->Html->link($peopleSituation->person->id, ['controller' => 'People', 'action' => 'view', $peopleSituation->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($peopleSituation->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleSituation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Children') ?></th>
            <td><?= $this->Number->format($peopleSituation->children) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($peopleSituation->created) ?></td>
        </tr>
    </table>
</div>
