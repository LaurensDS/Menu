<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $tableNumber;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $ordernumber;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $name;

	/**
	 * @ORM\Column(type="float", nullable=true)
	 */
	private $price;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $status;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getTableNumber(): ?string
	{
		return $this->tableNumber;
	}

	public function setTableNumber(?string $tableNumber): self
	{
		$this->tableNumber = $tableNumber;

		return $this;
	}

	public function getOrdernumber(): ?string
	{
		return $this->ordernumber;
	}

	public function setOrdernumber(?string $ordernumber): self
	{
		$this->ordernumber = $ordernumber;

		return $this;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getPrice(): ?float
	{
		return $this->price;
	}

	public function setPrice(?float $price): self
	{
		$this->price = $price;

		return $this;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(?string $status): self
	{
		$this->status = $status;

		return $this;
	}
}
