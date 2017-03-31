
function buy(idProduct, idUser) {
    $.post("Payment", {idProduct: idProduct, idUser: idUser}).done(function () {
        showNotification('top', 'center');
    })
}

function showNotification(from, align){
    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
        icon: "ti-gift",
        message: "<center>You just bought the product!</center>"

    },{
        type: 'info',
        timer: 4000,
        placement: {
            from: from,
            align: align
        }
    });
}
