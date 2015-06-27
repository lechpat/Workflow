<div class="rules index col-md-12 panel panel-default">
    <div class="table-responsive">
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('module_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('is_active') ?></th>
            <th><?= $this->Paginator->sort('trigger_type_id') ?></th>
            <th><?= $this->Paginator->sort('record_action_id') ?></th>
            <th><?= $this->Paginator->sort('module_field_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rules as $rule): ?>
        <tr>
            <td><?= $this->Number->format($rule->id) ?></td>
            <td>
                <?= $rule->has('module') ? $this->Html->link($rule->module->name, ['controller' => 'Modules', 'action' => 'view', $rule->module->id]) : '' ?>
            </td>
            <td><?= h($rule->name) ?></td>
            <td><?= h($rule->is_active) ?></td>
            <td>
                <?= $rule->has('trigger_type') ? $this->Html->link($rule->trigger_type->name, ['controller' => 'TriggerTypes', 'action' => 'view', $rule->trigger_type->id]) : '' ?>
            </td>
            <td>
                <?= $rule->has('record_action') ? $this->Html->link($rule->record_action->name, ['controller' => 'RecordActions', 'action' => 'view', $rule->record_action->id]) : '' ?>
            </td>
            <td>
                <?= $rule->has('module_field') ? $this->Html->link($rule->module_field->name, ['controller' => 'ModuleFields', 'action' => 'view', $rule->module_field->id]) : '' ?>
            </td>
            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['action' => 'view', $rule->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $rule->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $rule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    <div class="paginator clearfix">
        <ul class="pagination pagination-sm pull-right">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p class="text-muted" style="position:absolute;bottom:0;"><small><?= $this->Paginator->counter() ?></small></p>
    </div>
</div>
