<?php

class Pages extends Controller
{

    private $todoModel;

    public function __construct()
    {
        $this->todoModel = $this->model('Todo');
    }

    public function index()
    {
        session_start();
        $formData = $errors = [];

        $transactionStatus = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->sanitizeText($_POST['username']);
            $email = trim($_POST['email']);
            $task = $this->sanitizeText($_POST['task']);

            if ($username == '') {
                $errors['username'] = 'Username is required';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email address';
            }

            if ($task == '') {
                $errors['task'] = 'Username is required';
            }

            if (count($errors) > 0) {
                $formData['username'] = $username;
                $formData['email'] = $email;
                $formData['task'] = $task;
            } else {
                $transactionStatus = $this->todoModel->addData([
                    'username' => $username,
                    'email' => $email,
                    'task' => $task,
                ]);
            }
        }
        $todos = $this->todoModel->getAll();
        $data = [
            'title' => 'Home page',
            'todos' => $todos,
            'formData' => $formData,
            'errors' => $errors,
            'transactionStatus' => $transactionStatus,
            'loggedIn' => isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true,
        ];

        $this->view('pages/index', $data);
    }

    private function sanitizeText($string)
    {
        $string = trim($string);
        $string = strip_tags($string);
        $string = preg_replace("/[^A-Za-z]/", "", $string);
        return $string;
    }

    public function login()
    {
        session_start();

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: /framework/public/");
            exit;
        }

        $username = $password = "";
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["username"]))) {
                $errors['username'] = "Please enter username.";
            } else {
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["password"]))) {
                $errors['password'] = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }

            // Validate credentials
            if (empty($errors)) {
                if (strtolower($username) == 'admin' && $password == '123') {
                    // Password is correct, so start a new session
                    session_start();

                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $username;

                    // Redirect user to welcome page
                    header("location: /framework/public");
                } else {
                    // Password is not valid, display a generic error message
                    $errors['login'] = "Invalid username or password.";
                }
            }
        }


        $data = [
            'errors' => $errors,
        ];

        return $this->view('pages/login', $data);
    }

    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function edit()
    {
        session_start();
        $transactionStatus = null;

        if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
            header("location: /framework/public/");
            exit;
        }

        $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'];
            $status = $_POST['status'];

            $transactionStatus = $this->todoModel->updateData([
                'task' => $task,
                'status' => $status,
                'id'=>$id,
            ]);
            $result = $this->todoModel->find($id);

            $data = [
                'transactionStatus' => $transactionStatus,
                'loggedIn' => isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true,
                'task' => $result
            ];

            $this->view('pages/edit', $data);
        }

        $id = preg_replace('/[^0-9]/', '', $id);
        if (is_numeric($id)) {
            $result = $this->todoModel->find($id);

            return $this->view('pages/edit', [
                'transactionStatus' => $transactionStatus,
                'task' => $result,
                'loggedIn' => true,
            ]);
        }
        die('Invalid id');
    }
}
