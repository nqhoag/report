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
    
    /**
     * 
     * @param RulesChecker $rules
     * @return RulesChecker
     */
    public function generateReport($school_id, $year)
    {
        if(empty($year))
            return false;
        $mabaocao = $year . "_" . $school_id . "_";
        $rp1 = $this->find('all')->where(['school_id' => $school_id, 'phienbanbaocao' => $mabaocao . "001" ])->first();
        if(empty($rp1)){
            $rp1 = $this->newEntity();
        }
        $rp1->school_id = $school_id;
        $rp2->namhoc = $year;
        $rp1->tenbaocao = "Báo cáo đầu năm $year - ". intval($year) + 1;
        $rp1->phienbanbaocao = $mabaocao . "001";
        $this->save($rp1);
        
        $rp2 = $this->find('all')->where(['school_id' => $school_id, 'phienbanbaocao' => $mabaocao . "002" ])->first();
        if(empty($rp2)){
            $rp2 = $this->newEntity();
        }
        $rp2->school_id = $school_id;
        $rp2->namhoc = $year;
        $rp2->tenbaocao = "Báo cáo cuối năm $year - ". intval($year) + 1;
        $rp2->phienbanbaocao = $mabaocao . "002";
        $this->save($rp2);
        
        return true;
        
    }
      
}
