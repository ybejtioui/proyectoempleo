<?php

namespace ProyectoEmpBundle\Controller;

use ProyectoEmpBundle\Entity\Compempresa;
use ProyectoEmpBundle\Form\CompempresaType;
//use ProyectoEmpBundle\Entity\Experiencia;
//use ProyectoEmpBundle\Form\CurriculumType;
//use ProyectoEmpBundle\Form\EditExperienciaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CompempresaController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function CompempresaAction(Request $request) {

        /**
          Buscar si existe el curriculum, y si es asi rederigirlo para editar
         */
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Compempresa");
        $Empresa = $em_repo->findOneBy(array('idCompUsuarios' => $request->get('id_usuario')));
// dump($request->get('id_usuario')); die;               
        /** print_r(count($curriculum)) ; 
          return new Response('le service is '. $MyId . ', content is ' ); */
        if (count($Empresa) != 0) {
            $MyId = $Empresa->getId();
            return $this->redirectToRoute("compedit", array('id_usuario' => $MyId));
        }

        $empresa = new Compempresa();
        $form = $this->createForm(CompempresaType::class, $empresa);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_comp_usuarios" => $form->get("id_comp_usuarios")->getData())); */
                $Compempresa = New Compempresa();
                $Compempresa->setCompName($form->get("compName")->getData());
                $Compempresa->setCif($form->get("cif")->getData());
                $Compempresa->setAntiguedad($form->get("antiguedad")->getData());
                $Compempresa->setDireccion($form->get("direccion")->getData());
                $Compempresa->setNombrePc($form->get("nombrePc")->getData());
                $Compempresa->setTelefonoPc($form->get("telefonoPc")->getData());
                $Compempresa->setEmailPc($form->get("emailPc")->getData());
//                $Compempresa->setCompLogotipo($form->get("compLogotipo")->getData());
                $file = $form->get("compLogotipo")->getData();
//				echo $file;
                if (!empty($file) && $file != null) {
                    $ext = $file->guessExtension();
                    $file_name = time() . "." . $ext;
                    $file->move("uploads", $file_name);
                    //echo $file_name;
                    $Compempresa->setCompLogotipo($file_name);
                    //$Curriculum->setImage("imagen");	
                } else {
                    $Compempresa->setCompLogotipo(null);
                }

                $user = $this->getUser();
                $Compempresa->setUser($user);

//           dump($user); die;     


                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Compempresa);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La Empresa se registro correctamente";
                } else {
                    $status = "Error al registro de la Empresa";
                }
            } else {
                $status = "El Empresa no es valida!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        return $this->render("ProyectoEmpBundle:Compempresa:Compempresa.html.twig", array(
                    "form" => $form->createView(),
                    "empresa" => $empresa,
            'form' => $form->createView(),
            'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
//                        'link' => $this->get('router')->generate('compedit', array('id_usuario' => $iduser)),
                        'title' => 'Empresa',
                    ]
                    ]
