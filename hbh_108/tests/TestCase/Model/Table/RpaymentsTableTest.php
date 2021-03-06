<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RpaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RpaymentsTable Test Case
 */
class RpaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RpaymentsTable
     */
    public $Rpayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rpayments',
        'app.rooms_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rpayments') ? [] : ['className' => RpaymentsTable::class];
        $this->Rpayments = TableRegistry::getTableLocator()->get('Rpayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rpayments);

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
