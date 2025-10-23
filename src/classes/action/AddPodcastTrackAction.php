<?php

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\track\PodcastTrack;
use iutnc\deefy\render\AudioListRenderer;

class AddPodcastTrackAction extends Action {

    public function execute() : string {
        session_start();
        if($this->http_method === 'POST') {
            $uploaddir = 'C:/xampp/htdocs/mysite/DeefyApp/audio/';
            $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

            if (substr($_FILES['userfile']['name'],-4) === '.mp3' && $_FILES['userfile']['type'] === 'audio/mpeg') {
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    $pt = new PodcastTrack(filter_var($_POST['titlePodcast']), filter_var($_FILES['userfile']['name']));
                    $pt->setAuteur(filter_var($_POST['authorPodcast']));
                    $pt->setDuree(filter_var($_POST['timePodcast']));
                    $p = $_SESSION['playlist'];

                    $p->addPiste($pt);

                    $_SESSION['playlist'] = $p;
                    $r = new AudioListRenderer($_SESSION['playlist']);
                    return $r->render(2) .  "<a href='?action=add-track'>Ajouter encore une piste</a>";
                } else {
                    print_r($_FILES);
                    return "error downloading file";
                }
            } else {
                print_r($_FILES);
                return "error wrong file extension";
            }


        } else if ($this->http_method === 'GET') {
            return "<form enctype='multipart/form-data' method='post' action='?action=add-track'>"
                . "<label for='titlePodcast'>Donner titre podcast : </label>"
                . "<input type='text' id='titlePodcast' name='titlePodcast'>"
                . "<br><br><label for='userfile'>Donner fichier podcast : </label>"
                . "<input type='hidden' name='MAX_FILE_SIZE' value='30000' />"
                . "<input type='file' name='userfile'>"
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
