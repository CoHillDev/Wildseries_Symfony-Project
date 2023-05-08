<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProgramRepository;

class ProgramController extends AbstractController
{
    // #[Route('/program/', name: 'program_index')]
    // public function index(): Response
    // {
    //     return $this->render('program/index.html.twig', [
    //         'website' => 'Wild Series',
    //     ]);
    // }

    #[Route('/program/', name: 'program_index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();

        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]
        );
    }

    // #[Route('/program/{id<\d+>}/', name: 'program_show', methods: ['GET'])]
    // public function show(int $id): Response
    // {
    //     return $this->render('program/show.html.twig', [
    //         'title' => 'Program ' . $id,
    //     ]);
    // }

    #[Route('/program/show/{id<\d+>}', name: 'program_show')]
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);
        // same as $program = $programRepository->find($id);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : ' . $id . ' found in program\'s table.'
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }
}
