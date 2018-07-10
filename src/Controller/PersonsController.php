<?php
namespace App\Controller;

use App\Controller\AppController;

class PersonsController extends AppController
{

    public function index()
    {
      $this->set('persons', $this->Persons->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $person = $this->Persons->newEntity();
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function edit($id = null)
    {
      $person = $this->Persons->get($id);
      if ($this->request->is(['post', 'put'])) {
          $person = $this->Persons->patchEntity($person, $this->request->getData());
          if ($this->Persons->save($person)) {
              return $this->redirect(['action' => 'index']);
          }
      } else {
          $this->set('person', $person);
      }
    }

    public function delete($id = null)
    {
      $person = $this->Persons->get($id);
      if ($this->request->is(['post', 'put'])) {
        if ($this->Persons->delete($person)) {
            return $this->redirect(['action' => 'index']);
        }
      } else {
        $this->set('person', $person);
      }
    }

    public function find() {
      $this->set('msg', null);
      if ($this->request->is('post')) {
        $find = $this->request->getParam('find');
        $first = $this->Persons->find()
            ->limit(1)
            ->where(["name like " => '%' . $find . '%']);
        $persons = $this->Persons->find()
            ->offset(0)
            ->limit(4)
            ->where(["name like " => '%' . $find . '%']);
        $this->set('msg', $first->first()->name . ' is first data.');
      } else {
        $persons = [];
      }
      $this->set('persons', $persons);
    }


}
