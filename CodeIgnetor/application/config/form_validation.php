<?php

$config = [
            'add_article_rules' => [
                  [
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required|alphadash'
                  ],
                  [
                    'field' => 'body',
                    'label' => 'Article Body',
                    'rules' => 'required'
                  ]
                ]

            ];
