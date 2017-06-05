<?php


/**
 * Core Controller which can verify athentication
 */
class MY_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // if (! $this->isAuthorized()) {
    //   return redirect('home');
    // }
  }
}
