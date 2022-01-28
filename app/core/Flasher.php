<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash_cafe17_admin'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe

        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash_cafe17_admin'])) {
            echo '<div class="alert alert-' . $_SESSION['flash_cafe17_admin']['tipe'] . ' alert-dismissible fade show" role="alert">
            <strong>' . $_SESSION['flash_cafe17_admin']['pesan'] . '</strong> ' . $_SESSION['flash_cafe17_admin']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['flash_cafe17_admin']);
        }
    }


    
    
}
