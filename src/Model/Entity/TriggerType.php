<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * TriggerType Entity.
 */
class TriggerType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
    ];
}
