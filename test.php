<?php
require_once('./vendor/aws/aws.phar');

use Aws\Sqs\SqsClient;
use Aws\CloudWatch\CloudWatchClient;

$auth = [
    "key" => "key",
    "secret" => "secret",
    "region" => "ap-northeast-1",
];

$sqs = SqsClient::factory($auth);

$result = $sqs->createQueue(array(
    'QueueName' => 'test',
));
// 作成したキューURL
$queueUrl = $result->get('QueueUrl');

// 作成したキューへメッセージを保存
$sqs->sendMessage(array(
    'QueueUrl'    => $queueUrl,
    'MessageBody' => 'An awesome !'.date("H:i:s"),
));

