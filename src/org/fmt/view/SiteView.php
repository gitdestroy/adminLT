<?php

namespace org\fmt\view;

class SiteView extends DefaultView{
    
    protected $user;

    protected function createHeaderContent() {
        return '<ul class="account-area">
                '.$this->setLogin().'
            </ul>';
    }

    protected function setHeaderTitle() {
        
    }

    
    protected function setLogin(){
//            return '';
        return '<li>
                    <a class="login-area dropdown-toggle" data-toggle="dropdown">
                        <section>
                            <h2><span class="profile"><span>'.$this->user->getFirstname().'</span></span></h2>
                        </section>
                    </a>
                    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                        <li class="username"><a>David Stevenson</a></li>
                        <li class="edit">
                            <a href="profile.html" class="pull-left">Profile</a>
                            <a href="#" class="pull-right">Setting</a>
                        </li>
                        <li class="dropdown-footer">
                            <a href="logout">
                                Sign out
                            </a>
                        </li>
                    </ul>
                </li>';
    }

    protected function createContent() {
        
    }



}

?>
