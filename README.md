請查看app.py、index.html與cart.html(兩個html需放在資料夾templates裡)
使用前須於終端下載flask(指令:pip install flask)，並執行app.py+前往http://127.0.0.1:5000 即可使用
app.py:
此檔案用於執行瀏覽商品、加入&移除購物車內容、查看購物車內容
index.html:
初始網頁
顯示商品列表供使用者瀏覽
點選加入購物車後，app.py就會執行加入功能
點選購物車後，即可跳轉至購物車頁面
cart.html:
購物車網頁
顯示從index.html加入的商品內容
每個商品右側皆有移除鍵，點選移除後，app.py就會執行移除功能
