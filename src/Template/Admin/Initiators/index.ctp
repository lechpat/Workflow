<div class="initiators index col-md-12 panel panel-default">
    <div class="table-responsive">
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('enabled') ?></th>
            <th><?= $this->Paginator->sort('event_name') ?></th>
            <th><?= $this->Paginator->sort('subject_alias') ?></th>
            <th><?= $this->Paginator->sort('workflow_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($initiators as $initiator): ?>
        <tr>
            <td><?= $this->Number->format($initiator->id) ?></td>
            <td><?= h($initiator->name) ?></td>
            <td><?= h($initiator->enabled) ?></td>
            <td><?= h($initiator->event_name) ?></td>
            <td><?= h($initiator->subject_alias) ?></td>
            <td>
                <?= $initiator->has('workflow') ? $this->Html->link($initiator->workflow->workflow_name, ['controller' => 'Workflows', 'action' => 'view', $initiator->workflow->workflow_id]) : '' ?>
            </td>
            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['action' => 'view', $initiator->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $initiator->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $initiator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initiator->id),'title'=> __('Delete'), 'escape' => false]) ?>
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
