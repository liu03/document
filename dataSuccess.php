<!DOCTYPE>
<html>
<head>
    <style>
        .span1 {
            display: block;
            font-size: 28px;
            font-weight: bold;
        }
        .span2 {
            display: block;
            font-size: 24px;
            font-weight: bold;
        }
        .span3 {
            display: block;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>    
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
    </script>
<script>
    $(function(){
        $('.add').click(function(){
            $container=$(this).parent();
            $container.find('.edit, .add').hide();
            $('.addMenu').insertAfter($container.find('.add:first'));
            $('.addMenu').show();
            $('#menuId').val($container.attr('id'));
            tinymce.init({selector:'textarea', width:600, height:200});
            });
        
        $('.edit').click(function(){
            $('.edit, .add').hide();
            $('.addMenu').insertAfter($(this).parent());
            $('.addMenu').show();
            $('#menuId').val($(this).parent().attr('id'));
            tinymce.init({selector:'textarea', width:600, height:200});
            });
        $('#back').click(function(){
            $('.edit, .add').show();
            $('.addMenu').hide();
            });
        $('.addMenu').hide();
    });
</script>
</head>
<body>
<?php
function twig($id, $_root, $numero, $scale=1) {
    //print_r($_root.'data/'.$id.'.json');
    $module = json_decode(file_get_contents($_root.'data/'.$id.'.json'),true);
    echo '<div id="'.$id.'">';
    echo '<div class="span'.$module['scale'].'">'.$numero.' '.$module['name'].'</div>';
    echo '<a href="#" class="edit">Edit</a>&nbsp;<a href="#" class="add">Add</a>';
    echo $module['text'];
    if(isset($module['docs'])){
        $count=0;
        foreach($module['docs'] as $twig=>$doc){
            $count++;
            twig($twig, $_root, $numero.'.'.$count, $scale++);
        }
    }
    echo '</div>';
}

$count = 0;
foreach($menus as $id=>$doc){
    $count++;
    twig($id, $_root, $count);
}

require_once('menuForm.php');
?>
</body>
</html>