<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hoithis Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Hoithi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hoithi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hoithi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hoithi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hoithi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hoithi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hoithi findOrCreate($search, callable $callback = null, $options = [])
 */
class HoithisTable extends Table
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

        $this->setTable('hoithis');
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
            ->integer('thanh_phan')
            ->requirePresence('thanh_phan', 'create')
            ->notEmpty('thanh_phan');

        $validator
            ->integer('so_luong_tham_gia')
            ->requirePresence('so_luong_tham_gia', 'create')
            ->notEmpty('so_luong_tham_gia');

        $validator
            ->requirePresence('noi_dung_thi', 'create')
            ->notEmpty('noi_dung_thi');

        $validator
            ->integer('nhat_cap_huyen')
            ->requirePresence('nhat_cap_huyen', 'create')
            ->notEmpty('nhat_cap_huyen');

        $validator
            ->integer('nhi_cap_huyen')
            ->requirePresence('nhi_cap_huyen', 'create')
            ->notEmpty('nhi_cap_huyen');

        $validator
            ->integer('ba_cap_huyen')
            ->requirePresence('ba_cap_huyen', 'create')
            ->notEmpty('ba_cap_huyen');

        $validator
            ->integer('khuyen_khich_cap_huyen')
            ->requirePresence('khuyen_khich_cap_huyen', 'create')
            ->notEmpty('khuyen_khich_cap_huyen');

        $validator
            ->integer('nhat_cap_tinh')
            ->requirePresence('nhat_cap_tinh', 'create')
            ->notEmpty('nhat_cap_tinh');

        $validator
            ->integer('nhi_cap_tinh')
            ->requirePresence('nhi_cap_tinh', 'create')
            ->notEmpty('nhi_cap_tinh');

        $validator
            ->integer('ba_cap_tinh')
            ->requirePresence('ba_cap_tinh', 'create')
            ->notEmpty('ba_cap_tinh');

        $validator
            ->integer('khuyen_khich_cap_tinh')
            ->requirePresence('khuyen_khich_cap_tinh', 'create')
            ->notEmpty('khuyen_khich_cap_tinh');

        $validator
            ->integer('nhat_cap_quoc_gia')
            ->requirePresence('nhat_cap_quoc_gia', 'create')
            ->notEmpty('nhat_cap_quoc_gia');

        $validator
            ->integer('nhi_cap_quoc_gia')
            ->requirePresence('nhi_cap_quoc_gia', 'create')
            ->notEmpty('nhi_cap_quoc_gia');

        $validator
            ->integer('ba_cap_quoc_gia')
            ->requirePresence('ba_cap_quoc_gia', 'create')
            ->notEmpty('ba_cap_quoc_gia');

        $validator
            ->integer('khuyen_khich_cap_quoc_gia')
            ->requirePresence('khuyen_khich_cap_quoc_gia', 'create')
            ->notEmpty('khuyen_khich_cap_quoc_gia');

        $validator
            ->allowEmpty('ghichu');

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
            $thanh_phan = $this->getThanhPhan($index);
            $model = $this->find()->where(["report_id" => $report->id, "thanh_phan" => $thanh_phan])->first();
            if (!$model) {
                $model = $this->newEntity();
            }
            $model->report_id = $report->id;
            $model->thanh_phan = $thanh_phan;
            
            foreach ($columns as $column){
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
    
    private function getThanhPhan($index){
        switch ($index){
            case 0:
                return 0;
            case 1:
                return 1;
            default :
                return 2;
        }
    }
}
