<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ditichs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Ditich get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ditich newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ditich[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ditich|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ditich patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ditich[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ditich findOrCreate($search, callable $callback = null, $options = [])
 */
class DitichsTable extends Table
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

        $this->setTable('ditichs');
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
            ->requirePresence('tenditich', 'create')
            ->notEmpty('tenditich');

        $validator
            ->requirePresence('diachi', 'create')
            ->notEmpty('diachi');

        $validator
            ->requirePresence('ghichu', 'create')
            ->notEmpty('ghichu');

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
    
    /**
     * lưu vào db
     */
    public function saveAllSheet($settings, $sheet, $report, $index, $khoi_id = null) {
            $columns = $settings->where(['table_index' => $index])->toArray();
            $model = $this->find()->where(["report_id" => $report->id, "table_index" => $index])->first();
            if (!$model) {
                $model = $this->newEntity();
            }
            $model->report_id = $report->id;
            $model->table_index = $index;
            foreach ($columns as $column){
                if(empty($sheet->getCell($column["cell"])->getValue()) && $column["mapping_column"] != "ghichu"){
                    return false;
                }
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
}
