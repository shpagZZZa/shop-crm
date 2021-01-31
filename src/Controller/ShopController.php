<?php

namespace App\Controller;

use App\DTO\ShopDTO;
use App\Entity\Shop;
use App\Repository\ShopRepository;
use App\RequestDTOConverter\RequestDTOConverterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/shop", name="shop_")
 */
class ShopController extends AbstractController
{
    private ShopRepository $shopRepository;
    private EntityManagerInterface $em;
    private RequestDTOConverterInterface $converter;

    /**
     * ShopController constructor.
     * @param ShopRepository $shopRepository
     * @param EntityManagerInterface $entityManager
     * @param RequestDTOConverterInterface $converter
     */
    public function __construct(
        ShopRepository $shopRepository,
        EntityManagerInterface $entityManager,
        RequestDTOConverterInterface $converter
    )
    {
        $this->shopRepository = $shopRepository;
        $this->em = $entityManager;
        $this->converter = $converter;
    }

    /**
     * @Route("/info/{id}", name="info", methods={"GET"})
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function getAction(int $id, Request $request): JsonResponse
    {
        dd($this->shopRepository->find($id));
    }

    /**
     * @Route("/submit", name="submit", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function submitAction(Request $request): JsonResponse
    {
        $shopDTO = $this->converter->convert($request, ShopDTO::class);
        dd($shopDTO);
        if (!$id = $request->query->get('shopId')) {
            $shop = new Shop();
            $shop->setUniqueId(uniqid());
        } else {
            $shop = $this->shopRepository->find($id);
        }

        $content = json_decode($request->getContent(), true);

        if (isset($content['title'])) {
            $shop->setTitle($content['title']);
        }

        $this->em->persist($shop);
        $this->em->flush();


        dd($shop);
        return $this->json($request->request->all());
    }
}
