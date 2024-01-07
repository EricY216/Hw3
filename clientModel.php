<?php
require('dbconfig.php');

function getJobList()
{
	global $db;
	$sql = "select * from shop;";
	//precompile sql指令，建立statement 物件，以便執行SQL
	$stmt = mysqli_prepare($db, $sql ); 
	//執行SQL
	mysqli_stmt_execute($stmt); 
	//取得查詢結果
	$result = mysqli_stmt_get_result($stmt);
        //要回傳的陣列
	$rows = array(); 
	while($r = mysqli_fetch_assoc($result))
	{
		//將此筆資料新增到陣列中
		$rows[] = $r; 
	}
	return $rows;
}

function getJobList1()
{
	global $db;
	$sql = "select * from shopping;";
	//precompile sql指令，建立statement 物件，以便執行SQL
	$stmt = mysqli_prepare($db, $sql ); 
	//執行SQL
	mysqli_stmt_execute($stmt); 
	//取得查詢結果
	$result = mysqli_stmt_get_result($stmt); 
        //要回傳的陣列
	$rows = array(); 
	while($r = mysqli_fetch_assoc($result))
	{
		//將此筆資料新增到陣列中
		$rows[] = $r; 
	}
	return $rows;
}

function addJob($name,$price,$content,$number)
{
	global $db;
        $total = $number*$price;
	//SQL中的 ? 代表未來要用變數綁定進去的地方
	$sql = "insert into shopping (name, price, content, number, total) values (?, ?, ?, ?, ?)"; 
	//prepare sql statement
	$stmt = mysqli_prepare($db, $sql); 
	//bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_bind_param($stmt, "sisii", $name, $price,$content,$number,$total);
	//執行SQL
	mysqli_stmt_execute($stmt);  
	return True;
}
function delJob($id)
{
	global $db;
        //SQL中的 ? 代表未來要用變數綁定進去的地方
	$sql = "delete from shopping where id=?;"; 
	//prepare sql statement
	$stmt = mysqli_prepare($db, $sql); 
	//bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_bind_param($stmt, "i", $id); 
	//執行SQL
	mysqli_stmt_execute($stmt);  
	return True;
}
function checkoutOrder()
{
	global $db;
    // 插入新訂單到 orders 表中
    $insertOrderSql = "INSERT INTO orders (status) VALUES ('unprocessed')";
    mysqli_query($db, $insertOrderSql);

    // 取得最後插入的訂單ID
    $orderId = mysqli_insert_id($db);

    // 示範：將訂單標記為已處理
    $sqlUpdateOrderStatus = "UPDATE orders SET status='Processed' WHERE id=?";
    $stmtUpdateOrderStatus = mysqli_prepare($db, $sqlUpdateOrderStatus);
    mysqli_stmt_bind_param($stmtUpdateOrderStatus, "i", $orderId);
    mysqli_stmt_execute($stmtUpdateOrderStatus);

    // 示範：插入購物車中的商品到 orders_items 表
    $sqlInsertOrderItems = "INSERT INTO orders_items(order_id, id, number, total)
                            SELECT ?, NULL, number, total FROM shopping";
    $stmtInsertOrderItems = mysqli_prepare($db, $sqlInsertOrderItems);
    mysqli_stmt_bind_param($stmtInsertOrderItems, "i", $orderId);
    mysqli_stmt_execute($stmtInsertOrderItems);

    // 示範：取得最後插入的訂單ID
    $orderId = mysqli_insert_id($db);

    // 示範：清空購物車
    $sqlDeleteShoppingCart = "DELETE FROM shopping";
    mysqli_query($db, $sqlDeleteShoppingCart);

    return $orderId;
}

function clearShoppingCart()
{
    global $db;

    // 示範：清空購物車
    $sqlDeleteShoppingCart = "DELETE FROM shopping";
    mysqli_query($db, $sqlDeleteShoppingCart);
}

/*
function updateJob($id, $name,$price,$content)
{
	global $db;
        //SQL中的 ? 代表未來要用變數綁定進去的地方
	$sql = "update list set name=?, price=?, content=? where id=?"; 
        //prepare sql statement
	$stmt = mysqli_prepare($db, $sql); 
        //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_bind_param($stmt, "sisi", $name, $price,$content, $id); 
        //執行SQL
	mysqli_stmt_execute($stmt);  
	return True;
}
*/

?>
