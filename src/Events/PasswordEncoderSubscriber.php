<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Reseller;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class PasswordEncoderSubscriber implements EventSubscriberInterface

{
    private $passwordHasher;

        public function __construct(UserPasswordHasherInterface $passwordHasher)
        {
            $this->passwordHasher = $passwordHasher;
        }

    public static function getSubscribedEvents()
    {
        return[
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE]
        ];
    }
    
    public function encodePassword(ViewEvent $event)
    
    {
$result = $event->getControllerResult();
$method = $event->getRequest()->getMethod();

        if ($result instanceof Reseller && $method === "POST") {
            $hash = $this->passwordHasher->hashPassword(
                $result, $result->getPassword());
            $result->setPassword($hash);
        }

    }
    


}

