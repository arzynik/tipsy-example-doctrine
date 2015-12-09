<?php

namespace Tipsy\Doctrine\Resource;
/**
 * @Entity @Table(name="products")
 **/
class Product extends \Tipsy\Doctrine\Resource {
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="string") **/
	protected $name;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
}
