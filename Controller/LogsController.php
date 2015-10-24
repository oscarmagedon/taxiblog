<?php

class LogsController extends AppController 
{
    public function admin_index ($user = null)
    {
        //$conds = array();
        
        
        $logs  = $this->Log->find('all',array(
                    'order' => 'Log.id DESC'
                ));
        
        $units = $this->Log->Unit->find('list',array(
                        'conditions' => array('user_id' => $this->userData['id'])));
        
        $this->set(compact('logs','units'));
    }
    
    public function admin_add ()
    {
        if ( $this->request->is('post') ) {
            //pr($this->request->data);die();
            
            $this->Log->create();
            
            $this->Log->save($this->request->data);
            
            $this->Session->setFlash('Novedad Guardada.');
            
            $this->redirect(array('action' => 'edit', $this->Log->id));
        }
        
        $units = $this->Log->Unit->find('list',array(
                        'order'      => 'title ASC'));
        
        $this->set(compact('units'));
    }
    
    public function admin_edit ($id = null)
    {
        if ( !empty( $this->request->data) ) {
            //pr($this->request->data);die();
            
            $this->Log->save($this->request->data);
            
            $this->Session->setFlash('Novedad Guardada.');
            
            $this->redirect($this->referer());
        }
        
        $this->data = $this->Log->read(null,$id);
        
        $units = $this->Log->Unit->find('list',array(
                        'order' => 'title ASC'));
        
        
        $explore = $this->Log->exploreFolder($id);
        
        $this->set(compact('units','explore'));
    }
    
    public function admin_upfile()
    {
       $this->Log->uploadImages(
                $this->request->data['Log']['fileup'],
                $this->request->data['Log']['id']);      
       
       $this->redirect($this->referer());
    }
    
    public function admin_viewgallery($id) 
    {
        $explore = $this->Log->exploreFolder($id);
        //pr($explore);
        //die();
        $this->set(compact('id','explore'));
    }
    
    // ==> INVEST
    
    public function invest_index ()
    {
        //$conds = array();
        
        $units = $this->Log->Unit->find('list',array(
                        'conditions' => array('user_id' => $this->userData['id'])
                ));
        
        $logs  = $this->Log->find('all',array(
                    'conditions' => array('unit_id' => array_keys($units)),
                    'order'      => 'Log.id DESC'
                ));
        
        
        $this->set(compact('logs','units'));
    }
    
    public function invest_view($id)
    {
        $log = $this->Log->find('first',array(
                    'Log.id' => $id
                ));
        
        $explore = $this->Log->exploreFolder($id);
        
        $this->set(compact('log','explore'));
    }
    
    public function invest_viewgallery($id) 
    {
        $explore = $this->Log->exploreFolder($id);
        //pr($explore);
        //die();
        $this->set(compact('id','explore'));
        
        $this->render('admin_viewgallery');
    }
}

