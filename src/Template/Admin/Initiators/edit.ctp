<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $initiator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $initiator->id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Initiators'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="initiators form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($initiator); ?>
    <fieldset>
        <legend><?= __('Edit Initiator') ?></legend>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('enabled') ?>
            <?= $this->Form->input('event_name') ?>
            <?= $this->Form->input('subject_alias') ?>
            <?= $this->Form->input('workflow_id', ['options' => $workflows]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
