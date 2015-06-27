<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Node'), ['action' => 'edit', $node->node_id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Node'), ['action' => 'delete', $node->node_id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->node_id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Out Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Out Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="nodes view col-lg-10 col-md-9">
    <h2><?= h($node->node_id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Workflow') ?></h6>
            <p><?= $node->has('workflow') ? $this->Html->link($node->workflow->workflow_name, ['controller' => 'Workflows', 'action' => 'view', $node->workflow->workflow_id]) : '' ?></p>
            <h6 class="subheader"><?= __('Node Class') ?></h6>
            <p><?= h($node->node_class) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Node Id') ?></h6>
            <p><?= $this->Number->format($node->node_id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Nodes') ?></h4>
    <?php if (!empty($node->out_nodes)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Workflow Id') ?></th>
            <th><?= __('Node Id') ?></th>
            <th><?= __('Node Class') ?></th>
            <th><?= __('Node Configuration') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($node->out_nodes as $outNodes): ?>
        <tr>
            <td><?= h($outNodes->workflow_id) ?></td>
            <td><?= h($outNodes->node_id) ?></td>
            <td><?= h($outNodes->node_class) ?></td>
            <td><?= h($outNodes->node_configuration) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'Nodes', 'action' => 'view', $outNodes->node_id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Nodes', 'action' => 'view', $outNodes->node_id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'Nodes', 'action' => 'delete', $outNodes->node_id], ['confirm' => __('Are you sure you want to delete # {0}?', $outNodes->node_id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
