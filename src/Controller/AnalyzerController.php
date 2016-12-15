<?php
namespace Bookify\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class AnalyzerController
{
    public function post(Request $request, Application $app)
    {
        $text = $request->request->get('text');

        if (empty($text)) {
            return $app->json([
                'error'   => true,
                'message' => 'invalid text'
            ]);
        }

        // text sent to the tone analyzer

        return $app->json([
            'error'   => false,
            'musics'  => [],
        ]);
    }
}
