<!DOCTYPE>
<html>
<head>
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea', width:600, height:200});
    </script>
<style>
table {width:600px;}
</style>
</head>
<body>
<?php    

    if($groups)    { 
        foreach ($groups as $group)
            echo '<p><a href="#"><b>'.$group['id'].'. </b>'.$group['name'].'</a></p>';
    }
?>

<h3>Add a Group</h3>

<form method="post">
    <table>
        <!--tr>
            <td><label>Id</label></td>

            <td><input type="text" name="id" id="id"></td>
        </tr-->

        <tr>
            <td><label>Name</label></td>

            <td><input type="text" name="name" id="name"></td>
        </tr>

        <tr>
            <td><input type="submit" name="group" value="Valid"></td>
        </tr>
    </table>
</form><?php if($groups): ?>

<?php    
    if($menus)    {
        foreach ($menus as $id=>$menu)
            echo '<p><b>'.$id.'. </b>'.$menu['name'].'</p>';
        }
        ?>
<h3>Add a menu</h3>

<form method="post">
    <table>
        <tr>
            <td><label>Name</label></td>

            <td><input type="text" name="title" id="title"></td>
        </tr>

        <tr>
            <td colspan=2>
            <?php
                foreach($groups as $g)
                    echo '<div><input type="checkbox" name="groups[]" value="'.$g['id'].'"><label>'.$g['name'].'</label></div>';    
            ?>
            </td>
        </tr>
        <tr>
            <td colspan=2>
    <label>Description</label><br>
    <textarea name="text"></textarea>
            </td>
        </tr>
            <tr>
            <td><input type="submit" name="menu" value="Valid"></td>
        </tr>
    </table>
</form><?php endif;?>
</body>
    </html>
