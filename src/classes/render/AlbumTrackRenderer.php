<?php
namespace iutnc\deefy\render;

use iutnc\deefy\audio\track\AlbumTrack;

class AlbumTrackRenderer extends AudioTrackRenderer
{
    public function __construct(AlbumTrack $track)
    {
        parent::__construct($track);
    }

    protected function renderCompact(): string
    {
        $titre = htmlspecialchars($this->track->__get('titre'));
        $artiste = htmlspecialchars($this->track->__get('auteur') ?? 'Unknown');
        $album = htmlspecialchars($this->track->__get('album'));
        $numero = (int)$this->track->__get('numero');
        return "<div class=\"track compact\"><strong>{$titre}</strong> — {$artiste} ({$album} — #{$numero})</div>";
    }

    protected function renderLong(): string
    {
        $titre = htmlspecialchars($this->track->__get('titre'));
        $f = $this->audioTag();
        $duree = (int)$this->track->__get('duree');
        return "<div class=\"track long\"><h2>{$titre}</h2><p>duree: {$duree}s</p>{$f}</div>";
    }
}
