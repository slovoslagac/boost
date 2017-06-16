<?php


function sendSlackFinancialInfo($msg, $hook)
{

    // Create a constant to store your Slack URL
    define('SLACK_WEBHOOK', $hook);
// Make your message
    $message = array('payload' => json_encode(array('text' => $msg)));
// Use curl to send your message
    $c = curl_init(SLACK_WEBHOOK);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $message);
    curl_exec($c);
    curl_close($c);

}