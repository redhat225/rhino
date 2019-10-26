<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Work'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientWorks index large-9 medium-8 columns content">
    <h3><?= __('Patient Works') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_company') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientWorks as $patientWork): ?>
            <tr>
                <td><?= $this->Number->format($patientWork->id) ?></td>
                <td><?= $patientWork->has('patient') ? $this->Html->link($patientWork->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientWork->patient->id]) : '' ?></td>
                <td><?= h($patientWork->created) ?></td>
                <td><?= h($patientWork->modified) ?></td>
                <td><?= h($patientWork->work_label) ?></td>
                <td><?= h($patientWork->work_company) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientWork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientWork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientWork->id)]) ?>
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
