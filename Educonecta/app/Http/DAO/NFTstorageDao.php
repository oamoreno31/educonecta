<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Post;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class NFTstorageDao
 * @package App\Http\DAO
 */
class NFTstorageDao
{
    /**
     * Upload File to NFT
     */
    public static function UploadFile($file)
    {
        try {

            $url = "https://httpbin.org/post";
            // Los datos de formulario
            $datos = [
                "nombre" => "Luis Cabrera Benito",
                "web" => "https://parzibyte.me/blog",
            ];
            // Crear opciones de la petición HTTP
            $opciones = array(
                "http" => array(
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($datos), # Agregar el contenido definido antes
                ),
            );
            # Preparar petición
            $contexto = stream_context_create($opciones);
            # Hacerla
            $resultado = file_get_contents($url, false, $contexto);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $resultado;
            return $response;
        } catch (\Throwable $th) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "error";
            $response->detail = $th;
            return $response;
        }
    }
}
