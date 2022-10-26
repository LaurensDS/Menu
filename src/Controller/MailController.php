<?php

namespace App\Controller;

use App\Form\EmailType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailController extends AbstractController
{
	/**
	* @Route("/email",name="mail", methods={"GET", "POST"})
	*/
	public function sendEmail(Request $request,MailerInterface $mailer)
	{
		$form = $this->createForm(EmailType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			$email = (new Email())
			->from($form->get('email')->getData())
			->to('contact@menu.demo')
			->subject($form->get('subject')->getData())
			->text($form->get('text')->getData());
	
			$mailer->send($email);

			return $this->redirect($this->generateUrl('home'));

		}

		return $this->renderForm('mail/index.html.twig', [
			'form' => $form,
		]);



	}
}
