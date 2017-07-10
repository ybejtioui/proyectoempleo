<?php

namespace ProyectoEmpBundle\Controller;

use ProyectoEmpBundle\Entity\Curriculum;
use ProyectoEmpBundle\Entity\Experiencia;
use ProyectoEmpBundle\Form\CurriculumType;
use ProyectoEmpBundle\Form\EditExperienciaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CurriculumController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function CurriculumAction(Request $request) {

        /**
          Buscar si existe el curriculum, y si es asi rederigirlo para editar
         */
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Curriculum");
        $curriculum = $em_repo->findOneBy(array('idUsuario' => $request->get('id_usuario')));
        /** print_r(count($curriculum)) ; 
          return new Response('le service is '. $MyId . ', content is ' ); */
        if (count($curriculum) != 0) {
            $MyId = $curriculum->getId();
            return $this->redirectToRoute("edit", array('id_usuario' => $MyId));
        }

        $curriculum = new Curriculum();
        $form = $this->createForm(CurriculumType::class, $curriculum);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
                $Curriculum = New Curriculum();
                $Curriculum->setGenero($form->get("genero")->getData());
                $Curriculum->setDni($form->get("dni")->getData());
                $Curriculum->setFnacimiento($form->get("fnacimiento")->getData());
                $Curriculum->setDireccion($form->get("direccion")->getData());
                $Curriculum->setGradocapacidad($form->get("gradocapacidad")->getData());
                $Curriculum->setIdioma($form->get("idioma")->getData());
                $Curriculum->setEstudiante($form->get("estudiante")->getData());
                $Curriculum->setDesempleado($form->get("desempleado")->getData());

                $user = $this->getUser();
                $Curriculum->setUser($user);

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Curriculum);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "El curriculum se guardo correctamente";

                    $em = $this->getDoctrine()->getEntityManager();
                    $em_repo = $em->getRepository("ProyectoEmpBundle:Curriculum");
                    $curriculum = $em_repo->findOneBy(array('idUsuario' => $request->get('id_usuario')));

                    if (count($curriculum) != 0) {
                        $MyId = $curriculum->getId();
                        return $this->redirectToRoute("edit", array('id_usuario' => $MyId));
                    }
                } else {
                    $status = "Error al guardar el Curriculum";
                }
            } else {
                $status = "El curriculum no es valido!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        return $this->render("ProyectoEmpBundle:Curriculum:curriculum.html.twig", array(
                    "form" => $form->createView(),
            'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
//                        'link' => $this->get('router')->generate('compedit', array('id_usuario' => $iduser)),
                        'title' => 'Curriculum',
                    ]
                    ]
        ));
    }

    public function EditAction($id_usuario, Request $request) {


//        $curriculum = new Curriculum();
//        $form = $this->createForm(CurriculumType::class, $curriculum);
//          $form->handleRequest($request); 

        $curriculum = new Curriculum();
        $experiencia = new Experiencia();

// dump($experiencia); die;
        $user = $this->getUser();
        $curriculum->setUser($user);


        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('CURRICULUM', CurriculumType::class, array('data' => $curriculum));
        foreach ($experiencia as $experRow) {
            $formBuilder->add('EXPERIENCIA' . $experiencia->getId(), EditExperienciaType::class, array('data' => $experRow));
            $formBuilder->add("BorrarExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
                    "class" => "form-submit btn btn-success",
            )));
            $formBuilder->add("EditExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
                    "class" => "form-submit btn btn-success",
            )));
        }
        $formBuilder->add("Guardar Curriculum", SubmitType::class, array("attr" => array(
                "class" => "form-submit btn btn-success"
        )));

        $form = $formBuilder->getForm();


        $form->handleRequest($request);

//        dump($experiencia->getDuracion()); die;
//  dump($form); die;
//         


        if ($form['CURRICULUM']->get('AddExperiencia')->isClicked()) {

            return $this->redirectToRoute("experiencia", array('id_curriculum' => $id_usuario));
        }
        /* -- Routear hacia el Form de Añadir Experiencia */
