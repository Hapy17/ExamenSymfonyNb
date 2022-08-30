<?php

namespace App\Controller\front;

use App\Entity\Listing;
use App\Form\ListingType;
use App\Repository\ListingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/listing')]
class ListingController extends AbstractController
{
    // #[Route('/', name: 'app_listing_index', methods: ['GET'])]
    // public function index(ListingRepository $listingRepository): Response
    // {
    //     return $this->render('front/listing/index.html.twig', [
    //         'listings' => $listingRepository->findAll(),
    //     ]);
    // }

    #[Route('/new', name: 'app_listing_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ListingRepository $listingRepository): Response
    {
        $listing = new Listing();
        $form = $this->createForm(ListingType::class, $listing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listing->setCreatedAt(new \DateTime());
            $listingRepository->add($listing, true);

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front/listing/new.html.twig', [
            'listing' => $listing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_listing_show', methods: ['GET'])]
    public function show(Listing $listing): Response
    {
        return $this->render('front/listing/show.html.twig', [
            'listing' => $listing,
        ]);
    }

}
