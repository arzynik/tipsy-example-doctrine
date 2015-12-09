<?php

require_once __DIR__ . '/bootstrap.php';

use Tipsy\Tipsy;

Tipsy::service('Product', '\Tipsy\Doctrine\Resource\Product');

Tipsy::router()
	->post('product', function($Product, $Request) {
		$p = $Product->create([
			name => $Request->name
		]);
		if ($p->id) {
			header('Location: /product/'.$p->id);
		}
	})
	->get('product/:id', function($Product, $Params, $View) {
		$p = $Product->load($Params->id);
		if ($p) {
			$View->display('product', [product => $p]);
		} else {
			http_response_code(404);
		}
	})
	->otherwise(function($Db, $Product, $View) {
		$View->display('home');
		return;

		/**
		* if you are more familiar with using doctrine specific code you can do so like below
		**/

		$p = new \Tipsy\Doctrine\Resource\Product();
		$p->setName('test1');
		$Db->entityManager()->persist($p);

		echo $p->getId();

		$s = $Db->query('select * from products where name=?',['test1']);

		$s->execute();
		while ($row = $s->fetch(PDO::FETCH_OBJ)) {
			print_r($row);
		}
	});

Tipsy::run();
