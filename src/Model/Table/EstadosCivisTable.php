<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * EstadosCivis Model
 *
 * @method \App\Model\Entity\EstadosCivi get($primaryKey, $options = [])
 * @method \App\Model\Entity\EstadosCivi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EstadosCivi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstadosCivi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstadosCivi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EstadosCivi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstadosCivi findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadosCivisTable extends Table
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

        $this->setTable('estados_civis');
        $this->setDisplayField('id_estado_civil');
        $this->setPrimaryKey('id_estado_civil');
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
            ->integer('id_estado_civil')
            ->allowEmpty('id_estado_civil', 'create');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }

    public function getAllEstadosCivis()
    {
        return $this->connection->execute('SELECT id_estado_civil, descricao FROM estados_civis ORDER BY descricao ASC')->fetchAll('assoc');
    }
}
