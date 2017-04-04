function refund(orderReference, email) {
    $.post("Refund", {orderReference: orderReference, email: email}).done(function () {
        showNotification('top', 'center');
    })
}

function showNotification(from, align){
    color = Math.floor((Math.random() * 8) + 1);

    $.notify({
        icon: "ti-gift",
        message: "<center>You just refunded the product!</center>"

    },{
        type: 'info',
        timer: 4000,
        placement: {
            from: from,
            align: align
        }
    });
}
