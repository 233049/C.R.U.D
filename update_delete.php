<?php
//update_delete.php
if ($_GET['action'] == 'Yes') {
    //action for Yes
} else if ($_GET['action'] == 'No') {
    //action for No
    header('Location: template.html');
    exit;
} else {
    header('Location: template.html');
    exit;
}

?>