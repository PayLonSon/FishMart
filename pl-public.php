<?php
// get 
function getWooCommerceUrl() {
    // 函数体
	$url = rest_url();
	$api_url = $url . 'wc/v3/';
	echo $api_url;
    return $api_url;
}
function getWooConsumer_key() {
    return 'poster';
}
function getWooConsumer_secret() {
    return '4tWR Fnl9 7pHO HAgB iTo6 oC28';
}
?>
