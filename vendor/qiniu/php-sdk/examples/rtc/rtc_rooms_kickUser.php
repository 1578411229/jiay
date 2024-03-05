<?php
require_once __DIR__ . '/../../autoload.php';

use Qiniu\Auth;
use Qiniu\Rtc\AppClient;

// 控制台获取密钥：https://portal.qiniu.com/user/key
$accessKey = getenv('QINIU_ACCESS_KEY');
$secretKey = getenv('QINIU_SECRET_KEY');

$auth = new Auth($accessKey, $secretKey);
$client = new AppClient($auth);

// app 的唯一标识，创建的时候由系统生成
$appId = 'xxxx';

// 房间名称
$roomName = 'room01';

// 操作所剔除的用户
$userId = '001';

// 指定一个用户踢出房间
// 参考文档：https://doc.qnsdk.com/rtn/docs/server_overview#2_2

list($ret, $err)  = $client->kickUser($appId, $roomName, $userId);
if ($err !== null) {
    var_dump($err);
} else {
    echo "\n====> Kick User $userId Successfully \n";
}
