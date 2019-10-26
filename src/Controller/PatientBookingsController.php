<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientBookings Controller
 *
 * @property \App\Model\Table\PatientBookingsTable $PatientBookings
 */
class PatientBookingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Doctors', 'Patients', 'Institutions', 'VisitMeetings']
        ];
        $patientBookings = $this->paginate($this->PatientBookings);

        $this->set(compact('patientBookings'));
        $this->set('_serialize', ['patientBookings']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Booking id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientBooking = $this->PatientBookings->get($id, [
            'contain' => ['Doctors', 'Patients', 'Institutions', 'VisitMeetings']
        ]);

        $this->set('patientBooking', $patientBooking);
        $this->set('_serialize', ['patientBooking']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientBooking = $this->PatientBookings->newEntity();
        if ($this->request->is('post')) {
            $patientBooking = $this->PatientBookings->patchEntity($patientBooking, $this->request->data);
            if ($this->PatientBookings->save($patientBooking)) {
                $this->Flash->success(__('The patient booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient booking could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->PatientBookings->Doctors->find('list', ['limit' => 200]);
        $patients = $this->PatientBookings->Patients->find('list', ['limit' => 200]);
        $institutions = $this->PatientBookings->Institutions->find('list', ['limit' => 200]);
        $visitMeetings = $this->PatientBookings->VisitMeetings->find('list', ['limit' => 200]);
        $this->set(compact('patientBooking', 'doctors', 'patients', 'institutions', 'visitMeetings'));
        $this->set('_serialize', ['patientBooking']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Booking id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientBooking = $this->PatientBookings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientBooking = $this->PatientBookings->patchEntity($patientBooking, $this->request->data);
            if ($this->PatientBookings->save($patientBooking)) {
                $this->Flash->success(__('The patient booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient booking could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->PatientBookings->Doctors->find('list', ['limit' => 200]);
        $patients = $this->PatientBookings->Patients->find('list', ['limit' => 200]);
        $institutions = $this->PatientBookings->Institutions->find('list', ['limit' => 200]);
        $visitMeetings = $this->PatientBookings->VisitMeetings->find('list', ['limit' => 200]);
        $this->set(compact('patientBooking', 'doctors', 'patients', 'institutions', 'visitMeetings'));
        $this->set('_serialize', ['patientBooking']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Booking id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientBooking = $this->PatientBookings->get($id);
        if ($this->PatientBookings->delete($patientBooking)) {
            $this->Flash->success(__('The patient booking has been deleted.'));
        } else {
            $this->Flash->error(__('The patient booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
