<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hocviens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Hocvien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hocvien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hocvien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hocvien|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hocvien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hocvien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hocvien findOrCreate($search, callable $callback = null, $options = [])
 */
class HocviensTable extends Table
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

        $this->setTable('hocviens');
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
            ->integer('hoc_vien')
            ->requirePresence('hoc_vien', 'create')
            ->notEmpty('hoc_vien');

        $validator
            ->integer('so_lop')
            ->requirePresence('so_lop', 'create')
            ->notEmpty('so_lop');

        $validator
            ->integer('so_hoc_vien')
            ->requirePresence('so_hoc_vien', 'create')
            ->notEmpty('so_hoc_vien');

        $validator
            ->integer('so_nu')
            ->requirePresence('so_nu', 'create')
            ->notEmpty('so_nu');

        $validator
            ->integer('so_dan_toc')
            ->requirePresence('so_dan_toc', 'create')
            ->notEmpty('so_dan_toc');

        $validator
            ->integer('so_ngoai_do_tuoi')
            ->requirePresence('so_ngoai_do_tuoi', 'create')
            ->notEmpty('so_ngoai_do_tuoi');

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
            $model = $this->find()->where(["report_id" => $report->id, "hoc_vien" => $index])->first();
            if (!$model) {
                $model = $this->newEntity();
                $model->report_id = $report->id;
                $model->hoc_vien = $index;
            }
            foreach ($columns as $column){
                if(!empty($column["mapping_column"])){
                    $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
                }
            }
            $this->save($model);
    }
}
