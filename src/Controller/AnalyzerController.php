<?php
namespace Bookify\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AnalyzerController
{
    public function post(Request $request, Application $app)
    {
        $files = $request->files->all();

        if (empty($files)) {
            return $app->json([
                'error'   => true,
                'message' => 'Malformed request'
            ]);
        }

        $tesseract = new \TesseractOCR($files['picture_upload']['path']);

        return $app->json([
            'error'   => false,
            'musics'  => $files
        ]);
    }
}
