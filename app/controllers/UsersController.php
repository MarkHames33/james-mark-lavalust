<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('database');
        $this->call->library('migration');

        ob_start();
        $this->migration->migrate();
        ob_end_clean();

        $this->call->model('UsersModel');
    }

    /**
     * Retrieve all users and display them in the view.
     */
    public function index()
    {
        // UsersController -> UsersModel -> all() -> users table records
        $users = $this->UsersModel->all();

        // Pass the retrieved records to the view
        $data['users'] = $users;

        // Load the user view
        $this->call->view('users_view', $data);
    }
}