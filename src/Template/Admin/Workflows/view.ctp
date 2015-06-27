<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Workflow'), ['action' => 'edit', $workflow->workflow_id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Workflow'), ['action' => 'delete', $workflow->workflow_id], ['confirm' => __('Are you sure you want to delete # {0}?', $workflow->workflow_id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Variable Handlers'), ['controller' => 'VariableHandlers', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Variable Handler'), ['controller' => 'VariableHandlers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="workflows view col-lg-10 col-md-9">
    <h2><?= h($workflow->workflow_name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Workflow Name') ?></h6>
            <p><?= h($workflow->workflow_name) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Workflow Id') ?></h6>
            <p><?= $this->Number->format($workflow->workflow_id) ?></p>
            <h6 class="subheader"><?= __('Workflow Version') ?></h6>
            <p><?= $this->Number->format($workflow->workflow_version) ?></p>
            <h6 class="subheader"><?= __('Workflow Created') ?></h6>
            <p><?= $this->Number->format($workflow->workflow_created) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Nodes') ?></h4>
    <?php if (!empty($workflow->nodes)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Workflow Id') ?></th>
            <th><?= __('Node Id') ?></th>
            <th><?= __('Node Class') ?></th>
            <th><?= __('Node Configuration') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($workflow->nodes as $nodes): ?>
        <tr>
            <td><?= h($nodes->workflow_id) ?></td>
            <td><?= h($nodes->node_id) ?></td>
            <td><?= h($nodes->node_class) ?></td>
            <td><?= h($nodes->node_configuration) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'Nodes', 'action' => 'view', $nodes->node_id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Nodes', 'action' => 'view', $nodes->node_id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'Nodes', 'action' => 'delete', $nodes->node_id], ['confirm' => __('Are you sure you want to delete # {0}?', $nodes->node_id),'title'=> __('Delete'), 'escape' => false]) ?>
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
    <h4 class="subheader"><?= __('Related VariableHandlers') ?></h4>
    <?php if (!empty($workflow->variable_handlers)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Workflow Id') ?></th>
            <th><?= __('Variable') ?></th>
            <th><?= __('Class') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($workflow->variable_handlers as $variableHandlers): ?>
        <tr>
            <td><?= h($variableHandlers->workflow_id) ?></td>
            <td><?= h($variableHandlers->variable) ?></td>
            <td><?= h($variableHandlers->class) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'VariableHandlers', 'action' => 'view', $variableHandlers->workflow_id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'VariableHandlers', 'action' => 'view', $variableHandlers->workflow_id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'VariableHandlers', 'action' => 'delete', $variableHandlers->workflow_id], ['confirm' => __('Are you sure you want to delete # {0}?', $variableHandlers->workflow_id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
