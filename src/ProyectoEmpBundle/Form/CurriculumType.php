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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use ProyectoEmpBundle\Entity\Experiencia;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;
use Symfony\Component\Intl\Intl;


class CurriculumType extends AbstractType {

    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
                 
      
        $builder
                ->add('genero', ChoiceType::class, array(
                    "choices" => array(
                        "Hombre" => "Hombre",
                        "Mujer" => "Mujer"
            )))
                ->add('dni', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('fnacimiento', DateType::class, Array(
                    "widget" => "single_text",
                    'format' => 'dd-MM-yyyy',
                    'attr' => Array(
                        'class' => 'form-control input-inline datepicker',
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'dd-mm-yyyy'
                    )
                ))
                ->add('direccion', TextType::class, array("required" => "required", "attr" => array(
                        "class" => "form-name form-control",
            )))
                ->add('gradocapacidad', ChoiceType::class, array(
                    'choices' => array(
                        '0' => '0',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                    ),
               
               "label" => "Grado de discapacidad",
                        
                   
                ))
                ->add('idioma', LanguageType::class, array("required"=>"required", "attr"=>array(
               "class"=>"form-name form-control select2",
               'data-placeholder' => '-- Choose something --',     
               )))
//                ->add('idioma', ChoiceType::class, array(
//    'choices' => array(
//        'English' => 'en',
//        'Spanish' => 'es',
//        'Bork'   => 'muppets',
//        'Pirate' => 'arr',
//        
//    ),
//                    "attr" => array(
//                        "class" => "select2",
//                        'data-placeholder' => '-- Choose something --',
//            )
//    
// 
//                    
//))
             
//              ->add('idioma', LanguageType::class, array("required"=>"required", "attr"=>array(
//               'class' => 'select2',
////            'data-placeholder' => '-- Choose something --',
////            'multiple' => false
//
//               )))  
//              ->add('idioma',Select2EntityType::class, array(
//                 'attr'=>array('class'=>'ProyectoEmpBundle\Entity\Curriculum'),
//                 'label'=>'Country of The Head fice',                     
//            'multiple' => true,
//            'remote_route' => 'curriculum',
////                  'choices_as_values' => true, //               
//                 'class' => 'ProyectoEmpBundle\Entity\Curriculum',
////                 'choice_label' => 'idioma',
//                  'minimum_input_length' => 2,
//            'page_limit' => 10,
//            'allow_clear' => true,
//            'delay' => 250,
//            'cache' => true,
//            'cache_timeout' => 60000, // if 'cache' is true
//            'language' => 'es',
//
//             ))
//                ->add('idioma', Select2EntityType::class, array(
//            'multiple' => true,
//            'remote_route' => 'tetranz_test_default_countryquery',
//            'class' => 'ProyectoEmpBundle\Entity\Curriculum',
//            'primary_key' => 'id',
//'text_property' => 'idioma',
//            'minimum_input_length' => 2,
//            'page_limit' => 10,
//            'allow_clear' => true,
//            'delay' => 250,
//            'cache' => true,
//            'cache_timeout' => 60000, // if 'cache' is true
//            'language' => 'es',
//            'placeholder' => 'Elige idioma',
//                        )

            // 'object_manager' => $objectManager, // inject a custom object / entity manager 
//        )
               ->add('estudiante', ChoiceType::class, array(
                    'choices' => array(
                        'Sí' => 'si',
                        'NO' => 'no',

                    ),
                ))
           ->add('desempleado', ChoiceType::class, array(
                    'choices' => array(
                        'Sí' => 'si',
                        'NO' => 'no',

                    ),
                ))

                
                ->add('AddExperiencia', SubmitType::class, array('label' => 'Añade experiencia'))
                ->add("Guardar Curriculum", SubmitType::class, array("attr" => array(
                        "class" => "form-submit btn btn-success",
            )))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ProyectoEmpBundle\Entity\Curriculum',
            'allow_extra_fields' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'proyectoempbundle_curriculum';
    }

}
