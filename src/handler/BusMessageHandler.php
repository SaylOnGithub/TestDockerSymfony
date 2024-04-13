<?php

namespace App\handler;

use App\Entity\BusMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class BusMessageHandler
{
    public function __invoke(BusMessage $message): void
    {
        echo $message->getMessage();
    }
}