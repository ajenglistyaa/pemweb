<?php
class CdMusic extends Product{
private $artist;
private $genre;

public function getArtist() {
    return $this->artist;
}

public function setArtist($artist) {
    $this->artist = $artist;
}

public function getGenre() {
    return $this->genre;
}

public function setGenre($genre) {
    $this->genre = $genre;
    }
}   
?>
