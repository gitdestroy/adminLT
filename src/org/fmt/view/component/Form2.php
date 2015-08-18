<?php

use NeoPHP\web\html\Tag;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form2
 *
 * @author yamil
 */
class Form2 extends Tag
{
    private $components = [];
    //put your code here
    public function __construct ( array $attributes = null,$accion= "#",$method="POST")
    {
        parent::__construct("div", ['class'=>'row']);
//        $this->add(new Tag ( "h4",[],"formulario Registro"));
        if ( !empty($attributes) ){
            $this->setAttributes(array_merge($attributes , ['role'=>'form','accion'=>$accion,'method'=>$method]));
        } else {
            $this->setAttributes(['role'=>'form','accion'=>$accion,'method'=>$method]);
        }
        
    }

    
//    <div class = "row">
//<div class = "col-lg-6 col-sm-6 col-xs-12">
//<div class = "widget flat radius-bordered">
//<div class = "widget-header bg-blue">
//<span class = "widget-caption">Registration Form</span>
//</div>
//<div class = "widget-body">
//<div id = "registration-form">
//<form role = "form">
//<div class = "form-title">
//User Information
//</div>
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" id = "userameInput" placeholder = "Username">
//<i class = "glyphicon glyphicon-user circular"></i>
//</span>
//</div>
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" id = "emailInput" placeholder = "Email Address">
//<i class = "fa fa-envelope-o circular"></i>
//</span>
//</div>
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" id = "passwordInput" placeholder = "Password">
//<i class = "fa fa-lock circular"></i>
//</span>
//</div>
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" id = "confirmPasswordInput" placeholder = "Confirm Password">
//<i class = "fa fa-lock circular"></i>
//</span>
//</div>
//<div class = "form-title">
//Personal Information
//</div>
//<div class = "row">
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" placeholder = "Name">
//<i class = "fa fa-user"></i>
//</span>
//</div>
//</div>
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" placeholder = "Family">
//<i class = "fa fa-user"></i>
//</span>
//</div>
//</div>
//</div>
//<div class = "row">
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" placeholder = "Phone">
//<i class = "glyphicon glyphicon-earphone"></i>
//</span>
//</div>
//</div>
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" placeholder = "Mobile">
//<i class = "glyphicon glyphicon-phone"></i>
//</span>
//</div>
//</div>
//</div>
//<hr class = "wide" />
//<div class = "row">
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input class = "form-control date-picker" id = "id-date-picker-1" type = "text" data-date-format = "dd-mm-yyyy" placeholder = "Birth Date">
//<i class = "fa fa-calendar"></i>
//</span>
//</div>
//</div>
//<div class = "col-sm-6">
//<div class = "form-group">
//<span class = "input-icon icon-right">
//<input type = "text" class = "form-control" placeholder = "Birth Place">
//<i class = "fa fa-globe"></i>
//</span>
//</div>
//</div>
//</div>
//<div class = "form-group">
//<div class = "checkbox">
//<label>
//<input type = "checkbox" class = "colored-blue">
//<span class = "text">Auto Sign In After Registration</span>
//</label>
//</div>
//</div>
//<button type = "submit" class = "btn btn-blue">Register</button>
//</form>
//</div>
//</div>
//</div>
//</div>



}
