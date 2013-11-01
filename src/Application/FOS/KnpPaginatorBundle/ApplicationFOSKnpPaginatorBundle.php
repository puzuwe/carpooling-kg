<?php

namespace Application\FOS\KnpPaginatorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationFOSKnpPaginatorBundle extends Bundle
{
    public function getParent()
    {
        return "KnpPaginatorBundle";
    }
}
