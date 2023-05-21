<?php

namespace App\Contorller;
class Alert
{
    public static function Get()
    {

        if (isset($_SESSION['alert']) && $_SESSION['alert'] != "") {
            $pesan = $_SESSION['alert']['pesan'];
            $info = $_SESSION['alert']['info'];
            $data = $_SESSION['alert']['data'];

            switch ($info) {
                case "berhasil" :
                    {
                        $alerttype = "success";
                        $icon = "<use xlink:href='#check-circle-fill'/>";
                    }
                    break;
                case "peringatan" :
                    {
                        $alerttype = "warning";
                        $icon = "<use xlink:href='#exclamation-triangle-fill'/>";
                    }
                    break;
                case "gagal" :
                    {
                        $alerttype = "danger";
                        $icon = "<use xlink:href='#exclamation-triangle-fill'/>";
                    }
                    break;
            }

            $_SESSION['alert'] = "";
            unset($_SESSION['alert']);
            if ($alerttype == "warning") {
                return "<div class='alert alert-" . $alerttype . " alert-dismissible fade show d-flex align-items-center' role='alert'>" .
                    "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'> " .
                    "$icon</svg>" .
                    "<strong>Peringatan!!!</strong>&nbsp;$data | $pesan " .
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
                    "</div>";
            }
            return "<div class='alert alert-" . $alerttype . " alert-dismissible fade show d-flex align-items-center' role='alert'>" .
                "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'> " .
                "$icon</svg>" .
                "$data&nbsp;<strong>$info</strong>&nbsp;$pesan " .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
                "</div>";


        } else
            return "";
    }

    public static function Set($data, $pesan, $info)
    {
        $_SESSION['alert']['data'] = $data;
        $_SESSION['alert']['pesan'] = $pesan;
        $_SESSION['alert']['info'] = $info;
    }
}