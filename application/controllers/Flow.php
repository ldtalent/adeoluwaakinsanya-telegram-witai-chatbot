<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Flow extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://localhost/index.php/flow
     *	- or -
     * 		http://localhost/index.php/flow/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://localhost/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/flow/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function webhook()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $userData = array();
        $userData['chat_id'] = $input['message']['chat']['id'];
        $userData['message'] = $input['message']['text'];
        $userData['message_id'] = $input['message']['message_id'] ?? null;
        $userData['first_name'] = $input['message']['from']['first_name'] ?? null;
        $userData['last_name'] = $input['message']['from']['last_name'] ?? null;
        $userData['username'] = $input['message']['from']['username'] ?? null;
        $this->start($userData);
    }
}
