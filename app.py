from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

# 模擬資料庫
products = [
    {"id": 1, "name": "商品1", "price": 100},
    {"id": 2, "name": "商品2", "price": 200},
    {"id": 3, "name": "商品3", "price": 300}
]

cart = []

@app.route('/')
def index():
    return render_template('index.html', products=products)

@app.route('/add_to_cart/<int:product_id>')
def add_to_cart(product_id):
    product = next((p for p in products if p['id'] == product_id), None)
    if product:
        cart.append(product)
    return redirect(url_for('index'))

@app.route('/cart')
def view_cart():
    return render_template('cart.html', cart=cart)

if __name__ == '__main__':
    app.run(debug=True)
