<?php
namespace Bookify\Controller;

use Bookify\Services\TextAnalysisService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AnalyzerController
{
    public function post(Request $request, Application $app)
    {
        $text = $request->query->get('text');

        if (empty($text)) {
            return $app->json([
                'error'   => true,
                'message' => 'invalid text'
            ]);
        }

        // text sent to the tone analyzer
        $toneAnalyzer = new TextAnalysisService('048b660e-d0da-42aa-b2d0-a67b84e0cd9e', 'elwf1e8CV1Qt');
        $tone = $toneAnalyzer->getTone($text);

        if ($tone['tone_id'] == false) {
            return $app->json([
                'error'   => true,
                'message' => 'could not detected text tone'
            ]);
        }

        return $app->json([
            'error'   => false,
            'tone'    => $tone['tone_id'],
        ]);
    }
}
