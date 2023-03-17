<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Allergy;
use App\Repository\AllergyRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nbPeople', ChoiceType::class, [
            'choices' => [
                '1 couvert' => 1,
                '2 couverts' => 2,
                '3 couverts' => 3,
                '4 couverts' => 4,
                '5 couverts' => 5,
                '6 couverts' => 6,
                '7 couverts' => 7,
                '8 couverts' => 8,
                '9 couverts' => 9,
                '10 couverts' => 10,
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Nombre de couverts',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
            // ->add('nbPeople', IntegerType::class, [
            //     'attr' => [
            //     'class' => 'form-control',
            //     'min' => 1,
            //     'max' => 80
            //     ],
            //     'label' => 'Nombre de couverts',
            //     'label_attr' => [
            //         'class' => 'form-label mt-4 fs-5'
            //     ],
            //     'constraints' => [
            //         new Assert\Positive(),
            //         new Assert\LessThan(80)
            //     ]
            // ])
            ->add('date', DateType::class, [
                'widget' => 'choice',
                'input'  => 'datetime',
                
                'attr' => [
                    'class' => 'form-control fs-4 mb-4 d-flex justify-content-between'
                ],
                'label' => 'La date',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-none mb-4'
                ],
                
            ])
            ->add('timeMidday', ChoiceType::class, [
                'choices' => [
                    'Choisir l\'heure' => 'Choisir l\'heure',
                    '12:00' => 1,
                    '12:15' => 2,
                    '12:30' => 3,
                    '12:45' => 4,
                    '13:00' => 5,
                    
                ],
                'attr' => [
                    'class' => 'form-select'
                ],
                'label' => 'MIDI',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-3 h5-page'
                ],
                'multiple' => false,
    
            ])
            ->add('timeEvening', ChoiceType::class, [
                'choices' => [
                    'Choisir l\'heure' => 'Choisir l\'heure',
                    '19:00' => 1,
                    '19:15' => 2,
                    '19:30' => 3,
                    '19:45' => 4,
                    '20:00' => 5,
                    '20:15' => 6,
                    '20:30' => 7,
                    '20:45' => 8,
                    '21:00' => 9,
                    '21:15' => 10,
                    '21:30' => 11,
                    '22:00' => 12
                ],
                'attr' => [
                    'class' => 'form-select'
                ],
                'label' => 'SOIR',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-3 h5-page'
                ],
                'multiple' => false,
    
            ])
            // ->add('time', TimeType::class, [
            //     'widget' => 'choice',
            //     'input'  => 'datetime'
            // ])
            ->add('allergies', EntityType::class,[
                'class' => Allergy::class,
                'query_builder' => function (AllergyRepository $r) {
                    return $r->createQueryBuilder('i')
                        ->orderBy('i.name', 'ASC');
                    },
                    'attr' => [
                        'class' => 'mt-4 fs-5 ms-4 me-4'
                    ],
                'label' => 'Vous avez une allergie à indiquer?',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5'
                ],
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true

            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4 fs-4'
                ],
                'label' => 'Réserver la table!',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
