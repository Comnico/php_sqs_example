<?php
require_once('/Users/mfuruya/dev/test/sqs/vendor/aws/aws.phar');

use Aws\Sqs\SqsClient;

$auth = [
    "key" => "key",
    "secret" => "secret",
    "region" => "ap-northeast-1",
];
$sqs = SqsClient::factory($auth);

// キューへメッセージが入っているか確認
$result = $sqs->receiveMessage(array(
	// 作成したキューURLを入れる
    'QueueUrl' => 'xxxxxx',
));

error_log(date('Y-m-d H:i:s') . $result .  "\n" , 3, './test.log');

