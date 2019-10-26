<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution Adress'), ['action' => 'edit', $institutionAdress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution Adress'), ['action' => 'delete', $institutionAdress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionAdress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institution Adresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Adress'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutionAdresses view large-9 medium-8 columns content">
    <h3><?= h($institutionAdress->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($institutionAdress->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Box') ?></th>
            <td><?= h($institutionAdress->postal_box) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact1') ?></th>
            <td><?= h($institutionAdress->contact1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact2') ?></th>
            <td><?= h($institutionAdress->contact2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $institutionAdress->has('institution') ? $this->Html->link($institutionAdress->institution->id, ['controller' => 'Institutions', 'action' => 'view', $institutionAdress->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($institutionAdress->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website') ?></th>
            <td><?= h($institutionAdress->website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutionAdress->id) ?></td>
        </tr>
    </table>
</div>
