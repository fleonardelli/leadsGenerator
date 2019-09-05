<?php

namespace App\Form;

use App\Entity\Lead;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LeadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('portal')
            ->add('createdAt')
            ->add('gotFromCrm')
            ->add('sentByEmail')
            ->add('student')
            ->add('academicOffer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lead::class,
        ]);
    }
}
