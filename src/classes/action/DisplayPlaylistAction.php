<?php

namespace iutnc\deefy\action;

use iutnc\deefy\render\AudioListRenderer;

class DisplayPlaylistAction extends Action {

    public function execute() : string {
        session_start();
        $alr = $_SESSION['playlist'];
        $r = new AudioListRenderer($alr);
        return $r->render(1);
    }

}