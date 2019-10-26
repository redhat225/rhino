<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Significant Information'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementSignificantInformations index large-9 medium-8 columns content">
    <h3><?= __('Requirement Significant Informations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('begin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('information_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('information_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementSignificantInformations as $requirementSignificantInformation): ?>
            <tr>
                <td><?= $this->Number->format($requirementSignificantInformation->id) ?></td>
                <td><?= h($requirementSignificantInformation->begin) ?></td>
                <td><?= h($requirementSignificantInformation->end) ?></td>
                <td><?= h($requirementSignificantInformation->information_label) ?></td>
                <td><?= h($requirementSignificantInformation->information_url) ?></td>
                <td><?= $requirementSignificantInformation->has('requirement') ? $this->Html->link($requirementSignificantInformation->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementSignificantInformation->requirement->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementSignificantInformation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementSignificantInformation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementSignificantInformation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementSignificantInformation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
