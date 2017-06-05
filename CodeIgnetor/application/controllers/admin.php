<?php

/**
 * Admin Class where load all admin related function
 */
class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    if ( ! $this->session->userdata('id') ) {
      return redirect('login');
    }
    $this->load->model('articlesmodel', 'articles'); // remane articlesmodel to articles to use small name
    $this->load->helper('form');
  }

  public function dashboard()
  {
    $articles = $this->articles->articles_list();
    $this->load->view('admin/dashboard', ['articles' => $articles]);
  }

  public function add_article()
  {
    $this->load->view('admin/add_article');
  }

  public function store_article()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<p class="text-primary">', '</p>');
      if ($this->form_validation->run('add_article_rules')) {  // here create rule in config/form_validation file
        $post = $this->input->post();
        // var_dump($post);
        unset($post['submit']);
        $this->_flashAndRedirect(
          $this->articles->add_article($post),
          'Article Updated Succfully',
          'Fail To Updated Article'
        );
      } else {
        $this->load->view('admin/add_article');  // if you redirect it then no data contain so need to load view
      }

  }

  public function edit_article($id)
  {
    $article = $this->articles->find_article($id);
    $this->load->view('admin/edit_article', ['article' => $article]);
  }

  public function update_article($article_id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<p class="text-primary">', '</p>');
    if ($this->form_validation->run('add_article_rules')) {  // here create rule in config/form_validation file
      $post = $this->input->post();
      // $article_id = $post['article_id'];
      unset($post['submit']);
      $this->load->model('articlesmodel', 'articles');
      $this->_flashAndRedirect(
        $this->articles->update_article($article_id, $post),
        'Article Updated Succfully',
        'Fail To Updated Article'
      );
    } else {
      $this->load->view('admin/edit_article');  // if you redirect it then no data contain so need to load view
    }
  }

  public function delete_article()
  {
    $article_id = $this->input->post('article_id');
    $this->_flashAndRedirect(
        $this->articles->delete_article( $article_id ),
        'Article Deleted Succfully',
        'Fail To Deleted Article'
      );
  }

  private function _flashAndRedirect($successful, $successMessage, $failMessage)
  {
    if ( $successful ){
      $this->session->set_flashdata('feedback', $successMessage);
      $this->session->set_flashdata('feedback_class', 'alert-success');
    } else {
      $this->session->set_flashdata('feedback', $failMessage);
      $this->session->set_flashdata('feedback_class', 'alert-danger');
    }
    return redirect('admin/dashboard');
  }
}
