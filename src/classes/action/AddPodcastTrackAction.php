<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\track\PodcastTrack;

class AddPodcastTrackAction extends Action {

    public function execute() : string {
        session_start();
        $p1 = new PodcastTrack("Default", "file/path/file.mp3");

        $p = $_SESSION['playlist'];

        $p->addPiste($p1);

        $_SESSION['playlist'] = $p;
        return "addition à la playlist";

    }

}
