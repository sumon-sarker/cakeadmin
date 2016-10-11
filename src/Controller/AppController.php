<?php

namespace CakeAdmin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController{

	public $CakeAdminUser 		= null;

	public $CakeAdminSettings	= null;

	public function initialize(){
		parent::initialize();
		$this->InitializeAuthentication();
		$this->CheckAuthorization();
		$this->CakeAdminSettings();
	}

	protected function InitializeAuthentication(){
		$this->loadComponent('Auth', [
			'loginAction' => [
				'controller' => 'Users',
				'action' => 'login',
				'plugin' => 'CakeAdmin',
				'prefix'=>false
			],
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'email']
				]
			],
			'storage' => 'Session'
		]);
		/*Allow without Login*/
		$this->Auth->allow(['login','signup','passwordRecovery']);
	}

	protected function redirectToAccessDeny(){
		return $this->redirect([
				'plugin'=>'CakeAdmin',
				'prefix'=>false,
				'controller'=>'users',
				'action'=>'accessDeny'
			]
		);
	}

	protected function CheckAuthorization(){
		$user = $this->Auth->user();
		$this->loadModel('UserGroup');




		if ($user) {
			$prefix = isset($this->request->params['prefix'])? $this->request->params['prefix'] : false;
			switch ($prefix) {
				case 'administrator':
						if ($user['prefix_routing']!='administrator') {
							return $this->redirectToAccessDeny();
						}
					break;
				default:
						$this->GrantAuthorization();
					break;
			}
			/*Public Variable for VIEW*/
			$this->CakeAdminUser = $user;
			$this->set('CakeAdminUser',$user);
		}
	}

	protected function GrantAuthorization(){
		$user = $this->Auth->user();
		/*For Inactive Users*/
		if (!$user['active']) {
			if ($this->request->params['action']!='accessDeny') {
				$this->Flash->error(__('Your account is currently inactive!'));
				return $this->redirect(['prefix'=>false,'controller'=>'users','action'=>'accessDeny']);
			}
		}
		$controller = $this->request->params['controller'];
		$action = $this->request->params['action'];

		if ($this->request->params['action']!='accessDeny') {
			$this->loadModel('UserGroupPermissions');
			$authorised = $this->UserGroupPermissions->find('all')->where([
					'user_group_id'=>$user['user_group_id'],
					'controller'=>$controller,
					'action'=>$action
				])->first();
			if (!$authorised) {
				$this->Flash->error(__('You are not authorized to view!'));
				/*$this->redirect(
					[
						'plugin'=>'CakeAdmin',
						'prefix'=>false,
						'controller'=>'users',
						'action'=>'accessDeny'
					]
				);*/
			}
		}
	}

	protected function CakeAdminSettings(){
		$this->loadModel('Settings');
		$CakeAdminSettings = $this->Settings->find('all')->first();
		$this->CakeAdminSettings = $CakeAdminSettings;
		$this->set(compact('CakeAdminSettings'));
	}
}
