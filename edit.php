<?php
    //var_dump( $_POST );
    
    if(isset($_POST['group'])){
        if(isset($document['groups']['increment'])){
            $id=$document['groups']['increment'];
        }else {
            $id=1;
            $document['groups']['increment']=1;
        }
        $document['groups']['increment']++;
        $document['groups']['docs'][$id]=array('id'=>$id, 'name'=>trim($_POST['name']));
        $document['groups']['num']=count($document['groups']['docs']);
        $stat=file_put_contents($_data, json_encode($document));
        if($stat)
        echo 'add group OK!';
    }
    
    if(isset($_POST['menu'])){
        
        if(!isset($document['menus']))
            $document['menus'] = array();
        if(isset($document['menus']['increment'])){
            $id=$document['menus']['increment'];
        }else {
            $id=1;
            $document['menus']['increment']=1;
        }
        $document['menus']['increment']++;
        $document['menus']['docs'][$id]=array('name'=>trim($_POST['title']), 'groups'=>$_POST['groups']);
        $document['menus']['num']=count($document['menus']['docs']);
        $stat1=file_put_contents($_data, json_encode($document));
        $current = array('id'=>$id, 'name'=>trim($_POST['title']),'text'=>$_POST['text'],'scale'=>1); 
        $stat2=file_put_contents($_root . 'data/'.$id.'.json', json_encode($current));
        if($stat1&&$stat2)
        echo 'add menu OK!';
    }
/*    
    if(isset($_POST['menu'])){
        if(!isset($document['menus']))
            $document['menus'] = array();
        if(isset($document['menus']['increment'])){
            $id=$document['menus']['increment'];
        }else {
            $id=1;
            $document['menus']['increment']=1;
        }
        $document['menus']['increment']++;
        $document['menus']['docs'][$id]=array('id'=>$id, 'name'=>trim($_POST['title']),'text'=>$_POST['text'], 'groups'=>$_POST['groups']);
        $document['menus']['num']=count($document['menus']['docs']);
        $stat=file_put_contents($_data, json_encode($document));
        if($stat)
        echo 'add menu OK!';
    }
*/    
    $menus = null;
    $groups = null;
    if(array_key_exists('menus', $document))
        $menus = $document['menus']['docs'];
    if(array_key_exists('groups', $document))
        $groups = $document['groups']['docs'];
    require_once('editSuccess.php');
?>