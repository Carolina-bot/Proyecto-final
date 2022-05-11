<?php

namespace App\Controller;

use App\Entity\Plato;
use App\Form\PlatoType;
use App\Repository\PlatoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api')]
class PlatoController extends AbstractController
{
    public function __construct(PlatoRepository $platoRepository)
    {
        $this->platoRepository = $platoRepository;
    }

    #[Route('/plato', name: 'addPlato', methods: ["POST"])]
    public function add(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $id = $data['id'];
        $Nombre = $data['Nombre'];
        $Tipo = $data['Tipo'];
        $Altranuces = $data['Altranuces'];
        $Apio = $data['Apio'];
        $Cacahuetes = $data['Cacahuetes'];
        $Crustaceos = $data['Crustaceos'];
        $Sulfitos = $data['Sulfitos'];
        $Cascara = $data['Cascara'];
        $Gluten = $data['Gluten'];
        $Sesamo = $data['Sesamo'];
        $Huevo = $data['Huevo'];
        $Lacteos = $data['Lacteos'];
        $Moluscos = $data['Moluscos'];
        $Mostaza = $data['Mostaza'];
        $Pescado = $data['Pescado'];
        $Soja = $data['Soja'];

        $this->platoRepository->savePlato($id, $Nombre, $Tipo, $Altranuces, $Apio, $Cacahuetes, $Crustaceos, $Sulfitos, $Cascara, $Gluten, $Sesamo, $Huevo, $Lacteos, $Moluscos, $Mostaza, $Pescado, $Soja);

        return new JsonResponse(['status' => 'Creado!'], Response::HTTP_CREATED);
    }

    #[Route('/plato/{id}', name: 'getPlato', methods: ["GET"])]
    public function get($id): JsonResponse
    {
        $plato = $this->platoRepository->findOneBy(['id' => $id]);

        $data = [

            'id' => $plato->getId(),
            'Nombre' => $plato->getNombre(),
            'Tipo' => $plato->getTipo(),
            'Altranuces' => $plato->getAltranuces(),
            'Apio' => $plato->getApio(),
            'Cacahuetes' => $plato->getCacahuetes(),
            'Crustaceos' => $plato->getCrustaceos(),
            'Sulfitos' => $plato->getSulfitos(),
            'Cascara' => $plato->getCascara(),
            'Gluten' => $plato->getGluten(),
            'Sesamo' => $plato->getSesamo(),
            'Huevo' => $plato->getHuevo(),
            'Lacteos' => $plato->getLacteos(),
            'Moluscos' => $plato->getMoluscos(),
            'Mostaza' => $plato->getMostaza(),
            'Pescado' => $plato->getPescado(),
            'Soja' => $plato->getSoja(),

        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/platos', name: 'getAllPlato', methods: ["GET"])]
    public function getAll(): JsonResponse
    {
        $platos = $this->platoRepository->findAll();
        $data = [];

        foreach ($platos as $plato) {

            $data[] = [

                'id' => $plato->getId(),
                'Nombre' => $plato->getNombre(),
                'Tipo' => $plato->getTipo(),
                'Altranuces' => $plato->getAltranuces(),
                'Apio' => $plato->getApio(),
                'Cacahuetes' => $plato->getCacahuetes(),
                'Crustaceos' => $plato->getCrustaceos(),
                'Sulfitos' => $plato->getSulfitos(),
                'Cascara' => $plato->getCascara(),
                'Gluten' => $plato->getGluten(),
                'Sesamo' => $plato->getSesamo(),
                'Huevo' => $plato->getHuevo(),
                'Lacteos' => $plato->getLacteos(),
                'Moluscos' => $plato->getMoluscos(),
                'Mostaza' => $plato->getMostaza(),
                'Pescado' => $plato->getPescado(),
                'Soja' => $plato->getSoja(),
                
            ];

        }



        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/plato/{id}', name: 'updatePlato', methods: ["PUT"])]
    public function update($id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $plato = $this->platoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['Nombre']) ? true : $plato->setNombre($data['Nombre']);
        empty($data['Tipo']) ? true : $plato->setTipo($data['Tipo']);
        empty($data['Altranuces']) ? true : $plato->setAltranuces($data['Altranuces']);
        empty($data['Apio']) ? true : $plato->setApio($data['Apio']);
        empty($data['Cacahuetes']) ? true : $plato->setCacahuetes($data['Cacahuetes']);
        empty($data['Crustaceos']) ? true : $plato->setCrustaceos($data['Crustaceos']);
        empty($data['Sulfitos']) ? true : $plato->setSulfitos($data['Sulfitos']);
        empty($data['Cascara']) ? true : $plato->setCascara($data['Cascara']);
        empty($data['Gluten']) ? true : $plato->setGluten($data['Gluten']);
        empty($data['Sesamo']) ? true : $plato->setSesamo($data['Sesamo']);
        empty($data['Huevo']) ? true : $plato->setHuevo($data['Huevo']);
        empty($data['Lacteos']) ? true : $plato->setLacteos($data['Lacteos']);
        empty($data['Moluscos']) ? true : $plato->setMoluscos($data['Moluscos']);
        empty($data['Mostaza']) ? true : $plato->setMostaza($data['Mostaza']);
        empty($data['Pescado']) ? true : $plato->setPescado($data['Pescado']);
        empty($data['Soja']) ? true : $plato->setSoja($data['Soja']);

        $updatedPlato = $this->platoRepository->updatePlato($plato);

        return new JsonResponse(['status' => 'Modificado!'], Response::HTTP_OK);
    }

    #[Route('/plato/{id}', name: 'deletePlato', methods: ["DELETE"])]
    public function removePlato($id): JsonResponse
    {
        $plato = $this->platoRepository->findOneBy(['id' => $id]);

        $this->platoRepository->removePlato($plato);

        return new JsonResponse(['status' => 'Eliminado'], Response::HTTP_OK);
    }

    // #[Route('/', name: 'app_plato_index', methods: ['GET'])]
    // public function index(PlatoRepository $platoRepository): Response
    // {
    //     return $this->render('plato/index.html.twig', [
    //         'platos' => $platoRepository->findAll(),
    //     ]);
    // }

    // #[Route('/new', name: 'app_plato_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, PlatoRepository $platoRepository): Response
    // {
    //     $plato = new Plato();
    //     $form = $this->createForm(PlatoType::class, $plato);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $platoRepository->add($plato);
    //         return $this->redirectToRoute('app_plato_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('plato/new.html.twig', [
    //         'plato' => $plato,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_plato_show', methods: ['GET'])]
    // public function show(Plato $plato): Response
    // {
    //     return $this->render('plato/show.html.twig', [
    //         'plato' => $plato,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_plato_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Plato $plato, PlatoRepository $platoRepository): Response
    // {
    //     $form = $this->createForm(PlatoType::class, $plato);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $platoRepository->add($plato);
    //         return $this->redirectToRoute('app_plato_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('plato/edit.html.twig', [
    //         'plato' => $plato,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_plato_delete', methods: ['POST'])]
    // public function delete(Request $request, Plato $plato, PlatoRepository $platoRepository): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$plato->getId(), $request->request->get('_token'))) {
    //         $platoRepository->remove($plato);
    //     }

    //     return $this->redirectToRoute('app_plato_index', [], Response::HTTP_SEE_OTHER);
    // }
}
