<?php /*
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
*/ ?>
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
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="h5"><?= __('Available Workflow Elements') ?></span>
            </div>
            <div class="panel-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#activitiesList" aria-expanded="true" aria-controls="collapseActivitiesList">
          <?= __('Activities') ?>
                                </a>
                            </h5>
                        </div>
                        <div id="activitiesList" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="activitiesHeader">
                            <ul class="list-group">
                                <?php foreach($activities as $activity): ?>
                                    <li class="list-group-item activities"><?= $activity->name ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#transitionsList" aria-expanded="true" aria-controls="collapseTransitions">
          <?= __('Transitions') ?>
                                </a>
                            </h5>
                        </div>
                        <div id="transitionsList" class="panel-collapse collapse" role="tabpanel" aria-labelledby="transitionsHeader">
                            <ul class="list-group">
                                <?php foreach($activities as $activity): ?>
                                    <li class="list-group-item activities"><?= $activity->name ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="main" class="col-lg-9 col-md-8">
    <div class="demo statemachine-demo" id="statemachine-demo" style="position:relative;">
                <div class="w" id="opened">BEGIN
                    <div class="ep"></div>
                </div>
                <div class="w" id="phone1">PHONE INTERVIEW 1
                    <div class="ep"></div>
                </div>
                <div class="w" id="phone2">PHONE INTERVIEW 2
                    <div class="ep"></div>
                </div>
                <div class="w" id="inperson">IN PERSON
                    <div class="ep"></div>
                </div>
                <div class="w" id="rejected">REJECTED
                    <div class="ep"></div>
                </div>
            </div>
    </div>
<?php
$this->Html->css('flow',['block' => true]);
$this->Html->script('jsplumb/dom.jsPlumb-1.7.5-min',['block' => true]);
$this->Html->scriptBlock('
jsPlumb.ready(function () {

    // setup some defaults for jsPlumb.
    var instance = jsPlumb.getInstance({
        Endpoint: ["Dot", {radius: 2}],
        HoverPaintStyle: {strokeStyle: "#1e8151", lineWidth: 2 },
        ConnectionOverlays: [
            [ "Arrow", {
                location: 1,
                id: "arrow",
                length: 14,
                foldback: 0.8
            } ],
            [ "Label", { label: "FOO", id: "label", cssClass: "aLabel" }]
        ],
        Container: "statemachine-demo"
    });

    window.jsp = instance;

    var windows = jsPlumb.getSelector(".statemachine-demo .w");

    // initialise draggable elements.
    instance.draggable(windows);
    instance.draggable(jsPlumb.getSelector(".activities"),{
        clone:true
    });    

    // bind a click listener to each connection; the connection is deleted. you could of course
    // just do this: jsPlumb.bind("click", jsPlumb.detach), but I wanted to make it clear what was
    // happening.
    instance.bind("click", function (c) {
        instance.detach(c);
    });

    // bind a connection listener. note that the parameter passed to this function contains more than
    // just the new connection - see the documentation for a full list of what is included in "info".
    // this listener sets the connections internal
    // id as the label overlays text.
    instance.bind("connection", function (info) {
        info.connection.getOverlay("label").setLabel(info.connection.id);
    });


    // suspend drawing and initialise.
    instance.batch(function () {
        instance.makeSource(windows, {
            filter: ".ep",
            anchor: "Continuous",
            connector: [ "StateMachine", { curviness: 20 } ],
            connectorStyle: { strokeStyle: "#5c96bc", lineWidth: 2, outlineColor: "transparent", outlineWidth: 4 },
            maxConnections: 5,
            onMaxConnections: function (info, e) {
                alert("Maximum connections (" + info.maxConnections + ") reached");
            }
        });

        // initialise all ".w" elements as connection targets.
        instance.makeTarget(windows, {
            dropOptions: { hoverClass: "dragHover" },
            anchor: "Continuous",
            allowLoopback: true
        });

        // and finally, make a couple of connections
        instance.connect({ source: "opened", target: "phone1" });
        instance.connect({ source: "phone1", target: "phone1" });
        instance.connect({ source: "phone1", target: "inperson" });
    });

    jsPlumb.fire("jsPlumbDemoLoaded", instance);

});
',['block' => 'scriptBottom']);
?>
