<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 *
 */
class UsuariosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_usuario' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nome' => ['type' => 'string', 'length' => 120, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cpf' => ['type' => 'biginteger', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rg' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'crm' => ['type' => 'string', 'length' => 12, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_nascimento' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'idade' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_pessoa' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ativo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'S', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_cadastro' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'estado_civil_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'especialidade_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'orgao_expedidor_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'endereco_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tb_pessoa_tb_estado_civil1_idx' => ['type' => 'index', 'columns' => ['estado_civil_id'], 'length' => []],
            'fk_tb_pessoa_tb_especialidade1_idx' => ['type' => 'index', 'columns' => ['especialidade_id'], 'length' => []],
            'fk_tb_pessoa_tb_orgao_expedidor1_idx' => ['type' => 'index', 'columns' => ['orgao_expedidor_id'], 'length' => []],
            'fk_tb_pessoa_tb_endereco1_idx' => ['type' => 'index', 'columns' => ['endereco_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_usuario'], 'length' => []],
            'fk_tb_pessoa_tb_endereco' => ['type' => 'foreign', 'columns' => ['endereco_id'], 'references' => ['enderecos', 'id_endereco'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fk_tb_pessoa_tb_especialidade' => ['type' => 'foreign', 'columns' => ['especialidade_id'], 'references' => ['especialidades', 'id_especialidade'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fk_tb_pessoa_tb_estado_civil' => ['type' => 'foreign', 'columns' => ['estado_civil_id'], 'references' => ['estados_civis', 'id_estado_civil'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fk_tb_pessoa_tb_orgao_expedidor' => ['type' => 'foreign', 'columns' => ['orgao_expedidor_id'], 'references' => ['orgaos_expedidores', 'id_orgao_expedidor'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
            'id_usuario' => 1,
            'nome' => 'Lorem ipsum dolor sit amet',
            'cpf' => 1,
            'rg' => 'Lorem ipsum dolor ',
            'crm' => 'Lorem ipsu',
            'data_nascimento' => '2017-07-06',
            'idade' => 1,
            'tipo_pessoa' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'ativo' => 'Lorem ipsum dolor sit amet',
            'data_cadastro' => '2017-07-06 16:56:04',
            'estado_civil_id' => 1,
            'especialidade_id' => 1,
            'orgao_expedidor_id' => 1,
            'endereco_id' => 1
        ],
    ];
}
