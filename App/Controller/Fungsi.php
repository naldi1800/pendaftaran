<?php


namespace App\Contorller;


class Fungsi
{
    public static function GetHari($date)
    {
//        $hari = date("D", strtotime($date));
        $hari = strftime('%a', $date->getTimestamp());

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }

    public static function GetJam($time)
    {
        $time = \DateTime::createFromFormat('h:i a', $time);

        $awal = \DateTime::createFromFormat('h:i a', "07:00 am");
        $akhir = \DateTime::createFromFormat('h:i a', "09:10 am");


        if ($time > $awal && $time < $akhir) {
            return "07:30-09:10";
        }

        $awal = \DateTime::createFromFormat('h:i a', "09:20 am");
        $akhir = \DateTime::createFromFormat('h:i a', "11:00 am");

        if ($time > $awal && $time < $akhir) {
            return "09:20-11:00";
        }

        $awal = \DateTime::createFromFormat('h:i a', "11:10 am");
        $akhir = \DateTime::createFromFormat('h:i a', "1:50 pm");

        if ($time > $awal && $time < $akhir) {
            return "11:10-12:50";
        }

        $awal = \DateTime::createFromFormat('h:i a', "1:40 pm");
        $akhir = \DateTime::createFromFormat('h:i a', "3:20 pm");

        if ($time > $awal && $time < $akhir) {
            return "13:40-15:20";
        }

        $awal = \DateTime::createFromFormat('h:i a', "3:40 pm");
        $akhir = \DateTime::createFromFormat('h:i a', "5:00 pm");

        if ($time > $awal && $time < $akhir) {
            return "15:40-17:00";
        }

        return "-";

    }
}