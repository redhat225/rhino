<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Speciality Type'), ['action' => 'edit', $doctorSpecialityType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Speciality Type'), ['action' => 'delete', $doctorSpecialityType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Speciality Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorSpecialityTypes view large-9 medium-8 columns content">
    <h3><?= h($doctorSpecialityType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Speciality Type') ?></th>
            <td><?= h($doctorSpecialityType->label_speciality_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorSpecialityType->id) ?></td>
        </tr>
    </table>
</div>
