<?php

namespace App\Http\Controllers;

use Buzz\Browser;

class DebugController extends Controller
{
    public function debug()
    {
        /*$xuid = '2533274800386272';

        $message = 'Jacky.. Et Michel ! ha ha ha. Bon je retourne bosser. (Albartros98 qui s\'ennuie)';

        $vars = array('to' => array($xuid, '2533274829585127'), 'message' => $message);
        $jsonVars = json_encode($vars);

        $browser = new Browser();
        $response = $browser->post('https://xboxapi.com/v2/messages', array('X-AUTH' =>
            '16b3d2b573b14ac0c06130f45a837da3fde2c42d', 'Content-Type' => 'application/json'), $jsonVars);

        var_dump($response->getContent());*/
    }
}