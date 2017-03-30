function buy(idProduct, idUser) {
    $.post("Payment", {idProduct: idProduct, idUser: idUser}).done(function () {
        console.log("dddd");
    })
}