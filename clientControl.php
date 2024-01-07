<?php
require('clientModel.php');

$act=$_REQUEST['act'];
switch ($act)
{
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;
//將商品加入到購物車
case "addJob":
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->name,$job->price,$job->content,$job->number);
	return;
//刪除購物車內的商品
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
case "checkout":
    // 示範：處理結帳請求，將購物車商品整合為訂單並放入訂單列表
    $orderId = checkoutOrder();

    // 示範：清空購物車
    clearShoppingCart();

    echo "Checkout successful. Order ID: " . $orderId;
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
