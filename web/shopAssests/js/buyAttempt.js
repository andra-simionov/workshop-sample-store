function buy(idProduct, idUser) {
    $.post("Payment", {idProduct: idProduct, idUser: idUser}).done(function () {
        alert("You just bought the product!")
    })
}