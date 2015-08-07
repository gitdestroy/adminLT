<?php

namespace org\fmt;

class WebApplication extends \NeoPHP\web\WebApplication
{
    protected function initialize ()
    {
        parent::initialize();
        $this->setName ("Test");
        $this->addRoutesFromAnnotations();
        $this->setRestfull (true);
    }
}

?>