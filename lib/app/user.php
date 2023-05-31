<?php
namespace bs\lib;
defined('EXE') or die('Access');

class User
{
  public $id;

	public function __construct()
	{
		foreach ($_COOKIE as $key => $v) 
    {
      $session = \F::getPDO()
        ->prepare('SELECT ClientId FROM mda_account_session WHERE `Key`=?')
        ->bindValues([$key])
        ->fetchAssoc();

      if ($session)
      {
        $user = \F::getPDO()
          ->prepare('SELECT * FROM mda_clients WHERE id=?')
          ->bindValues([$session['ClientId']])
          ->fetchAssoc();

				$this->id = $user['id'];
        $this->lic =  str_pad($this->id, 6, 0, STR_PAD_LEFT);
        $this->contractid = $user['ContractId'];
        $this->fio = $user['FIO'];
        $this->phone = $user['Phone'];
        $this->mobile = $user['Mobile'];
        $this->email = $user['Email'];
        $this->password = $user['Password'];
        $this->statusid = $user['StatusId'];
        $this->baseid = $user['BaseId'];

        $this->status = $user['StatusId'] == 2 ? 'Активный' : 'Отключен';
        $this->status_color = $user['StatusId'] == 2 ? 'success' : 'danger';
      }
    }
	}
}