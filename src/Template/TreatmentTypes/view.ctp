<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Type'), ['action' => 'edit', $treatmentType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Type'), ['action' => 'delete', $treatmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentTypes view large-9 medium-8 columns content">
    <h3><?= h($treatmentType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($treatmentType->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Treatments') ?></h4>
        <?php if (!empty($treatmentType->treatments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Visit Meeting Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Exp') ?></th>
                <th><?= __('Treatment Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($treatmentType->treatments as $treatments): ?>
            <tr>
                <td><?= h($treatments->id) ?></td>
                <td><?= h($treatments->visit_meeting_id) ?></td>
                <td><?= h($treatments->description) ?></td>
                <td><?= h($treatments->created) ?></td>
                <td><?= h($treatments->modified) ?></td>
                <td><?= h($treatments->exp) ?></td>
                <td><?= h($treatments->treatment_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Treatments', 'action' => 'view', $treatments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Treatments', 'action' => 'edit', $treatments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Treatments', 'action' => 'delete', $treatments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
