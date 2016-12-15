<?php
namespace Bookify\Services;

use GuzzleHttp\Client;

class TextAnalysisService
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->client = new Client();
    }

    /**
     * @param string $text
     * @return string
     */
    public function getTone($text)
    {
        $result = $this->client->request(
            'GET',
            'https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19&text=' . urlencode($text),
            [ 'auth' => [$this->username, $this->password, 'basic'] ]
        );

        $tone = $this->decodeTone((string) $result->getBody());

        return $tone;
    }

    /**
     * @param string $body
     * @return array
     */
    private function decodeTone($body)
    {
        $json = json_decode($body, true);
        $tones = $json['document_tone']['tone_categories'][0]['tones'];
        $chosenTone = [
            'tone_id' => false,
            'score'   => 0
        ];

        foreach ($tones as $tone) {
            if ($chosenTone['score'] < $tone['score']) {
                $chosenTone = $tone;
            }
        }

        return $chosenTone;
    }
}
