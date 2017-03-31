<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loaitruongs Model
 *
 * @property \Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\Loaitruong get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loaitruong newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loaitruong[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loaitruong|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaitruong patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loaitruong[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loaitruong findOrCreate($search, callable $callback = null, $options = [])
 */
class LoaitruongsTable extends Table
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

        $this->setTable('loaitruongs');
        $this->setDisplayField('loaitruong');
        $this->setPrimaryKey('id');

        $this->hasMany('Schools', [
            'foreignKey' => 'loaitruong_id'
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
            ->requirePresence('loaitruong', 'create')
            ->notEmpty('loaitruong');

        return $validator;
    }
}
