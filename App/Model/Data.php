<?php namespace App\Model;

abstract class Data
{
    protected static $t_mahasiswa = "mahasiswa";
    protected static $t_dosen = "dosen";
    protected static $t_matakuliah = "matakuliah";
    protected static $t_kelas = "kelas";
    protected static $t_jadwal = "jadwal";
    protected static $t_inti = "inti";
    protected static $t_absen = "absensi";
    protected static $t_pert = "pertemuan";

    protected static $ImageFolder = "App/Image/Mahasiswa/";

    public static abstract function GetAll($link);

    public static abstract function GetWithId($link, $id);

    public static abstract function Update($link, $id, $data);

    public static abstract function Delete($link, $id);

    public static abstract function Insert($link, $data);
}