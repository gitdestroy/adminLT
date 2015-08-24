<?php

namespace org\fmt\view;

use NeoPHP\web\html\HTMLView;

class PortalView extends HTMLView
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
                var username = $("input[name=username]")[0].value;
                var password = $("input[name=password]")[0].value;
                $.ajax("' . $this->getUrl("session/") . '?username=" + username + "&password=" + password,
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
                        <div class="social-title ">Connect with Your Social Accounts</div>
                    </div>
                    <div class="loginbox-textbox">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Email" />
                    </div>
                    <div class="loginbox-textbox">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="loginbox-forgot">
                        <a href="">Olvido su contraseña?</a>
                    </div>
                    <div class="loginbox-submit">
                        <button type="button" name="loginbutton" id="loginbutton" class="btn btn-primary btn-block" >Ingresar</button>
                    </div>
                    <div class="loginbox-signup">
                        <a href="register.html">Sign Up With Email</a>
                    </div>
                </div>
                <div class="logobox">
                </div>
            </div>';
    }
    /*
    protected function createCarousel()
    {
        return '
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="' . $this->getBaseUrl() . 'res/images/background1.jpg" alt="">
                    <div class="carousel-caption">
                        <h1 style="color:#ffffff">Federación Mendocina de Tenis</h1>
                        <p>La Federación Mendocina de tenis creada el 29 de mayo de 1928, es una Asociación Civil sin fines de lucro, con domicilio legal en la Ciudad de Mendoza y con alcance jurisdiccional en toda la Provincia.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="' . $this->getBaseUrl() . 'res/images/background4.jpg" alt="">
                    <div class="carousel-caption">
                        <h1 style="color:#ffffff">Federación Mendocina de Tenis</h1>
                        <p>La F.M.T organiza por año más de 100 torneos para menores, seniors y profesionales en sus distintas categorías</p>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>';
    }
    */
    /*
    protected function createInformationContent()
    {
        return '
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-4">
                    <img class="img-thumbnail" src="' . $this->getBaseUrl() . 'res/images/featurette3.jpg" data-src="holder.js/260x175" alt="" style="width: 260px; height: 175px;">
                    <h2>Menores</h2>
                </div>
                <div class="col-sm-4">
                    <img class="img-thumbnail" src="' . $this->getBaseUrl() . 'res/images/featurette7.jpg" data-src="holder.js/260x175" alt="" style="width: 260px; height: 175px;">
                    <h2>Categorías - Seniors</h2>
                </div>
                <div class="col-sm-4">
                    <img class="img-thumbnail" src="' . $this->getBaseUrl() . 'res/images/featurette5.jpg" data-src="holder.js/260x175" alt="" style="width: 260px; height: 175px;">
                    <h2>Profesionales</h2>
                </div>
            </div>
                <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-12">
                    <h2 class="featurette-heading">NUESTRA CASA</h2>
                    <p class="lead">La Federación tiene sede propia y es la oficina privilegiadamente ubicada en el centro de la capital de Mendoza, nuestra casa ,durante este ejercicio se refacciono recientemente contando con una superficie cubierta propia de 54 metros cuadrados distribuidos en una sala de atención y administración, un privado y una amplia sala de reunion .nuestra federación actualmente cuenta con equipos modernos de computación en red y banda ancha de internet. </p>
                </div>
            </div>

            <div class="row featurette">
                <div class="col-md-12">
                    <h2 class="featurette-heading">FINES Y OBJETIVOS</h2>
                    <p class="lead">La Federación tiene sede propia y es la oficina privilegiadamente ubicada en el centro de la capital de Mendoza, nuestra casa ,durante este ejercicio se refacciono recientemente contando con una superficie cubierta propia de 54 metros cuadrados distribuidos en una sala de atención y administración, un privado y una amplia sala de reunion .nuestra federación actualmente cuenta con equipos modernos de computación en red y banda ancha de internet.</p>
                    <p class="lead">La F.M.T es la Asociación Civil rectora de todo cuanto se relaciona con el deporte del Tenis en la provincia de Mendoza y las entidades afiliadas a la misma .proponiendonos durante el ejercicio. la promoción, fomento y desarrollo del deporte del tenis en toda la Provincia. Para cumplimentar tales fines y objetivos, que se establecen como fundamentales:</p>
                    <p class="lead">Organizamos, fiscalizamos , patrocinamos y dirigimos torneos, campeonatos o competencias de tenis en las que intervengan las entidades que la integran o sus jugadores, y aquellos eventos de carácter provincial ,nacional e internacional que se desarrollen en la Provincia.</p>
                    <p class="lead">Representamos en forma exclusiva a los clubes y jugadores afiliados en los organismos nacionales que dirigen el tenis, reconociendo las funciones y atribuciones correspondientes a la Asociación Argentina de Tenis, conforme a sus estatutos y reglamentos.</p>
                    <p class="lead">Designamos a los jugadores que representen a la Provincia, en las distintas competencias nacionales en las que participen representaciones Mendocinas.</p>
                    <p class="lead">Propendemos a la camaradería entre jugadores y demás participantes en el deporte del tenis.</p>
                </div>
            </div>
        </div>';
    }
    */
    /*
    protected function createFooter()
    {
        return '
        <div id="footer">
            <hr>
            <div class="container">
                <p class="text-muted credit">Federación Mendocina de Tenis <br>Dirección: San Martin 1362 1º Piso Of. 2 - Mendoza - Argentina <br>Telefono/Fax: 2615552686/2616306174 <br>E-mail: femetenis@yahoo.com.ar </p>
            </div>
        </div>';
    }
     
     */
}

?>