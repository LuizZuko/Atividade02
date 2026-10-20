<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class ExternalApiController extends Controller
{
    public function getExternalPosts(): JsonResponse
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->successful()) {
            $posts = $response->json();
            
            return response()->json([
                'status' => 'sucesso',
                'total' => count($posts),
                'dados' => array_slice($posts, 0, 5) 
            ], 200);
        }

        return response()->json([
            'error' => 'Falha ao buscar dados externos'
            ], 500);
    }
}
