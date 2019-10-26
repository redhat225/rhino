<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Book'), ['action' => 'edit', $patientBook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Book'), ['action' => 'delete', $patientBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Book'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientBooks view large-9 medium-8 columns content">
    <h3><?= h($patientBook->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Patient') ?></th>
            <td><?= $patientBook->has('patient') ? $this->Html->link($patientBook->patient->id, ['controller' => 'Patients', 'action' => 'view', $patientBook->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientBook->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Changed') ?></th>
            <td><?= $this->Number->format($patientBook->changed) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Book Path') ?></h4>
        <?= $this->Text->autoParagraph(h($patientBook->book_path)); ?>
    </div>
</div>
