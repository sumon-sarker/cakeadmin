<?php
namespace CakeAdmin\Controller\Administrator;

use CakeAdmin\Controller\AppController;
use ReflectionClass;

class PermissionScannerController extends AppController{

	public $controllerPath = APP . 'Controller';

	public $skipControllers = [
		'App'
	];

    public $skipActions =[
        'initialize',
        'beforeRender',
        'beforeSave',
        'beforeFilter'
    ];


    public function initialize(){
        parent::initialize();
        $this->loadModel('UserGroupPermissions');
        $this->loadModel('UserGroups');
    }

    public function index(){
        $UserGroupPermissions   = $this->UserGroupPermissions();
        $UserGroupsID           = $this->UserGroupsID();

        $this->controllerPath = '/var/www/html/personal/cakeadmin/plugins/CakeAdmin/src/Controller/Administrator';

    	$classFiles = scandir($this->controllerPath);
    	$classes 	= $this->scanFiles($classFiles);

        $NewControllerActions = [];

        if (!empty($classes)) {
            foreach ($classes as $key => $class) {
                $controller = $class;
                $namespace  = 'CakeAdmin\Controller\Administrator\\'.$class.'Controller';
                $class = new ReflectionClass($namespace);
                /*CHECK ONLY PUBLIC METHODS*/
                $class = $class->getMethods();
                foreach ($class as $key => $method) {
                    /*REMOVE BELOW CONDITION AFTER GETTING PUBLIC METHOD ONLY*/
                    if ($method->class==$namespace) {
                        $action = $method->name;
                        if (isset($UserGroupPermissions[$controller]) && in_array($action, $UserGroupPermissions[$controller])) {
                            continue;
                        }
                        /*New Controllers/Actions for Save*/
                        $data = [
                            'controller'=>$controller,
                            'action'=>$action,
                            'user_group_id'=>$UserGroupsID
                        ];
                        $NewControllerActions[] = $data;
                    }
                }
            }
        }

    	if (!empty($NewControllerActions)) {
            $entity = $this->UserGroupPermissions->newEntities($NewControllerActions);
            if($this->UserGroupPermissions->saveMany($entity)){
                /*SAVE SUCCESS*/
            }
        }

        $this->set('NewControllerActions',$NewControllerActions);
    }

    protected function scanFiles($lists){
    	$controllers = [];
        if (is_array($lists)) {
    		foreach ($lists as $key => $file) {
    			if (strstr($file, '.php')) {
                    $file = str_replace('Controller.php', '', $file);
                    if (!in_array($file, $this->skipControllers)) {
                        $controllers[] = $file;
                    }
                }
    		}
    	}
        return $controllers;
    }

    protected function UserGroupsID(){
        $UserGroupsID = $this->UserGroups->find('all')->where(['UserGroups.plugin_prefix'=>'administrator'])->first();
        return $UserGroupsID->id;
    }

    protected function UserGroupPermissions(){
        $permissions = $this->UserGroupPermissions->find(
            'all',
            [
                'fields'=>['controller','action'],
                'order'=>[
                    'controller'=>'ASC'
                ]
            ]
        );
        $permissionArray = [];
        foreach ($permissions as $key => $value) {
            $permissionArray[$value->controller][] = $value->action;
        }
        return $permissionArray;
    }

}
