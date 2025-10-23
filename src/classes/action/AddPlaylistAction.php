<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AudioListRenderer;

class AddPlaylistAction extends Action {

    public function execute() : string {
        session_start();
        if($this->http_method === 'POST') {
            $_SESSION['playlist'] = new Playlist(filter_var($_POST['namePlaylist']));
            $r = new AudioListRenderer($_SESSION['playlist']);
            return $r->render(2) . "<br><a href='?action=add-track'>Ajouter une piste</a>";
        } else if ($this->http_method === 'GET') {
            return "<form method='post' action='?action=add-playlist'>"
                . "<label for='namePlaylist'>Donner nom playlist : </label>"
                . "<input type='text' id='namePlaylist' name='namePlaylist'>"
                . "<br><input type='submit' value='Submit'></form>";
        } else {
            return "error unknown request type";
        }
    }

}