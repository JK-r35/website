<?php
$HOSTNAME='wp.kongu.edu';
$USERNAME='24dsa24';
$PASSWORD='24dsa24';
$DATABASE='24dsa24';

$Con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if($Con){
    echo"connection successful";

}
else{
    die(mysqli_error($Con));
}
?>