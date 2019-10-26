<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Act'), ['action' => 'edit', $visitAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Act'), ['action' => 'delete', $visitAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Auxiliary Details'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Auxiliary Detail'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Doctor Details'), ['controller' => 'VisitActDoctorDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Doctor Detail'), ['controller' => 'VisitActDoctorDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitActs view large-9 medium-8 columns content">
    <h3><?= h($visitAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($visitAct->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Act Sub Category') ?></th>
            <td><?= $visitAct->has('visit_act_sub_category') ? $this->Html->link($visitAct->visit_act_sub_category->id, ['controller' => 'VisitActSubCategories', 'action' => 'view', $visitAct->visit_act_sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Act Auxiliary Details') ?></h4>
        <?php if (!empty($visitAct->visit_act_auxiliary_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Visit Intervention Auxiliary Id') ?></th>
                <th scope="col"><?= __('Visit Act Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitAct->visit_act_auxiliary_details as $visitActAuxiliaryDetails): ?>
            <tr>
                <td><?= h($visitActAuxiliaryDetails->id) ?></td>
                <td><?= h($visitActAuxiliaryDetails->created) ?></td>
                <td><?= h($visitActAuxiliaryDetails->modified) ?></td>
                <td><?= h($visitActAuxiliaryDetails->visit_intervention_auxiliary_id) ?></td>
                <td><?= h($visitActAuxiliaryDetails->visit_act_id) ?></td>
                <td><?= h($visitActAuxiliaryDetails->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'view', $visitActAuxiliaryDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'edit', $visitActAuxiliaryDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'delete', $visitActAuxiliaryDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActAuxiliaryDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Act Doctor Details') ?></h4>
        <?php if (!empty($visitAct->visit_act_doctor_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Act Id') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitAct->visit_act_doctor_details as $visitActDoctorDetails): ?>
            <tr>
                <td><?= h($visitActDoctorDetails->id) ?></td>
                <td><?= h($visitActDoctorDetails->visit_act_id) ?></td>
                <td><?= h($visitActDoctorDetails->visit_intervention_doctor_id) ?></td>
                <td><?= h($visitActDoctorDetails->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActDoctorDetails', 'action' => 'view', $visitActDoctorDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActDoctorDetails', 'action' => 'edit', $visitActDoctorDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActDoctorDetails', 'action' => 'delete', $visitActDoctorDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActDoctorDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
