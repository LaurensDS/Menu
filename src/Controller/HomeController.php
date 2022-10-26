<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use App\Repository\DishRepository;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
	public function index(DishRepository $dr)
	{
		$dish = $dr->findAll();
		$random = array_rand($dish, 2);

		return $this->render('home/index.html.twig', [
			'dish1' => $dish[$random[0]],
			'dish2' => $dish[$random[1]],
		]);
	}
}
