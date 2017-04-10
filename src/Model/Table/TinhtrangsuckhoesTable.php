<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tinhtrangsuckhoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 * @property \Cake\ORM\Association\BelongsTo $Reports
 * @property \Cake\ORM\Association\BelongsTo $Khois
 *
 * @method \App\Model\Entity\Tinhtrangsuckho get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tinhtrangsuckho findOrCreate($search, callable $callback = null, $options = [])
 */
class TinhtrangsuckhoesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('tinhtrangsuckhoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);
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
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->integer('tong_nhom_lop')
                ->requirePresence('tong_nhom_lop', 'create')
                ->notEmpty('tong_nhom_lop');

        $validator
                ->integer('tong_so_tre')
                ->requirePresence('tong_so_tre', 'create')
                ->notEmpty('tong_so_tre');

        $validator
                ->integer('so_kham_suc_khoe_dinh_ki')
                ->requirePresence('so_kham_suc_khoe_dinh_ki', 'create')
                ->notEmpty('so_kham_suc_khoe_dinh_ki');

        $validator
                ->integer('so_theo_doi_bd_can_nang')
                ->requirePresence('so_theo_doi_bd_can_nang', 'create')
                ->notEmpty('so_theo_doi_bd_can_nang');

        $validator
                ->integer('so_theo_doi_bd_chieu_cao')
                ->requirePresence('so_theo_doi_bd_chieu_cao', 'create')
                ->notEmpty('so_theo_doi_bd_chieu_cao');

        $validator
                ->integer('so_SDD_the_nhe_can')
                ->requirePresence('so_SDD_the_nhe_can', 'create')
                ->notEmpty('so_SDD_the_nhe_can');

        $validator
                ->integer('so_SDD_the_thap_coi')
                ->requirePresence('so_SDD_the_thap_coi', 'create')
                ->notEmpty('so_SDD_the_thap_coi');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['school_id'], 'Schools'));
        $rules->add($rules->existsIn(['report_id'], 'Reports'));
        $rules->add($rules->existsIn(['khoi_id'], 'Khois'));

        return $rules;
    }

    /**
     * lưu tình trang sức khoẻ của trẻ vào 
     */
    public function Savetinhtrangsk($sheet, $report) {
        $trsk = $this->find()->where(["report_id" => $report->id, "khoi_id" => MA_KHOI_MAU_GIAO])->first();
        if (!$trsk) {
            $trsk = $this->newEntity();
        }
        $trsk1 = $this->find()->where(["report_id" => $report->id, "khoi_id" => MA_KHOI_NHA_TRE])->first();
        if (!$trsk1) {
            $trsk1 = $this->newEntity();
        }
        // lưu tinh trạng sức khoẻ của trẻ mẫu giáo.
        $trsk->report_id = $report->id;
        $trsk->school_id = $report->school_id;
        $trsk->khoi_id = MA_KHOI_MAU_GIAO;
        $trsk->tong_nhom_lop = $sheet->getCell(CELL_TONG_NHOM_LOP_MAU_GIAO)->getValue();
        $trsk->tong_so_tre = $sheet->getCell(CELL_TONG_SO_TRE_MAU_GIAO)->getValue();
        $trsk->so_kham_suc_khoe_dinh_ki = $sheet->getCell(CELL_SO_KHAM_SUC_KHOE_DINH_KY_MAU_GIAO)->getValue();
        $trsk->so_theo_doi_bd_can_nang = $sheet->getCell(CELL_SO_THEO_DOI_BDCN_MAU_GIAO)->getValue();
        $trsk->so_theo_doi_bd_chieu_cao = $sheet->getCell(CELL_SO_THEO_DOI_BDCC_MAU_GIAO)->getValue();
        $trsk->so_SDD_the_nhe_can = $sheet->getCell(CELL_SO_SDD_NHE_CAN_MAU_GIAO)->getValue();
        $trsk->so_SDD_the_thap_coi = $sheet->getCell(CELL_SO_SDD_THAP_COI_MAU_GIAO)->getValue();
        $this->save($trsk);

        // lưu tinh trạng sức khoẻ của trẻ nhà trẻ.
        $trsk1->report_id = $report->id;
        $trsk1->school_id = $report->school_id;
        $trsk1->khoi_id = MA_KHOI_NHA_TRE;
        $trsk1->tong_nhom_lop = $sheet->getCell(CELL_TONG_NHOM_LOP_NHA_TRE)->getValue();
        $trsk1->tong_so_tre = $sheet->getCell(CELL_TONG_SO_TRE_NHA_TRE)->getValue();
        $trsk1->so_kham_suc_khoe_dinh_ki = $sheet->getCell(CELL_SO_KHAM_SUC_KHOE_DINH_KY_NHA_TRE)->getValue();
        $trsk1->so_theo_doi_bd_can_nang = $sheet->getCell(CELL_SO_THEO_DOI_BDCN_NHA_TRE)->getValue();
        $trsk1->so_theo_doi_bd_chieu_cao = $sheet->getCell(CELL_SO_THEO_DOI_BDCC_NHA_TRE)->getValue();
        $trsk1->so_SDD_the_nhe_can = $sheet->getCell(CELL_SO_SDD_NHE_CAN_NHA_TRE)->getValue();
        $trsk1->so_SDD_the_thap_coi = $sheet->getCell(CELL_SO_SDD_THAP_COI_NHA_TRE)->getValue();
        $this->save($trsk1);
    }
    
    /**
     * lưu tình trang sức khoẻ của trẻ vào db
     */
    public function saveAllSheet($settings, $sheet, $report, $index, $khoi_id = null) {
            $columns = $settings->where(['table_index' => $index])->toArray();
            $trsk = $this->find()->where(["report_id" => $report->id, "khoi_id" => $khoi_id])->first();
            if (!$trsk) {
                $trsk = $this->newEntity();
            }
            $trsk->report_id = $report->id;
            $trsk->school_id = $report->school_id;
            $trsk->khoi_id = $khoi_id;
            foreach ($columns as $column){
                $trsk[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($trsk);
    }
    

}
