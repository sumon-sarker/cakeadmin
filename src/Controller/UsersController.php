<?php
namespace CakeAdmin\Controller;

use CakeAdmin\Controller\AppController;
use Cake\Utility\Text;
use Cake\Mailer\Email;
use Cake\Routing\Router;

class UsersController extends AppController{

    public function signup(){
        $this->ViewBuilder()->layout('login');

        if ($this->Auth->user()) {
            $this->Flash->error(__('Permission not allowed!'));
            return $this->redirect(['controller'=>'users','action'=>'accessDeny']);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['new_password'])) {
                $this->request->data['password'] = $this->request->data['new_password'];
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You have successfully signup!.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $UserGroups = $this->Users->UserGroups->find('list')->where(['UserGroups.allow_registration'=>1]);
        $this->set(compact('user','UserGroups'));
    }

    public function passwordRecovery(){
        $this->ViewBuilder()->layout('login');
        if ($this->request->is('post')) {
            if(isset($this->request->data['email'])){
                $email = $this->request->data['email'];
                $user = $this->Users->findByEmail($email)->first();
                if ($user) {
                    $password_recover_token = sha1(Text::uuid());
                    $user = $this->Users->patchEntity($user,['password_recover_token'=>$password_recover_token]);
                    if ($this->Users->save($user)) {
                        $url = Router::url(['plugin'=>'CakeAdmin','controller'=>'users','action'=>'newPassword'],true);
                        $url = $url . DS . $user->email . DS . $password_recover_token;
                        /*Sent recovery link*/
                        $email = new Email('default');
                        $email->from([$this->CakeAdminSettings->site_email => $this->CakeAdminSettings->site_title])
                            ->to($user->email)
                            ->subject('Password recovery')
                            ->send($url);
                        $this->Flash->success(__('Recovery email sent to your email address! Please check your email.'));
                        return $this->redirect(['controller'=>'users','action'=>'login']);
                    }
                    return $this->redirect(['controller'=>'users','action'=>'login']);
                }else{
                    $this->Flash->error(__('Email address not found in the system!'));
                }
            }else{
                $this->Flash->error(__('Invalid email address!'));
            }
        }
    }

    public function login(){
        $this->ViewBuilder()->layout('login');

        if ($this->Auth->user()) {
            $this->Flash->error(__('Permission not allowed!'));
            return $this->redirect(['controller'=>'users','action'=>'accessDeny']);
        }

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
            /*Add Password field*/
            $this->request->data['password'] = $this->request->data['new_password'];

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password has been updated.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Password could not be update. Please, try again.'));
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
