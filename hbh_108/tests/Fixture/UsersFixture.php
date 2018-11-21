<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'unique id to identify users in db', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'user name for users to login
', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'users password to login

', 'precision' => null, 'fixed' => null],
        'user_first_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'users first name
', 'precision' => null, 'fixed' => null],
        'user_last_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'users first name
', 'precision' => null, 'fixed' => null],
        'user_street' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'which street users live
', 'precision' => null, 'fixed' => null],
        'user_suburb' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'which suburb users live', 'precision' => null, 'fixed' => null],
        'user_postcode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'post code of the suburb
', 'precision' => null, 'fixed' => null],
        'user_phone' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'users phone number.', 'precision' => null, 'autoIncrement' => null],
        'user_tags' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'user interest tags ', 'precision' => null, 'fixed' => null],
        'user_image' => ['type' => 'binary', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'user_type' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_description' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_abn' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_business_name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id'], 'length' => []],
            'user_user_id_uindex' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'user_id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'user_first_name' => 'Lorem ipsum dolor sit amet',
                'user_last_name' => 'Lorem ipsum dolor sit amet',
                'user_street' => 'Lorem ipsum dolor sit amet',
                'user_suburb' => 'Lorem ipsum dolor ',
                'user_postcode' => 'Lorem ip',
                'user_phone' => 1,
                'user_tags' => 'Lorem ipsum dolor sit amet',
                'user_image' => 'Lorem ipsum dolor sit amet',
                'user_type' => 'Lor',
                'user_description' => 'Lorem ipsum dolor sit amet',
                'user_abn' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'user_business_name' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
