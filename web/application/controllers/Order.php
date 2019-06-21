<?php


class Order extends CI_Controller
{
    const ORDER_STATUS_PAID = "PAID";
    const ORDER_STATUS_FAILED = "FAILED";
	const BANK_RESPONSE_CODE_OK = 'Ok';


	function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');


		$productInfo = $this->SampleStoreModel->getProductDetails($idProduct);

		$orderReference = $this->generateOrderReference();

		$storeResponse = [];
        try {
			$userInfo = $this->UserModel->getUserData($idUser);

            $this->OrderModel->saveOrder($idUser, $idProduct, $orderReference);

            $bankResponse = $this->sendservice->payOrder($userInfo->Token, $userInfo->Email, $productInfo->Price, $productInfo->Currency, $orderReference);

            //TODO 5: handle $bankResponse (SendService might already know how to do that)

        } catch (\Exception $e) {

			$storeResponse['success'] = false;
			$storeResponse['message'] = 'Request could not be processed!';

        } finally {
			return $this->outputResponse($storeResponse);
		}

    }

    private function generateOrderReference()
    {
        return mt_rand(10000, 99999);
    }

	private function outputResponse($storeResponse)
	{
		header('Content-type: application/json');

		echo json_encode($storeResponse);
	}


}
