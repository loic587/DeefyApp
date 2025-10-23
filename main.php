<?php
// require_once './src/loader/Psr4ClassLoader.php';

require_once 'src/loader/Loader.php';

use iutnc\deefy\audio\track\AlbumTrack;
use iutnc\deefy\audio\track\PodcastTrack;
use iutnc\deefy\audio\lists\Album;
use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AlbumTrackRenderer;
use iutnc\deefy\render\PodcastRenderer;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\render\Renderer;
use iutnc\deefy\dispatch\Dispatcher;
use iutnc\deefy\exception\InvalidPropertyValueException;

$loader = new Loader("iutnc\\deefy\\", "src/classes");
$loader->register();

$d1 = new Dispatcher();
$d1->run();

$t1 = new AlbumTrack("Thriller", "thriller.mp3", "Thriller", 1);
$t1->setAuteur("Michael Jackson");
$t1->setDuree(357);
$t2 = new AlbumTrack("Billie Jean", "billiejean.mp3", "Thriller", 2);
$t2->setAuteur("Michael Jackson");
$t2->setDuree(293);
$p1 = new PodcastTrack("Episode 1", "pod_ep1.mp3");
$p1->setAuteur("Host X");
$p1->setDuree(1800);

$album = new Album("Best of MJ", [$t1, $t2], "Michael Jackson");
$album->setDateSortie("1982-11-30");
$playlist = new Playlist("Mes écoutes");
$playlist->addPiste($t1);
$playlist->addPiste($p1);

$r1 = new AlbumTrackRenderer($t1);
echo $r1->render(Renderer::COMPACT);
$rp = new PodcastRenderer($p1);
echo $rp->render(Renderer::LONG);
$listRenderer = new AudioListRenderer($playlist);
echo $listRenderer->render(0);