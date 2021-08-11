<?php

namespace App\Services;

use Gumlet\ImageResize;
use Ramsey\Uuid\Uuid;

class ImageFileService
{

    protected const WIDTHS = [100, 300, 500, 700, 1000, 1500, 2500];

    public static function upload($ruta_destino, $file)
    {
        $nombre_imagen = Uuid::uuid4();
        $extension = $file->getClientOriginalExtension();
        $nombre_completo_imagen = $nombre_imagen . "." . $extension;
        try {
            // mover la imagen
            $file->move($ruta_destino, $nombre_completo_imagen);
            // manipular imagen: crear distintas versiones de una imagen
            $ruta_imagen = $ruta_destino . "/" . $nombre_completo_imagen;
            $info_imagen = getimagesize($ruta_imagen); // capturar las dimensiones de un archivo de imagen
            $contador = 0;
            // imagen => 756px
            while (self::WIDTHS[$contador] < $info_imagen[0]) {
                $imagen_reducida = new ImageResize($ruta_imagen);
                $imagen_reducida->resizeToWidth(self::WIDTHS[$contador]);
                $nombre_imagen_reducida = $ruta_destino . "/" . $nombre_imagen . 'x' . self::WIDTHS[$contador] . '.' . $extension;
                // '2jadljk2434x100.jpg'
                // guardar imagen reducida
                $imagen_reducida->save($nombre_imagen_reducida);
                $contador++;
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $nombre_completo_imagen;
    }


    /**
     * $imagen_original = '2jadljk2434.jpg';
     * '2jadljk2434x100.jpg'
     * '2jadljk2434x300.jpg'
     * '2jadljk2434x500.jpg'
     * .....
     */

    public static function deleteImages(string $nombre, string $ruta)
    {
    }
}
