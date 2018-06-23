<?php

class CustomersController extends AppController {
    public $helpers = array('Html','Form','Js');
    public $components = array('Session','RequestHandler');

    public function index() {
        $this->set('customers',$this->Customer->find('all'));
        //$this->layout = 'Contacts\index';
    }

    public function add() {

        /*if($this->request->is('post')) {
            #pr($this->request->data); die();
        }*/
        if($this->request->is('ajax')) {
            #pr($this->request->data); die();
            $this->Customer->create();
            $this->Customer->saveAll($this->request->data);
        }
    }

    public function view($id) {
        if (!$id) {
            echo "Customer not found!";
        }
        $customer = $this->Customer->findById($id);
        #pr($customer); die();
        if (!$customer) {
            echo "Customer not found!";
        }
        $this->set('customer', $customer);
    }

    public function edit($id) {
        if(!$id) {
            $this->Session->setFlash('Customer not found!');
        }
        $customer = $this->Customer->findById($id);
        #pr($customer); die();
        if(!$customer) {
            $this->Session->setFlash('Customer not found!');
        }
        if($this->request->is(array('post','put'))) {
            $this->Customer->id = $id;
            if($this->Customer->save($this->request->data)) {
                $this->Session->setFlash('Customer Updated!');
                return $this->redirect(array('action'=>'index'));
            }
            else {
                $this->Session->setFlash('Sorry, Unable to update customer!');
            }
        }
        if(!$this->request->data) {
            $this->request->data = $customer;
        }
    }

    public function delete($id) {
        if($this->Customer->delete($id)) {
            $this->Session->setFlash('Customer Deleted!');
        }
        else {
            $this->Session->setFlash('Could not be deleted!');
        }
        return $this->redirect(array('action'=>'index'));
    }
}



?>