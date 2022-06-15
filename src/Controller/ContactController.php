<?php

namespace App\Controller;

use App\Form\ContactType; // importer
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        // Ajouter:
        // $form=$this->createForm(ContactType::class);
        // 'formulaire' => $form
        // et modifier render en renderForm
        $form=$this->createForm(ContactType::class);
        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire' => $form
        ]);
    }
}
