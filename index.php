<?php

include_once('./lib/Prove.php');

Prove::setApiKey('test_iKpe4EvKGzh3C6BM2ahJ71JxAXA');
testAll();

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