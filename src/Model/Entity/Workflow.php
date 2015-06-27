<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workflow Entity.
 */
class Workflow extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'workflow_name' => true,
        'workflow_version' => true,
        'workflow_created' => true,
        'workflow' => true,
    ];


    public function start($event)
    {
        \Cake\Log\Log::write('debug',$event->data);
    }
}
