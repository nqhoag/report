<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hocsinhs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 * @property \Cake\ORM\Association\BelongsTo $Khois
 *
 * @method \App\Model\Entity\Hocsinh get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hocsinh newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hocsinh[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hocsinh|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hocsinh patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hocsinh[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hocsinh findOrCreate($search, callable $callback = null, $options = [])
 */
class HocsinhsTable extends Table
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

        $this->setTable('hocsinhs');
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
            ->integer('tong_so_lop')
            ->allowEmpty('tong_so_lop');

        $validator
            ->integer('tong_so_hs')
            ->allowEmpty('tong_so_hs');

        $validator
            ->integer('tong_so_hs_nu')
            ->allowEmpty('tong_so_hs_nu');

        $validator
            ->integer('tong_so_hs_dan_toc')
            ->allowEmpty('tong_so_hs_dan_toc');

        $validator
            ->integer('tong_so_hs_dan_toc_nu')
            ->requirePresence('tong_so_hs_dan_toc_nu', 'create')
            ->notEmpty('tong_so_hs_dan_toc_nu');

        $validator
            ->integer('tong_so_voi_dau_nam')
            ->allowEmpty('tong_so_voi_dau_nam');

        $validator
            ->integer('tong_so_voi_nam_truoc')
            ->allowEmpty('tong_so_voi_nam_truoc');

        $validator
            ->integer('so_lop_2buoi_1ngay')
            ->allowEmpty('so_lop_2buoi_1ngay');

        $validator
            ->integer('so_hs_2buoi_1ngay')
            ->allowEmpty('so_hs_2buoi_1ngay');

        $validator
            ->integer('so_lop_ban_tru')
            ->allowEmpty('so_lop_ban_tru');

        $validator
            ->integer('so_hs_ban_tru')
            ->allowEmpty('so_hs_ban_tru');

        $validator
            ->integer('so_lop_tieng_anh')
            ->allowEmpty('so_lop_tieng_anh');

        $validator
            ->integer('so_hs_tieng_anh')
            ->allowEmpty('so_hs_tieng_anh');

        $validator
            ->integer('so_lop_tin_hoc')
            ->allowEmpty('so_lop_tin_hoc');

        $validator
            ->integer('so_hs_tin_hoc')
            ->allowEmpty('so_hs_tin_hoc');

        $validator
            ->integer('hoan_thanh_tieng_viet')
            ->allowEmpty('hoan_thanh_tieng_viet');

        $validator
            ->integer('chua_hoan_thanh_tieng_viet')
            ->allowEmpty('chua_hoan_thanh_tieng_viet');

        $validator
            ->integer('hoan_thanh_toan')
            ->allowEmpty('hoan_thanh_toan');

        $validator
            ->integer('chua_hoan_toan')
            ->allowEmpty('chua_hoan_toan');

        $validator
            ->integer('nang_luc_dat')
            ->allowEmpty('nang_luc_dat');

        $validator
            ->integer('nang_luc_can_co_gang')
            ->allowEmpty('nang_luc_can_co_gang');

        $validator
            ->integer('pham_chat_dat')
            ->allowEmpty('pham_chat_dat');

        $validator
            ->integer('pham_chat_can_co_gang')
            ->allowEmpty('pham_chat_can_co_gang');

        $validator
            ->integer('so_hs_luu_ban')
            ->allowEmpty('so_hs_luu_ban');

        $validator
            ->integer('so_hs_dan_toc_luu_ban')
            ->allowEmpty('so_hs_dan_toc_luu_ban');

        $validator
            ->integer('so_hs_sinh_mien_tien')
            ->allowEmpty('so_hs_sinh_mien_tien');

        $validator
            ->integer('so_tien_mien')
            ->allowEmpty('so_tien_mien');

        $validator
            ->integer('so_hs_sinh_giam_tien')
            ->allowEmpty('so_hs_sinh_giam_tien');

        $validator
            ->integer('so_tien_giam')
            ->allowEmpty('so_tien_giam');

        $validator
            ->integer('so_hs_sinh_nhan_hoc_bong')
            ->allowEmpty('so_hs_sinh_nhan_hoc_bong');

        $validator
            ->integer('so_tien_hoc_bong')
            ->allowEmpty('so_tien_hoc_bong');

        $validator
            ->integer('so_hs_giam')
            ->allowEmpty('so_hs_giam');

        $validator
            ->integer('so_hs_giam_vi_chet')
            ->allowEmpty('so_hs_giam_vi_chet');

        $validator
            ->integer('so_hs_giam_vi_dau_keo_dai')
            ->allowEmpty('so_hs_giam_vi_dau_keo_dai');

        $validator
            ->integer('so_hs_giam_vi_chuyen_di')
            ->allowEmpty('so_hs_giam_vi_chuyen_di');

        $validator
            ->integer('so_hs_giam_vi_di_hoc_nghe')
            ->allowEmpty('so_hs_giam_vi_di_hoc_nghe');

        $validator
            ->integer('so_hs_bo_hoc')
            ->allowEmpty('so_hs_bo_hoc');

        $validator
            ->integer('so_hs_bo_hoc_nu')
            ->allowEmpty('so_hs_bo_hoc_nu');

        $validator
            ->integer('so_hs_bo_hoc_dan_toc')
            ->allowEmpty('so_hs_bo_hoc_dan_toc');

        $validator
            ->integer('so_hs_bo_hoc_vi_hoc_yeu')
            ->allowEmpty('so_hs_bo_hoc_vi_hoc_yeu');

        $validator
            ->integer('so_hs_bo_hoc_vi_kinh_te')
            ->allowEmpty('so_hs_bo_hoc_vi_kinh_te');

        $validator
            ->integer('so_hs_bo_hoc_vi_thien_tai')
            ->allowEmpty('so_hs_bo_hoc_vi_thien_tai');

        $validator
            ->integer('so_hs_bo_hoc_vi_vi_pham_ki_luat')
            ->allowEmpty('so_hs_bo_hoc_vi_vi_pham_ki_luat');

        $validator
            ->integer('so_hs_bo_hoc_vi_chua_xac_dinh')
            ->allowEmpty('so_hs_bo_hoc_vi_chua_xac_dinh');

        $validator
            ->integer('tong_so_giam_va_bo_hoc')
            ->allowEmpty('tong_so_giam_va_bo_hoc');

        $validator
            ->allowEmpty('ghi_chu');

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
//            $model->kieuphong_id = KIEU_PHONG_PHONG_HOC;//$this->getKieuPhong($index);
            
            foreach ($columns as $column){
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
}
