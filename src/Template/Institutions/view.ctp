<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution'), ['action' => 'edit', $institution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution'), ['action' => 'delete', $institution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institution Types'), ['controller' => 'InstitutionTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Type'), ['controller' => 'InstitutionTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institution Areas'), ['controller' => 'InstitutionAreas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Area'), ['controller' => 'InstitutionAreas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Institutions'), ['controller' => 'ExaminerInstitutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Institution'), ['controller' => 'ExaminerInstitutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institution Adresses'), ['controller' => 'InstitutionAdresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Adress'), ['controller' => 'InstitutionAdresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutions view large-9 medium-8 columns content">
    <h3><?= h($institution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($institution->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($institution->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Type') ?></th>
            <td><?= $institution->has('institution_type') ? $this->Html->link($institution->institution_type->id, ['controller' => 'InstitutionTypes', 'action' => 'view', $institution->institution_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Area') ?></th>
            <td><?= $institution->has('institution_area') ? $this->Html->link($institution->institution_area->id, ['controller' => 'InstitutionAreas', 'action' => 'view', $institution->institution_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Institution') ?></th>
            <td><?= h($institution->logo_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institution->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($institution->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Custom Localization') ?></h4>
        <?= $this->Text->autoParagraph(h($institution->custom_localization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Info') ?></h4>
        <?= $this->Text->autoParagraph(h($institution->additional_info)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Examiner Institutions') ?></h4>
        <?php if (!empty($institution->examiner_institutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Path Logo') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institution->examiner_institutions as $examinerInstitutions): ?>
            <tr>
                <td><?= h($examinerInstitutions->id) ?></td>
                <td><?= h($examinerInstitutions->fullname) ?></td>
                <td><?= h($examinerInstitutions->path_logo) ?></td>
                <td><?= h($examinerInstitutions->institution_id) ?></td>
                <td><?= h($examinerInstitutions->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExaminerInstitutions', 'action' => 'view', $examinerInstitutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminerInstitutions', 'action' => 'edit', $examinerInstitutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminerInstitutions', 'action' => 'delete', $examinerInstitutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerInstitutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Institution Adresses') ?></h4>
        <?php if (!empty($institution->institution_adresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fax') ?></th>
                <th scope="col"><?= __('Contact1') ?></th>
                <th scope="col"><?= __('Contact2') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Website') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institution->institution_adresses as $institutionAdresses): ?>
            <tr>
                <td><?= h($institutionAdresses->id) ?></td>
                <td><?= h($institutionAdresses->fax) ?></td>
                <td><?= h($institutionAdresses->contact1) ?></td>
                <td><?= h($institutionAdresses->contact2) ?></td>
                <td><?= h($institutionAdresses->institution_id) ?></td>
                <td><?= h($institutionAdresses->email) ?></td>
                <td><?= h($institutionAdresses->website) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InstitutionAdresses', 'action' => 'view', $institutionAdresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InstitutionAdresses', 'action' => 'edit', $institutionAdresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InstitutionAdresses', 'action' => 'delete', $institutionAdresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionAdresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Manager Operators') ?></h4>
        <?php if (!empty($institution->manager_operators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('People Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Avatar Manager') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institution->manager_operators as $managerOperators): ?>
            <tr>
                <td><?= h($managerOperators->id) ?></td>
                <td><?= h($managerOperators->people_id) ?></td>
                <td><?= h($managerOperators->code) ?></td>
                <td><?= h($managerOperators->username) ?></td>
                <td><?= h($managerOperators->password) ?></td>
                <td><?= h($managerOperators->email) ?></td>
                <td><?= h($managerOperators->avatar_manager) ?></td>
                <td><?= h($managerOperators->institution_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ManagerOperators', 'action' => 'view', $managerOperators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ManagerOperators', 'action' => 'edit', $managerOperators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ManagerOperators', 'action' => 'delete', $managerOperators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Institutions') ?></h4>
        <?php if (!empty($institution->pharmacy_institutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institution->pharmacy_institutions as $pharmacyInstitutions): ?>
            <tr>
                <td><?= h($pharmacyInstitutions->id) ?></td>
                <td><?= h($pharmacyInstitutions->institution_id) ?></td>
                <td><?= h($pharmacyInstitutions->fullname) ?></td>
                <td><?= h($pharmacyInstitutions->created) ?></td>
                <td><?= h($pharmacyInstitutions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyInstitutions', 'action' => 'view', $pharmacyInstitutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyInstitutions', 'action' => 'edit', $pharmacyInstitutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyInstitutions', 'action' => 'delete', $pharmacyInstitutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInstitutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
