<?php

/**
 *
 */
class Articlesmodel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function articles_list()
  {
    $user_id = $this->session->userdata('id');
    $q = $this->db->select(['id', 'title'])
                    ->from('articles')
                    ->where(['user_id' => $user_id])
                    ->get();

    return ($q->result());
  }

  public function add_article($array)
  {
    $affected_rows = $this->db->insert('articles', $array);
    return $affected_rows;
  }

  public function find_article($article_id)
  {
    $q = $this->db->where('id', $article_id)
                  ->get('articles');
    return $q->row();
  }

  public function update_article($article_id, $article)
  {
    $affected_rows = $this->db->where(['id' => $article_id])
                              ->update('articles', $article);
    return $affected_rows;
  }
  public function delete_article($article_id)
  {
    return $this->db->delete('articles', ['id' => $article_id]);
  }
}
