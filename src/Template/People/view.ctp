<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="people view large-9 medium-8 columns content">
    <h3><?= h($person->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($person->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($person->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Bornplace') ?></th>
            <td><?= h($person->bornplace) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality') ?></th>
            <td><?= h($person->nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Blood') ?></th>
            <td><?= h($person->blood) ?></td>
        </tr>
        <tr>
            <th><?= __('Rhesus') ?></th>
            <td><?= h($person->rhesus) ?></td>
        </tr>
        <tr>
            <th><?= __('Path Pic') ?></th>
            <td><?= h($person->path_pic) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($person->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated By') ?></th>
            <td><?= $this->Number->format($person->updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($person->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateborn') ?></th>
            <td><?= h($person->dateborn) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($person->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($person->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($person->deleted) ?></td>
        </tr>
    </table>
</div>
