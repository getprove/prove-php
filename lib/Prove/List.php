<?php

class Prove_List extends Prove_Object
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public function all($params=null)
  {
    $requestor = new Prove_ApiRequestor($this->_apiKey);
    list($response, $apiKey) = $requestor->request('get', $this['url'], $params);
    return Prove_Util::convertToProveObject($response, $apiKey);
  }
}
