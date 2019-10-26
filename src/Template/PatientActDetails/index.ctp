<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Acts'), ['controller' => 'PatientActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Act'), ['controller' => 'PatientActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientActDetails index large-9 medium-8 columns content">
    <h3><?= __('Patient Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_act_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientActDetails as $patientActDetail): ?>
            <tr>
                <td><?= $this->Number->format($patientActDetail->id) ?></td>
                <td><?= $patientActDetail->has('patient') ? $this->Html->link($patientActDetail->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientActDetail->patient->id]) : '' ?></td>
                <td><?= $patientActDetail->has('patient_act') ? $this->Html->link($patientActDetail->patient_act->id, ['controller' => 'PatientActs', 'action' => 'view', $patientActDetail->patient_act->id]) : '' ?></td>
                <td><?= h($patientActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientActDetail->id)]) ?>
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
