<?php
namespace CakeAdmin\Controller\Administrator;

use CakeAdmin\Controller\AppController;

/**
 * UserGroupPermissions Controller
 *
 * @property \CakeAdmin\Model\Table\UserGroupPermissionsTable $UserGroupPermissions
 */
class UserGroupPermissionsController extends AppController
{

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
        $userGroupPermissions = $this->paginate($this->UserGroupPermissions);

        $this->set(compact('userGroupPermissions'));
        $this->set('_serialize', ['userGroupPermissions']);
    }

    /**
     * View method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => ['UserGroups']
        ]);

        $this->set('userGroupPermission', $userGroupPermission);
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroupPermission = $this->UserGroupPermissions->newEntity();
        if ($this->request->is('post')) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroupPermission = $this->UserGroupPermissions->get($id);
        if ($this->UserGroupPermissions->delete($userGroupPermission)) {
            $this->Flash->success(__('The user group permission has been deleted.'));
        } else {
            $this->Flash->error(__('The user group permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
