<?php

namespace App\Controller;

use App\Model\UserModel;
use Laminas\Diactoros\ServerRequest;
use Symplefony\View;

class UserController
{
    // visiteur : affichage du formulaire de création de compte 
    public function displaySubscribe(): void
    {
        $view = new View('user::create-account');
        $data = [
            'title' => 'Créer mon compte - CheapAuto.com'
        ];
        $view->render($data);
    }

    // visiteur: traitement du formulaire de création de compte 
    public function processSubscribe(): void
    {
        // todo 
    }

    //admin : affichage du formulaire de création d'un utilisateur
    public function add(): void
    {
        $view = new View("user:admin:create");

        $data = [
            'title' => 'Ajouter un utilisateur'
        ];

        $view->render($data);
    }

    //admin : triatement du formulaire de création de l'utilisateur
    public function create(ServerRequest $request): void
    {
        echo 'traitement en cours...';
    }

    // admin: détail 
    public function show(int $id): void
    {
        $view = new View('user:admin:details');

        $user = UserModel::find($id);

        if (is_null($user)) {
            View::renderError(404);
            return;
        }

        $data = [
            'title' => 'utilisateur' . $user->getId(),
            'user' => $user
        ];

        $view->render($data);
    }
}
