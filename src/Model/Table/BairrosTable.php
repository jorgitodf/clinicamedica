<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bairros Model
 *
 * @property \App\Model\Table\CidadesTable|\Cake\ORM\Association\BelongsTo $Cidades
 * @property \App\Model\Table\EnderecosTable|\Cake\ORM\Association\HasMany $Enderecos
 *
 * @method \App\Model\Entity\Bairro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bairro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bairro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bairro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bairro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bairro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bairro findOrCreate($search, callable $callback = null, $options = [])
 */
class BairrosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('bairros');
        $this->setDisplayField('id_bairro');
        $this->setPrimaryKey('id_bairro');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Enderecos', [
            'foreignKey' => 'bairro_id'
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
            ->integer('id_bairro')
            ->allowEmpty('id_bairro', 'create');

        $validator
            ->requirePresence('bairro', 'create')
            ->notEmpty('bairro');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cidade_id'], 'Cidades'));

        return $rules;
    }
}
