<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reports Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 *
 * @method \App\Model\Entity\Report get($primaryKey, $options = [])
 * @method \App\Model\Entity\Report newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Report[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Report|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Report[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Report findOrCreate($search, callable $callback = null, $options = [])
 */
class ReportsTable extends Table
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

        $this->setTable('reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
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
            ->requirePresence('phienbanbaocao', 'create')
            ->notEmpty('phienbanbaocao');

        $validator
            ->integer('solop')
            ->requirePresence('solop', 'create')
            ->notEmpty('solop');

        $validator
            ->integer('hocsinhnam')
            ->requirePresence('hocsinhnam', 'create')
            ->notEmpty('hocsinhnam');

        $validator
            ->integer('hocsinhnu')
            ->requirePresence('hocsinhnu', 'create')
            ->notEmpty('hocsinhnu');

        $validator
            ->integer('dansotrongdotuoi')
            ->requirePresence('dansotrongdotuoi', 'create')
            ->notEmpty('dansotrongdotuoi');

        $validator
            ->integer('hocsinhmienhocphi')
            ->requirePresence('hocsinhmienhocphi', 'create')
            ->notEmpty('hocsinhmienhocphi');

        $validator
            ->integer('sotienmien')
            ->requirePresence('sotienmien', 'create')
            ->notEmpty('sotienmien');

        $validator
            ->integer('hocsinhgiamhocphi')
            ->requirePresence('hocsinhgiamhocphi', 'create')
            ->notEmpty('hocsinhgiamhocphi');

        $validator
            ->integer('sotiengiam')
            ->requirePresence('sotiengiam', 'create')
            ->notEmpty('sotiengiam');

        $validator
            ->integer('hocsinhnhanhocbong')
            ->requirePresence('hocsinhnhanhocbong', 'create')
            ->notEmpty('hocsinhnhanhocbong');

        $validator
            ->integer('sotiennhanhocbong')
            ->requirePresence('sotiennhanhocbong', 'create')
            ->notEmpty('sotiennhanhocbong');

        $validator
            ->integer('hocsinhgiam')
            ->requirePresence('hocsinhgiam', 'create')
            ->notEmpty('hocsinhgiam');

        $validator
            ->allowEmpty('lydogiam');

        $validator
            ->integer('hocsinhbohoc')
            ->requirePresence('hocsinhbohoc', 'create')
            ->notEmpty('hocsinhbohoc');

        $validator
            ->allowEmpty('lydobo');

        $validator
            ->integer('bohocnu')
            ->requirePresence('bohocnu', 'create')
            ->notEmpty('bohocnu');

        $validator
            ->integer('bohocdantoc')
            ->requirePresence('bohocdantoc', 'create')
            ->notEmpty('bohocdantoc');

        $validator
            ->integer('hocsinhluuban')
            ->requirePresence('hocsinhluuban', 'create')
            ->notEmpty('hocsinhluuban');

        $validator
            ->integer('hocsinhluubannu')
            ->requirePresence('hocsinhluubannu', 'create')
            ->notEmpty('hocsinhluubannu');

        $validator
            ->integer('hocsinhluubandantoc')
            ->requirePresence('hocsinhluubandantoc', 'create')
            ->notEmpty('hocsinhluubandantoc');

        $validator
            ->integer('hsduthitotnghiep')
            ->requirePresence('hsduthitotnghiep', 'create')
            ->notEmpty('hsduthitotnghiep');

        $validator
            ->integer('hstotnghiep')
            ->requirePresence('hstotnghiep', 'create')
            ->notEmpty('hstotnghiep');

        $validator
            ->integer('hstotnghiepkhagioi')
            ->requirePresence('hstotnghiepkhagioi', 'create')
            ->notEmpty('hstotnghiepkhagioi');

        $validator
            ->boolean('conhanchamsocdtlsvh')
            ->requirePresence('conhanchamsocdtlsvh', 'create')
            ->notEmpty('conhanchamsocdtlsvh');

        $validator
            ->allowEmpty('tendtlsvh');

        $validator
            ->allowEmpty('diachidtlsvh');

        $validator
            ->allowEmpty('ghichudtlsvh');

        $validator
            ->integer('cointernet')
            ->requirePresence('cointernet', 'create')
            ->notEmpty('cointernet');

        $validator
            ->allowEmpty('nhamang');

        $validator
            ->allowEmpty('congnghe');

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

        return $rules;
    }
}
