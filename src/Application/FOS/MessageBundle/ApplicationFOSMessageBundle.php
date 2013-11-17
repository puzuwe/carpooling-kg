<?php

namespace Application\FOS\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationFOSMessageBundle extends Bundle
{
    function getParent(){
        return 'FOSMessageBundle';
    }
}
