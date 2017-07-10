<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProyectoEmpBundle\Entity\Eusuarios;
use ProyectoEmpBundle\Form\EusuariosType;
use Symfony\Component\Security\Core\User;
use Symfony\Component\HttpFoundation\Session\Session;

class EusuariosController extends Controller {
    
    private $session;

    public function __construct() {
        $this->session = new Session();
    }
    
    public function eloginAction(Request $request) {
        $authenticationUtils = $this->get("security.authentication_utils");
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        
        if ($this->getUser() != null){
          $CUsuarios = $this->getUser()->getTable();
          $CRole = $this->getUser()->getRole();
          $MyId = $this->getUser()->getId();
          
          if ($CUsuarios=="Usuarios"){
              return $this->redirectToRoute("mylogin"); 
          }
          if ($CRole=="ROLE_USER"){
              return $this->redirectToRoute("compempresa", array('id_usuario' => $MyId)); 
          }
          
          if ($CRole=="ROLE_ADMIN"){
              return $this->redirectToRoute("listaOfertasAdm", array('id_usuario' => $MyId)); 
          }
        }
//        $CUsuarios = $this->get("security.user.provider.concrete.chain_provider");
//        $MyTable = $CompUsuarios->getTable();
        
//        $myprovider = $this->getDoctrine()->getEntityManager();
//        $myprovider = $this->getDoctrine()->getEntityManager()->repositoryFactory;
//        $em = $this->container->get('doctrine')->getEntityManager(); 
//        $className = $em->getClassMetadata(get_class($object))->getName();
         
//  dump($CUsuarios); die;
  
        $CompUsuarios = new Eusuarios();
        
        $form = $this->createForm(EusuariosType::class, $CompUsuarios);

        $form->handleRequest($request);

     if ($form->isSubmitted() ) {   
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em_repo = $em->getRepository("ProyectoEmpBundle:Eusuarios");
            $user = $em_repo->findOneBy(array("email" => $form->get("email")->getData()));
            
            $us = $this->getDoctrine()->getEntityManager();
            $us_repo = $us->getRepository("ProyectoEmpBundle:Usuarios");
            $user2 = $us_repo->findOneBy(array("email" => $form->get("email")->getData()));

            if ((count($user) == 0)&(count($user2) == 0)) {
                $CompUsuarios = New Eusuarios();
                $CompUsuarios->setNombre($form->get("nombre")->getData());
                $CompUsuarios->setApellido($form->get("apellido")->getData());
                $CompUsuarios->setEmail($form->get("email")->getData());
                $CompUsuarios->setTef($form->get("tef")->getData());
                $factory = $this->get("security.encoder_factory");
                $encoder = $factory->getEncoder($CompUsuarios);
                $password = $encoder->encodePassword($form->get("password")->getData(),$CompUsuarios->getSalt());
                $CompUsuarios->setPassword($password );
                $CompUsuarios->setRole("ROLE_USER");

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($CompUsuarios);
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
        return $this->render("ProyectoEmpBundle:Eusuarios:Elogin.html.twig", array(
                    "error" => $error,
                    "last_username" => $lastUsername,
                    "form" => $form->createView()
        ));
    }
    /**
     * @Route("eusuarios/login_check", name="security_login_check")
     */
 public function loginCheckAction()
    {
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }
    
    public function principAction()
    {
    }
}
