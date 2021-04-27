let calculatePrice = () => {
    let price  = document.getElementById('price').innerHTML;
    let count= document.getElementById('product_count').value;
    document.getElementById('totalPrice').innerHTML = parseInt(price) * count;
}
calculatePrice();
