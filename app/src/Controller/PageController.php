<?php

namespace App\Controller;

use Symplefony\View;

use App\Model\UserModel;
use Symplefony\Database;

class PageController
{
    // Page d'accueil
    public function index(): void
    {
        $view = new View('page:home');

        $data = [
            'title' => 'Accueil - Autodingo.com'
        ];

        $view->render($data);
    }

    // Page mentions légales
    public function legalNotice(): void
    {
        echo 'Les mentions légales !';

        //test de create a supp
        $data = [
            'password' => '1234',
            'email' => 'toto@toto.com',
            'firstname' => 'John',
            'lastname' => 'Michell',
            'phone_number' => '06 15 48 79 87'
        ];

        $user = new UserModel($data);
        $new_user = UserModel::create($user);
        var_dump($new_user);

        $id_user = UserModel::find(5);
        var_dump($id_user);
    }
}
