<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ketnoiinternets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\Ketnoiinternet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ketnoiinternet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ketnoiinternet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ketnoiinternet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ketnoiinternet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ketnoiinternet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ketnoiinternet findOrCreate($search, callable $callback = null, $options = [])
 */
class KetnoiinternetsTable extends Table
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

        $this->setTable('ketnoiinternets');
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
            ->integer('nha_mang')
            ->requirePresence('nha_mang', 'create')
            ->notEmpty('nha_mang');

        $validator
            ->integer('tong_so_may')
            ->requirePresence('tong_so_may', 'create')
            ->notEmpty('tong_so_may');

        $validator
            ->integer('cn_ADSL')
            ->requirePresence('cn_ADSL', 'create')
            ->notEmpty('cn_ADSL');

        $validator
            ->integer('cn_cap_quang')
            ->requirePresence('cn_cap_quang', 'create')
            ->notEmpty('cn_cap_quang');

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
            $model = $this->find()->where(["report_id" => $report->id, "nha_mang" => $index])->first();
            if (!$model) {
                $model = $this->newEntity();
            }
            $model->report_id = $report->id;
            $model->nha_mang = $index;
            foreach ($columns as $column){
                $model[$column["mapping_column"]] = $sheet->getCell($column["cell"])->getValue();
            }
            $this->save($model);
    }
}
