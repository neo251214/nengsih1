<?php 
	namespace src;

	use LINE\LINEBot;
	use LINE\LINEBot\HTTPClient\CurlHTTPClient;

	class setting
	{
		public function register () {

			$channelToken = 'J6A2zs5tta+NL/+gwyGoYnNTX2XN0qXeU7AMDMcDvtyg8D5hT6KtiS7sPT++cI5/7YN1I3vWVLaaz2H3QK82/b+QJllx6sOKp5Nsj6IGz8XjfeZX9uSHDKUIdo90+U7QxrNMegBcrNth88NTdl21qQdB04t89/1O/w1cDnyilFU=';
			$channelSecret = 'a43e7333ad8bba1e05bbf01707a97d20';

			$bot = new LINEBot(new CurlHTTPClient($channelToken), [
			        'channelSecret' => $channelSecret,
			        // 'endpointBase' => $apiEndpointBase, // <= Normally, you can omit this
			]);
			return $bot;
		}
	}

 ?>
