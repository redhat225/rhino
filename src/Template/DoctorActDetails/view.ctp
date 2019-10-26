<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Act Detail'), ['action' => 'edit', $doctorActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Act Detail'), ['action' => 'delete', $doctorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Acts'), ['controller' => 'DoctorActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Act'), ['controller' => 'DoctorActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorActDetails view large-9 medium-8 columns content">
    <h3><?= h($doctorActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Doctor') ?></th>
            <td><?= $doctorActDetail->has('doctor') ? $this->Html->link($doctorActDetail->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorActDetail->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Doctor Act') ?></th>
            <td><?= $doctorActDetail->has('doctor_act') ? $this->Html->link($doctorActDetail->doctor_act->id, ['controller' => 'DoctorActs', 'action' => 'view', $doctorActDetail->doctor_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorActDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($doctorActDetail->created) ?></td>
        </tr>
    </table>
</div>
