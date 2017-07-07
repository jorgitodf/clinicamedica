<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Logradouros Model
 *
 * @property \App\Model\Table\EnderecosTable|\Cake\ORM\Association\HasMany $Enderecos
 *
 * @method \App\Model\Entity\Logradouro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Logradouro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Logradouro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Logradouro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logradouro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Logradouro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Logradouro findOrCreate($search, callable $callback = null, $options = [])
 */
class LogradourosTable extends Table
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

        $this->setTable('logradouros');
        $this->setDisplayField('id_logradouro');
        $this->setPrimaryKey('id_logradouro');

        $this->hasMany('Enderecos', [
            'foreignKey' => 'logradouro_id'
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
            ->integer('id_logradouro')
            ->allowEmpty('id_logradouro', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }

    public function getAllLogradouros()
    {
        return $this->connection->execute('SELECT id_logradouro, nome FROM logradouros ORDER BY nome ASC')->fetchAll('assoc');
    }
}
