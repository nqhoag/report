<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Khois Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Caphocs
 *
 * @method \App\Model\Entity\Khois get($primaryKey, $options = [])
 * @method \App\Model\Entity\Khois newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Khois[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Khois|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Khois patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Khois[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Khois findOrCreate($search, callable $callback = null, $options = [])
 */
class KhoisTable extends Table
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

        $this->setTable('khois');
        $this->setDisplayField('tenkhoi');
        $this->setPrimaryKey('id');

        $this->belongsTo('Caphocs', [
            'foreignKey' => 'caphoc_id',
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
            ->requirePresence('tenkhoi', 'create')
            ->notEmpty('tenkhoi');

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
        $rules->add($rules->existsIn(['caphoc_id'], 'Caphocs'));

        return $rules;
    }
}
