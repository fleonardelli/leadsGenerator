<?php

namespace App\Form;

use App\Entity\AcademicOffer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcademicOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('duration')
            ->add('timeTable')
            ->add('coursePlace')
            ->add('description')
            ->add('active')
            ->add('tematicArea')
            ->add('courseMode')
            ->add('offerType')
            ->add('institution')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AcademicOffer::class,
        ]);
    }
}
