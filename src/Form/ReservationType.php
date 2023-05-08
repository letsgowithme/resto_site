<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\DaySlot;
use App\Entity\EveningSlot;
use App\Entity\Reservation;
use App\Repository\AllergyRepository;
use App\Repository\DaySlotRepository;
use App\Repository\EveningSlotRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('fullName', TextType::class, [
            'attr' => [
                'class' => 'form-control mb-4 fs-4',
                'minlenght' => '2',
                'maxlenght' => '50',
            ],
            'label' => 'Nom / Prénom',
            'label_attr' => [
                'class' => 'form-label  mt-4 text-light fs-4 text-start'
            ],
          
        ])

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
        ->add('nbChildren', ChoiceType::class, [
            'choices' => [
                'Le nombre d\'enfants' => 0,
                '1 enfant' => 1,
                '2 enfants' => 2,
                '3 enfants' => 3,
                '4 enfants' => 4,
                '5 enfants' => 5,
                '6 enfants' => 6,
                '7 enfants' => 7,
                '8 enfants' => 8,
                
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Nombre d\'enfants',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
       
        ->add('date', DateType::class, [
            'widget' => 'single_text',
            // 'html5' => false,
            'input'  => 'datetime',
            // 'format' => 'dd-MM',
            
            // 'attr' => ['class' => 'js-datepicker'],
            
            'attr' => [
                'class' => 'form-control fs-4 mb-4 d-flex justify-content-between'
            ],
            'label' => 'Choisir la date',
            'label_attr' => [
                'class' => 'form-label d-none mt-4 mb-4 fs-4'
            ],
            
        ])
        
        ->add('daySlot', EntityType::class,[
            'class' => DaySlot::class,
            'query_builder' => function (DaySlotRepository $r) {
                return $r->createQueryBuilder('i')
                    ->orderBy('i.time', 'ASC');
                },
                'attr' => [
                    'class' => 'mt-4 fs-4'
                ],
            'label' => 'Choisir l\'heure',
            'label_attr' => [
                'class' => 'form-label mt-4 fs-4'
            ],

            
            'choice_label' => 'time',
            'choice_attr' => [
                'class' => 'mt-4 fs-5 ms-4 me-4'
            ],
            'multiple' => false,
            'expanded' => true

        ])

        // ->add('eveningSlot', EntityType::class,[
        //     'class' => EveningSlot::class,
        //     'query_builder' => function (EveningSlotRepository $r) {
        //         return $r->createQueryBuilder('i')
        //             ->orderBy('i.name', 'ASC');
        //         },
        //         'attr' => [
        //             'class' => 'mt-4 fs-5 ms-4 me-4'
        //         ],
        //     'label' => 'SOIR',
        //     'label_attr' => [
        //         'class' => 'form-label mt-4 fs-5 ms-4 me-4'
        //     ],
        //     'choice_label' => 'name',
        //     'choice_attr' => [
        //         'class' => 'mt-4 fs-5 ms-4 me-4'
        //     ],
        //     'multiple' => false,
        //     'expanded' => true,
            

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
                    'class' => 'form-label mt-4 fs-3 ms-4 me-4'
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
                    'class' => 'btn btn-primary mt-4 fs-4 px-4'
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
