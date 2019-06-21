function refund(baseUrl, orderReference, idUser) {
	$.post(baseUrl + "Refund", {orderReference: orderReference, idUser: idUser})
		.done(function (response) {
			if (undefined === response.success) {
				return showNotification('Store error!', 'danger');
			}

			return showNotification(response.message, response.success ? 'success' : 'warning');
		})
		.fail(function () {
			return showNotification('Store error!', 'danger');
		})
}

function showNotification(message, type) {

	$.notify({
		message: message

	}, {
		type: type,
		timer: 4000,
		placement: {
			from: 'top',
			align: 'center'
		}
	});
}
