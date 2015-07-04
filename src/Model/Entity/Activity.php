<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity.
 */
class Activity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'entity_id' => true,
        'entity' => true,
    ];
}
