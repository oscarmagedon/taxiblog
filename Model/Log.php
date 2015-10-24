<?php

class Log extends AppModel 
{
    var $belongsTo   = array('Unit' => array('fields' => 'title'));
    
    public $validate = array(
                            'title' => array(
                                'required' => array(
                                    'rule' => array('notEmpty'),
                                    'message' => 'A title is required'
                                )
                            )
                        );
    
    function uploadImages ($fileUp,$logId)
    {
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        //pr($fileUp);
        
        // setup dir names absolute and relative
        $folder    = 'files/logs/'. $logId;
        $folderUrl = WWW_ROOT . 'files/logs/'. $logId;
        $relUrl    = $folder;

        // create the folder if it does not exist
        $dir = new Folder($folderUrl,true,0777);
        
        //pr($dir);
        
        //die($folderUrl);
        
        // list of permitted file types
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg',
                          'image/png', 'application/pdf');

        //permitted filetype
        if ( in_array($fileUp['type'],$permitted) ) {
            $result['error'] = 'Type not permitted';
        }
        
        $result = array();
        // if file type ok upload the file
        // switch based on error code
        switch($fileUp['error']) {
            case 0:
                // replace spaces with underscores
                $filename = str_replace(' ', '_', $fileUp['name']);
                $newUrl   = $relUrl . '/' . $filename;
                $success  = move_uploaded_file($fileUp['tmp_name'], $newUrl);
                //pr($success);
                break;
            
            default:
                // an error occured
                $result['errors'] = "Error uploading $filename. Please try again.";
                break;
        }
        
        /*
        } elseif($file['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
            // unacceptable file type
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }*/
        
        return $result;
    } 
    
    
    public function exploreFolder ($id)
    {
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        //pr($fileUp);
        
        // setup dir names absolute and relative
        $folder    = 'files/logs/'. $id;
        $folderUrl = WWW_ROOT . 'files/logs/'. $id;
        $relUrl    = $folder;

        // create the folder if it does not exist
        $dir   = new Folder($folderUrl);
        $files = $dir->read(true, array('files'));
        return $files[1];
    }
    
}
