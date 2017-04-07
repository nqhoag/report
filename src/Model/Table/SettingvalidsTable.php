<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settingvalids Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Caphocs
 *
 * @method \App\Model\Entity\Settingvalid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Settingvalid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Settingvalid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Settingvalid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Settingvalid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Settingvalid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Settingvalid findOrCreate($search, callable $callback = null, $options = [])
 */
class SettingvalidsTable extends Table
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

        $this->setTable('settingvalids');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Caphocs', [
            'foreignKey' => 'caphoc_id',
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
            ->requirePresence('mapping_table', 'create')
            ->notEmpty('mapping_table');

        $validator
            ->requirePresence('mapping_column', 'create')
            ->notEmpty('mapping_column');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('sheet_index')
            ->requirePresence('sheet_index', 'create')
            ->notEmpty('sheet_index');

        $validator
            ->requirePresence('cell', 'create')
            ->notEmpty('cell');

        $validator
            ->requirePresence('validate', 'create')
            ->notEmpty('validate');

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
        $rules->add($rules->existsIn(['caphoc_id'], 'Caphocs'));

        return $rules;
    }
    
    /**
    
     */
    public function saveSetting($sheets, $caphoc_id)
    {
        foreach ($sheets as $sheet_index => $cells){
            foreach ($cells as $cell_name => $cell){
                $setting = $this->find()->where(['cell' => $cell_name, 'sheet_index' => $sheet_index, 'caphoc_id' => $caphoc_id])->first();
                if(empty($setting)){
                    $setting = $this->newEntity();
                }
                $setting->caphoc_id = $caphoc_id;
                $setting->mapping_table = $cell["mapping_table"];
                $setting->mapping_column = $cell["mapping_column"];
                $setting->type = $cell["type"];
                $setting->sheet_index = $sheet_index;
                $setting->cell = $cell_name;
                $setting->validate = $cell["validate"];
                $this->save($setting);
            }
        }
        
    }
    
    
    public function getSetting($caphoc_id, $sheet_index){
        return $this->find('all')->where(['caphoc_id'=> $caphoc_id, 'type' => SETTING_TYPE_INPUT, 'sheet_index' => $sheet_index])->toArray();
    }
}
