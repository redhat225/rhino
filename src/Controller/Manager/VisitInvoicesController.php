<?php
namespace App\Controller\Manager;	

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * VisitInvoices Controller
 *
 * @property \App\Model\Table\VisitInvoicesTable $VisitInvoices
 */
class VisitInvoicesController extends AppController
{

	/**Index view*/
	public function index()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$this->viewBuilder()->layout('blank');
			}
		}
	}


	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->viewBuilder()->layout('dashboard');

	}

	public function beforeRender(Event $event)
	{
		$this->loadModel('Patients');
		$institution_id = $this->Auth->user('institution_id');
		$patients = $this->Patients->find()->contain(['People']);
		$this->set(compact('institution_id','patients'));	
	}

	public function addVisit()
	{
		if($this->request->is('ajax'))
		{
			$data = $this->request->data;
			$data['manager_operator_id'] = $this->Auth->user('id');
			$data['institution_id'] = $this->Auth->user('institution_id');
			$data['state_visit'] = 'saving_meeting_booking';


			$this->loadModel('Visits');

			$visit = $this->Visits->newEntity($data,[
				'associated'=>['VisitInvoices.VisitInvoicePayments.VisitInvoicePaymentSchedules','VisitInterventionDoctors','VisitInterventionDoctors.PatientBookings','VisitStates','VisitInvoices.VisitInvoiceItems._joinData']
				]);
			//generating invoice_bill/invoice_voucher
				
				if($this->Visits->save($visit))
					{
						//calendar management for->institution->patient->doctor

						if($visit->visit_type_id!='7')
						{

								if($visit->visit_invoice_payment_way_id=='4')
								{
									echo 'ok';
									exit();
								}
								else
								{
									if($data['doctor_id']!=0)
									{
										$this->loadModel('VisitInterventionDoctors');
										$visit_intervention_doctor = $this->VisitInterventionDoctors->get($visit->visit_intervention_doctors[0]->id);
										$visit_intervention_doctor->visit_invoice_id = $visit->visit_invoices[0]->id;
										$this->VisitInterventionDoctors->save($visit_intervention_doctor);
									}
										    //setting value for generating invoice for meeting or booking
										    $this->loadModel('Institutions');
										    $this->loadModel('Patients');
										    $this->loadModel('Doctors');
										    $institution = $this->Institutions->find()
																			->contain(['InstitutionAdresses','CountryTownships.CountryCities'])
																			->where(['Institutions.id'=>$this->Auth->user('institution_id')])->first();
										    $patient = $this->Patients->find()->contain('People')->where(['Patients.id'=>$visit->patient_id])->first();
										    $operator = $this->Auth->user();
										    $this->set(compact('visit','institution','patient','operator'));
								}


						}
						else
						{
							//generate an emergency bill
							$this->loadModel('VisitStates');
							$data['state-operation'] = 'emergency_enter_file';
							$state = $this->VisitStates->get($visit->visit_states[0]->id,['contain'=>'Visits.Patients.People']);
							$data['visit_info'] = $state->visit;
							$state = $this->VisitStates->patchEntity($state,$data,['associated'=>'VisitStateOrderTypes']);
							$state->dirty('visit_state_order_types',true);
							
							if($this->VisitStates->save($state))
							{
								Configure::write('CakePdf',[
								            'engine'=>[
								                    'className' => 'CakePdf.WkHtmlToPdf',
								                    'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
								            ],
								            'pageSize'=>'A5',
								            'orientation' => 'landscape'

								    ]);
									$CakePdf = new \CakePdf\Pdf\CakePdf();
									$CakePdf->template('manager_order_bill_format','generator_orders');

									$CakePdf->viewVars(['credentials'=>$this->Auth->user('person.people_credential'),'data'=>$data,'patient_id'=>$data['patient_id'],'state'=>$state,'institution'=>$this->Auth->user('institution')]);

									$pdf = $CakePdf->output();
									$pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');

									if($pdf)
									{
										$path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
										$path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                						shell_exec('convert -density 300 '.$path.' '.$path_image);
									    echo 'ok';
									}
									else
									{
										echo 'ko';
									}
									exit();
							}
							else
							{
								echo 'ko';
							}

							exit();
						}

					}
				else
					{
						debug($visit);
						echo "ko";
						exit();
					}          
		}
		else
		{
			return $this->redirect($this->referer());
		}
	}

	public function createCustomBill()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('post'))
			{
				$data = $this->request->data;
				//adding a new invoice without specifying the payment way
				$data['state_visit'] = 'saving_new_custom_bill';
				$data['manager-id'] = $this->Auth->user('id');
				$visit_invoice_custom = $this->VisitInvoices->newEntity($data,['associated'=>['VisitInvoiceItems._joinData','VisitActs._joinData']]);
				$visit_invoice = $visit_invoice_custom;
				if($this->VisitInvoices->save($visit_invoice_custom))
				{
					// generate the bill
                     Configure::write('CakePdf',[
                             'engine'=>[
                                        'className' => 'CakePdf.WkHtmlToPdf',
                                        'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
                                        ],
                                    'pageSize'=>'A5',
                                    'orientation' => 'portrait'
                     ]);

                    $CakePdf = new \CakePdf\Pdf\CakePdf();

                    //visit info
                    $visit = $this->VisitInvoices->Visits->find()
                    									 ->contain(['Patients.People','VisitStates'=>function($q){
                    									 	return $q->order(['VisitStates.created'=>'DESC']);
                    									 },'VisitStates.VisitStateTypes'])
                    									 ->where(['Visits.id'=>$visit_invoice->visit_id])
                    									 ->first();

					$CakePdf->template('manager_custom_bill','generator_orders');
					$CakePdf->viewVars(['visit_invoice'=>$visit_invoice,'institution'=>$this->Auth->user('institution'),'visit'=>$visit]);
					$pdf = $CakePdf->output();
					$path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'invoices'.DS.$visit_invoice->path_invoice;
					$pdf = $CakePdf->write($path);
					
					if($pdf)
					{

						$path_image =WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'invoices_images'.DS.$visit_invoice->code_invoice.'-%d.jpg';
						shell_exec('convert -density 150 '.$path.' '.$path_image);
						
						//saving order details custom
						if(isset($data['label_custom_bill']))
						{
							$this->loadModel('VisitInvoiceDetails');
							$data['new_visit_invoice_id'] = $visit_invoice_custom->id;
							$data_details = $this->marshal_invoice_custom($data);
							$visit_order_details = $this->VisitInvoiceDetails->newEntities($data_details);
							if($this->VisitInvoiceDetails->saveMany($visit_order_details))
							{
								echo 'ok';
							}
							else
							{
								echo 'ko';
							}
						}
						else
						{
							echo 'ok';	
						}

					}
					else
					{
						echo 'ko';
					}

				}
				else
				{
					echo 'ko';
				}
				exit();
			}

		}
	}

	private function marshal_invoice_custom($marshaling_data)
	{
		$data = [];
		$length = count($marshaling_data['label_custom_bill']);
		for ($i=0; $i<$length; $i++) 
		{
			$row_entity = [
				'qty'=> $marshaling_data['qte_custom_item'][$i] ,
				'amount'=> $marshaling_data['unit_price_custom_item'][$i] ,
				'details'=> $marshaling_data['label_custom_bill'][$i].' ('.$marshaling_data['label_type_custom_bill'][$i].') '.$marshaling_data['description_custom_bill'][$i],
				'visit_invoice_id'=> $marshaling_data['new_visit_invoice_id'] 
			];
			array_push($data,$row_entity);
		}
		return $data;
	}

	//range Amount 

	public function rangeAmount()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$range = $this->VisitInvoices->find()
											 ->contain(['Visits.ManagerOperators'])
											 ->where(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')])
											 ->select(['max'=>'max(VisitInvoices.amount)','min'=>'min(VisitInvoices.amount)'])
											 ->map(function($row){
											 		$row->min = (int) $row->min;
											 		$row->max = (int) $row->max;
											 		return $row;
											 });
				if($range)
				{
					echo json_encode($range);
				}
				else
				{
					echo 'ko';
				}
				exit();
			}
		}
	}

	//loading monthly solded invoices
	public function getMonthlySolded()
	{
		$paid_invoices = $this->VisitInvoices->find('monthlyPaid');
			if($paid_invoices->isEmpty())
			{
				echo "none";
			}
			else
			{
				//formatting response
				foreach ($paid_invoices as $paid_invoice) {
					$paid_invoice->format_amount = number_format($paid_invoice->amount,2,',','.');

					    $countdown=0;                                             
                        $search = true;

                        while($search) 
                        {
                           if(file_exists(WWW_ROOT."Files/manager/".$paid_invoice->manager_operator->institution->slug."/invoices_images/".$paid_invoice->code_invoice.'-'.$countdown.'.jpg'))
                            {
                                $countdown++;
                            }
                            else
                            {
                                $search = false;
                                $paid_invoice->invoices_images = $countdown;
                            }
                                                            
                        }
				}
				
				echo json_encode($paid_invoices->toArray());
			}
		exit();
	}

	//loading monthly unsolded invoices
	public function getMonthlyUnsolded()
	{
		$unpaid_invoices = $this->VisitInvoices->find('monthlyUnpaid');
			if($unpaid_invoices->isEmpty())
			{
				echo "none";
			}
			else
			{
				foreach ($unpaid_invoices as $unpaid_invoice) {
					$unpaid_invoice->format_amount = number_format($unpaid_invoice->amount,2,',','.');

						$countdown=0;                                             
                        $search = true;

                        while($search) 
                        {
                           if(file_exists(WWW_ROOT."Files/manager/".$unpaid_invoice->manager_operator->institution->slug."/invoices_images/".$unpaid_invoice->code_invoice.'-'.$countdown.'.jpg'))
                            {
                                $countdown++;
                            }
                            else
                            {
                                $search = false;
                                $unpaid_invoice->invoices_images = $countdown;
                            }
                                                            
                        }
				}
				echo json_encode($unpaid_invoices->toArray());
			}
		exit();
	}

	//download invoice
	public function getPdfInvoice($invoice_id)
	{
		$invoice = $this->VisitInvoices->find()
											 ->where(['id'=>$invoice_id])
											->select(['path_invoice'])
											->first();

		$this->loadModel('Institutions');
		$institution = $this->Institutions->find()->select(['slug'])->where(['id'=>$this->Auth->user('institution_id')])->first();
		$this->response->file('Files'.DS.'manager'.DS.$institution->slug.DS.'invoices'.DS. $invoice->path_invoice,['download'=>true]);
		return $this->response;
	}

	//showing meeting voucher
	public function showMeetingVoucher($meeting_voucher_id)
	{
		$invoice = $this->VisitInvoices->VisitInvoicePayments->find()
											 ->where(['id'=>$meeting_voucher_id])
											->select(['path_payment'])
											->first();
		$this->loadModel('Institutions');
		$institution = $this->Institutions->find()->select(['slug'])->where(['id'=>$this->Auth->user('institution_id')])->first();
		$this->response->file('Files'.DS.'manager'.DS.$institution->slug.DS.'vouchers'.DS. $invoice->path_payment);
		return $this->response;
	}

	//showing saved meeting invoice
	public function showMeetingInvoice($meeting_invoice_id)
	{
		$invoice = $this->VisitInvoices->find()
											 ->where(['id'=>$meeting_invoice_id])
											->select(['path_invoice'])
											->first();
		$this->loadModel('Institutions');
		$institution = $this->Institutions->find()->select(['slug'])->where(['id'=>$this->Auth->user('institution_id')])->first();
		$this->response->file('Files'.DS.'manager'.DS.$institution->slug.DS.'invoices'.DS.$invoice->path_invoice);
		return $this->response;
	}

		public function all()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				if(isset($this->request->query['specific-search']))
				{
					$query = $this->request->query;
					switch($query['specific-search'])
					{
						case'amount':
							$invoices = $this->VisitInvoices->find('entireByAmountAll',['min'=>$query['min'],'max'=>$query['max']]);
						break;

						case 'date':
							$invoices = $this->VisitInvoices->find('entireByDateAll',['date-from'=>$query['date-from'],'date-to'=>$query['date-to']]);
						break;
					}
				}
				else
				{
					$invoices = $this->VisitInvoices->find('entire');
				}
				
					   
				if($invoices)
				{
					if(!$invoices->isEmpty())
					{
						foreach ($invoices as $invoice) {
							$invoice->amount_unformatted = $invoice->amount;
							$invoice->amount=number_format($invoice->amount,2,',','.');
						}
						echo json_encode($invoices->toArray());
					}
					else
					{
						echo "ko";
					}

				}
				else
				{
					echo "ko";
				}
			}
			exit();
		}
	}


	public function get()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$invoices = $this->VisitInvoices->find('single',['id-bill'=>$this->request->query['id-bill'],'institution_id'=>$this->Auth->user('institution_id')]);
					   
				if($invoices)
				{
					if(!$invoices->isEmpty())
					{
						foreach ($invoices as $invoice) {
							$invoice->amount=number_format($invoice->amount,2,',','.');
						}

						foreach ($invoice->visit_invoice_payments as $payment) {
							$payment->amount=number_format($payment->amount,2,',','.');
						}

						echo json_encode($invoices);
					}
					else
					{
						echo "ko";
					}

				}
				else
				{
					echo "ko";
				}
			}
			exit();
		}
	}

	public function settingVisitPaymentMode()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$query_data = $this->request->query;
				$amount = $query_data['amount'];
				$visit_invoice_id = $query_data['visit_invoice_id'];
				$type = $query_data['type'];
				

				$this->set(compact('amount','type','visit_invoice_id'));

				switch($query_data['type'])
				{
					case 'cash':
						$this->render('setting_payment_mode_visit_cash');	
					break;

					case 'cb':
						$this->render('setting_payment_mode_visit_cb');	
					break;

					case 'insurance':
						$now = new \DateTime();
						$patient_id = $query_data['id-patient'];
						$this->loadModel('PatientInsurances');
						$insurances = $this->PatientInsurances->find()
																  ->contain(['PatientInsurers'])
																  ->where(['patient_id'=>$patient_id])
																  ->andWhere(function($exp,$q){
																  		return $exp->isNull('deleted');
																  })
																  ->andWhere(['PatientInsurances.state'=>1,'PatientInsurances.expired_insurance_date > '=>$now]);
						$this->set(compact('insurances','patient_id'));
						$this->render('setting_payment_mode_visit_insurance');	
					break;
				}


				// exit();
			}

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$visit_invoice = $this->VisitInvoices->get($data['visit_invoice_id'],['contain'=>'Visits.Patients.People']);
				$data['state_visit'] = 'setting_payment_mode_visit_invoice';

				$visit_invoice->dirty('visit_invoice_payments.visit_invoice_payment_schedules',true);
				$visit_invoice = $this->VisitInvoices->patchEntity($visit_invoice,$data,['associated'=>['VisitInvoicePayments.VisitInvoicePaymentSchedules']]);

				//voucher configuration 
				Configure::write('CakePdf',[
					  'engine'=>[
						'className' => 'CakePdf.WkHtmlToPdf',
						'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
					  ],
					  'pageSize'=>'A7',
					  'orientation' => 'portrait',
					  'margin'=>[
						  'top'=>1,
						  'bottom'=>1,
						  'left'=>0,
						  'right'=>0
					  ]
				]);

				$CakePdf = new \CakePdf\Pdf\CakePdf();
				$CakePdf->template('manager_voucher_custom_bill_file','generator_orders');

				$procedure = true;
						switch($data['type'])
						{
							case 'cash':
								$visit_invoice->state = 1;
								$visit_invoice->visit_invoice_payment_way_id = 1;
								$visit_invoice->sold_date = new \DateTime();
								//generate voucher
								
								$CakePdf->viewVars(['data'=>$data,'visit_invoice'=>$visit_invoice,'institution'=>$this->Auth->user('institution'),'manager'=>$this->Auth->user()]);

								$pdf = $CakePdf->output();

								$path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'vouchers'.DS.$visit_invoice->visit_invoice_payments[0]->path_payment;
								$pdf = $CakePdf->write($path);
								if($pdf)
								{
									$path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'vouchers_images'.DS.$visit_invoice->visit_invoice_payments[0]->code_payment.'-%d.jpg';
									shell_exec('convert -density 150 '.$path.' '.$path_image);
								}
								else
								{
									$procedure = false;
								}
							break;

							case 'cb':
								$visit_invoice->state = 0;
								$visit_invoice->visit_invoice_payment_way_id = 2;
							break;

							case 'insurance':
								$visit_invoice->state = 0;
								$visit_invoice->visit_invoice_payment_way_id = 3;
								//generate voucher when coverage < 100% 
								if($visit_invoice->perc_insurance_setting_mode!=100)
								{
									$CakePdf->viewVars(['data'=>$data,'visit_invoice'=>$visit_invoice,'institution'=>$this->Auth->user('institution'),'manager'=>$this->Auth->user()]);

									$pdf = $CakePdf->output();
									$path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'vouchers'.DS.$visit_invoice->visit_invoice_payments[0]->path_payment;
									$pdf = $CakePdf->write($path);
									
									$path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'vouchers_images'.DS.$visit_invoice->visit_invoice_payments[0]->code_payment.'-%d.jpg';

									if($pdf)
									{
									 shell_exec('convert -density 200 '.$path.' '.$path_image);
									}
									else
									{
									 $procedure = false;
									}
								}			
							break;
					}

					if($procedure)
					{	
						if($this->VisitInvoices->save($visit_invoice))
									echo 'ok';
								else
									echo 'ko';	
					}
					else
					{
						echo 'down';
					}
			exit();
		}	
	}
}

	public function allByDate()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$data = $this->request->query;
				$invoices = $this->VisitInvoices->find('entireByDate',['begin'=>$data['begin-date-filter-bills'],'end'=>$data['end-date-filter-bills']]);
			   
				if($invoices)
				{
					if($invoices->isEmpty())
					{
						echo "ko";
					}
					else
					{
						foreach ($invoices as $invoice) {
							$invoice->amount=number_format($invoice->amount,2,',','.');
						}
						echo json_encode($invoices->toArray());
					}

				}
				else
				{
					echo "ko";
				}
			}
			exit();
		}
	}

	public function allByAmount()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$data = $this->request->query;
				$invoices = $this->VisitInvoices->find('entireByAmount',['min'=>$data['min'],'max'=>$data['max']]);
			   
				if($invoices)
				{
					if($invoices->isEmpty())
					{
						echo "ko";
					}
					else
					{
						foreach ($invoices as $invoice) {
							$invoice->amount=number_format($invoice->amount,2,',','.');
						}
						echo json_encode($invoices->toArray());
					}

				}
				else
				{
					echo "ko";
				}
			}
			exit();
		}
	}

	//change payment mode (only-reservation cash -> insurance cover)
	public function changePaymentMode()
	{
		if($this->request->is('ajax'))
		{
			if($this->request->is('get'))
			{
				$query_data = $this->request->query;
				$patient_id = $query_data['id-patient'];


				switch ($query_data['type']) 
				{
					case 'insurance':
							$actual_date = new \DateTime();
							$now = $actual_date->format('Y-m-d');
							$this->loadModel('PatientInsurances');
							$insurances = $this->PatientInsurances->find()
																  ->contain(['PatientInsurers'])
																  ->where(['patient_id'=>$patient_id])
																  ->andWhere(function($exp,$q){
																  		return $exp->isNull('deleted');
																  })
																  ->andWhere(['PatientInsurances.state'=>1,'PatientInsurances.expired_insurance_date > '=>$now]);


							if($insurances)
							{
								$this->set(compact('insurances'));
								$this->render('change_payment_mode_insurance');
							}	
							else
							{
								echo 'down';
								exit();
							}
					break;

					case 'cash':
						    $this->render('change_payment_mode_cash');
					break;

					case 'cb':
						    $this->render('change_payment_mode_cb');
					break;
				}

				
			}

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->loadModel('Visits');
				$this->loadModel('VisitStates');
				$visit = $this->Visits->get($data['id-bill'],['contain'=>['VisitSpecialities','VisitInterventionDoctors.Doctors.People','VisitStates']]);
				$data['state_visit'] = 'change_payment_mode_booking';
				$visit->visit_states[0]->state_end = new \DateTime('NOW');
				//setting a new state

                //change the state from reservation to consultation
                $data_state=[
                	'state_begin'=> new \DateTime('NOW'),
                    'visit_level_id' => 1,
                    'visit_kind_transport_id' =>1,
                    'visit_authorized' => true,
                    'visit_state_type_id' => 1
                ];
                $visit_state = $this->VisitStates->newEntity($data_state);

                array_push($visit->visit_states,$visit_state);

				$data['manager_operator_id'] = $this->Auth->user('id');

				switch($data['type'])
				{
					case 'insurance':
						$data['kind_solvment']='insurance';
						$visit->perc_insurance = $data['perc_insurance_change_mode'];
					break;

					case 'cash':
						$data['kind_solvment']='cash';
						$visit->montant = $data['amount_cash_booking_mode'];
					break;


					case 'cb':
						$data['kind_solvment']='cb';
						$visit->bank_reference = $data['bank_reference_change_mode'];

					break;
				}

				$visit = $this->Visits->patchEntity($visit,$data,['associated'=>'VisitInvoices.VisitInvoicePayments.VisitInvoicePaymentSchedules','VisitStates']);
				$visit->dirty('visit_invoices',true);
				$visit->dirty('visit_invoices.visit_invoice_payments',true);
				$visit->dirty('visit_states',true);

				if($this->Visits->save($visit))
				{
					$this->loadModel('VisitInterventionDoctors');
							$visit_intervention_doctor = $this->VisitInterventionDoctors->get($visit->visit_intervention_doctors[0]->id);
							$visit_intervention_doctor->visit_invoice_id = $visit->visit_invoices[0]->id;

							if($this->VisitInterventionDoctors->save($visit_intervention_doctor))
							{
								$this->loadModel('Institutions');
								$this->loadModel('Patients');
								$institution = $this->Institutions->find()
																				->contain(['InstitutionAdresses','CountryTownships.CountryCities'])
																				->where(['Institutions.id'=>$this->Auth->user('institution_id')])->first();
								$patient = $this->Patients->find()->contain('People')->where(['Patients.id'=>$data['id-patient']])->first();
								$operator = $this->Auth->user();
								$visit->search_doctor = $visit->visit_intervention_doctors[0]->doctor->person->lastname.' '.$visit->visit_intervention_doctors[0]->doctor->person->firstname;
								$visit->search_speciality=$visit->visit_speciality->libelle;
								$visit->visit_type_id = 1;
								$visit->visit_invoice_payment_way_id=$visit->visit_invoices[0]->visit_invoice_payment_way_id;
								$this->set(compact('visit','institution','patient','operator'));					
								$this->render('add_visit');
							}
							else
							{
								echo 'ko';
								exit();
							}

				}
				else
				{
					echo 'ko';
					exit();
				}
				exit();
			}
		}
	}


}
