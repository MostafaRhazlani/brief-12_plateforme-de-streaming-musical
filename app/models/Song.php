<?php
    class Song {
        private $id;
        private $nameSong;
        private $imageSong;
        private $song;
        private $dateAdded;
        private $idCategory;
        private $idArtist;
        private $conn;
        
        public function __construct($id = "", $nameSong = "", $song = "", $imageSong = "", $dateAdded = "", $idCategory = "", $idArtist = "")
        {   
            $this->conn = Database::connect();
            $this->id = $id;
            $this->nameSong = $nameSong;
            $this->imageSong = $imageSong;
            $this->song = $song;
            $this->dateAdded = $dateAdded;
            $this->idCategory = $idCategory;
            $this->idArtist = $idArtist;
        }

        public function getId() {
            return $this->id;
        }

        public function getNameSong() {
            return $this->nameSong;
        }

        public function getImageSong() {
            return $this->imageSong;
        }

        public function getSong() {
            return $this->song;
        }

        public function getDateAdded() {
            return $this->dateAdded;
        }

        public function getIdCategory() {
            return $this->idCategory;
        }

        public function getIdArtist() {
            return $this->idArtist;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNameSong($nameSong) {
            $this->nameSong = $nameSong;
        }

        public function setImageSong($imageSong) {
            $this->imageSong = $imageSong;
        }

        public function setSong($song) {
            $this->song = $song;
        }

        public function setIdCategory($idCategory) {
            $this->idCategory = $idCategory;
        }

        public function setIdArtist($idArtist) {
            $this->idArtist = $idArtist;
        }

        public function index() {
            $sql = 'SELECT songs.*, categories.nameCategory, users.fullName FROM songs 
                    JOIN categories ON categories.idCategory = songs.idCategory
                    JOIN users ON users.iduser = songs."idArtist"';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getByOne() {
            $sql = 'SELECT * FROM songs
                    JOIN categories ON categories.idCategory = songs.idCategory
                    JOIN users ON users.iduser = songs."idArtist"
                    WHERE idsong = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create() {
            $sql = 'INSERT INTO songs (nameSong, imageSong, "idArtist", idcategory, song) VALUES (?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->nameSong, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->imageSong, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->idArtist, PDO::PARAM_INT);
            $stmt->bindValue(4, $this->idCategory, PDO::PARAM_INT);
            $stmt->bindValue(5, $this->song, PDO::PARAM_STR);
            return $stmt->execute();
        }
    }

?>