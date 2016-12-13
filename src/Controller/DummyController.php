<?php
namespace Bookify\Controller;

use Silex\Application;

class DummyController
{
    public function get(Application $app)
    {
        return $app->json([
            'error' => true,
            'message' => 'Not found',
        ]);
    }
}
