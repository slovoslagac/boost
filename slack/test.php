<?php
// Create a constant to store your Slack URL
define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/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');
// Make your message
$message = array('payload' => json_encode(array('text' => 'Kokeza je gej')));
// Use curl to send your message
$c = curl_init(SLACK_WEBHOOK);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_POSTFIELDS, $message);
curl_exec($c);
curl_close($c);