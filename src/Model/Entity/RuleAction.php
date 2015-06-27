<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * RuleAction Entity.
 */
class RuleAction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'rule_id' => true,
        'action_id' => true,
        'rule' => true,
        'action' => true,
    ];
}
