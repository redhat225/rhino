<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Act'), ['action' => 'edit', $doctorAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Act'), ['action' => 'delete', $doctorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Act Details'), ['controller' => 'DoctorActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Act Detail'), ['controller' => 'DoctorActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorActs view large-9 medium-8 columns content">
    <h3><?= h($doctorAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label Doctor Act') ?></th>
            <td><?= h($doctorAct->label_doctor_act) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctor Act Details') ?></h4>
        <?php if (!empty($doctorAct->doctor_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Doctor Act Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctorAct->doctor_act_details as $doctorActDetails): ?>
            <tr>
                <td><?= h($doctorActDetails->id) ?></td>
                <td><?= h($doctorActDetails->doctor_id) ?></td>
                <td><?= h($doctorActDetails->doctor_act_id) ?></td>
                <td><?= h($doctorActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DoctorActDetails', 'action' => 'view', $doctorActDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DoctorActDetails', 'action' => 'edit', $doctorActDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DoctorActDetails', 'action' => 'delete', $doctorActDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorActDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
