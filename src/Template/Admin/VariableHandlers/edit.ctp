<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $variableHandler->workflow_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $variableHandler->workflow_id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Variable Handlers'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="variableHandlers form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($variableHandler); ?>
    <fieldset>
        <legend><?= __('Edit Variable Handler') ?></legend>
            <?= $this->Form->input('variable') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
