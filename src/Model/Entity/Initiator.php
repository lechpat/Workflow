<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Initiator Entity.
 */
class Initiator extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'enabled' => true,
        'event_name' => true,
        'subject_alias' => true,
        'workflow_id' => true,
        'workflow' => true,
    ];
}
