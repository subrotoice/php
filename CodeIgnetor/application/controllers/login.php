<?php
/**
 *
 */
class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model'); // It makes available as object
  }

  public function index()
	{
    if ($this->session->userdata('id')) {
       return redirect('admin/dashboard');
    }
    $this->load->helper('form');
		$this->load->view('public/admin_login');
	}

  public function admin_login()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('userName', 'User Name', 'required|alpha|trim'); // here "User Name" make it readable
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    $this->form_validation->set_error_delimiters('<p class="text-primary">', '</p>');

    if ($this->form_validation->run()) {
      $userName = $this->input->post('userName');
      $password = $this->input->post('password');
      $login_id = $this->login_model->validLogin($userName, $password);
      if ($login_id) {
        $this->session->set_userdata(['id' => $login_id]);
        return redirect('admin/dashboard');
      } else {
          $this->session->set_flashdata('login_failed', 'Invalid Username/Passwoerd');
          return redirect('login');
      }
    } else {
      $this->load->view('public/admin_login');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('id');
    return redirect('login');
  }
}

 ?>
