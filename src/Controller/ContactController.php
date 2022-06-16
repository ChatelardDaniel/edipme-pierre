<?php

namespace App\Controller;

use App\Form\ContactType; // importer
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// import ajouter
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    // Ajouter Request $request dans index()
    public function index(Request $request): Response
    {
        // Ajouter:
        // $form=$this->createForm(ContactType::class);
        // 'formulaire' => $form
        // et modifier render en renderForm
        $form=$this->createForm(ContactType::class);
        $form->handleRequest($request); // Ajouter cette ligne

        // ajout de if() else
        if($form->isSubmitted()&& $form->isValid()){
            $data=$form->getData(); //ajout
            $email=$data['email']; // ajout
            // ajout
            return $this->render('contact/success.html.twig', [
                'email' => $email //ajout
            ]);
        }else{
            return $this->renderForm('contact/index.html.twig', [
                'controller_name' => 'ContactController',
                'formulaire' => $form
            ]);

        }
    }
}
