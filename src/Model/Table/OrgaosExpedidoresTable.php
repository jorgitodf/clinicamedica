<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * OrgaosExpedidores Model
 *
 * @method \App\Model\Entity\OrgaosExpedidore get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrgaosExpedidore findOrCreate($search, callable $callback = null, $options = [])
 */
class OrgaosExpedidoresTable extends Table
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

        $this->setTable('orgaos_expedidores');
        $this->setDisplayField('id_orgao_expedidor');
        $this->setPrimaryKey('id_orgao_expedidor');
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
            ->integer('id_orgao_expedidor')
            ->allowEmpty('id_orgao_expedidor', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }

    public function getAllOrgaosExpedidores()
    {
        return $this->connection->execute('SELECT id_orgao_expedidor, nome FROM orgaos_expedidores ORDER BY nome ASC')->fetchAll('assoc');;
    }

}
