<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Rule'), ['action' => 'edit', $rule->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Rule'), ['action' => 'delete', $rule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Rules'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Rule'), ['action' => 'add']) ?> </li>
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
<div class="rules view col-lg-10 col-md-9">
    <h2><?= h($rule->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Module') ?></h6>
            <p><?= $rule->has('module') ? $this->Html->link($rule->module->name, ['controller' => 'Modules', 'action' => 'view', $rule->module->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($rule->name) ?></p>
            <h6 class="subheader"><?= __('Trigger Type') ?></h6>
            <p><?= $rule->has('trigger_type') ? $this->Html->link($rule->trigger_type->name, ['controller' => 'TriggerTypes', 'action' => 'view', $rule->trigger_type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Record Action') ?></h6>
            <p><?= $rule->has('record_action') ? $this->Html->link($rule->record_action->name, ['controller' => 'RecordActions', 'action' => 'view', $rule->record_action->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Module Field') ?></h6>
            <p><?= $rule->has('module_field') ? $this->Html->link($rule->module_field->name, ['controller' => 'ModuleFields', 'action' => 'view', $rule->module_field->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Is Before Date') ?></h6>
            <p><?= h($rule->is_before_date) ?></p>
            <h6 class="subheader"><?= __('Execution Cycle') ?></h6>
            <p><?= h($rule->execution_cycle) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($rule->id) ?></p>
            <h6 class="subheader"><?= __('Execution Days') ?></h6>
            <p><?= $this->Number->format($rule->execution_days) ?></p>
            <h6 class="subheader"><?= __('Execution Hour') ?></h6>
            <p><?= $this->Number->format($rule->execution_hour) ?></p>
            <h6 class="subheader"><?= __('Execution Min') ?></h6>
            <p><?= $this->Number->format($rule->execution_min) ?></p>
        </div>
        <div class="col-lg-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Active') ?></h6>
            <p><?= $rule->is_active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($rule->description)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related RuleConditions') ?></h4>
    <?php if (!empty($rule->rule_conditions)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Rule Id') ?></th>
            <th><?= __('Module Field Id') ?></th>
            <th><?= __('Operator') ?></th>
            <th><?= __('Value') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($rule->rule_conditions as $ruleConditions): ?>
        <tr>
            <td><?= h($ruleConditions->id) ?></td>
            <td><?= h($ruleConditions->rule_id) ?></td>
            <td><?= h($ruleConditions->module_field_id) ?></td>
            <td><?= h($ruleConditions->operator) ?></td>
            <td><?= h($ruleConditions->value) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'RuleConditions', 'action' => 'view', $ruleConditions->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'RuleConditions', 'action' => 'view', $ruleConditions->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'RuleConditions', 'action' => 'delete', $ruleConditions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ruleConditions->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Actions') ?></h4>
    <?php if (!empty($rule->actions)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($rule->actions as $actions): ?>
        <tr>
            <td><?= h($actions->id) ?></td>
            <td><?= h($actions->name) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'Actions', 'action' => 'view', $actions->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Actions', 'action' => 'view', $actions->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'Actions', 'action' => 'delete', $actions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actions->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
