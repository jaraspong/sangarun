<?php

require 'Slim/Slim.php';
require 'Database/Repository/Products.php';
require 'Database/Repository/Home.php';
require 'Database/Repository/Company.php';
require 'Database/Repository/Awards.php';
require 'Database/Repository/Contact.php';
require 'Database/Repository/Careers.php';
require 'Database/Repository/News.php';

header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

//PHP Native Session setting
if (!isset($_SESSION)) {
  session_cache_limiter(false);
  session_start();
}

/**
 * Initialize Cookie Security params
 */
$cookiesSettings = array(
    'cookies.secret_key' => 'psmba',
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC
);

$app = new Slim($cookiesSettings);
$app->contentType('application/json');

$products = Products::getInstance();
$home = Home::getInstance();
$company = Company::getInstance();
$award = Awards::getInstance();
$contact = Contact::getInstance();
$careers = Careers::getInstance();
$news=  News::getInstance();
/**
 * Product API Facade
 */
$app->get('/products/categories',array($products, 'getAllProductCategories'));
$app->get('/products/categories/:id',array($products, 'getAllProductByCategoryID'));

$app->get('/home',array($home, 'getHomeData'));
$app->get('/home/keyvisual',array($home, 'getHeyvisual'));
$app->get('/company',array($company, 'getCompanyData'));
$app->get('/awards',array($award, 'getAwardsData'));
$app->get('/contact',array($contact,'getContactData'));
$app->get('/careers',array($careers,'getCareers'));
$app->get('/news',array($news,'getNews'));
$app->get('/news/type',array($news,'getNewsType'));
$app->run();

?>