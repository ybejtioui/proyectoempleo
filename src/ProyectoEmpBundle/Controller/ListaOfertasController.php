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

class ListaOfertasController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function ListaOfertasAction(Request $request) {

        /**
          Buscar si existe el curriculum, y si es asi rederigirlo para editar
         */
        $em = $this->getDoctrine()->getEntityManager();
        $em_repo = $em->getRepository("ProyectoEmpBundle:Eofertas");
//        $ofertas = $em_repo->findBy(array('idOfertaComp' => $request->get('id_empresa'), 'estado' => "En Revision"));
        $ofertas = $em_repo->findBy(array('idOfertaComp' => $request->get('id_empresa')));
        
        $id_oferta_comp = $request->get('id_empresa');
        //echo $id_oferta_comp;

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
        return $this->render('ProyectoEmpBundle:Oferta:ListaOfertas.html.twig', array(
                    'ofertas' => $ofertas,
            'breadcrumbs' => [
                    [
                        'link' => $this->get('router')->generate('proyecto_emp_homepage'),
                        'title' => 'Inicio',
                    ],
                    [
                       'link' => $this->get('router')->generate('compedit', array('id_usuario' => $id_oferta_comp)),
                        'title' => 'Editar Empresa',
                    ],
                [
                       
                        'title' => 'Lista de ofertas',
                    ]
                    ]
        ));
    }

}
