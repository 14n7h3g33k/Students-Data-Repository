<?php
include_once 'dbconfig.php';
if(isset($_GET['remove_id']))
{
    $res=mysql_query("SELECT file FROM inf242 WHERE id=".$_GET['remove_id']);
    $row=mysql_fetch_array($res);
    mysql_query("DELETE FROM inf242 WHERE id=".$_GET['remove_id']);
    unlink("uploads/".$row['file']);
    header("Location: admin.php");
}
    ?>

