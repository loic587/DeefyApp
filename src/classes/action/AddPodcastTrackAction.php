<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\track\PodcastTrack;
use iutnc\deefy\render\AudioListRenderer;

class AddPodcastTrackAction extends Action {

    public function execute() : string {
        session_start();
        if($this->http_method === 'POST') {
            $pt = new PodcastTrack(filter_var($_POST['titlePodcast']), filter_var($_POST['filePodcast']));
            $pt->setAuteur(filter_var($_POST['authorPodcast']));
            $pt->setDuree(filter_var($_POST['timePodcast']));
            $p = $_SESSION['playlist'];

            $p->addPiste($pt);

            $_SESSION['playlist'] = $p;
            $r = new AudioListRenderer($_SESSION['playlist']);
            return $r->render(1) .  "<a href='?action=add-track'>Ajouter encore une piste</a>";
        } else if ($this->http_method === 'GET') {
            return "<form method='post' action='?action=add-track'>"
                . "<label for='titlePodcast'>Donner titre podcast : </label>"
                . "<input type='text' id='titlePodcast' name='titlePodcast'>"
                . "<br><br><label for='filePodcast'>Donner fichier podcast : </label>"
                . "<input type='text' id='filePodcast' name='filePodcast'>"
                . "<br><br><label for='authorPodcast'>Donner auteur podcast : </label>"
                . "<input type='text' id='authorPodcast' name='authorPodcast'>"
                . "<br><br><label for='timePodcast'>Donner duree podcast : </label>"
                . "<input type='text' id='timePodcast' name='timePodcast'>"
                . "<br><br><input type='submit' value='Submit'></form>";
        } else {
            return "error unknown request type";
        }
    }

}
