<?php
if (!isset($_GET['page'])) 
{
    include("services2.php");
} 
else {

    include("pages/".$_GET['page'].".php");
}
?>
