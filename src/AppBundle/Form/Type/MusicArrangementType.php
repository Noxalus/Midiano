<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MusicArrangementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('music', new MusicType())
            ->add('midi', new MidiFileType())
            ->add('score', new ScoreFileType(), array(
                'required'    => false
            ))
            ->add('youtube_id', 'text', array(
                'required'    => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('arranger', 'text', array(
                'required'    => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('transcriber', 'text', array(
                'required'    => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('difficulty', 'text', array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('save', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MusicArrangement',
        ));
    }

    public function getName()
    {
        return 'music_arrangement';
    }
}