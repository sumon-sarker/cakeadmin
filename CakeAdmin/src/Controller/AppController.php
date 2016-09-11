<?php

namespace CakeAdmin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController{
	public function initialize(){
		parent::initialize();

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

		/*Grant User for Prefix*/
		$this->GrantPrefixPermission();
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
			$this->set('CurrentLoggedInUser',$user);
		}
	}
}
