<?php

class UnitsController extends AppController 
{
    public function admin_index ($user = null)
    {
        $conds = array();
        
        if ($user != null) {
            $conds['user_id'] = $user;
        }
        
        $units = $this->Unit->find('all',array('conditions' => $conds));
        
        $users = $this->Unit->User->find('list',array(
                        'conditions' => array('role' => 'INVEST')));
        
        $this->set(compact('units','users','user'));
    }
    
    public function admin_add ()
    {
        if ( $this->request->is('post') ) {
            //pr($this->request->data);
            //die();
            
            $this->Unit->save($this->request->data);
            $this->redirect(array('action' => 'index'));
        }
        
        $user = ClassRegistry::init('User');
        
        $investors = $user->find('list',array(
                        'conditions' => "role = 'INVEST'",
                        'order'      => 'name ASC'
                    ));
        
        $this->set(compact('investors'));
        
    }
    
    public function admin_edit ($id = null)
    {
        if ( $this->request->is('post') ) {
            $this->Unit->save($this->request->data);
            $this->redirect(array('action' => 'index'));
        }
        
        $investors = $this->Unit->User->find('list',array(
                        'conditions' => "role = 'INVEST'",
                        'order'      => 'name ASC'
                    ));
        
        $this->set(compact('investors'));
        
        $this->data = $this->Unit->read(null,$id);
    }
    
    // ==> INVEST ACTIONS
    
    public function invest_index ()
    {
        
        $units = $this->Unit->find('all',array(
                    'conditions' => array(
                        'user_id' => $this->userData['id']
                    )));
        
        $this->set(compact('units'));
    }
}

