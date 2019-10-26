<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doctor Speciality Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialityTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorSpecialityType) ?>
    <fieldset>
        <legend><?= __('Add Doctor Speciality Type') ?></legend>
        <?php
            echo $this->Form->input('label_speciality_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
