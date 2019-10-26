<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * VisitStateOrderDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitStates
 * @property \Cake\ORM\Association\BelongsTo $VisitStateOrderTypes
 *
 * @method \App\Model\Entity\VisitStateOrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitStateOrderDetailsTable extends Table
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

        $this->table('visit_state_order_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitActs', [
            'foreignKey' => 'visit_act_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('VisitInvoiceItems', [
            'foreignKey' => 'Visit_invoice_item_id',
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
            ->requirePresence('path_order_details', 'create')
            ->notEmpty('path_order_details');

        $validator
            ->requirePresence('additional_details', 'create')
            ->notEmpty('additional_details');

        $validator
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        return $validator;
    }


    /*Trigger Before Marshalinh new Entity*/
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if(isset($data['state-operation']))
        {
                    $additional_details = json_encode($data);
                    $data['created_by'] = $data['manager-id'];
                    $data['path_order_details'] = md5(uniqid(true));
                    $data['additional_details'] = $additional_details;
            
            switch ($data['state-operation']) 
            {

                case 'emergency_end_file':
                    $data['visit_state_order_type_id'] = 3;
                    $data['label'] = 'BILLET SORTIE URGENCES';
                break;

                case 'hospy_file_end':
                    $data['visit_state_order_type_id'] = 4;
                    $data['label'] = 'BILLET SORTIE HOSPITALISATION';
                break;

                case 'reanimation_end_file':
                    $data['visit_state_order_type_id'] = 6;
                    $data['label'] = 'BILLET SORTIE REANIMATION';
                break;

                case 'pregnancy_end_file':
                    $data['visit_state_order_type_id'] = 8;
                    $data['label'] = 'BILLET SORTIE MATERNITE';
                break;

                case 'meo_end_file':
                    $data['visit_state_order_type_id'] = 10;
                    $data['label'] = 'BILLET SORTIE MEO';
                break;

                case 'trauma_end_file':
                    $data['visit_state_order_type_id'] = 12;
                    $data['label'] = 'BILLET SORTIE TRAUMATOLOGIE';
                break;

                case 'surgery_end_file':
                    $data['visit_state_order_type_id'] = 14;
                    $data['label'] = 'BILLET SORTIE CHIRURGIE';
                break;
            }
        }
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
        $rules->add($rules->existsIn(['visit_act_id'], 'VisitActs'));
        $rules->add($rules->existsIn(['visit_invoice_item_id'], 'VisitInvoiceItems'));

        return $rules;
    }
}
