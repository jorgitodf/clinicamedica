<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enderecos Model
 *
 * @property \App\Model\Table\BairrosTable|\Cake\ORM\Association\BelongsTo $Bairros
 * @property \App\Model\Table\LogradourosTable|\Cake\ORM\Association\BelongsTo $Logradouros
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\HasMany $Usuarios
 *
 * @method \App\Model\Entity\Endereco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Endereco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Endereco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Endereco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco findOrCreate($search, callable $callback = null, $options = [])
 */
class EnderecosTable extends Table
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

        $this->setTable('enderecos');
        $this->setDisplayField('id_endereco');
        $this->setPrimaryKey('id_endereco');

        $this->belongsTo('Bairros', [
            'foreignKey' => 'bairro_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Logradouros', [
            'foreignKey' => 'logradouro_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'endereco_id'
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
            ->integer('id_endereco')
            ->allowEmpty('id_endereco', 'create');

        $validator
            ->requirePresence('complemento', 'create')
            ->notEmpty('complemento');

        $validator
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->integer('cep')
            ->requirePresence('cep', 'create')
            ->notEmpty('cep');

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
        $rules->add($rules->existsIn(['bairro_id'], 'Bairros'));
        $rules->add($rules->existsIn(['logradouro_id'], 'Logradouros'));

        return $rules;
    }
}
