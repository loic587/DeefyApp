<?php

namespace iutnc\deefy\dispatch;

use iutnc\deefy\action\DefaultAction;
use iutnc\deefy\action\AddPlaylistAction;
use iutnc\deefy\action\AddPodcastTrackAction;
use iutnc\deefy\action\DisplayPlaylistAction;
use iutnc\deefy\action\AddUserAction;

class Dispatcher{

    private $action;

    public function __construct()
    {
        if(isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
    }

    public function run(): void {
        switch ($this->action) {
            case "default" :
                $act = new DefaultAction();
                break;
            case "playlist" :
                $act = new DisplayPlaylistAction();
                break;
            case "add-playlist" :
                $act = new AddPlaylistAction();
                break;
            case "add-track" :
                $act = new AddPodcastTrackAction();
                break;
            case "add-user" :
                $act = new AddUserAction();
                break;
            default :
                $act = new DefaultAction();
                break;
        }

        $this->renderPage($act->execute());
    }

    private function renderPage(string $html): void {
        echo <<<HTML
            <h1> DeefyApp </h1>
            $html
            <br><a href='?action=add-user'>Inscription</a>
            <br><a href='?action=add-playlist'>Creer playlist</a>
            <br><a href='?action=playlist'>Voir playlist</a>
            <br><a href='main.php'>Page d'accueil</a>
            HTML;
    }

}