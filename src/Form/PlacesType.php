<?php

namespace App\Form;

use App\Entity\Places;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class PlacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbTotalPlaces', IntegerType::class, [
                'attr' => [
                'class' => 'form-control',
                'max' => 40
                ],
                'label' => 'Places',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-dark fs-5'
                ],
                'constraints' => [
                    new Assert\Positive(),
                    new Assert\LessThan(41)
                ]
            ])
            ->add('nbBusyPlaces', IntegerType::class, [
                'attr' => [
                'class' => 'form-control',
                'min' => 1,
                'max' => 10
                ],
                'label' => 'Places occupées',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-dark fs-5'
                ],
                'constraints' => [
                    new Assert\Positive(),
                    new Assert\LessThan(10)
                ]
            ])
            ->add('nbAvailablePlaces', IntegerType::class, [
                'attr' => [
                'class' => 'form-control',
                'min' => 1,
                'max' => 40
                ],
                'label' => 'Places disponibles',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-dark fs-5'
                ],
                'constraints' => [
                    new Assert\Positive(),
                    new Assert\LessThan(41)
                ]
            ])
            ->add('date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Places::class,
        ]);
    }
}
