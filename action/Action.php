<?php
class Action
{
    private $con;

    public function __construct($db)
    {
        $this->con = $db;
    }

    private function getCon()
    {
        return $this->con;
    }

    public function getKataRandom()
    {
        return mysqli_fetch_assoc(mysqli_query($this->getCOn(), "SELECT * FROM master_kata ORDER bY RAND() LIMIT 0,1"));
    }
    public function getKataById($id)
    {
        return mysqli_fetch_assoc(mysqli_query($this->getCOn(), "SELECT * FROM master_kata WHERE id = $id"));
    }
    public function saveRecordScore($name, $score, $date, $time)
    {
        return mysqli_query($this->getCon(), "INSERT INTO point_game (nama_user,total_point,tanggal,waktu_selesai) VALUES ('$name','$score','$date','$time')");
    }
    public function getRecord()
    {
        return mysqli_query($this->getCon(), "SELECT * FROM point_game ORDER BY id_point DESC");
    }
}
