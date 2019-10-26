<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Attribute'), ['action' => 'edit', $peopleAttribute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Attribute'), ['action' => 'delete', $peopleAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAttribute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Attribute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleAttributes view large-9 medium-8 columns content">
    <h3><?= h($peopleAttribute->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $peopleAttribute->has('person') ? $this->Html->link($peopleAttribute->person->id, ['controller' => 'People', 'action' => 'view', $peopleAttribute->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Skin') ?></th>
            <td><?= h($peopleAttribute->skin) ?></td>
        </tr>
        <tr>
            <th><?= __('Eyes') ?></th>
            <td><?= h($peopleAttribute->eyes) ?></td>
        </tr>
        <tr>
            <th><?= __('Haircolour') ?></th>
            <td><?= h($peopleAttribute->haircolour) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleAttribute->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Height') ?></th>
            <td><?= $this->Number->format($peopleAttribute->height) ?></td>
        </tr>
    </table>
</div>
