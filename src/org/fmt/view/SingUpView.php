<?php

namespace org\fmt\view;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SingUpView
 *
 * @author yamil
 */
class SingUpView extends DefaultView
{
    protected function build() {
        parent::build();
        $this->getBodyTag()->add($this->createMessageBox());
        $this->addScript('
            
            function clearErrorMessage ()
            {
                $("#messageBox .modal-body").html("");
            }

            function showErrorMessage (message)
            {
                $("#messageBox .modal-body").html(message);
                $("#messageBox").modal("show");
            }
            
            function showErrorDiv (message)
            {
                $("#errorDiv").html(message);
                $("#errorDiv").show();
            }
            
            function clearErrorMessage ()
            {
                $("#errorDiv").html("");
                $("#errorDiv").hide();
            }
            
            $("button[name=singupuser]").click(function(event)
            {
                var password = $("input[name=password]")[0].value;
                var confirmpassword = $("input[name=confirmpassword]")[0].value;
                if (password != confirmpassword ) {
                    alert("Contraseñas no coiciden");
                }
                var username = $("input[name=username]")[0].value;
                var password = $("input[name=password]")[0].value;
                var email = $("input[name=email]")[0].value;
                var firstname = $("input[name=firstname]")[0].value;
                var lastname = $("input[name=lastname]")[0].value;
                var telephone = $("input[name=telephone]")[0].value;
                var mobile = $("input[name=mobile]")[0].value;
                
                $.ajax("' . $this->getUrl("site/setuser") . '?username=" + username + "&password=" + password+ "&email=" + email
                    + "&firstname=" + firstname+ "&lastname=" + lastname + "&telephone=" + telephone + "&mobile=" + mobile,
                {
                    method: "PUT",
                    success: function (response)
                    {
                        var data = jQuery.parseJSON(response);
                        if (data.success)
                        {
                            showErrorMessage(data.success);
                            window.open("' . $this->getUrl("site/") . '", "_self");
                        }
                        else
                        {
                           showErrorMessage(data.errorMessage);
                            //enableLoginControls();
                        }
                    },
                    error: function (qXHR, textStatus, errorThrown)
                    {
                        if (qXHR.responseText)
                        {
                            var responseObject = jQuery.parseJSON(qXHR.responseText);
                            //showErrorMessage(responseObject.errorMessage);
                        }
                        else
                        {
                            //showErrorMessage(textStatus + " - " + errorThrown);
                        }
                        //enableLoginControls();
                    },
                    timeout: function ()
                    {
                        //showErrorMessage("Se ha agotado el tiempo de conexión. Intente más tarde");
                        //enableLoginControls();
                    }
                });



                console.log(username);
                
                return false;
            });
        ');
    }
    
    protected function createMessageBox()
    {
        return '
        <div id="messageBox" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">' . $this->getApplication()->getName() . '</h4>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>';
    }

    protected function createContent ()
    {
        return '<div class = "row">
    <div class="col-lg-offset-2 col-lg-8 col-md-4 col-sm-6 col-xs-12">
        <div class = "widget-body">
            <div class = "widget-header bg-blue">
                <span class = "widget-caption">Alta de Usuario</span>
            </div>
            <div class = "widget-body">
                <div id="errorDiv" class = "alert-danger" style="display:none;"><span>Error</span></div>
                <div id = "registration-form">
                    <form role="form">
                        <div class = "form-title">User Information</div>
                        <div class = "row">
                            <div class="col-lg-offset-1 col-lg-10 col-md-4 col-sm-6 col-xs-12">
                                <div class = "row">
                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                        <div class = "form-group">
                                            <span class = "input-icon icon-right">
                                                <input type = "text" class = "form-control" name = "password" id = "password" placeholder = "Contraseña">
                                                <i class = "fa fa-lock circular"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                        <div class = "form-group">
                                            <span class = "input-icon icon-right">
                                                <input type = "text" class = "form-control" name = "password" id = "password" placeholder = "Contraseña">
                                                <i class = "fa fa-lock circular"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-offset-1 col-lg-10  col-md-4 col-sm-6 col-xs-12">
                                <div class = "form-group">
                                    <span class = "input-icon icon-right">
                                        <input type = "text" class = "form-control" name = "password" id = "password" placeholder = "Contraseña">
                                        <i class = "fa fa-lock circular"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-offset-1 col-lg-10  col-md-4 col-sm-6 col-xs-12">
                                <div class = "form-group">
                                    <span class = "input-icon icon-right">
                                        <input type = "text" class = "form-control" name = "password" id = "password" placeholder = "Contraseña">
                                        <i class = "fa fa-lock circular"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>';
     
//        return '<div class = "row">
//        <div class = "col-lg-6 col-sm-6 col-xs-12">
//            
//            <div class = "widget flat radius-bordered">
//            
//                <div class = "widget-header bg-blue">
//                    <span class = "widget-caption">Alta de Usuario</span>
//                </div>
//                <div class = "widget-body">
//                    <div id="errorDiv" class = "alert-danger" style="display:none;"><span>Error</span></div>
//                    <div id = "registration-form">
//                    <form role = "form">
//                        <div class = "form-title">
//                            User Information
//                        </div>
//                        <div class = "form-group">
//                            <span class = "input-icon icon-right">
//                            <input type = "text" class = "form-control" name = "username" id = "username" placeholder = "Usuario">
//                            <i class = "glyphicon glyphicon-user circular"></i>
//                            </span>
//                        </div>
//                        <div class = "form-group">
//                            <span class = "input-icon icon-right">
//                            <input type = "text" class = "form-control" name = "email" id = "email" placeholder = "Email">
//                            <i class = "fa fa-envelope-o circular"></i>
//                            </span>
//                        </div>
//                        <div class = "form-group">
//                            <span class = "input-icon icon-right">
//                            <input type = "text" class = "form-control" name = "password" id = "password" placeholder = "Contraseña">
//                            <i class = "fa fa-lock circular"></i>
//                            </span>
//                        </div>
//                        <div class = "form-group">
//                            <span class = "input-icon icon-right">
//                            <input type = "text" class = "form-control" name = "confirmpassword" id = "confirmpassword" placeholder = "Confirmar Contraseña">
//                            <i class = "fa fa-lock circular"></i>
//                            </span>
//                        </div>
//                        <div class = "form-title">
//                            Datos Personales
//                        </div>
//                        <div class = "row">
//                            <div class = "col-sm-6">
//                                <div class = "form-group">
//                                    <span class = "input-icon icon-right">
//                                        <input type = "text" class = "form-control" name="firstname" id="firstname" placeholder = "Nombre">
//                                        <i class = "fa fa-user"></i>
//                                    </span>
//                                </div>
//                            </div>
//                            <div class = "col-sm-6">
//                                <div class = "form-group">
//                                    <span class = "input-icon icon-right">
//                                        <input type = "text" class = "form-control" name="lastname" id="lastname" placeholder = "Apellido">
//                                        <i class = "fa fa-user"></i>
//                                    </span>
//                                </div>
//                            </div>
//                        </div>
//                        <div class = "row">
//                            <div class = "col-sm-6">
//                                <div class = "form-group">
//                                    <span class = "input-icon icon-right">
//                                        <input type = "text" class = "form-control" name="telephone" id="telephone" placeholder = "Telefono">
//                                        <i class = "glyphicon glyphicon-earphone"></i>
//                                    </span>
//                                </div>
//                            </div>
//                            <div class = "col-sm-6">
//                                <div class = "form-group">
//                                    <span class = "input-icon icon-right">
//                                        <input type = "text" class = "form-control" name="mobile" id="mobile" placeholder = "Celular">
//                                        <i class = "glyphicon glyphicon-phone"></i>
//                                    </span>
//                                </div>
//                            </div>
//                        </div>
//                        <hr class = "wide" />
//                        <div class = "row">
//                        <div class = "col-sm-6">
//                        <div class = "form-group">
//                        <span class = "input-icon icon-right">
//                        <input class = "form-control date-picker" id = "id-date-picker-1" type = "text" data-date-format = "dd-mm-yyyy" placeholder = "Birth Date">
//                        <i class = "fa fa-calendar"></i>
//                        </span>
//                        </div>
//                        </div>
//                        <div class = "col-sm-6">
//                        <div class = "form-group">
//                        <span class = "input-icon icon-right">
//                        <input type = "text" class = "form-control" placeholder = "Birth Place">
//                        <i class = "fa fa-globe"></i>
//                        </span>
//                        </div>
//                        </div>
//                        </div>
//                        <button name="singupuser" type = "submit" class = "btn btn-blue">Register</button>
//                    </form>
//                </div>
//            </div>
//        </div>
//    </div>';
        
//    <div class = "form-group">
//                        <div class = "checkbox">
//                        <label>
//                        <input type = "checkbox" class = "colored-blue">
//                        <span class = "text">Auto Sign In After Registration</span>
//                        </label>
//                        </div>
//                        </div>
        
    }

    protected function createHeaderContent ()
    {
        
    }

    protected function createBarPage ()
    {
        
        return '<div class="header-title">
                    <h1>
                        Alta de Usuario
                    </h1>
                </div>
                <div class="header-buttons">
                    <a class="sidebar-toggler" href="#">
                        <i class="fa fa-arrows-h"></i>
                    </a>
                    <a class="refresh" id="refresh-toggler" href="">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a>
                    <a class="fullscreen" id="fullscreen-toggler" href="#">
                        <i class="glyphicon glyphicon-fullscreen"></i>
                    </a>
                </div>';
        
        
    }

    protected function addMenu ()
    {
        
    }

}
