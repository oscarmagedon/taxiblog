<?php

class Unit extends AppModel 
{
    var $belongsTo = array('User' => array('fields' => 'name'));
    
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        )
    );
    
    
    public function getUnitsUsers()
    {
        $allUnits = $this->find('all');
        $listed   = array();
        
        foreach ($allUnits as $unit) {
            $listed[$unit['Unit']['id']] = $unit['Unit']['title'] . " - " . $unit['User']['name'];
        }
        
        return $listed;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

