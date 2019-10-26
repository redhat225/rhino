<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Patient Insurer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['controller' => 'PatientInsurances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['controller' => 'PatientInsurances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientInsurers index large-9 medium-8 columns content">
    <h3><?= __('Patient Insurers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo_insurance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patientInsurers as $patientInsurer): ?>
            <tr>
                <td><?= $this->Number->format($patientInsurer->id) ?></td>
                <td><?= h($patientInsurer->created) ?></td>
                <td><?= h($patientInsurer->label) ?></td>
                <td><?= h($patientInsurer->logo_insurance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patientInsurer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patientInsurer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patientInsurer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurer->id)]) ?>
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
