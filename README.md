demo使用的檔案: clientControl.php, clientModel.php , clientView.html , merchantView.html , merchantControl.php , merchantModel.php , shop.sql , shopping.sql ,dbconfig.php
dbconfig.php:用來登入&連線至Mysql以更動資料庫內容
shop.sql:商店的資料庫檔案
shopping.sql:購物車的資料庫檔案
clientModel.php:當收到clientControl.php的呼叫時，於shopping.sql執行資料的新增&刪除
clientView.html:客戶端頁面:此頁面顯示目前資料庫存放的商品列表；點選查看購物車後，可跳轉至購物車內容，顯示目前加入的商品內容&數量和總價
clientControl.php:客戶在點選加入、移除、查看購物車時，呼叫clientModel.php進行購物車的內容更動
merchantModel.php:收到merchantControl.php呼叫後，在shop.sql執行資料的新增&刪除
merchantView.html:商家端頁面:此頁面顯示目前資料庫裡的商品列表；商家可在此進行加入&移除商品動作
merchantControl.php:商家在輸入商品名稱&價格與商品說明或移除商店商品時，呼叫merchantModel.php進行商品上架和下架動作
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
期末demo使用或新增的檔案請看Hw3資料夾內的內容
