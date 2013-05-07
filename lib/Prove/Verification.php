<?php

class Prove_Verification extends Prove_ApiResource
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function retrieve($id, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }

  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
  public function verifyPin($params=null, $apiKey=null)
  {
		$class = get_class();
		return self::_scopedVerify($class, $params,$apiKey);
  }
  /*curl https://getprove.com/api/v1/verify \
      -u test_iKpe4EvKGzh3C6BM2ahJ71JxAXA: \
      -d tel=1234567890*/

}
