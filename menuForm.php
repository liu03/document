<form method="post" class="addMenu">
    <input type="hidden" name="menuId" id="menuId">
    <input type="hidden" name="target" id="target">
    <table>
        <tr>
            <td><label>Name</label></td>

            <td><input type="text" name="title" id="title"></td>
        </tr>

        <tr>
            <td colspan=2>
            <?php
                foreach($groups as $g)
                    echo '<div><input type="checkbox" name="groups[]" value="'.$g['id'].'" checked="checked"><label>'.$g['name'].'</label></div>';    
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
            <td><input type="submit" name="menu" value="Valid"><button id="back">Back</button></td>
        </tr>
    </table>
</form>