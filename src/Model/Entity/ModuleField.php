<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModuleField Entity.
 */
class ModuleField extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'module_id' => true,
        'name' => true,
        'module' => true,
    ];
}
