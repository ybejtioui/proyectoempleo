<?php

namespace ProyectoEmpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EusuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('nombre', TextType::class, array("required"=>"required", "attr"=>array(
               "class"=>"form-nombre form-control",
               )))
           ->add('apellido', TextType::class, array("required"=>"required", "attr"=>array(
               "class"=>"form-apellido form-control",
               )))
           ->add('tef', TextType::class, array("label"=>"Teléfono" ,"required"=>"required", "attr"=>array(
               "class"=>"form-tef form-control",
               )))
            ->add('email', EmailType::class, array("required"=>"required", "attr"=>array(
               "class"=>"form-email form-control",
               )))     
           ->add('password', PasswordType::class, array("required"=>"required", "attr"=>array(
               "class"=>"form-password form-control",
               )))  
            ->add("Guardar", SubmitType::class,array("attr"=>array(
               "class"=>"form-submit btn btn-success",
               ))) 
                        
        ;
    }
    
    /**
     * {@inheritdoc} 
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProyectoEmpBundle\Entity\Eusuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proyectoempbundle_eusuarios';
    }


}
