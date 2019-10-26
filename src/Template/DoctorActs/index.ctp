<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Act Details'), ['controller' => 'DoctorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Act Detail'), ['controller' => 'DoctorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorActs index large-9 medium-8 columns content">
    <h3><?= __('Doctor Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label_doctor_act') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorActs as $doctorAct): ?>
            <tr>
                <td><?= $this->Number->format($doctorAct->id) ?></td>
                <td><?= h($doctorAct->label_doctor_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorAct->id)]) ?>
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
