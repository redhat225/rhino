<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institution Types'), ['controller' => 'InstitutionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Type'), ['controller' => 'InstitutionTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institution Areas'), ['controller' => 'InstitutionAreas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Area'), ['controller' => 'InstitutionAreas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Institutions'), ['controller' => 'ExaminerInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Institution'), ['controller' => 'ExaminerInstitutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institution Adresses'), ['controller' => 'InstitutionAdresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Adress'), ['controller' => 'InstitutionAdresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutions index large-9 medium-8 columns content">
    <h3><?= __('Institutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_area_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo_institution') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutions as $institution): ?>
            <tr>
                <td><?= $this->Number->format($institution->id) ?></td>
                <td><?= h($institution->fullname) ?></td>
                <td><?= h($institution->slug) ?></td>
                <td><?= $institution->has('institution_type') ? $this->Html->link($institution->institution_type->id, ['controller' => 'InstitutionTypes', 'action' => 'view', $institution->institution_type->id]) : '' ?></td>
                <td><?= $institution->has('institution_area') ? $this->Html->link($institution->institution_area->id, ['controller' => 'InstitutionAreas', 'action' => 'view', $institution->institution_area->id]) : '' ?></td>
                <td><?= h($institution->created) ?></td>
                <td><?= h($institution->logo_institution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id)]) ?>
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
