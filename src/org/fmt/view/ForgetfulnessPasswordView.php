<?php

namespace org\fmt\view;

class ForgetfulnessPasswordView extends HTMLView
{
    protected function build()
    {
        parent::build();
        
        $this->setTitle($this->getApplication()->getName());
        $this->addMeta(array("http-equiv" => "Content-Type", "content" => "text/html; charset=UTF-8"));
        $this->addMeta(array("charset" => "utf-8"));
        $this->addMeta(array("name" => "viewport", "content" => "width=device-width, initial-scale=1.0"));

        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/jquery.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/bootstrap.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/slimscroll/jquery.slimscroll.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/skins.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/beyond.min.js");

        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/bootstrap.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/font-awesome.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/weather-icons.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/typicons.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/demo.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/animate.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/inskey.css");
        $this->addStyleFile("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300");

        $this->htmlTag->add('<link id="bootstrap-rtl-link" href="" rel="stylesheet" />');
        $this->htmlTag->add('<link id="beyond-link" href="' . $this->getBaseUrl() . '/res/assets/css/beyond.min.css" rel="stylesheet" />');
        $this->htmlTag->add('<link id="skin-link" href="" rel="stylesheet" type="text/css" />');
        $this->htmlTag->add('<link href="assets/css/font-awesome.min.css" rel="stylesheet" />');

        $this->getBodyTag()->add($this->createContent());
        
        $this->getBodyTag()->add($this->createMessageBox());
        $this->addScript('
            function checkPageLocation ()
            {
                var src = window.location.href;
                if(window.top != window.self) {
                    window.open(src,"_top");
                }
            }

            function clearErrorMessage ()
            {
                $("#messageBox .modal-body").html("");
            }

            function showErrorMessage (message)
            {
                $("#messageBox .modal-body").html(message);
                $("#messageBox").modal("show");
            }

            function disableLoginControls ()
            {
                $("input[name=username]").prop("disabled", true);
                $("input[name=password]").prop("disabled", true);
                $("button[name=loginbutton]").prop("disabled", true);
                $("body").css("cursor", "progress");
            }

            function enableLoginControls ()
            {
                $("input[name=username]").prop("disabled", false);
                $("input[name=password]").prop("disabled", false);
                $("button[name=loginbutton]").prop("disabled", false);
                $("body").css("cursor", "default");
                $("input[name=username]").focus();
            }

            $("button[name=loginbutton]").click(function(event)
            {
                //clearErrorMessage();
                //disableLoginControls();
                var username = $("input[name=email]")[0].value;
                $.ajax("' . $this->getUrl("session/reset/") . '?email=" + email,
                {
                    method: "PUT",
                    success: function (response)
                    {
                        var data = jQuery.parseJSON(response);
                        if (data.success)
                        {
                            window.open("' . $this->getUrl("site/") . '", "_self");
                        }
                        else
                        {
                            showErrorMessage(data.errorMessage);
                            enableLoginControls();
                        }
                    },
                    error: function (qXHR, textStatus, errorThrown)
                    {
                        if (qXHR.responseText)
                        {
                            var responseObject = jQuery.parseJSON(qXHR.responseText);
                            showErrorMessage(responseObject.errorMessage);
                        }
                        else
                        {
                            showErrorMessage(textStatus + " - " + errorThrown);
                        }
                        enableLoginControls();
                    },
                    timeout: function ()
                    {
                        showErrorMessage("Se ha agotado el tiempo de conexión. Intente más tarde");
                        enableLoginControls();
                    }
                });
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
    
    protected function createContent()
    {
        return '<div class="login-container animated fadeInDown">
                <div class="loginbox bg-white">
                    <div class="loginbox-title">Sistema Sitrack.com</div>
                    <div class="loginbox-social">
                        <div class="social-title ">Ingrese su email para recuperar su contraseña</div>
                    </div>
                    <div class="loginbox-textbox">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="loginbox-submit">
                        <button type="button" name="resetpass" id="loginbutton" class="btn btn-primary btn-block" >Reset Contraseña</button>
                    </div>
                </div>
                <div class="logobox">
                </div>
            </div>';
    }
}
