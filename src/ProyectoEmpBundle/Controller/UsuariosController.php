<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProyectoEmpBundle\Entity\Usuarios;
use ProyectoEmpBundle\Form\UsuariosType;
use Symfony\Component\HttpFoundation\Session\Session;
//use ProyectoEmpBundle\Controller\SecurityController;

class UsuariosController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }
    
    public function loginAction(Request $request) {
        $authenticationUtils = $this->get("security.authentication_utils");
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        
        if ($this->getUser() != null){
          $CUsuarios = $this->getUser()->getTable();
          
          if ($CUsuarios=="Eusuarios"){
              return $this->redirectToRoute("complogin"); 
          }
        }

        $Usuarios = new Usuarios();
        $form = $this->createForm(UsuariosType::class, $Usuarios);

        $form->handleRequest($request);



if ($form->isSubmitted() ) { 
        if ($form->isValid()) {
            $us = $this->getDoctrine()->getEntityManager();
            $us_repo = $us->getRepository("ProyectoEmpBundle:Usuarios");
            $user = $us_repo->findOneBy(array("email" => $form->get("email")->getData()));
            
            $em = $this->getDoctrine()->getEntityManager();
            $em_repo = $em->getRepository("ProyectoEmpBundle:Eusuarios");
            $user2 = $em_repo->findOneBy(array("email" => $form->get("email")->getData()));

            if ((count($user) == 0)&(count($user2) == 0)) {
                $Usuarios = New Usuarios();
                $Usuarios->setNombre($form->get("nombre")->getData());
                $Usuarios->setApellido($form->get("apellido")->getData());
                $Usuarios->setEmail($form->get("email")->getData());
                $Usuarios->setTef($form->get("tef")->getData());
                $factory = $this->get("security.encoder_factory");
                $encoder = $factory->getEncoder($Usuarios);
                $password = $encoder->encodePassword($form->get("password")->getData(), $Usuarios->getSalt());
                $Usuarios->setPassword($password);
                $Usuarios->setRole("ROLE_USER");

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Usuarios);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "Usuario creado correctamente ";
                } else {
                    $status = "Hubo un error, el Usuario no se creo!  ";
                }
            } else {
                $status = "El Usuario (email) ya existe!  ";
            }
        } else {
            $status = "Hubo un error, el Usuario no se creo!  ";
        }
        $this->session->getFlashBag()->add("status", $status);
}
        return $this->render("ProyectoEmpBundle:Usuarios:login.html.twig", array(
                    "error" => $error,
                    "last_username" => $lastUsername,
                    "form" => $form->createView()
        ));
    }
    
    /**
     * @Route("usuarios/login_check", name="security_login_check")
     */
    public function loginCheckAction() {
        
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {
        
    }

}
