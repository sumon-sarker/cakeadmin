<?php
namespace CakeAdmin\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionScannerFixture
 *
 */
class PermissionScannerFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'permission_scanner';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'token' => ['type' => 'string', 'fixed' => true, 'length' => 32, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_ci'
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
            'id' => 1,
            'token' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
