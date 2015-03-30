<?php
header("refresh: 200;");
function getFeed($feed_url) {
$content = file_get_contents($feed_url);
$x = new SimpleXmlElement($content);
return $x->channel->item;
} 

require_once 'simple_html_dom.php';
$html = new simple_html_dom();
$html->load_file('http://www.ratp.fr/informer/trafic/trafic.php');
$trafic =  $html->find('div[class=trafic] h5', 0)->innertext;



function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = curl_init($yql_query_url);
    curl_setopt($yql_session, CURLOPT_RETURNTRANSFER,true);
    $yqlexec = curl_exec($yql_session);
    $yql_json = json_decode($yqlexec,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];
    return $currency_output;
}
$currency_input = 1;
//currency codes : http://en.wikipedia.org/wiki/ISO_4217
$currency_from = "EUR" ;
$currency_to = "USD";
$currency = currencyConverter($currency_from,$currency_to,$currency_input);
$CurrencyView = $currency_input.' '.$currency_from.' = '.$currency.' '.$currency_to;

?>