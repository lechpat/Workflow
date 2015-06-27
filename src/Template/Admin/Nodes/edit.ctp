<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $node->node_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $node->node_id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Out Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Out Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="nodes form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($node); ?>
    <fieldset>
        <legend><?= __('Edit Node') ?></legend>
            <?= $this->Form->input('workflow_id', ['options' => $workflows]) ?>
            <?= $this->Form->input('node_class') ?>
            <?= $this->Form->input('out_nodes._ids', ['options' => $outNodes]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
