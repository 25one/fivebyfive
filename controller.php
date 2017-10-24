<?php

require_once('model.php');
$obj_matrix=new matrixObj();

switch($_POST['hook']) {

case 'click':
$matrix_number=intval($_POST['number']);
$obj_matrix->clickMatrix($matrix_number);
break;
case 'reset':
$obj_matrix->resetMatrix();
break;

}

?>