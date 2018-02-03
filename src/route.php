<?php 
	namespace src;

	use src\setting;
	use LINE\LINEBot;
	use LINE\LINEBot\Constant\HTTPHeader;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use LINE\LINEBot\Event\MessageEvent\TextMessage;
	use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
	use src\eventHandler\followHandler;
	use src\eventHandler\replyHandler\textHandler;

	class route
	{
		public function register ($app) {
			$app->post('/', function (Request $request, Response $response) {
				$bot = (new setting())->register();
				$get_req = $request->getBody();

				$json = json_decode($get_req, true);
				$events = $json['events'];

				//init LINE request 
				$userId = $events[0]['source']['userId'];
				$type = $events[0]['type'];
				$replyToken = $events[0]['replyToken'];
				$text = $events[0]['message']['text'];

				//init get profile
				$getProfile = $bot->getProfile($userId);
				$profile = $getProfile->getJSONDecodedBody();

				if ($type == 'message') {
					(new textHandler($bot, $text, $replyToken, $profile))->handle();
				}

				if ($type == 'follow') {
					(new followHandler($bot, $replyToken))->handle();
				}
				
			});
		}

	}
 ?>