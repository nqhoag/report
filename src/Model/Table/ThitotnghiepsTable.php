<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Thitotnghieps Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Thitotnghiep get($primaryKey, $options = [])
 * @method \App\Model\Entity\Thitotnghiep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Thitotnghiep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Thitotnghiep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Thitotnghiep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Thitotnghiep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Thitotnghiep findOrCreate($search, callable $callback = null, $options = [])
 */
class ThitotnghiepsTable extends Table
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

        $this->setTable('thitotnghieps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reports', [
            'foreignKey' => 'report_id',
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
            ->integer('nam')
            ->requirePresence('nam', 'create')
            ->notEmpty('nam');

        $validator
            ->allowEmpty('xep_hang');

        $validator
            ->integer('so_du_thi')
            ->requirePresence('so_du_thi', 'create')
            ->notEmpty('so_du_thi');

        $validator
            ->integer('so_tot_nghiep')
            ->requirePresence('so_tot_nghiep', 'create')
            ->notEmpty('so_tot_nghiep');

        $validator
            ->integer('so_kha_gioi')
            ->requirePresence('so_kha_gioi', 'create')
            ->notEmpty('so_kha_gioi');

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
        $rules->add($rules->existsIn(['report_id'], 'Reports'));

        return $rules;
    }
}
