<?php

namespace Amii\UserBundle\EventListener;

use FOS\UserBundle\Model\UserManager;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    protected $securityContext;
    protected $userManager;

    public function __construct(SecurityContext $securityContext, UserManager $userManager)
    {
        $this->securityContext = $securityContext;
        $this->userManager = $userManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $this->securityContext->getToken()->getUser();
        $lastLoginClientIp = $event->getRequest()->getClientIp();
        $user->setLastLoginClientIp($lastLoginClientIp);
        $this->userManager->updateUser($user);
    }
}
