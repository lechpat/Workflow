<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rule Entity.
 */
class Rule extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'module_id' => true,
        'name' => true,
        'is_active' => true,
        'description' => true,
        'trigger_type_id' => true,
        'record_action_id' => true,
        'module_field_id' => true,
        'execution_days' => true,
        'is_before_date' => true,
        'execution_hour' => true,
        'execution_min' => true,
        'execution_cycle' => true,
        'module' => true,
        'trigger_type' => true,
        'record_action' => true,
        'module_field' => true,
    ];
}
