<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RestoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('title', TimeType::class, [
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Heure',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
             ->add('nbTotalTables', IntegerType::class, [
                    'attr' => [
                     'class' => 'form-control',
                     'min' => 1,
                     'max' => 20
                     ],
                    'label' => 'Nombre de couverts',
                     'label_attr' => [
                         'class' => 'form-label mt-4 fs-5'
                    ],
                  'constraints' => [
                         new Assert\Positive(),
                        new Assert\LessThan(20)
                   ]
                 ])
                 ->add('nbTotalPlaces', IntegerType::class, [
                    'attr' => [
                     'class' => 'form-control',
                     'min' => 1,
                     'max' => 20
                     ],
                    'label' => 'Nombre de couverts',
                     'label_attr' => [
                         'class' => 'form-label mt-4 fs-5'
                    ],
                  'constraints' => [
                         new Assert\Positive(),
                        new Assert\LessThan(80)
                   ]
                 ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
