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

		$p1 = new \Tipsy\Doctrine\Resource\Product();
		$p1->setName('test1');

		$p2 = clone $Product;
		$p2->name = 'test2';
		$p2->save();

		$p3 = $Product->load(55);

		$Db->entityManager()->persist($p1);

		echo $p1->getId();
		echo $p2->getId();
return;
		$s = $Db->query('select * from products where name=?',['test']);

		$s->execute();
		while ($row = $s->fetch(PDO::FETCH_OBJ)) {
			print_r($row);
		}
	});

Tipsy::run();
