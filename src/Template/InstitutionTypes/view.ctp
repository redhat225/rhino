<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution Type'), ['action' => 'edit', $institutionType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution Type'), ['action' => 'delete', $institutionType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institution Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutionTypes view large-9 medium-8 columns content">
    <h3><?= h($institutionType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Institution Type') ?></th>
            <td><?= h($institutionType->label_institution_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutionType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Institutions') ?></h4>
        <?php if (!empty($institutionType->institutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Institution Quarter') ?></th>
                <th scope="col"><?= __('Institution Quarter Extra') ?></th>
                <th scope="col"><?= __('Additional Info') ?></th>
                <th scope="col"><?= __('Institution Greeting') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Institution Type Id') ?></th>
                <th scope="col"><?= __('Country Township Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Logo Institution') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institutionType->institutions as $institutions): ?>
            <tr>
                <td><?= h($institutions->id) ?></td>
                <td><?= h($institutions->fullname) ?></td>
                <td><?= h($institutions->institution_quarter) ?></td>
                <td><?= h($institutions->institution_quarter_extra) ?></td>
                <td><?= h($institutions->additional_info) ?></td>
                <td><?= h($institutions->institution_greeting) ?></td>
                <td><?= h($institutions->slug) ?></td>
                <td><?= h($institutions->institution_type_id) ?></td>
                <td><?= h($institutions->country_township_id) ?></td>
                <td><?= h($institutions->created) ?></td>
                <td><?= h($institutions->logo_institution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Institutions', 'action' => 'view', $institutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Institutions', 'action' => 'edit', $institutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Institutions', 'action' => 'delete', $institutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
