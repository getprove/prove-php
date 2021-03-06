<?php

abstract class Prove
{
  public static $apiKey;
  public static $apiKeyPassword;
  public static $apiBase = 'https://getprove.com';
  public static $apiVersion = null;
  public static $verifySslCerts = true;
  const VERSION = '1.8.0';

  public static function getApiKey()
  {
    return self::$apiKey;
  }

  public static function setApiKey($apiKey)
  {
    self::$apiKey = $apiKey;
  }
  
  public static function getApiKeyPassword()
  {
    return self::$apiKeyPassword;
  }

  public static function setApiKeyPassword($apiKeyPassword)
  {
    self::$apiKeyPassword = $apiKeyPassword;
  }

  public static function getApiVersion()
  {
    return self::$apiVersion;
  }

  public static function setApiVersion($apiVersion)
  {
    self::$apiVersion = $apiVersion;
  }

  public static function getVerifySslCerts() {
    return self::$verifySslCerts;
  }

  public static function setVerifySslCerts($verify) {
    self::$verifySslCerts = $verify;
  }
  
}
