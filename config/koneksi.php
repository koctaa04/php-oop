<?php

class Database{
    var $host = "localhost";
    var $username = "root";
    var $pass = "";
    var $db = "oop";
    var $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->pass);
        mysqli_select_db($this->conn, $this->db);
    }

    function tampil_data()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM siswa");
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

        return $rows;

        // var_dump($rows);
    }

    function tambah_siswa($nis, $nama, $tgl_lahir, $alamat)
    {
        mysqli_query($this->conn, "INSERT INTO siswa VALUES (NULL, '$nis', '$nama', '$tgl_lahir', '$alamat' )");
    }

    // function edit_siswa($id)
    // {
    //     $data = mysqli_query($this->conn, "SELECT * FROM siswa WHERE id='$id'");
    //     $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    //     return $rows;
    // }

    function update_siswa($id, $nis, $nama, $tgl_lahir, $alamat)
    {
        mysqli_query($this->conn, "UPDATE `siswa` SET `nis` = '$nis', `nama` = '$nama',`tgl_lahir` = '$tgl_lahir', `alamat` = '$alamat' WHERE `siswa`.`id` = '$id'");
    }

    function hapus_siswa($id)
    {
        mysqli_query($this->conn, "DELETE FROM siswa WHERE id = '$id'");
    }
}