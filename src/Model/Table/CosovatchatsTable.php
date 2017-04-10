<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cosovatchats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 * @property \Cake\ORM\Association\BelongsTo $Khois
 * @property \Cake\ORM\Association\BelongsTo $Kieuphongs
 *
 * @method \App\Model\Entity\Cosovatchat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cosovatchat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cosovatchat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cosovatchat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cosovatchat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cosovatchat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cosovatchat findOrCreate($search, callable $callback = null, $options = [])
 */
class CosovatchatsTable extends Table
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

        $this->setTable('cosovatchats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reports', [
            'foreignKey' => 'report_id',
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
            ->integer('kien_co')
            ->requirePresence('kien_co', 'create')
            ->notEmpty('kien_co');

        $validator
            ->integer('ban_kien_co')
            ->requirePresence('ban_kien_co', 'create')
            ->notEmpty('ban_kien_co');

        $validator
            ->integer('cap_4')
            ->requirePresence('cap_4', 'create')
            ->notEmpty('cap_4');

        $validator
            ->integer('phong_tam')
            ->requirePresence('phong_tam', 'create')
            ->notEmpty('phong_tam');

        $validator
            ->integer('phong_muon')
            ->requirePresence('phong_muon', 'create')
            ->notEmpty('phong_muon');

        $validator
            ->integer('phong_thua')
            ->requirePresence('phong_thua', 'create')
            ->notEmpty('phong_thua');

        $validator
            ->integer('phong_thieu')
            ->requirePresence('phong_thieu', 'create')
            ->notEmpty('phong_thieu');

        $validator
            ->integer('phong_xay_moi_trong_nam')
            ->requirePresence('phong_xay_moi_trong_nam', 'create')
            ->notEmpty('phong_xay_moi_trong_nam');

        $validator
            ->integer('ca_3')
            ->requirePresence('ca_3', 'create')
            ->notEmpty('ca_3');

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
        $rules->add($rules->existsIn(['khoi_id'], 'Khois'));

        return $rules;
    }
    
    
    /**
     * lưu vào db
     */
    public function saveAllSheet($settings, $sheet, $report, $index, $khoi_id = null) {
            $columns = $settings->where(['table_index' => $index])->toArray();
            $model = $this->find()->where(["report_id" => $report->id, "khoi_id" => $khoi_id])->first();
            if (!$model) {
                $model = $this->newEntity();
            }
            $model->report_id = $report->id;
            $model->khoi_id = $khoi_id;
            $model->kieuphong_id = KIEU_PHONG_PHONG_HOC;//$this->getKieuPhong($index);
            
            foreach ($columns as $column){
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
    
    private function getKieuPhong($index){
        if($index == 0){
            return KIEU_PHONG_PHONG_HOC;
        }
    }
}
