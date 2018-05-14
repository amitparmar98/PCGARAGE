<?php

        $config = array(
                'otherbrand_validation' => array(
                                                array(
                                                        'field' => 'brand',
                                                        'label' => 'Brand',
                                                        'rules' => 'required|trim'
                                                ),
                                                array(
                                                        'field' => 'model',
                                                        'label' => 'Model',
                                                        'rules' => 'required|trim'
                                                ),

                                                 array(
                                                        'field' => 'issue',
                                                        'label' => 'Problem',
                                                        'rules' => 'required|trim'
                                                 ),

                                                array(
                                                      'field' => 'cname',
                                                      'label' => 'Name',
                                                      'rules' => 'required|trim'
                                                 ),

                                                  array(
                                                      'field' => 'email',
                                                      'label' => 'Email',
                                                      'rules' => 'required|valid_email'
                                                  ),

                                                 array(
                                                    'field' => 'address',
                                                    'label' => 'Address',
                                                    'rules' => 'required|trim'
                                                  ),

                                                  array(
                                                    'field' => 'phone',
                                                    'label' => 'Phone',
                                                    'rules' => 'required|numeric'
                                                  )
                                               
                                        ),


                'sell_validation' => array(
                                                array(
                                                        'field' => 'ctitle',
                                                        'label' => 'Title',
                                                        'rules' => 'required|trim'
                                                ),
                                                array(
                                                        'field' => 'cname',
                                                        'label' => 'First Name',
                                                        'rules' => 'required|trim'
                                                ),

                                                 array(
                                                        'field' => 'email',
                                                        'label' => 'E-Mail',
                                                        'rules' => 'required|valid_email|is_unique[sell.email]'
                                                 ),

                                                array(
                                                      'field' => 'phone',
                                                      'label' => 'Phone Number',
                                                      'rules' => 'required|numeric'
                                                 ),

                                                  array(
                                                      'field' => 'chouseno',
                                                      'label' => 'House Name/No',
                                                      'rules' => 'required'
                                                  ),

                                                 array(
                                                    'field' => 'cstreetaddress',
                                                    'label' => 'Street/Road',
                                                    'rules' => 'required'
                                                  ),

                                                  array(
                                                    'field' => 'ctown',
                                                    'label' => 'Town/City',
                                                    'rules' => 'required'
                                                  ),

                                                  array(
                                                    'field' => 'country',
                                                    'label' => 'Country',
                                                    'rules' => 'required'
                                                  ),

                                                  array(
                                                    'field' => 'postcode',
                                                    'label' => 'Postcode',
                                                    'rules' => 'required|numeric'
                                                  ),

                                                  array(
                                                    'field' => 'password',
                                                    'label' => 'Password',
                                                    'rules' => 'required'
                                                  ),

                                                  array(
                                                    'field' => 'cpassword',
                                                    'label' => 'Postcode',
                                                    'rules' => 'Confirm password|matches[password]'
                                                  )
                                               
                                        ),


                'login_validation' => array(
                                                array(
                                                        'field' => 'uemail',
                                                        'label' => 'Email',
                                                        'rules' => 'required|valid_email'
                                                ),
                                                array(
                                                        'field' => 'upassword',
                                                        'label' => 'Password',
                                                        'rules' => 'required'
                                                )                                               
                                               
                                           )                                 
                                


                      );
                
?>