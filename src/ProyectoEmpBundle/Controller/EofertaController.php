<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use ProyectoEmpBundle\Entity\Eofertas;
use ProyectoEmpBundle\Form\OfertaType;
use Symfony\Component\HttpFoundation\Response;

class EofertaController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function EofertaAction(Request $request) {


        $Oferta = new Eofertas();
        $form = $this->createForm(OfertaType::class, $Oferta);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
                $Oferta = New Eofertas();
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
                $Oferta->setEstado("En Revision");

                $em = $this->getDoctrine()->getEntityManager();
                $em_repo = $em->getRepository("ProyectoEmpBundle:Compempresa");

                $Empresa = $em_repo->findOneBy(array('id' => $request->get('id_empresa')));
                $Oferta->setEmpresa($Empresa);


                $id_empresa = $request->get('id_empresa');
                print($request->get('id_empresa'));

//                $id_usuario = $Empresa->getId();

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Oferta);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La oferta se guardo correctamente";
                    $this->session->getFlashBag()->add("status", $status);
                    return $this->redirectToRoute("compedit", array('id_usuario' => $id_empresa));
                } else {
                    $status = "Error al guardar La oferta";
                }
            } else {
                $status = "La oferta no es valida!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        return $this->render("ProyectoEmpBundle:Oferta:oferta.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function editofertaAction(Request $request, $id_oferta) {


//        dump($id_oferta);
//        die;
//        $Oferta = new Eofertas();
//        $form = $this->createForm(OfertaType::class, $Oferta);

        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");

        $Oferta = $em_repo->findOneBy(array('id' => $id_oferta));

        $id_empresa = $Oferta->getEmpresa()->getId();
//        dump($Oferta);
//        $Oferta = new Eofertas();
        $form = $this->createForm(OfertaType::class, $Oferta);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                /** $em= $this->getDoctrine()->getEntityManager();
                  $em_repo=$em->getReposotory("ProyectoEmpBundle:Curriculum");
                  $curriculum= $em_repo->findOneBy(array("id_usuario" => $form->get("id_usuario")->getData())); */
                $Oferta = New Eofertas();
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
                $Oferta->setEstado("En Revision");



//                $em = $this->getDoctrine()->getEntityManager();
//                $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//                $id_usuario = $Empresa->getId();

                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($Oferta);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = "La oferta se guardo correctamente";
                    $this->session->getFlashBag()->add("status", $status);
                    return $this->redirectToRoute("listaOfertas", array('id_empresa' => $id_empresa));
                } else {
                    $status = "Error al guardar La oferta";
                }
            } else {
                $status = "La oferta no es valida!";
            }
            $this->session->getFlashBag()->add("status", $status);
            /** $this-> redirectoToRoute("login") */
        }

        return $this->render("ProyectoEmpBundle:Oferta:EditOferta.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function deleteofertaAction($id_oferta) {
//dump($id_oferta);  
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");

//        $Oferta = $em_repo->findOneBy(array('id' => $id_oferta));
        $Oferta = $em_repo->find($id_oferta);
        $id_empresa = $Oferta->getEmpresa()->getId();
        
        $em->remove($Oferta);
        $flush=$em->flush();

        if ($flush == null) {
            $status = "La oferta se borro correctamene";
            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute("listaOfertas", array('id_empresa' => $id_empresa));
        } else {
            $status = "Error al borrar La oferta";
        }
    }

}
