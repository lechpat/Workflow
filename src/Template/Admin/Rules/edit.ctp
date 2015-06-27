<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Rules'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Trigger Types'), ['controller' => 'TriggerTypes', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Trigger Type'), ['controller' => 'TriggerTypes', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Record Actions'), ['controller' => 'RecordActions', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Record Action'), ['controller' => 'RecordActions', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Module Fields'), ['controller' => 'ModuleFields', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module Field'), ['controller' => 'ModuleFields', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Rule Conditions'), ['controller' => 'RuleConditions', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Rule Condition'), ['controller' => 'RuleConditions', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="rules form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($rule); ?>
    <fieldset>
        <legend><?= __('Edit Rule') ?></legend>
            <?= $this->Form->input('module_id', ['options' => $modules]) ?>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('is_active') ?>
            <?= $this->Form->input('description') ?>
            <?= $this->Form->input('trigger_type_id', ['options' => $triggerTypes]) ?>
            <?= $this->Form->input('record_action_id', ['options' => $recordActions]) ?>
            <?= $this->Form->input('module_field_id', ['options' => $moduleFields]) ?>
            <?= $this->Form->input('execution_days') ?>
            <?= $this->Form->input('is_before_date') ?>
            <?= $this->Form->input('execution_hour') ?>
            <?= $this->Form->input('execution_min') ?>
            <?= $this->Form->input('execution_cycle') ?>
            <?= $this->Form->input('actions._ids', ['options' => $actions]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
