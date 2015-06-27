<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkflowsFixture
 *
 */
class WorkflowsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_workflows';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'workflow_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'workflow_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'workflow_version' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'workflow_created' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['workflow_id'], 'length' => []],
            'name_version' => ['type' => 'unique', 'columns' => ['workflow_name', 'workflow_version'], 'length' => []],
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
            'workflow_id' => 1,
            'workflow_name' => 'Lorem ipsum dolor sit amet',
            'workflow_version' => 1,
            'workflow_created' => 1
        ],
    ];
}
