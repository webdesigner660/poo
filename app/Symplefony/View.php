<?php

namespace Symplefony;

class View
{
    public const VIEW_PATH = APP_PATH . 'views' . DS;
    public const COMMON_PATH = self::VIEW_PATH . '_common' . DS;

    private string $name;
    private bool $is_complete;

    public static function renderError(int $code): void
    {
        http_response_code($code);

        $is_complete = $code !== 404;
        $data = [];

        if (!$is_complete) {
            $data['title'] = 'Page inexistante - Autodingo.com';
        }

        $view = new self('_errors:' . $code, $is_complete);

        $view->render($data);
    }

    /**
     * constructeur
     * @param string $name Nom de la vue (construction représentant le chemin )
     * @return View Instance
     */

    public function __construct(string $name, bool $is_complete = false)
    {
        $this->name = $name;
    }

    public function render(array $view_data = []): void
    {
        //transforme un tableau associatif en liste de variables nommées comme les clés 
        extract($view_data);

        if (isset($title)) {
            $title = 'TITRE PAR DÉFAUT';
        }


        //démarrage du cache de reponse 
        ob_start();

        require_once self::COMMON_PATH . 'top.phtml';

        require_once $this->getTemplatesPath();

        require_once self::COMMON_PATH . 'bottom.phtml';

        //liberation du cache 
        ob_end_flush();
    }

    private function getTemplatesPath(): string
    {
        $path = self::VIEW_PATH . 'page' . DS . 'home.phtml';

        // on remplace les ":" de $this->name par des séparateurs de dossiers (DS)
        $path = str_replace(':', DS, $this->name);

        // on ajoute devant avant et apres le reste du chemin final 
        $path = self::VIEW_PATH . $path . '.phtml';

        return $path;
    }
}
