<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api')]
class MenuController extends AbstractController
{
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    #[Route('/menu', name: 'addMenu', methods: ["POST"])]
    public function add(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $id = $data['id'];
        $Fecha = date("d/m/Y");
        $Plato1 = $data['Plato1'];
        $Plato2 = $data['Plato2'];
        $Plato3 = $data['Plato3'];
        $Plato4 = $data['Plato4'];
        $Plato5 = $data['Plato5'];
        $Plato6 = $data['Plato6'];

        $this->menuRepository->saveMenu($id, $Fecha, $Plato1, $Plato2, $Plato3, $Plato4, $Plato5, $Plato6);

        return new JsonResponse(['status' => 'Creado!'], Response::HTTP_CREATED);
    }

    #[Route('/menu/{id}', name: 'getMenu', methods: ["GET"])]
    public function get($id): JsonResponse
    {
        $menu = $this->menuRepository->findOneBy(['id' => $id]);

        $data = [

            'id' => $menu->getId(),
            'Fecha' => $menu->getFecha(),
            'Plato1' => $menu->getPlato1(),
            'Plato2' => $menu->getPlato2(),
            'Plato3' => $menu->getPlato3(),
            'Plato4' => $menu->getPlato4(),
            'Plato5' => $menu->getPlato5(),
            'Plato6' => $menu->getPlato6(),

        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/menus', name: 'getAllMenu', methods: ["GET"])]
    public function getAll(): JsonResponse
    {
        $menus = $this->menuRepository->findAll();
        $data = [];

        foreach ($menus as $menu) {
            $data[] = [
                'id' => $menu->getId(),
                'Fecha' => $menu->getFecha(),
                'Plato1' => $menu->getPlato1(),
                'Plato2' => $menu->getPlato2(),
                'Plato3' => $menu->getPlato3(),
                'Plato4' => $menu->getPlato4(),
                'Plato5' => $menu->getPlato5(),
                'Plato6' => $menu->getPlato6(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/menu/{id}', name: 'updateMenu', methods: ["PUT"])]
    public function update($id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $menu = $this->menuRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['Fecha']) ? true : $menu->setFecha($data['Fecha']);
        empty($data['Plato1']) ? true : $menu->setPlato1($data['Plato1']);
        empty($data['Plato2']) ? true : $menu->setPlato2($data['Plato2']);
        empty($data['Plato3']) ? true : $menu->setPlato3($data['Plato3']);
        empty($data['Plato4']) ? true : $menu->setPlato4($data['Plato4']);
        empty($data['Plato5']) ? true : $menu->setPlato5($data['Plato5']);
        empty($data['Plato6']) ? true : $menu->setPlato6($data['Plato6']);

        $updatedMenu = $this->menuRepository->updateMenu($menu);

        return new JsonResponse(['status' => 'Modificado!'], Response::HTTP_OK);
    }

    #[Route('/menu/{id}', name: 'deleteMenu', methods: ["DELETE"])]
    public function removeMenu($id): JsonResponse
    {
        $menu = $this->menuRepository->findOneBy(['id' => $id]);

        $this->menuRepository->removeMenu($menu);

        return new JsonResponse(['status' => 'Eliminado'], Response::HTTP_OK);
    }

    // #[Route('/menu', name: 'app_menu_index', methods: ['GET'])]
    // public function index(MenuRepository $menuRepository): Response
    // {
    //     return $this->render('menu/index.html.twig', [
    //         'menus' => $menuRepository->findBy(array('Fecha' => 'DESC')),
    //     ]);
    // }

    // #[Route('/menu/new', name: 'app_menu_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, MenuRepository $menuRepository): Response
    // {
    //     $menu = new Menu();
    //     $form = $this->createForm(MenuType::class, $menu);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $menuRepository->add($menu);
    //         return $this->redirectToRoute('app_menu_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('menu/new.html.twig', [
    //         'menu' => $menu,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/menu/{id}', name: 'app_menu_show', methods: ['GET'])]
    // public function show(Menu $menu): Response
    // {
    //     return $this->render('menu/show.html.twig', [
    //         'menu' => $menu,
    //     ]);
    // }

    // #[Route('/menu/{id}/edit', name: 'app_menu_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Menu $menu, MenuRepository $menuRepository): Response
    // {
    //     $form = $this->createForm(MenuType::class, $menu);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $menuRepository->add($menu);
    //         return $this->redirectToRoute('app_menu_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('menu/edit.html.twig', [
    //         'menu' => $menu,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/menu/{id}', name: 'app_menu_delete', methods: ['POST'])]
    // public function delete(Request $request, Menu $menu, MenuRepository $menuRepository): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$menu->getId(), $request->request->get('_token'))) {
    //         $menuRepository->remove($menu);
    //     }

    //     return $this->redirectToRoute('app_menu_index', [], Response::HTTP_SEE_OTHER);
    // }
}
