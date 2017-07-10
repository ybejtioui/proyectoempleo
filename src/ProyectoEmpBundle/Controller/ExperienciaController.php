<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use ProyectoEmpBundle\Entity\Experiencia;
use ProyectoEmpBundle\Form\ExperienciaType;
use Symfony\Component\HttpFoundation\Response;

class ExperienciaController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function ExperienciaAction(Request $request) {


        $experiencia = new Experiencia();
        $form = $this->createForm(ExperienciaType::class, $experiencia);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
                $Experiencia = New Experiencia();
                $Experiencia->setFecha($form->get("fecha")->getData());
                $Experiencia->setDuracion($form->get("duracion")->getData());
                $Experiencia->setEmpresa($form->get("empresa")->getData());
                $Experiencia->setCargo($form->get("cargo")->getData());

                $em= $this->getDoctrine()->getEntityManager();
                $em_repo=$em->getRepository("ProyectoEmpBundle:Curriculum");
                
                $Curriculum = $em_repo->findOneBy(array('id' => $request->get('id_curriculum')));
		$Experiencia->setCurriculum($Curriculum);
                
                //print($Curriculum->getUser()->getId());
                
                $id_usuario = $Curriculum->getUser()->getId();
            

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Experiencia);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La experiencia se guardo correctamente";
                    $this->session->getFlashBag()->add("status", $status);
                    return $this->redirectToRoute("curriculum", array('id_usuario' => $id_usuario));
                    
                } else {
                    $status = "Error al guardar La experiencia";
                }
            } else {
                $status = "La experiencia no es valida!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }
//        $em1= $this->getDoctrine()->getEntityManager();
//                $em_repo1=$em1->getRepository("ProyectoEmpBundle:Curriculum");
//                
//                $Curriculum1 = $em_repo1->findOneBy(array('id' => $request->get('id_usuario')));
//                $id_user = $request->get('id_usuario');
//                echo  $id_user;
//        $em1= $this->getDoctrine()->getEntityManager();
//                  $em_repo1=$em1->getRepository("ProyectoEmpBundle:Curriculum");
//                 $Curriculum1 = $em_repo1>findOneBy(array('id' => $request->get('id_usuario')));
//                  
//                  $id= $request->get('id_usuario');
//                  echo $id;

        return $this->render("ProyectoEmpBundle:Experiencia:experiencia.html.twig", array(
                    "form" => $form->createView(),
            'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
//                        'link' => $this->get('router')->generate('edit', array('id_usuario' => $id_usuario)),
                        'title' => 'Curriculum',
                    ],
                [
                        
                        'title' => 'Experiencia',
                    ],
                    ]
        ));
    }
  
}
