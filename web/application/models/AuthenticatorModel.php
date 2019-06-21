<?php

class AuthenticatorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * @return stdClass
	 *
	 * @throws Exception
	 */
	public function getApiCredentials()
	{
		$result = $this->db->select('*')
			->from('store_credentials')
			->get();

		if ($result->first_row() != NULL) {
			return $result->first_row();
		} else {
			throw new \Exception("Can't provide api credentials!");
		}
	}
}
