<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit People Credential'), ['action' => 'edit', $peopleCredential->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete People Credential'), ['action' => 'delete', $peopleCredential->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleCredential->id)]) ?> </li>
        <li><?= $this->Html->link(__('List People Credentials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Credential'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peopleCredentials view large-9 medium-8 columns content">
    <h3><?= h($peopleCredential->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stamp Path') ?></th>
            <td><?= h($peopleCredential->stamp_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $peopleCredential->has('person') ? $this->Html->link($peopleCredential->person->id, ['controller' => 'People', 'action' => 'view', $peopleCredential->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($peopleCredential->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($peopleCredential->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($peopleCredential->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Signature Path') ?></h4>
        <?= $this->Text->autoParagraph(h($peopleCredential->signature_path)); ?>
    </div>
</div>
