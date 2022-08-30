<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ListingRepository $listingRepository,
        Request $request,
        PaginatorInterface $paginator
    ): Response
    {
        $qb = $listingRepository->getQbAll();

        $listings = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            12
        );


        return $this->render('front/home/index.html.twig', [
            'listings' => $listings
        ]);
    }
}
