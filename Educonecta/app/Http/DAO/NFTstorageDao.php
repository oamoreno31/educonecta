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

            // $file = $request->file('file_' . $number);
            $filePath = $file->getRealPath();
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.nft.storage/upload',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'file' => new \CurlFile($filePath, $file->getClientMimeType(), $file->getClientOriginalName())
                ],
                CURLOPT_HTTPHEADER => [
                    'Content-Type: multipart/form-data',
                    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDk3QjI5RWJjNzU3ZDJDRWUxQjBEMkRjQTg5YTEzRjU3YzUwOWYyMWQiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY4NzMxMjEzNjE1MywibmFtZSI6IklQRlMgd2l0aCBQb3N0bWFuIn0.x3wnN8mbo_ALhb9yTQkwZKkFz_yWpVzOPgw6s4Kc8CA'
                ]
            ]);
            $result = curl_exec($ch);
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = json_decode($result)->value->cid;
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
