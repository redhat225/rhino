<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Act Details'), ['controller' => 'PatientActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Act Detail'), ['controller' => 'PatientActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientActs index large-9 medium-8 columns content">
    <h3><?= __('Patient Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_patient_act') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientActs as $patientAct): ?>
            <tr>
                <td><?= $this->Number->format($patientAct->id) ?></td>
                <td><?= h($patientAct->label_patient_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAct->id)]) ?>
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
