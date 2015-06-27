<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Action'), ['action' => 'edit', $action->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Action'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Actions'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Action'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Rules'), ['controller' => 'Rules', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Rule'), ['controller' => 'Rules', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actions view col-lg-10 col-md-9">
    <h2><?= h($action->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($action->name) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($action->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Rules') ?></h4>
    <?php if (!empty($action->rules)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Module Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Is Active') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Trigger Type Id') ?></th>
            <th><?= __('Record Action Id') ?></th>
            <th><?= __('Module Field Id') ?></th>
            <th><?= __('Execution Days') ?></th>
            <th><?= __('Is Before Date') ?></th>
            <th><?= __('Execution Hour') ?></th>
            <th><?= __('Execution Min') ?></th>
            <th><?= __('Execution Cycle') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($action->rules as $rules): ?>
        <tr>
            <td><?= h($rules->id) ?></td>
            <td><?= h($rules->module_id) ?></td>
            <td><?= h($rules->name) ?></td>
            <td><?= h($rules->is_active) ?></td>
            <td><?= h($rules->description) ?></td>
            <td><?= h($rules->trigger_type_id) ?></td>
            <td><?= h($rules->record_action_id) ?></td>
            <td><?= h($rules->module_field_id) ?></td>
            <td><?= h($rules->execution_days) ?></td>
            <td><?= h($rules->is_before_date) ?></td>
            <td><?= h($rules->execution_hour) ?></td>
            <td><?= h($rules->execution_min) ?></td>
            <td><?= h($rules->execution_cycle) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'Rules', 'action' => 'view', $rules->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Rules', 'action' => 'view', $rules->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'Rules', 'action' => 'delete', $rules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rules->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
