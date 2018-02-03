<?php 
	namespace src;

	use LINE\LINEBot;
	use LINE\LINEBot\HTTPClient\CurlHTTPClient;

	class setting
	{
		public function register () {

			$channelToken = 'vzRIehGMCtF4E4JATMWKr8W0k8j2Z424DYgeKwS+Fkhrh7brzrQyANsEggJ+9qDOGJL4gr72NKGmPs0HYo4BNFdQQSIXPD67DYdjxqJg5CPjdzkO4WJRQ7CONRFGBG2Dl3lelA5/fc0ZVCM3qi9U5gdB04t89/1O/w1cDnyilFU=';
			$channelSecret = 'a5810cdcb7a564b026585e22a6bdc051';

			$bot = new LINEBot(new CurlHTTPClient($channelToken), [
			        'channelSecret' => $channelSecret,
			        // 'endpointBase' => $apiEndpointBase, // <= Normally, you can omit this
			]);
			return $bot;
		}
	}

 ?>