function refund(orderReference, idUser) {
    $.post("Refund", {orderReference: orderReference, idUser: idUser}).done(function () {
        showNotification('top', 'center');
    })
}

function showNotification(from, align){
    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
        icon: "ti-gift",
        message: "<center>You have refunded the order!</center>"

    },{
        type: 'info',
        timer: 4000,
        placement: {
            from: from,
            align: align
        }
    });
}
