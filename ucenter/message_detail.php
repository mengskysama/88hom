<?php
require 'path.inc.php';
require 'check_login.php';

$messageId = getParameter("msgid","GET");
$messageService = new MessageService($db);
$result = $messageService->changeState(4,$messageId);
echo "result->".$result;

//header("Location:message_inbox.php");
?>