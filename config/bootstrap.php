<?php
use Cake\Event\EventListenerInterface;
use Cake\Event\Event;
use Cake\Event\EventManager;
use Cake\ORM\TableRegistry;
/*class WorkflowListener implements EventListenerInterface
{

    public function implementedEvents()
    {
        $initiatorsTable = TableRegistry::get('Workflow.Initiators');
        $initiators = $initiatorsTable->find()
            ->where(['Initiators.enabled' => true])
            ->all(); 
        \Cake\Log\Log::write('debug',$initiators);
        $listeners = [];
        foreach($initiators as $initiator) {
            $listeners[] = $initiator->event, $initiator->workflow_id];
        }
        return $listeners;
        return [
            'Model.beforeSave' => 'updateBuyStatistic',
        ];
    }

    public function updateBuyStatistic($event)
    {
         \Cake\Log\Log::write('debug','listening');
        \Cake\Log\Log::write('debug',$event);
    }
}
*/

$initiatorsTable = TableRegistry::get('Workflow.Initiators',['contain' => ['Workflows']]);
$initiators = $initiatorsTable->find()
    ->where(['Initiators.enabled' => true])
    ->all(); 
//    \Cake\Log\Log::write('debug',$initiators);
foreach($initiators as $initiator) {
    EventManager::instance()->on($initiator->event_name, function($event) use ($initiator) {
        //\Cake\Log\Log::write('debug',$event);
        if($event->subject->alias() === $initiator->subject_alias) {
            TableRegistry::get('Workflow.Workflows')
            ->get($initiator->workflow_id)
            ->start($event);            
        }
    });
}

//EventManager::instance()->on(new WorkflowListener());
