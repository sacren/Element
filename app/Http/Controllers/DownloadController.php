<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    /**
     * Handle the download request.
     */
    public function __invoke()
    {
        return response()->download(public_path('index.php'));
    }
}
