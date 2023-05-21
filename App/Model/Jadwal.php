<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use App\Model\Kelas;


class Jadwal extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_jadwal . " AS A JOIN " . parent::$t_kelas .
            " AS B ON A.Kode_Kelas=B.Kode_Kelas";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_jadwal . " AS A JOIN " . parent::$t_kelas .
            " AS B ON A.Kode_Kelas=B.Kode_Kelas WHERE Id_Jadwal='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function GetWithKode($link, $kode)
    {
        $sql = "SELECT * FROM " . parent::$t_jadwal . " AS A JOIN " . parent::$t_kelas .
            " AS B ON A.Kode_Kelas=B.Kode_Kelas WHERE A.Kode_Kelas='" . $kode . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithJam($link, $jam, $hari)
    {
        $sql = "SELECT * FROM " . parent::$t_jadwal . " AS A JOIN " . parent::$t_kelas .
            " AS B ON A.Kode_Kelas=B.Kode_Kelas WHERE A.Jam='" . $jam . "' AND A.Hari='" . $hari . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function Update($link, $id, $data)
    {
        if ($data['kode_kelas'] != $data['id_kode_kelas']) {
            $cekhari = self::GetWithKode($link, $data['kode_kelas']);

            if ($cekhari != null) {
                foreach ($cekhari as $item)
                    if ($item['Hari'] == $data['hari']) {
                        Alert::Set("Data jadwal", "diubah | Kode Kelas " . $data['kode_kelas'] .
                            " telah ada di hari yang sama (Hari " . $data['hari'] . ")", "gagal");
                        return;
                    }
            }

            $cekkelas = Kelas::GetWithId($link, $data['kode_kelas']);
            if ($cekkelas != null) {
                $getdosen = Kelas::GetAllWithDosen($link, $cekkelas['NIDN']);
                foreach ($getdosen as $dosen) {
                    $kelas = self::GetWithKode($link, $dosen['Kode_Kelas']);
                    foreach ($kelas as $k) {
                        if ($k != null) {
                            if ($k['Hari'] == $data['hari'] && $k['Jam'] == $data['jam']) {
                                Alert::Set("Data jadwal",
                                    "diubah | Dosen " . $k['NIDN'] . " telah memiliki jadwal di Hari dan Jam yang sama",
                                    "gagal");
                                return;
                            }
                        }
                    }
                }
            }
        }

        $sql = "UPDATE " . parent::$t_jadwal . " SET "
            . "Kode_Kelas='" . $data['kode_kelas'] . "',"
            . "Hari='" . $data['hari'] . "',"
            . "Jam='" . $data['jam'] . "' WHERE Id_Jadwal='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data jadwal", "diubah", "berhasil");
        } else {
            Alert::Set("Data jadwal", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }


    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_jadwal . " WHERE Id_Jadwal='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data jadwal", "dihapus", "berhasil");
        } else {
            Alert::Set("Data jadwal", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $cekhari = self::GetWithKode($link, $data['kode_kelas']);

        if ($cekhari != null) {
            foreach ($cekhari as $item)
                if ($item['Hari'] == $data['hari']) {
                    Alert::Set("Data jadwal", "disimpan | Kode Kelas " . $data['kode_kelas'] .
                        " telah ada di hari yang sama (Hari " . $data['hari'] . ")", "gagal");
                    return;
                }
        }

        $cekkelas = Kelas::GetWithId($link, $data['kode_kelas']);
        if ($cekkelas != null) {
            $getdosen = Kelas::GetAllWithDosen($link, $cekkelas['NIDN']);
            foreach ($getdosen as $dosen) {
                $kelas = self::GetWithKode($link, $dosen['Kode_Kelas']);
                foreach ($kelas as $k) {
                    if ($k != null) {
                        if ($k['Hari'] == $data['hari'] && $k['Jam'] == $data['jam']) {
                            Alert::Set("Data jadwal",
                                "disimpan | Dosen " . $k['NIDN'] . " telah memiliki jadwal di Hari dan Jam yang sama",
                                "gagal");
                            return;
                        }
                    }
                }
            }
        }


        $sql = "INSERT INTO " . parent::$t_jadwal . " VALUES( '"
            . "NULL','"
            . $data['kode_kelas'] . "','"
            . $data['hari'] . "','"
            . $data['jam'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data jadwal", "disimpan", "berhasil");
        } else {
            Alert::Set("Data jadwal", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}