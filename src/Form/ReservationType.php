<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\DaySlots;
use App\Entity\EveningSlots;
use App\Entity\Reservation;
use App\Repository\AllergyRepository;
use App\Repository\DaySlotsRepository;
use App\Repository\EveningSlotsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
        ->add('date', DateType::class, [
            'widget' => 'choice',
            'input'  => 'datetime',
            
            'attr' => [
                'class' => 'form-control fs-4 mb-4 d-flex justify-content-between'
            ],
            'label' => 'Choisir la date',
            'label_attr' => [
                'class' => 'form-label d-none mt-4 mb-4 fs-4'
            ],
            
        ])
        ->add('daySlots', EntityType::class,[
            'class' => DaySlots::class,
            'query_builder' => function (DaySlotsRepository $r) {
                return $r->createQueryBuilder('i')
                    ->orderBy('i.name', 'ASC');
                },
                'attr' => [
                    'class' => 'mt-4 fs-5 ms-4 me-4'
                ],
            'label' => 'MIDI',
            'label_attr' => [
                'class' => 'form-label mt-4 fs-5 ms-4 me-4'
            ],
            'choice_label' => 'name',
            'choice_attr' => [
                'class' => 'mt-4 fs-5 ms-4 me-4'
            ],
            'multiple' => true,
            'expanded' => true

        ])

        ->add('eveningSlots', EntityType::class,[
            'class' => EveningSlots::class,
            'query_builder' => function (EveningSlotsRepository $r) {
                return $r->createQueryBuilder('i')
                    ->orderBy('i.name', 'ASC');
                },
                'attr' => [
                    'class' => 'mt-4 fs-5 ms-4 me-4'
                ],
            'label' => 'SOIR',
            'label_attr' => [
                'class' => 'form-label mt-4 fs-5 ms-4 me-4'
            ],
            'choice_label' => 'name',
            'choice_attr' => [
                'class' => 'mt-4 fs-5 ms-4 me-4'
            ],
            'multiple' => true,
            'expanded' => true

        ])
        // ->add('timeMidday', TimeType::class, [
        //     'widget' => 'choice',
        //     'input'  => 'datetime',        
            
        //     'attr' => [
        //         'class' => 'form-control fs-4 mb-4 d-flex justify-content-between'
        //     ],
        //     'label' => 'MIDI',
        //     'label_attr' => [
        //         'class' => 'form-label mt-4 mb-4 fs-4'
        //     ],
           
            
        // ])
        // ->add('timeEvening', TimeType::class, [
        //     'widget' => 'choice',
        //     'input'  => 'datetime',
            
        //     'attr' => [
        //         'class' => 'form-control fs-4 mb-4 d-flex justify-content-between'
        //     ],
        //     'label' => 'SOIR',
        //     'label_attr' => [
        //         'class' => 'form-label mt-4 mb-4 fs-4'
        //     ],
           
            
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
                    'class' => 'form-label mt-4 fs-5 ms-4 me-4'
                ],
                'choice_label' => 'name',
                'choice_attr' => [
                    'class' => 'mt-4 fs-5 ms-4 me-4'
                ],
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
