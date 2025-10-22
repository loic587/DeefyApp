<?php

namespace iutnc\deefy\action;

use iutnc\deefy\render\AudioListRenderer;

class DisplayPlaylistAction extends Action {

    private AudioListRenderer $alr;

    public function __construct()
    {
        $this->alr = $_SESSION['playlist'];
    }

    public function execute() : string {
        session_start();
        return $this->alr->render(1);
    }

}