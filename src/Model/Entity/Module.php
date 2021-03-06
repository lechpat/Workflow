<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity.
 */
class Module extends Entity
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
