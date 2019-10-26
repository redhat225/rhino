<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examiner Institution'), ['action' => 'edit', $examinerInstitution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examiner Institution'), ['action' => 'delete', $examinerInstitution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerInstitution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Institutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Institution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinerInstitutions view large-9 medium-8 columns content">
    <h3><?= h($examinerInstitution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($examinerInstitution->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path Logo') ?></th>
            <td><?= h($examinerInstitution->path_logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $examinerInstitution->has('institution') ? $this->Html->link($examinerInstitution->institution->id, ['controller' => 'Institutions', 'action' => 'view', $examinerInstitution->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examinerInstitution->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examinerInstitution->created) ?></td>
        </tr>
    </table>
</div>
