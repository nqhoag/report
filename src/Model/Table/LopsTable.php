<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lops Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 * @property \Cake\ORM\Association\BelongsTo $Khois
 *
 * @method \App\Model\Entity\Lop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lop findOrCreate($search, callable $callback = null, $options = [])
 */
class LopsTable extends Table
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

        $this->setTable('lops');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Khois', [
            'foreignKey' => 'khoi_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('solop')
            ->requirePresence('solop', 'create')
            ->notEmpty('solop');

        $validator
            ->integer('sohocsinh')
            ->requirePresence('sohocsinh', 'create')
            ->notEmpty('sohocsinh');

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
        $rules->add($rules->existsIn(['school_id'], 'Schools'));
        $rules->add($rules->existsIn(['khoi_id'], 'Khois'));

        return $rules;
    }
}
