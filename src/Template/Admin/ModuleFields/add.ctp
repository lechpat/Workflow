<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('List Module Fields'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="moduleFields form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($moduleField); ?>
    <fieldset>
        <legend><?= __('Add Module Field') ?></legend>
            <?= $this->Form->input('module_id', ['options' => $modules]) ?>
            <?= $this->Form->input('name') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
