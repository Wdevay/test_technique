<?php

namespace App\Controllers;

use App\Models\UserManager;

class UserController
{
    //Fonction permettant d'inserer un nouvel utilisateur avec controle d'erreurs
    public function index()
    {
        $success = false;
        $errors = [];

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {

            $username = htmlentities(strip_tags($_POST['username']));
            $password = password_hash(htmlentities(strip_tags($_POST['password'])), PASSWORD_BCRYPT);
            $email = htmlentities(strip_tags($_POST['email']));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Veuillez renseigner une adresse email valide svp";
            }

            $userManager = new UserManager();
            $email_already_used = $userManager->getOnebyEmail($email);

            if ($email_already_used) {
                $errors[] = "Cette adresse e-mail est déjà utilisée";
            }

            if (empty($errors)) {

                $userManager->insert([$username, $email, $password]);

                $success = true;
            }

        }

        $this->render(['success' => $success, 'errors' => $errors]);
    }

    //Fonction permettant d'afficher la page d'inscription
    public function render($data)
    {

        extract($data);
        include "./Views/base.phtml";
    }
}
