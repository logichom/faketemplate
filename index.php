<?php
require_once('resource/function.php');

$htmlArr = readHtml('');
foreach ($htmlArr as $text) {
    /**
     * 尋找html標籤
     */
    if (strpos($text, '<!--header-->') !== false) {
        $text = str_replace('<!--header-->', '', $text);
        include('resource/header.php');
    } elseif (strpos($text, '<!--body-->') !== false) {
        $text = str_replace('<!--body-->', '', $text);
        include('resource/body.php');
    } elseif (strpos($text, '<!--footer-->') !== false) {
        $text = str_replace('<!--footer-->', '', $text);
        include('resource/footer.php');
    } else {
        echo $text;
    }
}