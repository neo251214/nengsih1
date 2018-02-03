<?php 
	namespace src\eventHandler\replyHandler;

	use LINE\LINEBot;
	use LINE\LINEBot\Event\MessageEvent\TextMessage;
	use LINE\LINEBot\Event\MessageEvent\ImageMessage; //image request handler
	use LINE\LINEBot\Event\MessageEvent\VideoMessage; //video requesr handler
	use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
 	use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
 	use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
 	use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
 	use LINE\LINEBot\Event\MessageEvent\AudioMessage;
 	use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
 	use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
 	use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
	use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
	use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
	use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
	use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
	use LINE\LINEBot\Event\MessageEvent\StickerMessage;
	use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
	use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
	use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
	use LINE\LINEBot\Event\MessageEvent\LocationMessage;
	use src\eventHandler;
	// use src\db;

	class textHandler implements eventHandler 
	{
		private $bot;
		private $text;
		private $replyToken;
		private $profile;

		private $linedb;
		private $libdb;

		public function __construct ($bot, $text, $replyToken, $profile) {
			$this->bot = $bot;
			$this->text = $text;
			$this->replyToken = $replyToken;
			$this->profile = $profile;

			// $server = "";
			// $username = "";
			// $password = "";
			// $dbname = "";
			// $this->linedb = new db($server, $username, $password, $dbname);
		}

		public function handle () {

			switch ($this->text) {

				case 'Text':
						$this->textReply("สวัสดี");
					break;

				case 'Image':
						$url = "";
						$this->imageReply($url, $url);
					break;

				case 'Video':
						$pre = "";
						$url = "";
						$this->videoReply($url, $pre);
					break;

				case 'Name':
						$this->textReply($this->profile['displayName']);
					break;

				case 'Img':
						$this->imageReply($this->profile['pictureUrl'], $this->profile['pictureUrl']);
					break;

				case 'Test':
					$this->stickerReply(1, 11);
					break;

				case 'Map':
					$this->locationReply("Bangkok", "Thailand", 13.736717, 100.523186);
					break;

				default:
						$this->textReply("ฉันไม่เข้าใจที่คุณพูดหมายถึงอะไร");
					break;
			}
		}

		private function textReply ($msg) {
			$this->bot->replyText($this->replyToken, $msg);
		}
		
		private function imageReply ($original, $preview) {
			// param ori = original image url on https
			// param pre = preview image url on htpps
			$this->bot->replyMessage($this->replyToken, new ImageMessageBuilder($original, $preview));
		}

		private function videoReply ($url, $pre) {
			// param url = url link mp4 on https
			// param pre = preview image video  on https
			$this->bot->replyMessage($this->replyToken, new VideoMessageBuilder($url, $pre));
		}

		private function audioReply ($url, $duration) {
			// param $url = url link m4a less than 1 minute 
			// param duration = time to play audio (milliseconds)
			$this->bot->replyMessage($this->replyToken, new AudioMessageBuilder($url, $duration));
		}

		private function locationReply ($title, $address, $latitude, $longitude) {
			//param title = name of location
			//param address = detail of location
			$this->bot->replyMessage($this->replyToken, new LocationMessageBuilder($title, $address, $latitude, $longitude));
		}

		private function stickerReply ($packageId, $stickerId) {
			$this->bot->replyMessage($this->replyToken, new StickerMessageBuilder($packageId, $stickerId));
		}



////////////////  DUMMY Function call Template //////////////////////////////
		// private function buttonReply () {
		// 	$buttonTemplateBuilder = new ButtonTemplateBuilder(
		// 			$title,
		// 			$detial,
		// 			$img,
		// 			[
		// 				// new UriTemplateActionBuilder('Go to line.me', 'https://line.me'),
		// 				// new MessageTemplateActionBuilder('ยืนยัน', "conform"),
		// 				new PostbackTemplateActionBuilder('ยืนยัน', "::confirm"),
		// 				new MessageTemplateActionBuilder('ยกเลิก', 'ยกเลิกการเติมเงินแล้ว'),
		// 			]
		// 		);
		// 	$templateMessage = new TemplateMessageBuilder('Button alt text', $buttonTemplateBuilder);
		// 	$this->bot->replyMessage($this->replyToken, new new StickerMessageBuilder($packageId, $stickerId));
		// }

		// private function carouselWalletMenu () {
		// 	$imageUrl = 'https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/img.jpg';
		// 	$carouselTemplateBuilder = new CarouselTemplateBuilder([
	 //            new CarouselColumnTemplateBuilder('foo', 'bar', $imageUrl, [
	 //                new UriTemplateActionBuilder('Go to line.me', 'https://line.me'),
	 //                new PostbackTemplateActionBuilder('Buy', 'action=buy&itemid=123'),
	 //            ]),
	 //            new CarouselColumnTemplateBuilder('buz', 'qux', $imageUrl, [
	 //                new PostbackTemplateActionBuilder('Add to cart', 'action=add&itemid=123'),
	 //                new MessageTemplateActionBuilder('Say message', 'hello hello'),
	 //            ]),
	 //        ]);
	 //        $templateMessage = new TemplateMessageBuilder('Button alt text', $carouselTemplateBuilder);
	 //        $this->bot->replyMessage($this->replyToken, $templateMessage);
		// }
 	}
 ?>