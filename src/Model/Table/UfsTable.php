<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Ufs Model
 */
class UfsTable extends Table
{
    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = ConnectionManager::get('default');
    }
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ufs');
        $this->setDisplayField('id_uf');
        $this->setPrimaryKey('id_uf');

        $this->hasMany('Cidades', [
            'foreignKey' => 'uf_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_uf')
            ->allowEmpty('id_uf', 'create');

        $validator
            ->allowEmpty('uf');

        return $validator;
    }

    public function getAllUfs()
    {
        return $this->connection->execute('SELECT id_uf, uf FROM ufs ORDER BY uf ASC')->fetchAll('assoc');
    }
}
