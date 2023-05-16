<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts", methods={"GET"})
     */
    public function listeContact(ContactRepository $repo)
    {
        $lesContacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',[
            'listeContact' => $lesContacts
        ]);
    }

    /**
     * @Route("/contact/{id}", name="ficheContact", methods={"GET"})
     */
    public function ficheContact(Contact $contact)
    {
        return $this->render('contact/ficheContact.html.twig',[
            'contact' => $contact
        ]);
    }
}
