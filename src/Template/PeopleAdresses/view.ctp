<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Adress'), ['action' => 'edit', $peopleAdress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Adress'), ['action' => 'delete', $peopleAdress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAdress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Adresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Adress'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleAdresses view large-9 medium-8 columns content">
    <h3><?= h($peopleAdress->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $peopleAdress->has('person') ? $this->Html->link($peopleAdress->person->id, ['controller' => 'People', 'action' => 'view', $peopleAdress->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('City Quarter') ?></th>
            <td><?= h($peopleAdress->city_quarter) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($peopleAdress->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($peopleAdress->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleAdress->id) ?></td>
        </tr>
    </table>
</div>
