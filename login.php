
<?php

class data extends PDO{
    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=comida', 'root', '');
    }
if(filter_has_var(INPUT_POST,"username"))
{
 $username= filter_input(INPUT_POST,"username");

print "hola $username ";

}

?>
