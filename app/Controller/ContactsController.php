<?php

class ContactsController extends AppController {
    public $helpers = array('Html','Form','Js' => array('Jquery'));
    public $components = array('Session','RequestHandler');

    public function index() {
        $contacts = $this->Contact->find('all',array(
            'contain' => 'Customer'
        ));
        $this->set('contacts',$contacts);
        #pr($contacts); die();
    }



    public function add() {

        if($this->request->is('ajax')) {
            #pr($this->request->data); die();
            $this->Contact->saveAll($this->request->data);
        }
    }



    public function edit($id) {

        if($this->request->is('ajax')) {
            #pr($this->request->data); die();
            $this->Contact->saveAll($this->request->data);
        }

        /*$contact=$this->Contact->findById($id);
        pr($contact); die();
        if (!$contact) {
            echo "Contact not found!";
        }
        if($this->request->is(array('ajax'))) {
            $this->Contact->id = $id;
            if($this->Contact->saveAll($this->request->data)) {
                $this->Session->setFlash('Contact information is updated');
                $this->redirect('index');
            }
        }
        $this->request->data = $contact;*/
    }

    public function delete($id) {
        if ($this->Contact->delete($id)) {
            $this->Session->setFlash('Contact has been deleted!');
        }
        else {
            $this->Session->setFlash('Unable to delete!');
        }
        $this->redirect('index');
    }
}


?>