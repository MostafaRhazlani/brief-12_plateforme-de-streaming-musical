<?php

    class SongController extends Controller {
        private $songModel;

        public function __construct()
        {
            $this->songModel = new Song;
        }

        public function getAllSongs() {
            $songs = $this->songModel->index();
            if(isset($songs)) {
                return $songs;
            }
        }

        public function createSong() {
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $this->songModel->setNameSong($_POST['nameSong']);
                $this->songModel->setIdCategory($_POST['idCategory']);
                $this->songModel->setIdArtist($_SESSION['user']['iduser']);
                $this->songModel->setImageSong($_FILES['imageSong']['name']);
                $tempNameImageSong = $_FILES['imageSong']['tmp_name'];
                $folderImage = __DIR__ . '/../../public/images/songsImage/' . $_FILES['imageSong']['name'];

                $this->songModel->setSong($_FILES['song']['name']);
                $tempNameSong = $_FILES['song']['tmp_name'];
                $folderSong = __DIR__ . '/../../public/songs/' . $_FILES['song']['name'];

                if($this->songModel->create()) {
                    move_uploaded_file($tempNameImageSong, $folderImage);
                    move_uploaded_file($tempNameSong, $folderSong);
                    $this->redirect('artist/songs');
                }   
            }
        }
    }