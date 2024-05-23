<?php

// src/Controller/SubscriptionController.php
namespace App\Controller;

use App\Entity\Subscription;
use App\Repository\SubscriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionController extends AbstractController
{
    #[Route('/subscription/{idContact}', name: 'get_subscription', methods: ['GET'])]
    public function getSubscription(int $idContact, SubscriptionRepository $subscriptionRepository): Response
    {
        $subscriptions = $subscriptionRepository->findBy(['contact' => $idContact]);
        return $this->json($subscriptions);
    }

    #[Route('/subscription', name: 'create_subscription', methods: ['POST'])]
    public function createSubscription(Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);

        // Validate and create Subscription entity
        $subscription = new Subscription();
        // Set properties...

        $em->persist($subscription);
        $em->flush();

        return $this->json($subscription);
    }

    #[Route('/subscription/{idSubscription}', name: 'update_subscription', methods: ['PUT'])]
    public function updateSubscription(int $idSubscription, Request $request, SubscriptionRepository $subscriptionRepository, EntityManagerInterface $em): Response
    {
        $subscription = $subscriptionRepository->find($idSubscription);
        $data = json_decode($request->getContent(), true);

        // Validate and update Subscription entity
        // Set properties...

        $em->flush();

        return $this->json($subscription);
    }

    #[Route('/subscription/{idSubscription}', name: 'delete_subscription', methods: ['DELETE'])]
    public function deleteSubscription(int $idSubscription, SubscriptionRepository $subscriptionRepository, EntityManagerInterface $em): Response
    {
        $subscription = $subscriptionRepository->find($idSubscription);

        $em->remove($subscription);
        $em->flush();

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}

