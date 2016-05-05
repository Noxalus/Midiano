<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('composers', 'entity', array(
                'class' => 'AppBundle\Entity\Composer',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
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
            ->add('famousBy', 'entity', array(
                'class' => 'AppBundle\Entity\FamousBy',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
              ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Music',
        ));
    }

    public function getName()
    {
        return 'music';
    }
}