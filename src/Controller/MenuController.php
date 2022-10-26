<?php

namespace App\Controller;

use App\Repository\DishRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
	/**
	 * @Route("/menu", name="menu")
	 */
	public function index(DishRepository $dr): Response
	{
		return $this->render('menu/index.html.twig', [
			'dishes' => $dr->findAll(),
		]);
	}
}
