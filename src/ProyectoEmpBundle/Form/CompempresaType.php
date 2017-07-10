<?php

namespace ProyectoEmpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
//use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompempresaType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('ListaOfertas', SubmitType::class, array('label' => 'Lista de Ofertas', 'attr' => array('class' => 'Lista')))
                ->add('compName', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('cif', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('antiguedad', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('direccion', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('nombrePc', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('telefonoPc', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('emailPc', EmailType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('compLogotipo', FileType::class, array(
                    "label" => "Logotipo:",
                    "attr" => array("class" => "form-control"),
                    "data_class" => null,
                    "required" => false
                ))
//                ->add('idCompUsuarios')
                ->add('AddOferta', SubmitType::class, array('label' => 'Añade oferta'))
                ->add("Guardar Empresa", SubmitType::class, array("attr" => array(
                        "class" => "form-submit btn btn-success",
            )))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ProyectoEmpBundle\Entity\Compempresa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'proyectoempbundle_compempresa';
    }

}
