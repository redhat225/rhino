<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * VisitInvoicePayments Controller
 *
 * @property \App\Model\Table\VisitInvoicePaymentsTable $VisitInvoicePayments
 */
class VisitInvoicePaymentsController extends AppController
{

    public function viewPayments($visit_invoice_id)
    {
        if($this->request->is('ajax'))
        {
            $payments = $this->VisitInvoicePayments->find('payments',['visit_invoice_id'=>$visit_invoice_id]);

            if($payments)
                echo json_encode($payments->toArray());
            else
                echo "ko";

            exit(); 
        }
        else
        {
         return  $this->redirect($this->referer());
        }

    }

    public function cancelBooking()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        {
          $id = $this->request->data['id'];
          $booking_payment = $this->VisitInvoicePayments->get($id);


          $booking_payment->deleted=new \DateTime('NOW');
          if($this->VisitInvoicePayments->save($booking_payment))
          {

          }
          else
          {
            
          }
          
        }
       
      }
    }

    public function replanPayment()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        {
          $data = $this->request->data;
          $payment = $this->VisitInvoicePayments->get($data['invoice_id_replan'],['contain'=>['VisitInvoicePaymentSchedules']]);
          if($payment)
          {
            $payment->visit_invoice_payment_method_id=$data['payment_way'];
            $payment->visit_invoice_payment_schedule->expected_date=$data['expected_date'];
            $payment->dirty('visit_invoice_payment_schedule',true);
            if($this->VisitInvoicePayments->save($payment,['associated'=>'VisitInvoicePaymentSchedules']))
            {
              //formatted_response

              $date = new \DateTime($payment->visit_invoice_payment_schedule->expected_date);
              $date_formatted = $date->format('d-m-Y');
              $response = [$date_formatted,$data['expected_date'],$data['payment_way']];
              echo json_encode($response);
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
          exit();
        }
      }

    }

    public function soldPayment()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        {
          $data = $this->request->data;

          $payment = $this->VisitInvoicePayments->get($data['get_payment_id'],[
              'contain'=>['VisitInvoicePaymentSchedules','VisitInvoices','VisitInvoices.VisitInterventionDoctors','VisitInvoices.Visits.VisitSpecialities']
            ]);
        

          $payment->state=1;
          $payment->path_payment = $payment->code_payment.".pdf";
          $sold_date = new \DateTime('NOW');
          $payment->visit_invoice_payment_schedule->sold_date = $sold_date->format('Y-m-d H:i:s');
          $payment->formatted_sold_date = $sold_date->format('d-m-Y');

          //flush payment fields concerned
          if(isset($data['amount_receive']))
          {
             $payment->amount_receive =  $data['amount_receive'];
             $payment->reference_payment = $payment->reference_payment."/ Paiement Cash";
             $payment->visit_invoice_payment_method_id=1;
          }
          else
          {
            $payment->amount_receive =  $payment->amount;
            $payment->visit_invoice_payment_method_id=2;
          }

          //count unsolded_payment
          $unsolded = $this->VisitInvoicePayments->find()
                                                 ->where(['visit_invoice_id'=>$payment->visit_invoice_id])
                                                 ->andWhere(['state'=>0])
                                                 ->count();

          if($unsolded==1)
          {
            $payment->visit_invoice->state=1;
            $payment->sold_date = $sold_date->format('Y-m-d H:i:s');
            $payment->visit_invoice->sold_date= $sold_date->format('Y-m-d H:i:s');
          }

          $payment->dirty('visit_invoice_payment_schedule',true);
          $payment->dirty('visit_invoice',true);     

          if($this->VisitInvoicePayments->save($payment,['associated'=>['VisitInvoicePaymentSchedules','VisitInvoices']]))
          {
            //generate the voucher
            $this->loadModel('Institutions');
            $institution = $this->Institutions->find()
                                ->contain(['InstitutionAdresses','CountryTownships.CountryCities'])
                                ->where(['Institutions.id'=>$this->Auth->user('institution_id')])->first();
            $operator = $this->Auth->user();
            $this->set(compact('payment','institution','operator'));
          }
          else
          {
            echo "ko";
            exit();
          }
          
      }
    }

  }



}
