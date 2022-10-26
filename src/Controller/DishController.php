<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Form\DishType;
use App\Repository\DishRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/dish")
 */

class DishController extends AbstractController
{
	/**
	 * @Route("/", name="dish_index", methods={"GET"})
	 */
	public function index(DishRepository $dishRepository): Response
	{
		return $this->render('dish/index.html.twig', [
			'dishes' => $dishRepository->findAll(),
		]);
	}

	/**
	 * @Route("/new", name="dish_new", methods={"GET", "POST"})
	 */
	public function new(Request $request, DishRepository $dishRepository,SluggerInterface $slugger): Response
	{
		$dish = new Dish();
		$form = $this->createForm(DishType::class, $dish);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			/** @var UploadedFile $image */
			$imageFile = $form->get('image')->getData();

			if ($imageFile) {
				$originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
				// this is needed to safely include the file name as part of the URL
				$safeFilename = $slugger->slug($originalFilename);
				$newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

				try {
					$imageFile->move(
						$this->getParameter('images_directory'),
						$newFilename
					);
				} catch (FileException $e) {
					
				}

				$dish->setImage($newFilename);
			}

			$dishRepository->add($dish, true);

			return $this->redirectToRoute('dish_index', [], Response::HTTP_SEE_OTHER);
		}

		return $this->renderForm('dish/new.html.twig', [
			'dish' => $dish,
			'form' => $form,
		]);
	}

	/**
	 * @Route("/{id}", name="dish_show", methods={"GET"})
	 */
	public function show(Dish $dish): Response
	{
		return $this->render('dish/show.html.twig', [
			'dish' => $dish,
		]);
	}

	/**
	 * @Route("/{id}/edit", name="dish_edit", methods={"GET", "POST"})
	 */
	public function edit(Request $request, Dish $dish, DishRepository $dishRepository): Response
	{
		$form = $this->createForm(DishType::class, $dish);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$dishRepository->add($dish, true);

			return $this->redirectToRoute('dish_index', [], Response::HTTP_SEE_OTHER);
		}

		return $this->renderForm('dish/edit.html.twig', [
			'dish' => $dish,
			'form' => $form,
		]);
	}

	/**
	 * @Route("/{id}", name="dish_delete", methods={"POST"})
	 */
	public function delete(Request $request, Dish $dish, DishRepository $dishRepository): Response
	{
		if ($this->isCsrfTokenValid('delete'.$dish->getId(), $request->request->get('_token'))) {
			$dishRepository->remove($dish, true);
		}

		return $this->redirectToRoute('dish_index', [], Response::HTTP_SEE_OTHER);
	}
}
