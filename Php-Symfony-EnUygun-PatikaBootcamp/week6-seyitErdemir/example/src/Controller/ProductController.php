<?php

namespace App\Controller;

use App\Entity\Product;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $products = $doctrine->getRepository(Product::class)->findAll();

        return $this->json($products, 200);
    }

    #[Route('/product', name: 'app_product_store', methods: ['POST'])]
    public function store(ManagerRegistry $doctrine, Request $request): Response
    {
        $request = $request->toArray();

        $entityManager = $doctrine->getManager();

        $product = new Product();

        $product->setName($request['name']);
        $product->setPrice($request['price']);
        $product->setDescription($request['description']);
        $product->setPiece($request['piece']);
        $product->setDate(new DateTime());

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json([
            'success' => 'true',
        ], 200);
    }

    #[Route('/product/{id}', name: 'app_product_show', methods: ['GET'])]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json([
                'message' => 'Product not found.',
            ], 404);
        }

        return $this->json($product, 200);
    }

    #[Route('/product/{id}', name: 'app_product_update', methods: ['PUT'])]
    public function update(ManagerRegistry $doctrine, Request $request, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json([
                'message' => 'Product not found.',
            ], 404);
        }

        $data = json_decode(
            $request->getContent(),
            true
        );

        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setDescription($data['description']);
        $product->setPiece($data['piece']);

        $entityManager->flush();

        return $this->json([
            'message' => 'The product has been successfully updated.',
        ], 200);
    }

    #[Route('/product/{id}', name: 'app_product_destroy', methods: ['DELETE'])]
    public function destroy(ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json([
                'message' => 'Product not found.',
            ], 404);
        }
        $entityManager->remove($product);

        $entityManager->flush();

        return $this->json([
            'message' => 'The product has been successfully deleted.',
        ], 200);
    }
}
