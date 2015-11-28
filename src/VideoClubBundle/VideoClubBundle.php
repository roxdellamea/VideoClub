<?php

namespace VideoClubBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VideoClubBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
