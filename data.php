<?php
    //var_dump($params);
    $ddd = explode('/', $params);

    
    $menus = null;
    if(array_key_exists('menus', $document))
        $menus = $document['menus']['docs'];        
    if(array_key_exists('groups', $document))
        $groups = $document['groups']['docs'];
        print_r($menus);
    if(isset($_POST['menu'])){
        $parent=getMenu($_root . 'data/'.$_POST['menuId'].'.json');
        $id=$document['menus']['increment'];
        $document['menus']['increment']++;
        $parent['docs'][$id]=$_POST['groups'];
        if(!isset($parent['num']))
            $parent['num']=0;
        $parent['num']++;
        $current=array('id'=>$id, 'name'=>$_POST['title'], 'text'=>$_POST['text'], 'scale'=>$parent['scale']+1);
        $stat1=file_put_contents($_data, json_encode($document));
        $stat2=file_put_contents($_root . 'data/'.$_POST['menuId'].'.json', json_encode($parent));
        $stat3=file_put_contents($_root . 'data/'.$id.'.json', json_encode($current));
        if($stat1&&$stat2&&$stat3)
        echo 'add menu OK!';
    }
    require_once('dataSuccess.php');
?>