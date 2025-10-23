<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;

class AddPlaylistAction extends Action {

    public function execute() : string {
        session_start();
        $_SESSION['playlist'] = new Playlist("playlist");
        return "ajout de la playlist";
    }

}