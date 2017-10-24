<?php

class matrixObj {

private $data = array(
 0=>'0-0',1=>'0-1',2=>'0-2',3=>'0-3',4=>'0-4',
 5=>'1-0',6=>'1-1',7=>'1-2',8=>'1-3',9=>'1-4',
 10=>'2-0',11=>'2-1',12=>'2-2',13=>'2-3',14=>'2-4',
 15=>'3-0',16=>'3-1',17=>'3-2',18=>'3-3',19=>'3-4',
 20=>'4-0',21=>'4-1',22=>'4-2',23=>'4-3',24=>'4-4'
);

function __construct() {
require_once 'config_db.php';
$link=mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (mysqli_connect_errno()) {
    echo "Error accessing to DataBase: ".mysqli_connect_error();
    exit();
}
mysqli_query($link, "set names utf8");
$this->link_db=$link;
}

function DB_query() {
$res=mysqli_query($this->link_db, $this->query);
while($row=mysqli_fetch_assoc($res)) {
    $row_oll[]=$row;
}
$this->row_db=$row_oll;
}

function clickMatrix($matrix_number) {
$row_click=strstr($this->data[$matrix_number], '-', true);
$cell_click=substr(strstr($this->data[$matrix_number],'-'), 1);
$query="update fivebyfive set cell".$cell_click."=1 where id=".$row_click;
mysqli_query($this->link_db, $query);
$change_update='update fivebyfive set ';
if(in_array($row_click.'-'.($cell_click-1), $this->data)) {
   $change_update.=" cell".($cell_click-1)."=case when cell".($cell_click-1)."=0 then 1 else 0 end,";
}
if(in_array($row_click.'-'.($cell_click+1), $this->data)) {
   $change_update.=" cell".($cell_click+1)."=case when cell".($cell_click+1)."=0 then 1 else 0 end,";
}
$change_update.=" where id=".$row_click;
$change_update=str_replace(', where', ' where', $change_update);
mysqli_query($this->link_db, $change_update);
if(in_array(($row_click-1).'-'.($cell_click), $this->data) or in_array(($row_click-1).'-'.($cell_click-1), $this->data) or in_array(($row_click-1).'-'.($cell_click+1), $this->data)) {
$change_update='update fivebyfive set ';
if(in_array(($row_click-1).'-'.($cell_click), $this->data)) {
   $change_update.=" cell".($cell_click)."=case when cell".($cell_click)."=0 then 1 else 0 end,";
}
if(in_array(($row_click-1).'-'.($cell_click-1), $this->data)) {
   $change_update.=" cell".($cell_click-1)."=case when cell".($cell_click-1)."=0 then 1 else 0 end,";
}
if(in_array(($row_click-1).'-'.($cell_click+1), $this->data)) {
   $change_update.=" cell".($cell_click+1)."=case when cell".($cell_click+1)."=0 then 1 else 0 end,";
}
$change_update.=" where id=".($row_click-1);
$change_update=str_replace(', where', ' where', $change_update);
mysqli_query($this->link_db, $change_update);
}
if(in_array(($row_click+1).'-'.($cell_click), $this->data) or in_array(($row_click+1).'-'.($cell_click+1), $this->data) or in_array(($row_click+1).'-'.($cell_click-1), $this->data)) {
$change_update='update fivebyfive set ';
if(in_array(($row_click+1).'-'.($cell_click), $this->data)) {
   $change_update.=" cell".($cell_click)."=case when cell".($cell_click)."=0 then 1 else 0 end,";
}
if(in_array(($row_click+1).'-'.($cell_click-1), $this->data)) {
   $change_update.=" cell".($cell_click-1)."=case when cell".($cell_click-1)."=0 then 1 else 0 end,";
}
if(in_array(($row_click+1).'-'.($cell_click+1), $this->data)) {
   $change_update.=" cell".($cell_click+1)."=case when cell".($cell_click+1)."=0 then 1 else 0 end,";
}
$change_update.=" where id=".($row_click+1);
$change_update=str_replace(', where', ' where', $change_update);
mysqli_query($this->link_db, $change_update);
}
$query="select cell0, cell1, cell2, cell3, cell4 from fivebyfive";
$this->query=$query;
$this->DB_query();
$array_one=array();
foreach($this->row_db as $key_db1=>$row_db1) {
   foreach($row_db1 as $key_db2=>$row_db2) {
      if($row_db2==1) {$array_one[]=array_search($key_db1."-".substr($key_db2, 4), $this->data);}
   }
}
/*
$count_rand=mt_rand(0,24);
if(isset($array_one[$count_rand]) and $array_one[$count_rand]!=$matrix_number) {
   unset($array_one[$count_rand]);
   $array_one=array_values($array_one);
}
*/
echo json_encode($array_one);
}

function resetMatrix() {
$query="update fivebyfive set cell0=0, cell1=0, cell2=0, cell3=0, cell4=0";
mysqli_query($this->link_db, $query);
}

}

?>