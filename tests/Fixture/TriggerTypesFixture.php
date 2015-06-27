<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TriggerTypesFixture
 *
 */
class TriggerTypesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_trigger_types';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_UNIQUE' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
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
            'id' => '21af2329-28dc-4a15-b273-de781c33e6fe',
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
