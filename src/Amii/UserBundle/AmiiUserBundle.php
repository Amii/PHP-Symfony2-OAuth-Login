<?php

namespace Amii\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AmiiUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
