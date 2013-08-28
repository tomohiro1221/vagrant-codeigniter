<?php
$config = array(
             'login' => array(
                        array(
                            'field' => 'username',
                            'label' => 'Username',
                            'rules' => 'required'
                            ),
                        array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required'
                            ),
                        ),
            'signup' => array(
                        array(
                            'field' => 'username',
                            'label' => 'Username',
                            'rules' => 'required|min_length[4]|max_length[16]|is_unique[User.name]',
                            ),
                        array(
                            'field' => 'password',
                            'label' => 'required',
                            'rules' => 'required|min_length[6]'
                            ),
                        array(
                            'field' => 'passconf',
                            'label' => 'Password Confrimation',
                            'rules' => 'required|matches[password]'
                            ),
                        array(
                            'field' => 'email',
                            'label' => 'Email',
                            'rules' => 'required|valid_email'
                            )
                        )
            );
?>