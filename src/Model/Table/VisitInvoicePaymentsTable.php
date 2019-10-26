<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
/**
 * VisitInvoicePayments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoices
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoicePaymentMethods
 *
 * @method \App\Model\Entity\VisitInvoicePayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePayment findOrCreate($search, callable $callback = null)
 */
class VisitInvoicePaymentsTable extends Table
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

        $this->table('visit_invoice_payments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitInvoices', [
            'foreignKey' => 'visit_invoice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitInvoicePaymentMethods', [
            'foreignKey' => 'visit_invoice_payment_method_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('VisitInvoicePaymentSchedules',[
                'foreignKey' => 'visit_invoice_payment_id'
            ]);
    }
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {

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
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->datetime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->decimal('amount_receive')
            ->requirePresence('amount_receive', 'create')
            ->notEmpty('amount_receive')
            ->add('amount_receive','comparison',[
                    'rule' => function($value,$context){
                        if($value===0)
                            return true;
                        else
                        {
                            if($value<$context['data']['amount'])
                              return false;
                             else
                              return true;
                        }
                    },
                    'message' => 'la valeur versée est inférieure au montant du rdv'
                ]);

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
        $rules->add($rules->existsIn(['visit_invoice_id'], 'VisitInvoices'));
        $rules->add($rules->existsIn(['visit_invoice_payment_method_id'], 'VisitInvoicePaymentMethods'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        if($entity->isNew())
        {

        }
        else
        {
          //verifying amount receive
          if($entity->dirty('amount_receive'))
          {
            if(($entity->amount_receive)<($entity->amount))
            {
              return false;
            }

            //create a new DiaryToken object if its solding a booking patient
            // if($entity->visit_invoice->visit_invoice_payment_way_id==4)
            // {
            //   $DiaryTokens = TableRegistry::get('DiaryTokens');
            //   $data=[
            //     'doctor_id_setting_privilege'=>$entity->visit_invoice->visit_meeting->doctor_id,
            //     'validity'=>1,
            //     'patient_id'=>$entity->visit_invoice->visit_meeting->patient_id
            //   ];
            //   $diary_token = $DiaryTokens->newEntity($data);
            //   //abort the last diary for the same doctor and patient if not expired
            //   $last_active_diary_token = $DiaryTokens->find('activeToken',['doctor_id'=>$data['doctor_id_setting_privilege'],'patient_id'=>$data['patient_id']])->last();
              
            //   $already = false;
            //   if($last_active_diary_token)
            //   {
            //           if($last_active_diary_token->result==="-")
            //               $already = true;
            //   }

            //   if($already)
            //   {
            //     //abort the last diary_token and save the new diary_token
            //       $last_active_diary_token->abort=1;
            //       if(!$DiaryTokens->save($last_active_diary_token))
            //         return false;
            //   }

            //   if(!$DiaryTokens->save($diary_token))
            //     return false;

            // }
          }
    }

  }

    public function findPayments(Query $query, array $options)
    {
      return $query->contain(['VisitInvoicePaymentSchedules','VisitInvoices.ManagerOperators.Institutions'])
                                                   ->where(['visit_invoice_id'=>$options['visit_invoice_id']])
                                                   ->select(['formatted_created_invoice'=>'DATE_FORMAT(VisitInvoicePayments.created,"%d-%m-%Y %H:%i:%s")','formatted_sold_date'=>'DATE_FORMAT(VisitInvoicePaymentSchedules.sold_date,"%d-%m-%Y %H:%i:%s")','formatted_exp_date'=>'DATE_FORMAT(VisitInvoicePaymentSchedules.expected_date,"%d-%m-%Y")','formatted_eng_exp_date'=>'DATE_FORMAT(VisitInvoicePaymentSchedules.expected_date,"%Y-%m-%d")'
                                                    ])
                                                   ->distinct(['VisitInvoicePayments.id'])
                                                   ->autoFields(true)
                                                   ->map(function($row){
                                                        $countdown = 0;
                                                        
                                                        $search = true;

                                                        while($search) 
                                                        {
                                                            if(file_exists(WWW_ROOT."Files/manager/".$row->visit_invoice->manager_operator->institution->slug."/vouchers_images/".$row->code_payment.'-'.$countdown.'.jpg'))
                                                            {
                                                                $countdown++;
                                                            }
                                                            else
                                                            {
                                                                $search = false;
                                                                $row->voucher_image_count = $countdown;
                                                            }
                                                            
                                                        }
                                                        
                                                        return $row;

                                                   });
    }

}
