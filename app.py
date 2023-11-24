from flask import Flask, render_template, request, redirect, url_for
app = Flask(__name__)
#商品列表
products = [
    {"id": 1, "name": "紅燒牛肉麵", "price": 150},
    {"id": 2, "name": "清燉牛肉麵", "price": 150},
    {"id": 3, "name": "雪碧", "price": 35},
    {"id": 4, "name": "可樂", "price": 35},
    {"id": 5, "name": "紅燒套餐(紅燒牛肉麵+雪碧或可樂)", "price": 180},
    {"id": 6, "name": "清燉套餐:清燉牛肉麵+雪碧或可樂", "price": 180}
]
#購物車，初始為空的
cart = []
@app.route('/')
def index():
    return render_template('index.html', products=products)
#將商品加入購物車
@app.route('/add_to_cart/<int:product_id>')
def add_to_cart(product_id):
    product = next((p for p in products if p['id'] == product_id), None)
    if product:
        cart.append(product)
    return redirect(url_for('index'))
#確認購物車內容
@app.route('/cart')
def view_cart():
    return render_template('cart.html', cart=cart)
#移除購物車內容
@app.route('/remove_from_cart/<int:product_id>')
def remove_from_cart(product_id):
    global cart
    cart = [product for product in cart if product['id'] != product_id]
    return redirect(url_for('view_cart'))

if __name__ == '__main__':
    app.run(debug=True)
