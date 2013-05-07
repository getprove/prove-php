<?php

include_once('./lib/Prove.php');

Prove::setApiKey('test_iKpe4EvKGzh3C6BM2ahJ71JxAXA');

//testCreate();
//testAll();
//testRetrieve();
//testVerifyPin(); //not working yet

function testVerifyPin(){
	$id = "51885005a207f24f4b000007";
	$pin= 1337;
	$verify = Prove_Verification::verifyPin($id,$pin);
	echo $verify;
}

function testRetrieve(){
	$id = "51885005a207f24f4b000007";
	$verify = Prove_verification::retrieve($id);
	echo $verify;
}

function testCreate(){ //post and display a new entry
	$myNumber = array('tel' => 1234567980);
	$verify = Prove_Verification::create($myNumber);
	echo $verify;
}

function testAll(){ //get and display entries
	$verify = Prove_Verification::all();
	foreach ($verify as $i){
		echo $i."\n";
	}
}