<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Presentation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementPresentations index large-9 medium-8 columns content">
    <h3><?= __('Requirement Presentations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_administration_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_administration_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_administration_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_renewal_indications') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation_agreement') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementPresentations as $requirementPresentation): ?>
            <tr>
                <td><?= $this->Number->format($requirementPresentation->id) ?></td>
                <td><?= h($requirementPresentation->presentation_description) ?></td>
                <td><?= $requirementPresentation->has('requirement') ? $this->Html->link($requirementPresentation->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementPresentation->requirement->id]) : '' ?></td>
                <td><?= h($requirementPresentation->presentation_code) ?></td>
                <td><?= h($requirementPresentation->presentation_administration_status) ?></td>
                <td><?= h($requirementPresentation->presentation_administration_state) ?></td>
                <td><?= h($requirementPresentation->presentation_administration_date) ?></td>
                <td><?= $this->Number->format($requirementPresentation->presentation_price) ?></td>
                <td><?= h($requirementPresentation->presentation_renewal_indications) ?></td>
                <td><?= h($requirementPresentation->presentation_agreement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementPresentation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementPresentation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementPresentation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementPresentation->id)]) ?>
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
