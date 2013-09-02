<?php
    function getMenu($file){
        $content = file_get_contents($file);
        if(!$content){
            $doc = array('menus'=>array('count'=>0, 'docs'=>array()));
        } else
            $doc = json_decode($content, true);
        return $doc;
    }
    
    $params = explode('/document/app.php/', $_SERVER['REQUEST_URI'])[1];
    $_root = $_SERVER['DOCUMENT_ROOT'] . 'document/';
    $_data = $_root . 'data/manuel.json';
    //var_dump( $_POST );
    $_json = file_get_contents($_data);
    if(!$_json){
        $document = array('menus'=>array(), 'groups'=>array('docs'=>array()));
    } else
        $document = json_decode($_json, true);
    if($params=='edit')        
        require_once('edit.php');
    elseif($params=='data')  
        require_once('data.php');
?>