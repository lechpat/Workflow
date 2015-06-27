<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Execution Entity.
 */
class Execution extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'execution_parent' => true,
        'execution_started' => true,
        'execution_suspended' => true,
        'execution_variables' => true,
        'execution_waiting_for' => true,
        'execution_threads' => true,
        'execution_next_thread_id' => true,
        'workflow' => true,
        'execution' => true,
        'execution_next_thread' => true,
    ];
}
