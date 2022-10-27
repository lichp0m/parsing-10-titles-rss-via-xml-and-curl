<?php

//$rss = file_get_contents("https://minecraftz.ru/feed/"); // Получаю rss-код
$ch = curl_init("https://spryt.ru/feed/");
$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$rss = curl_exec($ch);

$cleanedRss = stristr($rss, "<?"); // Вычистил код ошибки из полученной переменной
$xml = simplexml_load_string($cleanedRss, 'SimpleXMLElement',LIBXML_NOCDATA);

foreach ($xml->channel->item as $item) {
    echo $item->title . "\n";
}
