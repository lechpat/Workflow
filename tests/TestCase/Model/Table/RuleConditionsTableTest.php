<?php
namespace Workflow\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Workflow\Model\Table\RuleConditionsTable;

/**
 * Workflow\Model\Table\RuleConditionsTable Test Case
 */
class RuleConditionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.workflow.rule_conditions',
        'plugin.workflow.rules',
        'plugin.workflow.modules',
        'plugin.workflow.trigger_types',
        'plugin.workflow.record_actions',
        'plugin.workflow.module_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RuleConditions') ? [] : ['className' => 'Workflow\Model\Table\RuleConditionsTable'];
        $this->RuleConditions = TableRegistry::get('RuleConditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RuleConditions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
