<?php

namespace App\Controller;

use App\Entity\BusMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'main')]
    public function main(): Response
    {

        return $this->render('base.html.twig');
    }

    #[Route('/post', name: 'post', methods: ['GET'])]
    public function addTaskToQueue(MessageBusInterface $bus) : JsonResponse{
        $bus->dispatch(new BusMessage('Hello World!'));
        return new JsonResponse(['status' => 'Task added to queue']);
    }

}