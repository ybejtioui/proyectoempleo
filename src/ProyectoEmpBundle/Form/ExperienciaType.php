<?php

namespace ProyectoEmpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ExperienciaType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('fecha', dateType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('duracion', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('empresa', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('cargo', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                 ->add("Guardar Experiencia", SubmitType::class, array("attr" => array(
                "class" => "form-submit btn btn-success",
    )))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ProyectoEmpBundle\Entity\Experiencia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'proyectoempbundle_experiencia';
    }

}
