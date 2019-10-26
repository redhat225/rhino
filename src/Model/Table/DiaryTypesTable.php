<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiaryTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Diaries
 *
 * @method \App\Model\Entity\DiaryType get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiaryType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DiaryType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryType findOrCreate($search, callable $callback = null)
 */
class DiaryTypesTable extends Table
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

        $this->table('diary_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Diaries', [
            'foreignKey' => 'diary_type_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