//        print_r($form->all()); 
        /*  Guardar los cambios */

// print_r($request->request->get('form_name')."XXX ".$form->get("genero")->getData()." XXX ".$id_usuario."  "); 

        if ($form['CURRICULUM']->isSubmitted()) {
//            dump($form->getData());die;
//             dump($form->getErrors()); die;        
            if ($form['CURRICULUM']->isValid()) {
                //    print_r("ENTRO");
                $em = $this->getDoctrine()->getEntityManager();
                $em_repo = $em->getRepository("ProyectoEmpBundle:Curriculum");
                $Curriculum = $em_repo->findOneBy(array('id' => $request->get('id_usuario')));

                $Curriculum->setGenero($form['CURRICULUM']->get("genero")->getData());
                $Curriculum->setDni($form['CURRICULUM']->get("dni")->getData());
                $Curriculum->setFnacimiento($form['CURRICULUM']->get("fnacimiento")->getData());
                $Curriculum->setDireccion($form['CURRICULUM']->get("direccion")->getData());
                $Curriculum->setGradocapacidad($form['CURRICULUM']->get("gradocapacidad")->getData());
                $Curriculum->setIdioma($form['CURRICULUM']->get("idioma")->getData());
                $Curriculum->setEstudiante($form['CURRICULUM']->get("estudiante")->getData());
                $Curriculum->setDesempleado($form['CURRICULUM']->get("desempleado")->getData());

                $user = $this->getUser();
                $Curriculum->setUser($user);

                // $em = $this->getDoctrine()->getEntityManager();
                /* $em->persist($Curriculum); */
                $flush = $em->flush();

//                $experiencia1 = new experiencia();
//                $experiencia1->duracion = '5 siglos';
//                $Curriculum->getExperiencia()->add($experiencia1);

                if ($flush == null) {
                    $status = "El curriculum se actualizo correctamente";
                } else {
                    $status = "Error al actualizar el Curriculum";
                }
            } else {
                $status = "El curriculum no es valido!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        /* -- Guardar los cambios */

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Curriculum");
        $curriculum = $em_repo->findOneBy(array('id' => $request->get('id_usuario')));
        
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Experiencia");
        $experiecia = $em_repo->findBy(array('idCurriculum' => $request->get('id_usuario')));


        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('CURRICULUM', CurriculumType::class, array('data' => $curriculum));
        foreach ($experiecia as $experRow) {
            $formBuilder->add('EXPERIENCIA' . $experRow->getId(), EditExperienciaType::class, array('data' => $experRow));
            $formBuilder->add("BorrarExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
                    "class" => "form-submit btn btn-success",
            )));
            $formBuilder->add("EditExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
                    "class" => "form-submit btn btn-success",
            )));
        }
        $formBuilder->add("Guardar Curriculum", SubmitType::class, array("attr" => array(
                "class" => "form-submit btn btn-success",
        )));

        $form = $formBuilder->getForm();
        //         dump($form->getExtraData("EXPERIENCIA1")->getName()); die;
        //              dump($form); die;  
//         $form = $this->createForm(CurriculumType::class, $curriculum);
        return $this->render('ProyectoEmpBundle:Curriculum:edit.html.twig', array(
                    'form' => $form->createView(),
            'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
//                        'link' => $this->get('router')->generate('compedit', array('id_usuario' => $iduser)),
                        'title' => 'Editar curriculum',
                    ]
                    ]
        ));


//        $form = $this->createForm(CurriculumType::class, $curriculum);
//        return $this->render("ProyectoEmpBundle:Curriculum:edit.html.twig", array(
//                    "form" => $form->createView()));
        //  $em = $this->getDoctrine()->getEntityManager();
        //  $articulos = $em->getRepository('MDWDemoBundle:Articles')->findAll();
        //  return $this->render('MDWDemoBundle:Articulos:listar.html.twig'
    }

}
