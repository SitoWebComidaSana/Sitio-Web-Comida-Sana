
<?php

if(filter_has_var(INPUT_POST,"username"))
{
 $username= filter_input(INPUT_POST,"username");

print "hola $username ";

}

?>
