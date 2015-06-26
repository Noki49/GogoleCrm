<?php

namespace Gogole\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GogoleUserBundle extends Bundle
{
	    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
