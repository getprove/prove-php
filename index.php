<?php

include_once('./lib/Prove.php');

Prove::setApiKey('test_iKpe4EvKGzh3C6BM2ahJ71JxAXA');
Prove::setApiKeyPassword('nelnet');

//if you want to test retrieve() or verifyPin(), input an id string here:
$id = "some id string here";

//testCreate();
//testAll();
//testRetrieve($id);
//testVerifyPin($id); //not working yet

function testVerifyPin($id){
	echo "Testing verifyPin\n";
	//pin for testApiKey is always 1337
	$pin= 1337;
	$verify = Prove_Verification::verifyPin(array('id' => $id,'pin' =>$pin));
	echo $verify;
	echo "\n";
}

function testRetrieve($id){
	echo "Testing retrieve\n";
	$verify = Prove_verification::retrieve($id);
	echo $verify;
	echo "\n";
}

function testCreate(){ //post and display a new entry
	echo "Testing create\n";
	$myNumber = array('tel' => 6619937556);
	$verify = Prove_Verification::create($myNumber);
	echo $verify;
	echo "\n";
}

function testAll(){ //get and display entries
	echo "testing all\n";
	$verify = Prove_Verification::all();
	foreach ($verify as $i){
		echo $i."\n";
	}
	echo "\n";
}