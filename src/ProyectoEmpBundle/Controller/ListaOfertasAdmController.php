<?php

namespace ProyectoEmpBundle\Controller;

use ProyectoEmpBundle\Entity\Eofertas;
//use ProyectoEmpBundle\Entity\Experiencia;
use ProyectoEmpBundle\Form\ListaOfertasType;
//use ProyectoEmpBundle\Form\EditExperienciaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ListaOfertasAdmController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function ListaOfertasAdmAction(Request $request) {

        /**
          Buscar si existe el curriculum, y si es asi rederigirlo para editar
         */
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//        $ofertas = $em_repo->findBy(array('idOfertaComp' => $request->get('id_empresa'), 'estado' => "En Revision"));
        $ofertas = $em_repo->findAll(array(array(), array('id_oferta_comp' => 'asc')));

//        $formBuilder = $this->createFormBuilder();
//
//        foreach ($ofertas as $ofertaRow) {
//            $formBuilder->add('OFERTA' . $ofertaRow->getId(), ListaOfertasType::class, array('data' => $ofertaRow));
//            $formBuilder->add("BorrarOferta" . $ofertaRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));
//            $formBuilder->add("EditOferta" . $ofertaRow->getId(), SubmitType::class, array("attr" => array(
//                    "class" => "form-submit btn btn-success",
//            )));
//        }
//
//
//        $form = $formBuilder->getForm();
////         dump($form); die;
//
//        return $this->render('ProyectoEmpBundle:Oferta:ListaOfertas.html.twig', array(
//                    'form' => $form->createView(),
//        ));
//        dump($ofertas); die; 
        return $this->render('ProyectoEmpBundle:Oferta:ListaOfertasAdm.html.twig', array(
                    'ofertas' => $ofertas,
        ));
    }

    public function PublicarOfertaAdmAction(Request $request, $id_oferta) {

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");

        $Oferta = $em_repo->findOneBy(array('id' => $id_oferta));

        $id_empresa = $Oferta->getEmpresa()->getId();
   
//      dump($id_empresa); die;  
//        $Oferta = new Eofertas();
        $form = $this->createForm(ListaOfertasType::class, $Oferta);

//        $form->handleRequest($request);
//dump($form); die;  
//        if ($form->isSubmitted()) {  
//            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
//                $Oferta = New Eofertas();
                $Oferta->setTitulopuesto($form->get("titulopuesto")->getData());
                $Oferta->setProvinciapuesto($form->get("provinciapuesto")->getData());
                $Oferta->setNumerovacaantes($form->get("numerovacaantes")->getData());
                $Oferta->setDescripcion($form->get("descripcion")->getData());
                $Oferta->setNivelestudios($form->get("nivelestudios")->getData());
                $Oferta->setExperienciareq($form->get("experienciareq")->getData());
                $Oferta->setIdiomas($form->get("idiomas")->getData());
                $Oferta->setJornada($form->get("jornada")->getData());
                $Oferta->setSalario($form->get("salario")->getData());
                $Oferta->setDuracion($form->get("duracion")->getData());
                $Oferta->setTipocontrato($form->get("tipocontrato")->getData());
                $Oferta->setHorario($form->get("horario")->getData());
                $Oferta->setPersonalacargo($form->get("personalacargo")->getData());
                $Oferta->setEstado("Publicada");

//dump($Oferta); die;  

//                $em = $this->getDoctrine()->getEntityManager();
//                $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//                $id_usuario = $Empresa->getId();

                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($Oferta);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La oferta se publico correctamente";
                    $this->session->getFlashBag()->add("status", $status);
                    return $this->redirectToRoute("listaOfertasAdm");
                } else {
                    $status = "Error al publicar La oferta";
                }
//            } else {
//                $status = "La oferta no es valida!";
//            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
//        }

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//        $ofertas = $em_repo->findBy(array('idOfertaComp' => $request->get('id_empresa'), 'estado' => "En Revision"));
        $ofertas = $em_repo->findAll(array(array(), array('id_oferta_comp' => 'asc')));

        return $this->render('ProyectoEmpBundle:Oferta:ListaOfertasAdm.html.twig', array(
                    'ofertas' => $ofertas,
        ));
    }

    public function FinalizarOfertaAdmAction(Request $request, $id_oferta) {

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");

        $Oferta = $em_repo->findOneBy(array('id' => $id_oferta));

        $id_empresa = $Oferta->getEmpresa()->getId();
//        dump($Oferta);
//        $Oferta = new Eofertas();
        $form = $this->createForm(ListaOfertasType::class, $Oferta);

//        $form->handleRequest($request);
//
//        if ($form->isSubmitted()) {
//            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
//                $Oferta = New Eofertas();
                $Oferta->setTitulopuesto($form->get("titulopuesto")->getData());
                $Oferta->setProvinciapuesto($form->get("provinciapuesto")->getData());
                $Oferta->setNumerovacaantes($form->get("numerovacaantes")->getData());
                $Oferta->setDescripcion($form->get("descripcion")->getData());
                $Oferta->setNivelestudios($form->get("nivelestudios")->getData());
                $Oferta->setExperienciareq($form->get("experienciareq")->getData());
                $Oferta->setIdiomas($form->get("idiomas")->getData());
                $Oferta->setJornada($form->get("jornada")->getData());
                $Oferta->setSalario($form->get("salario")->getData());
                $Oferta->setDuracion($form->get("duracion")->getData());
                $Oferta->setTipocontrato($form->get("tipocontrato")->getData());
                $Oferta->setHorario($form->get("horario")->getData());
                $Oferta->setPersonalacargo($form->get("personalacargo")->getData());
                $Oferta->setEstado("Finalizada");



//                $em = $this->getDoctrine()->getEntityManager();
//                $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//                $id_usuario = $Empresa->getId();

                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($Oferta);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La oferta se finalizo correctamente";
                    $this->session->getFlashBag()->add("status", $status);
                    return $this->redirectToRoute("listaOfertasAdm");
                } else {
                    $status = "Error al finalizar La oferta";
                }
//            } else {
//                $status = "La oferta no es valida!";
//            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
//        }

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//        $ofertas = $em_repo->findBy(array('idOfertaComp' => $request->get('id_empresa'), 'estado' => "En Revision"));
        $ofertas = $em_repo->findAll(array(array(), array('id_oferta_comp' => 'asc')));

        return $this->render('ProyectoEmpBundle:Oferta:ListaOfertasAdm.html.twig', array(
                    'ofertas' => $ofertas,
        ));
    }

}
