<?php
namespace CakeAdmin\Controller;

use CakeAdmin\Controller\AppController;

class UsersController extends AppController{

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

    public function beforeSave(Event $event){
        /*$entity = $event->data['entity'];
        if ($entity->isNew()) {
            $hasher = (new DefaultPasswordHasher())->hash($entity);
        }
        return true;*/
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

    public function add($steps='add_invalid_step'){
        switch ($steps) {
            case 'step_one':
                    return $this->step_one();
                break;
            case 'step_two':
                    return $this->render('add_step_two');
                break;
            case 'step_three':
                    return $this->render('add_step_three');
                break;
            case 'step_four':
                    return $this->render('add_step_four');
                break;
            
            default:
                    #Keep silent Boss :D
                break;
        }
    }


    protected function step_one(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userGroups'));
        return $this->render('add_step_one');
    }

    /*public function edit($id = null){
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }*/

    public function edit($steps='add_invalid_step'){
        switch ($steps) {
            case 'step_one':
                    return $this->step_one();
                break;
            case 'step_two':
                    return $this->render('add_step_two');
                break;
            case 'step_three':
                    return $this->render('add_step_three');
                break;
            case 'step_four':
                    return $this->render('add_step_four');
                break;
            
            default:
                    #Keep silent Boss :D
                break;
        }
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
