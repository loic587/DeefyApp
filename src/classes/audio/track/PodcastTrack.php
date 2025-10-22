<?php
namespace iutnc\deefy\audio\track;

class PodcastTrack extends AudioTrack
{
    public function __construct(string $titre, string $fichier)
    {
        parent::__construct($titre, $fichier);
    }

    public function getCompactRepresentation(): string { return sprintf('%s — podcast', $this->titre); }
}
