<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution Schedule'), ['action' => 'edit', $institutionSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution Schedule'), ['action' => 'delete', $institutionSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institution Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Schedule'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutionSchedules view large-9 medium-8 columns content">
    <h3><?= h($institutionSchedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schedule Type') ?></th>
            <td><?= h($institutionSchedule->schedule_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutionSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($institutionSchedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($institutionSchedule->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Schedule Content') ?></h4>
        <?= $this->Text->autoParagraph(h($institutionSchedule->schedule_content)); ?>
    </div>
</div>
