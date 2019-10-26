<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientBooks index large-9 medium-8 columns content">
    <h3><?= __('Patient Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('patient_id') ?></th>
                <th><?= $this->Paginator->sort('changed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientBooks as $patientBook): ?>
            <tr>
                <td><?= $this->Number->format($patientBook->id) ?></td>
                <td><?= $patientBook->has('patient') ? $this->Html->link($patientBook->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientBook->patient->id]) : '' ?></td>
                <td><?= $this->Number->format($patientBook->changed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientBook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBook->id)]) ?>
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
