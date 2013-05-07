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
	echo "Testing verifyPin<br />";
	//pin for testApiKey is always 1337
	$pin= 1337;
	$verify = Prove_Verification::verifyPin(array('id' => $id,'pin' =>$pin));
	echo $verify;
	echo "<br />";
}

function testRetrieve($id){
	echo "Testing retrieve<br />";
	$verify = Prove_verification::retrieve($id);
	echo $verify;
	echo "<br />";
}

function testCreate(){ //post and display a new entry
	echo "Testing create<br />";
	$myNumber = array('tel' => 6619937556);
	$verify = Prove_Verification::create($myNumber);
	echo $verify;
	echo "<br />";
}

function testAll(){ //get and display entries
	echo "testing all"."<br />";
	$verify = Prove_Verification::all();
	echo "Full return: <br />";
	foreach ($verify as $i){
		echo $i."<br />";
	}
	echo "<br /><br />";
	echo "<table border=1><tr><td>Phone number</td><td>Verified</td></tr>";
	foreach ($verify as $i=>$v){
		echo "<tr><td>";
		echo $v['tel'];
		echo "</td><td>";
		if($v['verified']) 
			echo "true";
		else
			echo "false";
		echo "</td></tr>";
	}
	echo "</table><br />";
}