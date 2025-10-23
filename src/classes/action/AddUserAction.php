<?php

namespace iutnc\deefy\action;

class AddUserAction extends Action {

    public function execute() : string {
        session_start();

        if ($this->http_method === 'GET') {
            return <<<HTML
            <form method='post' action='?action=add-user'>
                <label for='username'>Username : </label>
                <input type='text' id='username' name='username'>
                <br><br><label for='email'>Email : </label>
                <input type='text' id='email' name='email'>
                <br><br><label for='age'>Age : </label>
                <input type='number' id='age' name='age'>
                <br><br><input type='submit' value='Submit'>
            </form>
            HTML;
        } else if ($this->http_method === 'POST') {
            $nom = filter_var($_POST['username']);
            $email = filter_var($_POST['email']);
            $age = filter_var($_POST['age']);
            return <<<HTML
                <p>Nom : $nom, Email : $email, Age : $age</p>
            HTML;
        } else {
            return "error unknown request type";
        }
    }

}