<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamousByType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('genre', 'entity', array(
                'class' => 'AppBundle\Entity\MusicGenre',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('Save', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FamousBy',
        ));
    }

    public function getName()
    {
        return 'famous_by';
    }
}