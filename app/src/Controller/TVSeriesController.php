<?php

namespace App\Controller;

use App\Repository\TVSeriesRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TVSeriesController extends AbstractController
{

    private EntityManager $entityManager;
    private TVSeriesRepository $repository;

    public function __construct(EntityManager $entityManager, TVSeriesRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TVSeriesController.php',
        ]);
    }
}
