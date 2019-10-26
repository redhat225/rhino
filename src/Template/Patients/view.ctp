<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Books'), ['controller' => 'PatientBooks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Book'), ['controller' => 'PatientBooks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patients view large-9 medium-8 columns content">
    <h3><?= h($patient->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($patient->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $patient->has('person') ? $this->Html->link($patient->person->id, ['controller' => 'People', 'action' => 'view', $patient->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($patient->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($patient->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Avatar Patient') ?></th>
            <td><?= h($patient->avatar_patient) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($patient->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($patient->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($patient->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($patient->password)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Diary Tokens') ?></h4>
        <?php if (!empty($patient->diary_tokens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Diary Token') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->diary_tokens as $diaryTokens): ?>
            <tr>
                <td><?= h($diaryTokens->id) ?></td>
                <td><?= h($diaryTokens->patient_id) ?></td>
                <td><?= h($diaryTokens->doctor_id) ?></td>
                <td><?= h($diaryTokens->diary_token) ?></td>
                <td><?= h($diaryTokens->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DiaryTokens', 'action' => 'view', $diaryTokens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DiaryTokens', 'action' => 'edit', $diaryTokens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DiaryTokens', 'action' => 'delete', $diaryTokens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryTokens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Patient Antecedents') ?></h4>
        <?php if (!empty($patient->patient_antecedents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Patient Antecedent Type Id') ?></th>
                <th><?= __('Description Antecedent') ?></th>
                <th><?= __('Begin') ?></th>
                <th><?= __('End') ?></th>
                <th><?= __('Treatment Antecedent') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->patient_antecedents as $patientAntecedents): ?>
            <tr>
                <td><?= h($patientAntecedents->id) ?></td>
                <td><?= h($patientAntecedents->patient_id) ?></td>
                <td><?= h($patientAntecedents->patient_antecedent_type_id) ?></td>
                <td><?= h($patientAntecedents->description_antecedent) ?></td>
                <td><?= h($patientAntecedents->begin) ?></td>
                <td><?= h($patientAntecedents->end) ?></td>
                <td><?= h($patientAntecedents->treatment_antecedent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientAntecedents', 'action' => 'view', $patientAntecedents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientAntecedents', 'action' => 'edit', $patientAntecedents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientAntecedents', 'action' => 'delete', $patientAntecedents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Patient Books') ?></h4>
        <?php if (!empty($patient->patient_books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Book Path') ?></th>
                <th><?= __('Changed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->patient_books as $patientBooks): ?>
            <tr>
                <td><?= h($patientBooks->id) ?></td>
                <td><?= h($patientBooks->patient_id) ?></td>
                <td><?= h($patientBooks->book_path) ?></td>
                <td><?= h($patientBooks->changed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientBooks', 'action' => 'view', $patientBooks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientBooks', 'action' => 'edit', $patientBooks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientBooks', 'action' => 'delete', $patientBooks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBooks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Patient Company Details') ?></h4>
        <?php if (!empty($patient->patient_company_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Patient Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->patient_company_details as $patientCompanyDetails): ?>
            <tr>
                <td><?= h($patientCompanyDetails->id) ?></td>
                <td><?= h($patientCompanyDetails->patient_id) ?></td>
                <td><?= h($patientCompanyDetails->patient_company_id) ?></td>
                <td><?= h($patientCompanyDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientCompanyDetails', 'action' => 'view', $patientCompanyDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientCompanyDetails', 'action' => 'edit', $patientCompanyDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientCompanyDetails', 'action' => 'delete', $patientCompanyDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompanyDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Meetings') ?></h4>
        <?php if (!empty($patient->visit_meetings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Visit Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Diary') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Next Meeting') ?></th>
                <th><?= __('Done') ?></th>
                <th><?= __('Visit Meeting Speciality Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->visit_meetings as $visitMeetings): ?>
            <tr>
                <td><?= h($visitMeetings->id) ?></td>
                <td><?= h($visitMeetings->code) ?></td>
                <td><?= h($visitMeetings->visit_id) ?></td>
                <td><?= h($visitMeetings->doctor_id) ?></td>
                <td><?= h($visitMeetings->created) ?></td>
                <td><?= h($visitMeetings->modified) ?></td>
                <td><?= h($visitMeetings->diary) ?></td>
                <td><?= h($visitMeetings->patient_id) ?></td>
                <td><?= h($visitMeetings->next_meeting) ?></td>
                <td><?= h($visitMeetings->done) ?></td>
                <td><?= h($visitMeetings->visit_meeting_speciality_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitMeetings', 'action' => 'view', $visitMeetings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitMeetings', 'action' => 'edit', $visitMeetings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitMeetings', 'action' => 'delete', $visitMeetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeetings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visits') ?></h4>
        <?php if (!empty($patient->visits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Institution Id') ?></th>
                <th><?= __('Visit Kind Transport Id') ?></th>
                <th><?= __('Visit Level Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->visits as $visits): ?>
            <tr>
                <td><?= h($visits->id) ?></td>
                <td><?= h($visits->created) ?></td>
                <td><?= h($visits->institution_id) ?></td>
                <td><?= h($visits->visit_kind_transport_id) ?></td>
                <td><?= h($visits->visit_level_id) ?></td>
                <td><?= h($visits->doctor_id) ?></td>
                <td><?= h($visits->patient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visits', 'action' => 'view', $visits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visits', 'action' => 'edit', $visits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visits', 'action' => 'delete', $visits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
