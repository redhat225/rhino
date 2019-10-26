<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country Township'), ['action' => 'edit', $countryTownship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country Township'), ['action' => 'delete', $countryTownship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryTownship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Country Townships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country Township'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country Cities'), ['controller' => 'CountryCities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country City'), ['controller' => 'CountryCities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People Adresses'), ['controller' => 'PeopleAdresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New People Adress'), ['controller' => 'PeopleAdresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countryTownships view large-9 medium-8 columns content">
    <h3><?= h($countryTownship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Country City') ?></th>
            <td><?= $countryTownship->has('country_city') ? $this->Html->link($countryTownship->country_city->id, ['controller' => 'CountryCities', 'action' => 'view', $countryTownship->country_city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label Township') ?></th>
            <td><?= h($countryTownship->label_township) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($countryTownship->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Institutions') ?></h4>
        <?php if (!empty($countryTownship->institutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Institution Quarter') ?></th>
                <th scope="col"><?= __('Institution Quarter Extra') ?></th>
                <th scope="col"><?= __('Additional Info') ?></th>
                <th scope="col"><?= __('Institution Greeting') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Institution Type Id') ?></th>
                <th scope="col"><?= __('Country Township Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Logo Institution') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($countryTownship->institutions as $institutions): ?>
            <tr>
                <td><?= h($institutions->id) ?></td>
                <td><?= h($institutions->fullname) ?></td>
                <td><?= h($institutions->institution_quarter) ?></td>
                <td><?= h($institutions->institution_quarter_extra) ?></td>
                <td><?= h($institutions->additional_info) ?></td>
                <td><?= h($institutions->institution_greeting) ?></td>
                <td><?= h($institutions->slug) ?></td>
                <td><?= h($institutions->institution_type_id) ?></td>
                <td><?= h($institutions->country_township_id) ?></td>
                <td><?= h($institutions->created) ?></td>
                <td><?= h($institutions->logo_institution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Institutions', 'action' => 'view', $institutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Institutions', 'action' => 'edit', $institutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Institutions', 'action' => 'delete', $institutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related People Adresses') ?></h4>
        <?php if (!empty($countryTownship->people_adresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('People Id') ?></th>
                <th scope="col"><?= __('City Quarter') ?></th>
                <th scope="col"><?= __('Country Township Id') ?></th>
                <th scope="col"><?= __('Postal Adress') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($countryTownship->people_adresses as $peopleAdresses): ?>
            <tr>
                <td><?= h($peopleAdresses->id) ?></td>
                <td><?= h($peopleAdresses->people_id) ?></td>
                <td><?= h($peopleAdresses->city_quarter) ?></td>
                <td><?= h($peopleAdresses->country_township_id) ?></td>
                <td><?= h($peopleAdresses->postal_adress) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PeopleAdresses', 'action' => 'view', $peopleAdresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PeopleAdresses', 'action' => 'edit', $peopleAdresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PeopleAdresses', 'action' => 'delete', $peopleAdresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAdresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Holders') ?></h4>
        <?php if (!empty($countryTownship->requirement_holders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Holder Name') ?></th>
                <th scope="col"><?= __('Holder Adress') ?></th>
                <th scope="col"><?= __('Holder Contact') ?></th>
                <th scope="col"><?= __('Country Township Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($countryTownship->requirement_holders as $requirementHolders): ?>
            <tr>
                <td><?= h($requirementHolders->id) ?></td>
                <td><?= h($requirementHolders->holder_name) ?></td>
                <td><?= h($requirementHolders->holder_adress) ?></td>
                <td><?= h($requirementHolders->holder_contact) ?></td>
                <td><?= h($requirementHolders->country_township_id) ?></td>
                <td><?= h($requirementHolders->created) ?></td>
                <td><?= h($requirementHolders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementHolders', 'action' => 'view', $requirementHolders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementHolders', 'action' => 'edit', $requirementHolders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementHolders', 'action' => 'delete', $requirementHolders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
