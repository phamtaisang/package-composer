<?php
//singleton
//Registry
namespace App;
class Singleton
{
  private static $instance;
  private function __construct(){}
  private $storgate;
  public static function getInstance()
  {
    if( !isset(self::$instance) )
      self::$instance = new Singleton;
      return self::$instance;
  }
  // public function __set($name,$value)
  // {
  //   if (!isset($this->storgate[$name])) {
  //     $this->storgate[$name] = $value;
  //   }
  // }
  // public function __get($name)
  // {
  //   if (isset($this->storgate[$name])) {
  //     return $this->storgate[$name];
  //   }
  // }
  public function checkUrl($myUrl)
  {
    if (filter_var($myUrl, FILTER_VALIDATE_URL)){

      return true;}
    else{
      return false;}
  }
  function connectString($url, $url2) {
    $var1 = substr($url, -1);
    $var2 = substr($url2,0,1);
    $url_parse = parse_url($url, PHP_URL_PATH);
    $url_first = str_replace($url_parse, "", $url);

    if ($var2 == "/" && $var1 == "/") {
      return $url_first . $url2;
    } elseif ($var2 != "/" && $var1 != "/") {
      return $url .  "/" . $url2;
    } else {
      return $url . $url2;
    }
  }
  public function protocol($value='')
  {
    return parse_url($value, PHP_URL_SCHEME);
  }
  public function port($value='')
  {
    return parse_url($value, PHP_URL_PORT);
  }
  public function domain($value='')
  {
    return parse_url($value, PHP_URL_HOST);
  }

}
 ?>
