<?php

namespace App\Controller\back;

use App\Entity\Model;
use App\Form\ModelType;
use App\Repository\ModelRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/model')]
class ModelController extends AbstractController
{
    #[Route('/', name: 'app_admin_model_index', methods: ['GET'])]
    public function index(
        ModelRepository $modelRepository,
        Request $request,
        PaginatorInterface $paginatpr
        ): Response
    {

        $qb = $modelRepository->getQbAll();

        $models = $paginatpr->paginate(
            $qb,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('back/model/index.html.twig', [
            'models' => $models,
        ]);
    }

    #[Route('/new', name: 'app_admin_model_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ModelRepository $modelRepository): Response
    {
        $model = new Model();
        $form = $this->createForm(ModelType::class, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $modelRepository->add($model, true);

            return $this->redirectToRoute('app_admin_model_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/model/new.html.twig', [
            'model' => $model,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_model_show', methods: ['GET'])]
    public function show(Model $model): Response
    {
        return $this->render('back/model/show.html.twig', [
            'model' => $model,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_model_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Model $model, ModelRepository $modelRepository): Response
    {
        $form = $this->createForm(ModelType::class, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $modelRepository->add($model, true);

            return $this->redirectToRoute('app_admin_model_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/model/edit.html.twig', [
            'model' => $model,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_model_delete', methods: ['POST'])]
    public function delete(Request $request, Model $model, ModelRepository $modelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$model->getId(), $request->request->get('_token'))) {
            $modelRepository->remove($model, true);
        }

        return $this->redirectToRoute('app_admin_model_index', [], Response::HTTP_SEE_OTHER);
    }
}
