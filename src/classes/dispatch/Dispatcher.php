<?php

namespace iutnc\deefy\dispatch;

use iutnc\deefy\action\DefaultAction;
use iutnc\deefy\action\AddPlaylistAction;
use iutnc\deefy\action\AddPodcastTrackAction;
use iutnc\deefy\action\DisplayPlaylistAction;

class Dispatcher{

    private $action;

    public function __construct()
    {
        $this->action = $_GET['action'];
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
            default :
                $act = new DefaultAction();
                break;
        }

        $this->renderPage($act->execute());
    }

    private function renderPage(string $html): void {
        echo $html;
    }

}