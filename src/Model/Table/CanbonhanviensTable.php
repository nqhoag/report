<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Canbonhanviens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Canbonhanvien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Canbonhanvien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Canbonhanvien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Canbonhanvien|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canbonhanvien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Canbonhanvien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Canbonhanvien findOrCreate($search, callable $callback = null, $options = [])
 */
class CanbonhanviensTable extends Table
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

        $this->setTable('canbonhanviens');

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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->integer('doi_ngu')
            ->requirePresence('doi_ngu', 'create')
            ->notEmpty('doi_ngu');

        $validator
            ->integer('tong_so')
            ->requirePresence('tong_so', 'create')
            ->notEmpty('tong_so');

        $validator
            ->integer('so_nguoi_dan_toc')
            ->requirePresence('so_nguoi_dan_toc', 'create')
            ->notEmpty('so_nguoi_dan_toc');

        $validator
            ->integer('so_dang_vien')
            ->requirePresence('so_dang_vien', 'create')
            ->notEmpty('so_dang_vien');

        $validator
            ->integer('trinh_do_tien_si')
            ->requirePresence('trinh_do_tien_si', 'create')
            ->notEmpty('trinh_do_tien_si');

        $validator
            ->integer('trinh_do_thac_si')
            ->requirePresence('trinh_do_thac_si', 'create')
            ->notEmpty('trinh_do_thac_si');

        $validator
            ->integer('trinh_do_dai_hoc')
            ->requirePresence('trinh_do_dai_hoc', 'create')
            ->notEmpty('trinh_do_dai_hoc');

        $validator
            ->integer('trinh_do_cao_dang')
            ->requirePresence('trinh_do_cao_dang', 'create')
            ->notEmpty('trinh_do_cao_dang');

        $validator
            ->integer('trinh_do_trung_cap')
            ->requirePresence('trinh_do_trung_cap', 'create')
            ->notEmpty('trinh_do_trung_cap');

        $validator
            ->integer('gv_dat_chuan')
            ->requirePresence('gv_dat_chuan', 'create')
            ->notEmpty('gv_dat_chuan');

        $validator
            ->integer('gv_dang_chuan_hoa')
            ->requirePresence('gv_dang_chuan_hoa', 'create')
            ->notEmpty('gv_dang_chuan_hoa');

        $validator
            ->integer('gv_dang_tren_chuan')
            ->requirePresence('gv_dang_tren_chuan', 'create')
            ->notEmpty('gv_dang_tren_chuan');

        $validator
            ->integer('gv_gioi_huyen')
            ->requirePresence('gv_gioi_huyen', 'create')
            ->notEmpty('gv_gioi_huyen');

        $validator
            ->integer('gv_gioi_tinh')
            ->requirePresence('gv_gioi_tinh', 'create')
            ->notEmpty('gv_gioi_tinh');

        $validator
            ->integer('thieu')
            ->requirePresence('thieu', 'create')
            ->notEmpty('thieu');

        $validator
            ->integer('thua')
            ->requirePresence('thua', 'create')
            ->notEmpty('thua');

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
            $doi_ngu = $index;
            $model = $this->find()->where(["report_id" => $report->id, "doi_ngu" => $index])->first();
            if (!$model) {
                $model = $this->newEntity();
            }
            $model->report_id = $report->id;
            $model->doi_ngu = $index;
            
            foreach ($columns as $column){
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
    
    private function getDoiNgu($index){
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
