<?php
namespace CakeAdmin\Controller;

use CakeAdmin\Controller\AppController;

class UsersController extends AppController{

    public function signup(){
        $this->ViewBuilder()->layout('login');
    }

    public function passwordRecovery(){
        $this->ViewBuilder()->layout('login');
    }

    public function login(){
        $this->ViewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $users  = $this->Users->find(
                    'all',
                    [
                        'contain'=>[
                            'UserGroups'
                        ]
                    ])->where(['Users.id'=>$user['id']])->first();

                $user['prefix_routing'] = false;
                if ($users->user_group->plugin_prefix) {
                    $user['prefix_routing'] = $users->user_group->plugin_prefix;
                }

                $redirectUrl = [
                    'prefix'=>$user['prefix_routing'],
                    'controller'=>'users',
                    'action'=>'dashboard',
                ];
                
                $this->Auth->setUser($user);
                $this->Flash->success(__('You have successfully logged in!'));
                return $this->redirect($redirectUrl);
            } else {
                $this->Flash->error(__('Username or password is incorrect'), [
                'key' => 'auth'
                ]);
            }
        }
    }

    public function logout(){
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function accessDeny(){
        
    }

    public function dashboard(){
        $totalUsers     = $this->Users->find('all')->count();
        $activeUsers    = $this->Users->find('all',
            [
                'conditions'=>[
                    'Users.active'=>1
                ]
            ])->count();
        $inactiveUsers    = $this->Users->find('all',
            [
                'conditions'=>[
                    'Users.active'=>0
                ]
            ])->count();

        $this->set(compact('totalUsers','activeUsers','inactiveUsers'));
    }

    public function index(){
        $this->dashboard();
        $this->render('dashboard');
    }

    public function profile($id = null){
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function editInformations(){
        $user = $this->Auth->user();
        $user = $this->Users->get($user['id'], [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Information has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Information could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changeEmail(){
        $user = $this->Auth->user();
        $user = $this->Users->get($user['id'], [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changePassword(){
        $user = $this->Auth->user();
        $user = $this->Users->get($user['id'], [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Password could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changePicture(){
        $user = $this->Auth->user();
        $user = $this->Users->get($user['id'], [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function settings(){
        $user = $this->Auth->user();
        $user = $this->Users->get($user['id'], [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Settings has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Settings could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

}
