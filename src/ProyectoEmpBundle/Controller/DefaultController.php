<?php

namespace ProyectoEmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
//       if ($form->isSubmitted() ) { 
        $searchQuery = $request->get('puesto');
        $searchQuery2 = $request->get('lugar');

        if ((!empty($searchQuery)) or ( !empty($searchQuery2))) {
            $finder = $this->container->get('fos_elastica.finder.search.ofertas');
            $boolQuery = new \Elastica\Query\BoolQuery();

            if (!empty($searchQuery)) {
                $fieldQuery = new \Elastica\Query\Match();
                $fieldQuery->setFieldQuery('titulopuesto', $searchQuery);
                $boolQuery->addMust($fieldQuery);
            }

            if (!empty($searchQuery2)) {
                $fieldQuery = new \Elastica\Query\Match();
                $fieldQuery->setFieldQuery('provinciapuesto', $searchQuery2);
//                $boolQuery->addShould($fieldQuery);
                $boolQuery->addMust($fieldQuery);
            }

            $fieldQuery = new \Elastica\Query\Match();
            $fieldQuery->setFieldQuery('estado', 'Publicada');
            $boolQuery->addMust($fieldQuery);

            $ofertas = $finder->find($boolQuery);
//             dump($searchQuery); die;
        } else {
//            $em = $this->getDoctrine()->getManager();
//            $dql = "SELECT u FROM ProyectoEmpBundle:Eofertas u where u.estado ='Publicada' ORDER BY u.id DESC";
//            $ofertasQuery = $em->createQuery($dql);
//            $ofertas = $ofertasQuery->getResult();
            $em = $this->getDoctrine()->getManager();
            $dql = "SELECT u FROM ProyectoEmpBundle:Eofertas u, ProyectoEmpBundle:Compempresa c where u.estado ='Publicada' and c.id=u.idOfertaComp ORDER BY u.id DESC";
            $ofertasQuery = $em->createQuery($dql);
            $ofertas = $ofertasQuery->getResult();
//            dump($ofertas); die;
        }
//         print_r($SearchQuery);
//         exit();        
//       } 
//         $paginator = $this->get('knp_paginator');
//         $pagination = $paginator->paginate(
//              $ofertas, $request->query->getInt('pagina',1),
//              10     
//           );

        return $this->render('ProyectoEmpBundle:Default:index.html.twig', array(
                    'ofertas' => $ofertas,
        ));
    }

}