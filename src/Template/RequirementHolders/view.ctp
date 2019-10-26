<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Holder'), ['action' => 'edit', $requirementHolder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Holder'), ['action' => 'delete', $requirementHolder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementHolders view large-9 medium-8 columns content">
    <h3><?= h($requirementHolder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Holder Name') ?></th>
            <td><?= h($requirementHolder->holder_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Holder Adress') ?></th>
            <td><?= h($requirementHolder->holder_adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Holder Contact') ?></th>
            <td><?= h($requirementHolder->holder_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Township') ?></th>
            <td><?= $requirementHolder->has('country_township') ? $this->Html->link($requirementHolder->country_township->id, ['controller' => 'CountryTownships', 'action' => 'view', $requirementHolder->country_township->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementHolder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementHolder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementHolder->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Holder Details') ?></h4>
        <?php if (!empty($requirementHolder->requirement_holder_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Holder Id') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementHolder->requirement_holder_details as $requirementHolderDetails): ?>
            <tr>
                <td><?= h($requirementHolderDetails->id) ?></td>
                <td><?= h($requirementHolderDetails->requirement_holder_id) ?></td>
                <td><?= h($requirementHolderDetails->requirement_id) ?></td>
                <td><?= h($requirementHolderDetails->created) ?></td>
                <td><?= h($requirementHolderDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementHolderDetails', 'action' => 'view', $requirementHolderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementHolderDetails', 'action' => 'edit', $requirementHolderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementHolderDetails', 'action' => 'delete', $requirementHolderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
