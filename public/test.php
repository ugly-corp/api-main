<?php
// Footer from krasnayapolyanaresort.ru

$footer_file = DIR_TEMPLATE . 'default/template/common/gorki_footer.tpl';

if(file_exists($footer_file) && filemtime($footer_file) > time() - 1) {
    $data['footer_gorki'] = file_get_contents($footer_file);
} else {
    $url_host = 'your_host_here';
    $ch = curl_init("https://your_host_here/index.php?route=extension/module/shop_footer");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36");
    $response = curl_exec($ch);
    curl_close($ch);

    if($response) {
        $response = str_replace("href='/'", "href='/sdfds'", $response);
        $data['footer_gorki'] = $response;
    }
}

// whos online
if ($this->config->get('config_customer_online')) {
    $this->load->model("tool/online");

    if (isset($this->request->server['REMOTE_ADDR'])) {
        $ip = $this->request->server['REMOTE_ADDR'];
    } else {
        $ip = 'your_default_ip_here';
    }
}
