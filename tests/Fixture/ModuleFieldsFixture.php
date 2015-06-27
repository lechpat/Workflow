<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModuleFieldsFixture
 *
 */
class ModuleFieldsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_module_fields';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'module_id' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'a30c35a6-4d0f-4f90-a53f-06b9c84bf127',
            'module_id' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
