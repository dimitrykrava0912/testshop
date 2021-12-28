<?php

namespace App\Controller;


use App\Entity\ShopItems;


use App\Form\ItemType;
use App\Repository\ShopItemsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{



    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render(
            'index/index.html.twig',
            [
                'title' => 'Главная страница',
            ]
        );
    }

    /**
     * @Route("/shop/list", name="shopList")
     * @param ShopItemsRepository $itemsRepository
     * @return Response
     */
    public function shopList(ShopItemsRepository $itemsRepository): Response
    {
        $items = $itemsRepository->findAll();

        return $this->render(
            'index/shopList.html.twig',
            [
                'title' => 'SHOP LIST',
                'items' => $items,
            ]
        );
    }

//    public function editItem(Request $request, ShopItems $item )
//    {
//        $item = new ShopItems();
//        $form = $this->createForm( ItemType::class,$item);
//        $form->handleRequest($request);
//        if (($form->isSubmitted()) && ($form->isValid())){
//            $price = $item->getPrice();
//            $description = $item->getDescription();
//        }
//
//    }


    /**
     * @Route("/shop/item/{id<\d+>}", name="shopItem")
     *
     * @param ShopItems $shopItems
     * @return Response
     */
    public function shopItem(ShopItems $shopItems): Response
    {
        return $this->render(
            'index/shopItem.html.twig',
            [
                'title' => $shopItems->getTitle(),
                'description' => $shopItems->getDescription(),
                'price' => $shopItems->getPrice(),
                'id' => $shopItems->getId(),
            ]
        );
    }





}