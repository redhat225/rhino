<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentTypes index large-9 medium-8 columns content">
    <h3><?= __('Patient Antecedent Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_antecedent_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientAntecedentTypes as $patientAntecedentType): ?>
            <tr>
                <td><?= $this->Number->format($patientAntecedentType->id) ?></td>
                <td><?= h($patientAntecedentType->label_antecedent_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientAntecedentType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientAntecedentType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientAntecedentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentType->id)]) ?>
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
