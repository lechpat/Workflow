<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Variable Handler'), ['action' => 'edit', $variableHandler->workflow_id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Variable Handler'), ['action' => 'delete', $variableHandler->workflow_id], ['confirm' => __('Are you sure you want to delete # {0}?', $variableHandler->workflow_id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Variable Handlers'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Variable Handler'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="variableHandlers view col-lg-10 col-md-9">
    <h2><?= h($variableHandler->variable) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Workflow') ?></h6>
            <p><?= $variableHandler->has('workflow') ? $this->Html->link($variableHandler->workflow->workflow_name, ['controller' => 'Workflows', 'action' => 'view', $variableHandler->workflow->workflow_id]) : '' ?></p>
            <h6 class="subheader"><?= __('Variable') ?></h6>
            <p><?= h($variableHandler->variable) ?></p>
            <h6 class="subheader"><?= __('Class') ?></h6>
            <p><?= h($variableHandler->class) ?></p>
        </div>
    </div>
</div>
