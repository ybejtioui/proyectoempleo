<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProyectoEmpBundle\Entity\Usuarios;
use ProyectoEmpBundle\Form\InicioType;
//use ProyectoEmpBundle\Controller\SecurityController;

class InicioController extends Controller {

    public function principAction(Request $request) {
       

        return $this->render("ProyectoEmpBundle:Default:index.html.twig");
    }


}
