<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workflow->workflow_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workflow->workflow_id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Variable Handlers'), ['controller' => 'VariableHandlers', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Variable Handler'), ['controller' => 'VariableHandlers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="workflows form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($workflow); ?>
    <fieldset>
        <legend><?= __('Edit Workflow') ?></legend>
            <?= $this->Form->input('workflow_name') ?>
            <?= $this->Form->input('workflow_version') ?>
            <?= $this->Form->input('workflow_created') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
