<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * RuleCondition Entity.
 */
class RuleCondition extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'rule_id' => true,
        'module_field_id' => true,
        'operator' => true,
        'value' => true,
        'rule' => true,
        'module_field' => true,
    ];
}
