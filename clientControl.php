<?php
require('clientModel.php');

$act=$_REQUEST['act'];
switch ($act)
{
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;
//加入商品
case "addJob":
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->name,$job->price,$job->content,$job->number);
	return;
//刪除商品
case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;
//購物車列表
case "listshopping":
	$jobs=getJobList1();
	echo json_encode($jobs);
	return;
/*
case "updateJob":
        //更新狀態
	$id=(int)$_REQUEST['id'];
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	updateJob($id,$job->name,$job->price,$job->content);
	return;
*/
default:
}
?>
