<?php

namespace CakeAdmin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController{

	public $CakeAdminUser 		= null;

	public $CakeAdminSettings	= null;

	public function initialize(){
		parent::initialize();
		$this->InitializeAuthentication();
		$this->GrantPrefixPermission();
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

	protected function GrantPrefixPermission(){
		$user = $this->Auth->user();
		if ($user) {
			$prefix = isset($this->request->params['prefix'])? $this->request->params['prefix'] : false;
			if ($prefix=='administrator' && $user['prefix_routing']!='administrator') {
				$this->redirect(
					[
						'plugin'=>'CakeAdmin',
						'prefix'=>false,
						'controller'=>'users',
						'action'=>'accessDeny'
					]
				);
			}
			/*Public Variable for VIEW*/
			$this->CakeAdminUser = $user;
			$this->set('CakeAdminUser',$user);
			/*For Inactive Users*/
			if (!$user['active']) {
				if ($this->request->params['action']!='accessDeny') {
					$this->Flash->error(__('Your account is currently inactive!'));
					return $this->redirect(['prefix'=>false,'controller'=>'users','action'=>'accessDeny']);
				}
			}
		}
	}

	protected function CakeAdminSettings(){
		$this->loadModel('Settings');
		$CakeAdminSettings = $this->Settings->find('all')->where(['Settings.settings_title'=>'site_config'])->first();
		$this->set(compact('CakeAdminSettings'));
	}
}
