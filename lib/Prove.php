<?php

  // tested on 5.2+

  // This is saying, make sure we have these dependencies
  // with our current version of PHP

  // This snippet (and some of the curl code) due to the Facebook SDK.
  if (!function_exists('curl_init')) {
    throw new Exception('Stripe needs the CURL PHP extension.');
  }
  if (!function_exists('json_decode')) {
    throw new Exception('Stripe needs the JSON PHP extension.');
  }

  // Prove singleton
  require(dirname(__FILE__) . '/Prove/Prove.php');

  // TODO: insert stuff here except for CardError
  //
  // TODO: Utilities
  // TODO: Errors
  // TODO: Plumbing
  //

  // Prove API Resources
  require(dirname(__FILE__) . '/Prove/Verification.php');

?>
