<?php
namespace CakeAdmin\Controller\Administrator;

use CakeAdmin\Controller\AppController;
use ReflectionClass;
use ReflectionMethod;

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
        $AllNewControllerActions    = [];
        if ($this->request->is('post')) {
            #ScanDirectory
            $applications   = $this->request->data['applications']? 1 : 0;
            $plugins        = $this->request->data['plugins']? 1 : 0;
            $recursive      = $this->request->data['recursive']? 1 : 0;

            var_dump(APP);

            $this->controllerPath       = APP . '/Controller';
                $namespace              = 'App\Controller';

        	$classFiles                 = scandir($this->controllerPath);
        	$AllClasses                 = $this->scanFiles($classFiles);
            $ScanAllCA                  = $this->ScanAllCA($AllClasses,$namespace);
            $UserGroupsIDs              = $this->UserGroupsIDs();

            foreach ($UserGroupsIDs as $groupKey => $UserGroupsID) {
                /*Skip Permission for Admin*/
                if ($UserGroupsID->plugin_prefix=='administrator') {
                    continue;
                }
                $UserGroupPermissions   = $this->UserGroupPermissions($UserGroupsID->id);
                $NewControllerActions   = $this->GetNewControllerAndActions($ScanAllCA,$UserGroupPermissions,$UserGroupsID->id);
                if (!empty($NewControllerActions)) {
                    $AllNewControllerActions[$groupKey]         = $NewControllerActions;
                    $entity = $this->UserGroupPermissions->newEntities($NewControllerActions);
                    if($this->UserGroupPermissions->saveMany($entity)){
                        #SAVE SUCCESS
                    }
                }
            }
            if (empty($AllNewControllerActions)) {
                $this->Flash->error(__('No more new controllers and actions to synchronize!'));
            }
        }
        $this->set('NewControllerActions',$AllNewControllerActions);
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

    protected function GetNewControllerAndActions($AllFromScan,$AllFromDB,$UserGroupsID){
        $NewControllerActions = [];
        foreach ($AllFromScan as $controller => $value) {
            foreach ($value as $key => $action) {
                if(isset($AllFromDB[$controller]) && in_array($action,$AllFromDB[$controller])){
                    continue;
                }else{
                    $data = [
                        'controller'=>$controller,
                        'action'=>$action,
                        'user_group_id'=>$UserGroupsID
                    ];
                    $NewControllerActions[] = $data;
                }
            }
        }
        return $NewControllerActions;
    }

    protected function ScanAllCA($controllers,$namespace='App\Controller'){
        $ControllersAndMethods = [];
        foreach ($controllers as $key => $controller) {
            $namespace  = $namespace . '\\' . $controller.'Controller';
            $class = new ReflectionClass($namespace);
            $class = $class->getMethods(ReflectionMethod::IS_PUBLIC);
            foreach ($class as $key => $method) {
                if ($namespace==$method->class) {
                    if (in_array($method->name, $this->skipActions)) {
                        continue;
                    }
                    $ControllersAndMethods[$controller][] = $method->name;
                }
            }
        }
        return $ControllersAndMethods;
    }

    protected function UserGroupsIDs(){
        $UserGroupsIDs = $this->UserGroups->find('all');
        return $UserGroupsIDs;
    }

    protected function UserGroupPermissions($UserGroupsID=1){
        $permissions = $this->UserGroupPermissions->find(
            'all',
            [
                'fields'=>['controller','action'],
                'order'=>[
                    'controller'=>'ASC'
                ],
                'conditions'=>[
                    'user_group_id'=>$UserGroupsID
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
