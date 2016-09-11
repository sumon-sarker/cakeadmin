<?php
namespace CakeAdmin\Controller;

use CakeAdmin\Controller\AppController;

/**
 * Users Controller
 *
 * @property \CakeAdmin\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups', 'LoginTokens', 'UserLogs']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
