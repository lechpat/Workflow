<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('List Actions'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Rules'), ['controller' => 'Rules', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Rule'), ['controller' => 'Rules', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actions form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($action); ?>
    <fieldset>
        <legend><?= __('Add Action') ?></legend>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('rules._ids', ['options' => $rules]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
