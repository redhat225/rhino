<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialityTypes index large-9 medium-8 columns content">
    <h3><?= __('Doctor Speciality Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_speciality_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorSpecialityTypes as $doctorSpecialityType): ?>
            <tr>
                <td><?= $this->Number->format($doctorSpecialityType->id) ?></td>
                <td><?= h($doctorSpecialityType->label_speciality_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorSpecialityType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorSpecialityType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorSpecialityType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityType->id)]) ?>
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
