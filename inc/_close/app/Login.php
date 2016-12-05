<?php

/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 05.12.2016
 * Time: 23:11
 * 
 * Created by IntelliJ IDEA
 *
 */

class Login
{

    private $sessionName = 'curcode_login';
    private $userArray   = [];

    /**
     * Login constructor.
     */
    public function __construct(array $userArray) {

        if (count($userArray) === 0) {
            throw new \InvalidArgumentException('Parameter must be an Array with Passwords');
        }

        if (!session_id()) {
            session_start();
        }

        $this->userArray = $userArray;

    }

    public function logOut() {

        $this->saveLogin(false);

    }

    public function tryLogin($password) {

        $success = $this->checkPassword($password);
        $this->saveLogin($success);

    }

    protected function checkPassword($password) {

        return in_array($password, $this->userArray);

    }

    protected function saveLogin($success) {

        $_SESSION[$this->sessionName] = false;
        if ($success === true) {
            $_SESSION[$this->sessionName] = true;
        }

    }

    public function isLoggedIn() {

        $loggedIn = false;

        if (isset($_SESSION[$this->sessionName])) {
            $loggedIn = $_SESSION[$this->sessionName];
        }

        return $loggedIn;

    }


}