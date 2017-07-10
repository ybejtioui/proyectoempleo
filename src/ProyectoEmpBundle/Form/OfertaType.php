<?php

namespace ProyectoEmpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class OfertaType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titulopuesto', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('provinciapuesto', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('numerovacaantes', NumberType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('descripcion', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('nivelestudios', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('experienciareq', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('idiomas', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('jornada', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('salario', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('duracion', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('tipocontrato', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('horario', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add('personalacargo', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                
                 ->add("Guardar Oferta", SubmitType::class, array("attr" => array(
                "class" => "form-submit btn btn-success",
    )))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ProyectoEmpBundle\Entity\Eofertas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'proyectoempbundle_oferta';
    }

}
