<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Caphocs
 * @property \Cake\ORM\Association\BelongsTo $Loaitruongs
 * @property \Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\School get($primaryKey, $options = [])
 * @method \App\Model\Entity\School newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\School[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\School|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\School[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\School findOrCreate($search, callable $callback = null, $options = [])
 */
class SchoolsTable extends Table
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

        $this->setTable('schools');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->belongsTo('Caphocs', [
            'foreignKey' => 'caphoc_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Loaitruongs', [
            'foreignKey' => 'loaitruong_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'school_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     * link ref: https://book.cakephp.org/3.0/en/orm/validation.html
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('ten', 'create')
            ->notEmpty('ten');

        $validator
            ->requirePresence('diachi', 'create')
            ->notEmpty('diachi');

        $validator
            ->integer('namthanhlap')
            ->requirePresence('namthanhlap', 'create')
            ->notEmpty('namthanhlap');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'valid-email', ['rule' => 'email']);

        $validator
            ->requirePresence('sodienthoai', 'create')
            ->notEmpty('sodienthoai');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['caphoc_id'], 'Caphocs'));
        $rules->add($rules->existsIn(['loaitruong_id'], 'Loaitruongs'));

        return $rules;
    }
}