//                'breadcrumbs' => [
//                    [
//                        'link' => $this->redirectToRoute("inicio");
//                        'title' => $this->get('translator')->trans('Inicio'),
//                    ],
//                    [
//                        'link' => $this->get('router')->generate('company_my'),
//                        'title' => $this->get('translator')->trans('My Companies'),
//                    ]
//                    ]
            
        ));
    }

    public function EditAction($id_usuario, Request $request) {


        $em = $this->getDoctrine()->getEntityManager();
        $empr_repo = $em->getRepository("ProyectoEmpBundle:Compempresa");

        $empr = $empr_repo->find($id_usuario);
        $logo = $empr->getCompLogotipo();

        $empresa = new Compempresa();
//        $Oferta = new Oferta();
// dump($experiencia); die;
        $user = $this->getUser();
        $empresa->setUser($user);


        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('EMPRESA', CompempresaType::class, array('data' => $empresa));
//        foreach ($experiencia as $experRow) {
//            $formBuilder->add('EXPERIENCIA' . $experiencia->getId(), EditExperienciaType::class, array('data' => $experRow));
//            $formBuilder->add("BorrarExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));
//            $formBuilder->add("EditExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));   
//        }
//        $formBuilder->add("Guardar Empresa", SubmitType::class, array("attr" => array(
//                "class" => "form-submit btn btn-success"
//        )));

        $form = $formBuilder->getForm();


        $form->handleRequest($request);

//        dump($experiencia->getDuracion()); die;
//  dump($form); die;
//         
//      print_r( $form['CURRICULUM1']);
//    print_r(" XXX "."XXX ".$form->isSubmitted()."  ".$form->isValid()); 
//        foreach ($form->getExtraData() as $FormChilds) {  
//            dump(  $FormChilds  ); 
//        } die;
//        if ($form['CURRICULUM']->get('Edit_Experiencia1')->isClicked()) {
//            print_r(" Hay que borrar este registro  "); die;   
//        }
        if ($form['EMPRESA']->get('ListaOfertas')->isClicked()) {
            return $this->redirectToRoute("listaOfertas", array('id_empresa' => $id_usuario));
        }

        if ($form['EMPRESA']->get('AddOferta')->isClicked()) {

            return $this->redirectToRoute("oferta", array('id_empresa' => $id_usuario));
        }
        /* -- Routear hacia el Form de Añadir Experiencia */
//        print_r($form->all()); 
        /*  Guardar los cambios */

// print_r($request->request->get('form_name')."XXX ".$form->get("genero")->getData()." XXX ".$id_comp_usuarios."  "); 

        if ($form['EMPRESA']->isSubmitted()) {
//            dump($form->getData());die;
//             dump($form->getErrors()); die;        
            if ($form['EMPRESA']->isValid()) {
//                print_r("ENTRO");
                $em = $this->getDoctrine()->getEntityManager();
                $em_repo = $em->getRepository("ProyectoEmpBundle:Compempresa");
                $Empresa = $em_repo->findOneBy(array('id' => $request->get('id_usuario')));

                $Empresa->setCompName($form['EMPRESA']->get("compName")->getData());
                $Empresa->setCif($form['EMPRESA']->get("cif")->getData());
                $Empresa->setAntiguedad($form['EMPRESA']->get("antiguedad")->getData());
                $Empresa->setDireccion($form['EMPRESA']->get("direccion")->getData());
                $Empresa->setNombrePc($form['EMPRESA']->get("nombrePc")->getData());
                $Empresa->setTelefonoPc($form['EMPRESA']->get("telefonoPc")->getData());
                $Empresa->setEmailPc($form['EMPRESA']->get("emailPc")->getData());
                $Empresa->setCompLogotipo($form['EMPRESA']->get("compLogotipo")->getData());
                $file = $form['EMPRESA']->get("compLogotipo")->getData();


                if (!empty($file) && $file != null) {
                    $original = $file->getClientOriginalName();
                    $ext = $file->guessExtension();
//                    echo $ext . "<br>";
                    $file_name = time() . "." . $ext;
                    $file->move("uploads", $file_name);
//                    echo $file_name;
                    $Empresa->setCompLogotipo($file_name);
                } else {
                    $Empresa->setCompLogotipo($logo);
                }


                $user = $this->getUser();
                $Empresa->setUser($user);

                // $em = $this->getDoctrine()->getEntityManager();
                /* $em->persist($Curriculum); */
                $flush = $em->flush();

//                $experiencia1 = new experiencia();
//                $experiencia1->duracion = '5 siglos';
//                $Curriculum->getExperiencia()->add($experiencia1);

                if ($flush == null) {
                    $status = "La Empresa se actualizo correctamente";
                } else {
                    $status = "Error al actualizar La Empresa";
                }
            } else {
                $status = "La Empresa no es valida!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        /* -- Guardar los cambios */

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Compempresa");
        $empresa = $em_repo->findOneBy(array('id' => $request->get('id_usuario')));
$iduser= $request->get('id_usuario');
//echo $iduser;
//        $em = $this->getDoctrine()->getEntityManager();
//        $em_repo = $em->getRepository("ProyectoEmpBundle:Oferta");
//        $oferta = $em_repo->findBy(array('idCurriculum' => $request->get('id_comp_usuarios')));


        $formBuilder = $this->createFormBuilder();
        $formBuilder
                ->add('EMPRESA', CompempresaType::class, array('data' => $empresa));
//        foreach ($experiecia as $experRow) {
//            $formBuilder->add('EXPERIENCIA' . $experRow->getId(), EditExperienciaType::class, array('data' => $experRow));
//            $formBuilder->add("BorrarExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));
//            $formBuilder->add("EditExperiencia" . $experRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));
//        }
//        $formBuilder->add("Guardar Empresa", SubmitType::class, array("attr" => array(
//                "class" => "form-submit btn btn-success",
//        )));

        $form = $formBuilder->getForm();
        //         dump($form->getExtraData("EXPERIENCIA1")->getName()); die;
        //              dump($form); die;  
//         $form = $this->createForm(CurriculumType::class, $curriculum);
        return $this->render('ProyectoEmpBundle:Compempresa:Editempresa.html.twig', array(
                    'form' => $form->createView(),
                    "empresa" => $empresa,
               'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
//                        'link' => $this->get('router')->generate('compedit', array('id_usuario' => $iduser)),
                        'title' => 'Editar Empresa',
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
