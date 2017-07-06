<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnderecosFixture
 *
 */
class EnderecosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_endereco' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'complemento' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cep' => ['type' => 'integer', 'length' => 8, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bairro_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'logradouro_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tb_endereco_tb_bairro_idx' => ['type' => 'index', 'columns' => ['bairro_id'], 'length' => []],
            'fk_tb_endereco_tb_logradouro_idx' => ['type' => 'index', 'columns' => ['logradouro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_endereco'], 'length' => []],
            'fk_tb_endereco_tb_bairro' => ['type' => 'foreign', 'columns' => ['bairro_id'], 'references' => ['bairros', 'id_bairro'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fk_tb_endereco_tb_logradouro' => ['type' => 'foreign', 'columns' => ['logradouro_id'], 'references' => ['logradouros', 'id_logradouro'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
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
            'id_endereco' => 1,
            'complemento' => 'Lorem ipsum dolor sit amet',
            'numero' => 'Lorem ipsu',
            'cep' => 1,
            'bairro_id' => 1,
            'logradouro_id' => 1
        ],
    ];
}
