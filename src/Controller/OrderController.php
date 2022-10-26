<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
	/**
	 * @Route("/order", name="orders" , methods={"GET"})
	 */
	public function index(OrderRepository $orderRepository)
	{
		$order = $orderRepository->findBy([],['tableNumber' => 'ASC']);

		return $this->render('order/index.html.twig', [
			'orders' => $order
		]);
	}


	/**
	 * @Route("/order/{id},{table}", name="order")
	 */
	public function order(Dish $dish,$table)
	{
		$order = new Order();
		$order->setTablenumber($table);
		$order->setName($dish->getName());
		$order->setOrdernumber($dish->getId());
		$order->setPrice($dish->getPrice());
		$order->setStatus("open");

		//entityManager
		$em = $this->getDoctrine()->getManager();
		$em->persist($order);
		$em->flush();

		$this->addFlash('order', $order->getName() . ' was added to the order');

		return $this->redirect($this->generateUrl('menu'));
	}

	/**
	 * @Route("/status/{id},{status}", name="status")
	 */
	public function status($id, $status)
	{
		$em = $this->getDoctrine()->getManager();
		$order = $em->getRepository(Order::class)->find($id);

		$order->setStatus($status);
		$em->flush();

		return $this->redirect($this->generateUrl('orders'));
	}

	/**
	 * @Route("/delete/{id}", name="delete")
	 */
	public function delete($id, OrderRepository $br)
	{
		$em = $this->getDoctrine()->getManager();
		$order = $br->find($id);
		$em->remove($order);
		$em->flush();

		return $this->redirect($this->generateUrl('orders'));
	}

}
