<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Caphocs Model
 *
 * @property \Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\Caphoc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Caphoc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Caphoc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Caphoc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Caphoc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Caphoc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Caphoc findOrCreate($search, callable $callback = null, $options = [])
 */
class CaphocsTable extends Table
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

        $this->setTable('caphocs');
        $this->setDisplayField('caphoc');
        $this->setPrimaryKey('id');

        $this->hasMany('Schools', [
            'foreignKey' => 'caphoc_id'
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
            ->requirePresence('caphoc', 'create')
            ->notEmpty('caphoc');

        return $validator;
    }
}
