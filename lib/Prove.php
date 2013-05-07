<?php

  // tested on 5.2+

  // This is saying, make sure we have these dependencies
  // with our current version of PHP

  // This snippet (and some of the curl code) due to the Facebook SDK.
  if (!function_exists('curl_init')) {
    throw new Exception('Prove needs the CURL PHP extension.');
  }
  if (!function_exists('json_decode')) {
    throw new Exception('Prove needs the JSON PHP extension.');
  }

  // Prove singleton
  require(dirname(__FILE__) . '/Prove/Prove.php');

  // TODO: insert stuff here except for CardError
  //
  // TODO: Utilities
  // TODO: Errors
  // TODO: Plumbing
  //

  // Utilities
	require(dirname(__FILE__) . '/Prove/Util.php');
	require(dirname(__FILE__) . '/Prove/Util/Set.php');

	// Errors
	require(dirname(__FILE__) . '/Prove/Error.php');
	require(dirname(__FILE__) . '/Prove/ApiError.php');
	require(dirname(__FILE__) . '/Prove/ApiConnectionError.php');
	require(dirname(__FILE__) . '/Prove/AuthenticationError.php');
	require(dirname(__FILE__) . '/Prove/InvalidRequestError.php');

	// Plumbing
	require(dirname(__FILE__) . '/Prove/Object.php');
	require(dirname(__FILE__) . '/Prove/ApiRequestor.php');
	require(dirname(__FILE__) . '/Prove/ApiResource.php');
	require(dirname(__FILE__) . '/Prove/SingletonApiResource.php');
	require(dirname(__FILE__) . '/Prove/List.php');

	/* Prove API Resources
	require(dirname(__FILE__) . '/Prove/Account.php');
	require(dirname(__FILE__) . '/Prove/Charge.php');
	require(dirname(__FILE__) . '/Prove/Customer.php');
	require(dirname(__FILE__) . '/Prove/Invoice.php');
	require(dirname(__FILE__) . '/Prove/InvoiceItem.php');
	require(dirname(__FILE__) . '/Prove/Plan.php');
	require(dirname(__FILE__) . '/Prove/Token.php');
	require(dirname(__FILE__) . '/Prove/Coupon.php');
	require(dirname(__FILE__) . '/Prove/Event.php');
	require(dirname(__FILE__) . '/Prove/Transfer.php');
	require(dirname(__FILE__) . '/Prove/Recipient.php');
	*/
  // Prove API Resources
  require(dirname(__FILE__) . '/Prove/Verification.php');

?>
