<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution Area'), ['action' => 'edit', $institutionArea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution Area'), ['action' => 'delete', $institutionArea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionArea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institution Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Area'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutionAreas view large-9 medium-8 columns content">
    <h3><?= h($institutionArea->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= h($institutionArea->area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($institutionArea->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zone') ?></th>
            <td><?= h($institutionArea->zone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutionArea->id) ?></td>
        </tr>
    </table>
</div>
