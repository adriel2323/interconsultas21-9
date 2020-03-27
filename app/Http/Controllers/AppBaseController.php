<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function phpinfo()
    {
        return view('System.phpinfo');
    }

    public function test()
    {
       /* $text = "AUTO DESTRUCCIÓN ACTIVADA EN\n5...\n4...\n3...\n2...\n1...";

        Telegram::sendMessage([
            "chat_id" =>  '569299618',
            "parse_mode" => "HTML",
            "text" => $text
        ]);

       $file = InputFile::create('https://www.muyinteresante.com.mx/wp-content/uploads/2018/05/httpstved-prod.adobecqms.netcontentdameditorialTelevisamexicomuyinteresantemxpreguntas-y-respuestas16016atomic.imgo_.jpg','bomba');
        Telegram::sendPhoto([
            'chat_id' => '569299618',
            'photo' => $file,
            'caption' => 'BUUUUM!'
        ]);*/
    }
}
