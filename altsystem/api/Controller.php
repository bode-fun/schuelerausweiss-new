<?php
class Controller{
    private $response;
    private $username;
    private $password;

    public function __construct(){
        $this->response = ['status' => 'error', 'message' => 'Authentifiziereung fehlgeschlagen'];
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
        $this->password = isset($_POST['password']) ? $_POST['password'] : null;
    }

    private function setResponse($status = 'error', $message = null){
        $this->response['status'] = $status;
        $this->response['message'] = $message;
    }

    public function execute(){{}
        if($this->username === 'root' && $this->password === 'password'){
            $this->setResponse('success', 'Login Erfolgreich!');
        }
        
        print(json_encode($this->response));
    }
}

$controller = new Controller();
$controller->execute();