<?php
namespace Auth\Controller;

use Auth\Controller\AppController;

class UsersController extends AppController
{
    public function login($action = null)
    {
        if ($this->request->is('post') or isset($this->request->query['code'])) {
            $user = $this->Auth->identify();
            
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            if (isset($this->request->query['code'])) {
                return $this->redirect(['action'=>'add']);
            }
            unset($this->request->data['password']);
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect('/');
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is(['post', 'put'])) {
            if (isset($this->request->data['admin'])) {
                unset($this->request->data['admin']);
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            return $this->redirect('/users/login');
        }

        $form = null;
        if ($this->request->session()->check('face_user')) {

            $data = $this->request->session()->read('face_user');
            $this->request->session()->delete('face_user');
            $form = $this->Users->newEntity();

            if (isset($data['name'])) {
                $form->name = $data['name'];
            }

            if (isset($data['email'])) {
                $form->email = $data['email'];
            }
        }
        $this->set(['form'=>$form]);
    }
}
