<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    
    public $components = array(
            
            'RequestHandler',
            'Paginator',
            'Session',
            'Auth'   =>   array(
                'authorize'     => array('Controller'),
                'authError'     => 'Do you think you are allowed?',
                'loginAction'   => array(
                            'controller' => 'users',
                            'action'     => 'login',
                            'prefix'     => false
                ),
                'loginRedirect' => array(
                            'controller' => 'pages',
                            'action'     => 'landing',
                            'prefix'     => false
                ),
                
                'unauthorizedRedirect' => array(
                    'controller' => 'pages',
                    'action'     => 'home',
                    'root'       => false,
                    'admin'      => false,
                    'invest'     => false
                ),
                
                'logoutRedirect'      => array(
                    'controller' => 'users',
                    'action'     => 'login'
                ),
                'authenticate' => array(
                    'Form' => array(
                        'passwordHasher' => 'Blowfish' 
                    )
                )
            )    
        );
     
    //public $helpers = array('Html','Form','Js','Time','Folder','File');

    public function beforeFilter() {
        
        /*$userIns = ClassRegistry::init('User');
        
        echo $userIns->showHashedTmp();*/
        
        $this->userData = $this->Auth->User();
        
        //pr($this->userData);
        
        /*  Array (
                [id]       => 1
                [name]     => Oscar Vegas
                [username] => ovegas
                [role]     => ROOT
                [created]  => 2015-06-18 15:00:00
                [enable]   => 1
            )   */
        
        $this->Auth->allow('display');
        
        //$this->set('menuActions',$this->menuActions);
        
        $this->layout = 'taxilay';
        
        //pr($this->params);
        
        if ($this->params['controller'] == 'pages' && 
            $this->params['action'] != 'landing') {
                $this->layout = 'taxipage';
                //echo 'page';
            }
        
        $this->set('userData',$this->userData);
    
        
    }
    
    public function isAuthorized() {
        /*/if ($this->prefix === 'root' )
        echo  . "<br/>";
        echo $this->action;
        echo 'ROLE:: ' . strtolower($this->Auth->User('role'));
        pr($this->params);
        die();
        */
        
        //return true;
        
        $thisRole = strtolower($this->Auth->User('role'));
       
        return ($this->params['prefix'] == $thisRole);
    }
    
    public function isRoot()
    {
        return ($this->Auth->User('role') === 'ROOT');
    }
    
    
}
