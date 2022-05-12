<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GlobalController extends CI_Controller
{
    public function validateLogin()
    {
        $username = (isset($_POST['username'])) ? $_POST['username'] : '';
        $password = (isset($_POST['password'])) ? $_POST['password'] : '';
        $login = $this->Global_model->get_data_with_query('users', '*', 'username ="' .$username. '" AND password="'.sha1($password).'"');

        // print("<pre>".print_r($this->input->post(),true)."</pre>");

        // die();

        if (count($login) > 0) {
            $user_info = $this->Global_model->get_data_with_query('users', '*', 'user_id ="' . $login[0]->user_id . '"');
            $user_account_info = $this->Custom_model->get_user_account_info($login[0]->user_id);

            $this->session->set_userdata((array) ($user_account_info[0]));

            if( $user_account_info[0]->position_id == 1 ) {
                echo json_encode(array('success' => true, 'message' => base_url().'admin-home'));
            }else {

                $has_purpose = $this->Custom_model->get_purpose_at_current_date( $user_account_info[0]->user_id );

                if( count($has_purpose) ) {
                    echo json_encode(array('success' => true, 'message' => base_url().'home'));
                }else {
                    echo json_encode(array('success' => true, 'message' => base_url().'purpose'));
                }

                
            }

            // print("<pre>".print_r($user_account_info,true)."</pre>");
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid username or password'));
        }
    }

}
