<?php
class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout','login');
    }
    
    /**
     *  ROOT ACTIONS ===>
     */
    
    public function root_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    
    public function root_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
        
        $roles = $this->User->getRoles();
        
        $this->set(compact('roles'));
    }

    public function root_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    
    /**
     *  <=== ROOT ACTIONS
     * 
     * 
     *  ADMIN ACTIONS ===>
     */
    
    public function admin_index() {
        
        $this->User->recursive = 0;
        
        //$this->paginate[] = array('role <>' => 'ROOT');
        
        $this->set('users', $this->paginate(array('role <>' => 'ROOT')));
         
    }
    
    public function admin_add() {
        if ($this->request->is('post')) {
            
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuario salvado.');
            } else {
                $this->Session->setFlash('Usuario NO salvado. Intente de nuevo.');
            }
            
            $this->redirect(array('action' => 'index'));
        }
        
    }
    
    public function admin_edit($id = null) {
        
        $this->User->id = $id;
        
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuario Editado.');
            } else {
                $this->Session->setFlash('Usuario NO editado. Intente de nuevo.');
            }
        
            $this->redirect(array('action' => 'index'));
        }
        
        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);
        
    }
    
    public function admin_passwd($id = null) {
        
        $this->User->id = $id;
        
         if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Password Cambiado.');
            } else {
                $this->Session->setFlash('Password NO Cambiado. Intente de nuevo.');
            }
        
            $this->redirect(array('action' => 'index'));
        }
        
    }
    
    public function admin_disable($id,$stat = 0)
    {
        $this->User->updateAll(array('enable' => $stat),array('id' => $id));
        
        $uStat = 'Desactivado';
        
        if ($stat == 1)
            $uStat = 'Activado';

        $this->Session->setFlash('Usuario ' . $uStat);
        
        $this->redirect($this->referer());
    }

    /**
     *  <=== ADMIN ACTIONS
     * 
     * 
     *   INVESTOR ACTIONS ===>
     */
    
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * <=== INVESTOR ACTIONS
     * 
     * COMMON ACTIONS ===>
     */
    public function login() {
        
        if ($this->request->is('post')) {
            //pr($this->request->data);
            
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->loginRedirect);
            } else {
                $this->Session->setFlash('Sign-in problems?','default',array(),'auth');
            }
            
            
        } else {
            /*if (!empty($this->userData)) {
                $this->redirect($this->Auth->redirectUrl());
            }*/
        }
    }

    public function logout() {
        $this->Session->setFlash('Bye bye!','default',array(),'auth');
        return $this->redirect($this->Auth->logout());
    }
    
    /**
     * <=== COMMON ACTIONS 
     * 
     * REDIR ACTIONS ===>
     */
    
    public function admin_login()
    {
        $this->redirect('/users/login');
    }
}

