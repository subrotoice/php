<?php
/**
 * Login Model to take data for login
 */
class Login_model extends CI_Model
{

  public function __construct()
  {

  }

  public function validLogin($userName, $password)
  {
    $q = $this->db->where(['uname' =>$userName, 'pword' => $password])
              ->from('users')
              ->get();
    if (($q->num_rows) > 0) {
      return $q->row()->id;
    } else {
      return FALSE;
    }

  }
}
