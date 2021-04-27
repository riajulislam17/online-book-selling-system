let calculatePrice = () => {
    let price  = document.getElementById('price').innerHTML;
    let count= document.getElementById('value').value;
    document.getElementById('totalPrice').innerHTML = parseInt(price) * count;
}
