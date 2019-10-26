<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit'), ['action' => 'edit', $visit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit'), ['action' => 'delete', $visit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['controller' => 'VisitKindTransports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['controller' => 'VisitKindTransports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['controller' => 'VisitLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Level'), ['controller' => 'VisitLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Specialities'), ['controller' => 'VisitSpecialities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Speciality'), ['controller' => 'VisitSpecialities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['controller' => 'VisitActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act'), ['controller' => 'VisitActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visits view large-9 medium-8 columns content">
    <h3><?= h($visit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit Motif') ?></th>
            <td><?= h($visit->visit_motif) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Visit') ?></th>
            <td><?= h($visit->code_visit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $visit->has('patient') ? $this->Html->link($visit->patient->id, ['controller' => 'Patients', 'action' => 'view', $visit->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visit->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($visit->deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Invoices') ?></h4>
        <?php if (!empty($visit->visit_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Label Invoice') ?></th>
                <th scope="col"><?= __('Code Invoice') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Sold Date') ?></th>
                <th scope="col"><?= __('Path Invoice') ?></th>
                <th scope="col"><?= __('Visit Invoice Type Id') ?></th>
                <th scope="col"><?= __('Visit Invoice Payment Way Id') ?></th>
                <th scope="col"><?= __('Manager Operator Id') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visit->visit_invoices as $visitInvoices): ?>
            <tr>
                <td><?= h($visitInvoices->id) ?></td>
                <td><?= h($visitInvoices->visit_id) ?></td>
                <td><?= h($visitInvoices->label_invoice) ?></td>
                <td><?= h($visitInvoices->code_invoice) ?></td>
                <td><?= h($visitInvoices->amount) ?></td>
                <td><?= h($visitInvoices->created) ?></td>
                <td><?= h($visitInvoices->modified) ?></td>
                <td><?= h($visitInvoices->deleted) ?></td>
                <td><?= h($visitInvoices->sold_date) ?></td>
                <td><?= h($visitInvoices->path_invoice) ?></td>
                <td><?= h($visitInvoices->visit_invoice_type_id) ?></td>
                <td><?= h($visitInvoices->visit_invoice_payment_way_id) ?></td>
                <td><?= h($visitInvoices->manager_operator_id) ?></td>
                <td><?= h($visitInvoices->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInvoices', 'action' => 'edit', $visitInvoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInvoices', 'action' => 'delete', $visitInvoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Acts') ?></h4>
        <?php if (!empty($visit->visit_acts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Visit Act Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visit->visit_acts as $visitActs): ?>
            <tr>
                <td><?= h($visitActs->id) ?></td>
                <td><?= h($visitActs->label) ?></td>
                <td><?= h($visitActs->visit_act_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActs', 'action' => 'view', $visitActs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActs', 'action' => 'edit', $visitActs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActs', 'action' => 'delete', $visitActs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
