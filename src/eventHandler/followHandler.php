<?php 
	namespace src\eventHandler;

	use LINE\LINEBot;
	use LINE\LINEBot\Event\MessageEvent\TextMessage;
	use src\eventHandler;

	class followHandler implements eventHandler
	{
		private $bot;
		private $replyToken;

		public function __construct ($bot, $replyToken) {
			$this->bot = $bot;
			$this->replyToken = $replyToken;
		}

		public function handle () {
			$this->bot->replyText($this->replyToken, 'Hallo aim Nengsih Rocker Lady nya UVSS');
		}
	}
 ?>
