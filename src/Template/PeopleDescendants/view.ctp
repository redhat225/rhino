<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Descendant'), ['action' => 'edit', $peopleDescendant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Descendant'), ['action' => 'delete', $peopleDescendant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleDescendant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Descendants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Descendant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleDescendants view large-9 medium-8 columns content">
    <h3><?= h($peopleDescendant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $peopleDescendant->has('person') ? $this->Html->link($peopleDescendant->person->id, ['controller' => 'People', 'action' => 'view', $peopleDescendant->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($peopleDescendant->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($peopleDescendant->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Sexe') ?></th>
            <td><?= h($peopleDescendant->sexe) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleDescendant->id) ?></td>
        </tr>
    </table>
</div>
