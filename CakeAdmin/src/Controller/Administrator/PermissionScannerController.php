<?php
namespace CakeAdmin\Controller\Administrator;

use CakeAdmin\Controller\AppController;
use \ReflectionClass;
class PermissionScannerController extends AppController{

    public function index(){
    	$class = new ReflectionClass('CakeAdmin\Controller\Administrator\UsersController');
    	var_dump($class->getMethods());
    }

    public function scan(){
    }

}
