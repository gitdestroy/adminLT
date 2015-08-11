<?php

namespace org\fmt\view;

use org\fmt\model\User;

class DashboardView extends SiteView
{
    protected function createContent()
    {
        return "hola";
    }
    
    public function setUser (User $user){
        
        $this->user = $user;
        
    }
    
}

?>