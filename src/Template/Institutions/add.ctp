<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Institution Types'), ['controller' => 'InstitutionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Type'), ['controller' => 'InstitutionTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institution Areas'), ['controller' => 'InstitutionAreas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Area'), ['controller' => 'InstitutionAreas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Institutions'), ['controller' => 'ExaminerInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Institution'), ['controller' => 'ExaminerInstitutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institution Adresses'), ['controller' => 'InstitutionAdresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution Adress'), ['controller' => 'InstitutionAdresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutions form large-9 medium-8 columns content">
    <?= $this->Form->create($institution) ?>
    <fieldset>
        <legend><?= __('Add Institution') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('custom_localization');
            echo $this->Form->input('additional_info');
            echo $this->Form->input('slug');
            echo $this->Form->input('institution_type_id', ['options' => $institutionTypes]);
            echo $this->Form->input('institution_area_id', ['options' => $institutionAreas]);
            echo $this->Form->input('logo_institution');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
