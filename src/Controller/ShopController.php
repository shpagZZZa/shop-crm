<?php

namespace App\Controller;

use App\CRUD\ShopCRUD;
use App\DTO\ShopDTO;
use App\RequestDTOConverter\RequestDTOConverterInterface;
use App\Service\ShopService;
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
    private RequestDTOConverterInterface $converter;
    private ShopService $shopService;
    private ShopCRUD $shopCRUD;

    /**
     * ShopController constructor.
     * @param RequestDTOConverterInterface $converter
     * @param ShopService $shopService
     */
    public function __construct(
        RequestDTOConverterInterface $converter,
        ShopService $shopService
    )
    {
        $this->converter = $converter;
        $this->shopService = $shopService;
        $this->shopCRUD = $shopService->getCRUD();
    }

    /**
     * @Route("/{id}", name="info", methods={"GET"})
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function getAction(int $id, Request $request): JsonResponse
    {
        $shop = $this->shopCRUD->read($id);
        return $shop ? new JsonResponse($shop->jsonSerialize(), Response::HTTP_OK) :
            new JsonResponse('Магазин не найден', Response::HTTP_BAD_REQUEST)
        ;
    }

    /**
     * @Route("/submit", name="submit", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function submitAction(Request $request): JsonResponse
    {
        $shopDTO = $this->converter->convert($request, ShopDTO::class);
        if (!$id = $request->query->get('shopId')) {
            $shopDTO = $this->shopCRUD->create($shopDTO);
        } else {
            $shopDTO = $this->shopCRUD->update($id, $shopDTO);
        }

        return new JsonResponse($shopDTO->jsonSerialize(), Response::HTTP_OK);
    }
}
