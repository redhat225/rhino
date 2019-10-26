<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitSpeciality->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitSpeciality->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Specialities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitSpecialities form large-9 medium-8 columns content">
    <?= $this->Form->create($visitSpeciality) ?>
    <fieldset>
        <legend><?= __('Edit Visit Speciality') ?></legend>
        <?php
            echo $this->Form->input('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
