<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Contact'), ['action' => 'edit', $peopleContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Contact'), ['action' => 'delete', $peopleContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleContacts view large-9 medium-8 columns content">
    <h3><?= h($peopleContact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Contact1') ?></th>
            <td><?= h($peopleContact->contact1) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact2') ?></th>
            <td><?= h($peopleContact->contact2) ?></td>
        </tr>
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $peopleContact->has('person') ? $this->Html->link($peopleContact->person->id, ['controller' => 'People', 'action' => 'view', $peopleContact->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleContact->id) ?></td>
        </tr>
    </table>
</div>
