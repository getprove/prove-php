<?php

abstract class Prove_ApiResource extends Prove_Object
{
  protected static function _scopedRetrieve($class, $id, $apiKey=null)
  {
    $instance = new $class($id, $apiKey);
    $instance->refresh();
    return $instance;
  }

  public function refresh()
  {
    $requestor = new Prove_ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();

    list($response, $apiKey) = $requestor->request('get', $url, $this->_retrieveOptions);
    $this->refreshFrom($response, $apiKey);
    return $this;
   }

  public static function className($class)
  {
    // Useful for namespaces: Foo\Prove_Charge
    if ($postfix = strrchr($class, '\\'))
      $class = substr($postfix, 1);
    if (substr($class, 0, strlen('Prove')) == 'Prove')
      $class = substr($class, strlen('Prove'));
    $class = str_replace('_', '', $class);
    $name = urlencode($class);
    $name = strtolower($name);
    return $name;
  }

  public static function classUrl($class)
  {
    $base = self::className($class);
    return "/api/v1/verify";
  }

  public function instanceUrl()
  {
    $id = $this['id'];
    $class = get_class($this);
    if (!$id) {
      throw new Prove_InvalidRequestError("Could not determine which URL to request: $class instance has invalid ID: $id", null);
    } 
    $id = Prove_ApiRequestor::utf8($id);
    $base = self::classUrl($class);
    $extn = urlencode($id);
    return "$base/$extn";
  }

  private static function _validateCall($method, $params=null, $apiKey=null)
  {
    if ($params && !is_array($params))
      throw new Prove_Error("You must pass an array as the first argument to Prove API method calls.  (HINT: an example call to create a charge would be: \"ProveCharge::create(array('amount' => 100, 'currency' => 'usd', 'card' => array('number' => 4242424242424242, 'exp_month' => 5, 'exp_year' => 2015)))\")");
    if ($apiKey && !is_string($apiKey))
      throw new Prove_Error('The second argument to Prove API method calls is an optional per-request apiKey, which must be a string.  (HINT: you can set a global apiKey by "Prove::setApiKey(<apiKey>)")');
  }

  protected static function _scopedAll($class, $params=null, $apiKey=null)
  {
    self::_validateCall('all', $params, $apiKey);
    $requestor = new Prove_ApiRequestor($apiKey);
    $url = self::classUrl($class);
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return Prove_Util::convertToProveObject($response, $apiKey);
  }

  protected static function _scopedCreate($class, $params=null, $apiKey=null)
  {
    self::_validateCall('create', $params, $apiKey);
    $requestor = new Prove_ApiRequestor($apiKey);
    $url = self::classUrl($class);
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    return Prove_Util::convertToProveObject($response, $apiKey);
  }
  
  protected function _scopedVerify($class, $params=null, $apiKey = null)
  {
    $requestor = new Prove_ApiRequestor($apiKey);
    $url = self::classUrl($class);
    $url = $url."/".$params['id']."/pin";
    $params = array('pin' => $params['pin']);
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    return Prove_Util::convertToProveObject($response, $apiKey);
  }

  protected function _scopedSave($class)
  {
    self::_validateCall('save');
    if ($this->_unsavedValues) {
      $requestor = new Prove_ApiRequestor($this->_apiKey);
      $params = array();
      foreach ($this->_unsavedValues->toArray() as $k)
        $params[$k] = $this->$k;
      $url = $this->instanceUrl();
      list($response, $apiKey) = $requestor->request('post', $url, $params);
      $this->refreshFrom($response, $apiKey);
    }
    return $this;
  }

  protected function _scopedDelete($class, $params=null)
  {
    self::_validateCall('delete');
    $requestor = new Prove_ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('delete', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}
