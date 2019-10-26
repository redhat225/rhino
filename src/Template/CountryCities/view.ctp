<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country City'), ['action' => 'edit', $countryCity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country City'), ['action' => 'delete', $countryCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryCity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Country Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countryCities view large-9 medium-8 columns content">
    <h3><?= h($countryCity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label City') ?></th>
            <td><?= h($countryCity->label_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $countryCity->has('country') ? $this->Html->link($countryCity->country->id, ['controller' => 'Countries', 'action' => 'view', $countryCity->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($countryCity->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Country Townships') ?></h4>
        <?php if (!empty($countryCity->country_townships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Country City Id') ?></th>
                <th scope="col"><?= __('Label Township') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($countryCity->country_townships as $countryTownships): ?>
            <tr>
                <td><?= h($countryTownships->id) ?></td>
                <td><?= h($countryTownships->country_city_id) ?></td>
                <td><?= h($countryTownships->label_township) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CountryTownships', 'action' => 'view', $countryTownships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CountryTownships', 'action' => 'edit', $countryTownships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CountryTownships', 'action' => 'delete', $countryTownships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryTownships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
