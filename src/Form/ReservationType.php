<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\DaySlot;
use App\Entity\EveningSlot;
use App\Entity\Reservation;
use App\Entity\Schedule;
use App\Repository\AllergyRepository;
use App\Repository\DaySlotRepository;
use App\Repository\EveningSlotRepository;
use App\Repository\ScheduleRepository;
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
                'Le nombre de couverts' => "",
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
            ],
            'required' => true,

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
       //  js-datepicker
        ->add('date', DateType::class, [
            'widget' => 'single_text',
            'html5' => false,
            'input'  => 'datetime',
             'input_format' => 'yyyy-MM-dd',         
            'attr' => [
                'class' => 'form-control fs-4 mb-4 d-flex justify-content-between d-none'
            ],
            'label' => 'Choisir la date',
            'label_attr' => [
                'class' => 'form-label d-none mt-4 mb-4 fs-4'
            ],
            'required' => false,
           
        ])
       
        ->add('lunchTime', ChoiceType::class, [
            'choices' => [
                 'Choisir' => '',
                '12:00' =>  '12:00',
                '12:15' => '12:15',
                '12:30' => '12:30',
                '12:45' => '12:45',
                '13:00' => '13:00',              
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4 btn btn_slot lunch_slot_btn'
            ],
            'label' => 'MIDI',
            'label_attr' => [
                'class' => 'form-label mt-4 slots_name fs-4 text-start ln_slot_n'
            ],
            'multiple' => false,
            'expanded' => true,
            'required' => false,
           
        ])

        ->add('dinnerTime', ChoiceType::class, [
            'choices' => [
                 'Choisir' => "",
                '19:00' =>  '19:00',
                '19:15' => '19:15',
                '19:30' => '19:30',
                '19:45' => '19:45',
                '20:00' => '20:00', 
                '20:15' => '20:15', 
                '20:30' => '20:30', 
                '20:45' => '20:45', 
                '21:00' => '21:00', 
                '21:15' => '21:15', 
                '21:30' => '21:30', 
                '21:45' => '21:45', 
                '22:00' => '22:00',               
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'SOIR',
            'label_attr' => [
                'class' => 'form-label mt-4 slots_name fs-4 text-start ev_slot_n'
            ],
            'multiple' => false,
            'expanded' => true,
            'required' => false,
            
        ])

         
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
                    'class' => 'btn btn-primary mt-4 fs-4 p-4 fw-2 reservation_submit'
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
