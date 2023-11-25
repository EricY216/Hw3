<?php
require('merchantModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;  
//增加商品
case "addJob":
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->name,$job->price,$job->content);
	return;
//更新商品狀態
case "updateJob":
	$id=(int)$_REQUEST['id'];
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	updateJob($id,$job->name,$job->price,$job->content);
	return;
//刪除商品
case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;
default:
}
?>
