<?php
/**
 * 取得執行程式的頁面名稱,自動抓取該程式檔名
 */
function takeFileName() {
    $fileArr = explode('/', $_SERVER['PHP_SELF']);
    $fileLength = count($fileArr);
    $fileArr = explode('.', $fileArr[$fileLength-1]);
    $fileName = $fileArr[0];
    return $fileName . '.shtm';
}

/**
 * 讀取頁面資料
 */
function readHtml($temps) {
    if (!$temps) {
        $fileName = takeFileName();
    } else {
        $fileName = $temps;
    }

    $cTxt = file_get_contents($fileName) or die("開啟檔案錯誤");
    $cTxt = str_replace('../', 'http://' . $_SERVER['HTTP_HOST'], $cTxt);
    $cTxt = str_replace(['<!--Tag.Start-->', '<!--Tag.End-->'], '<split>', $cTxt);
    $htmlText = explode('<split>', $cTxt);
    $cTxt = '';
    return $htmlText;
}