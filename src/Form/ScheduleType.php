<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('day', ChoiceType::class, [
            'choices' => [
                'Lundi' => 'Lundi',
                'Mardi' => 'Mardi',
                'Mercredi' => 'Mercredi',
                'Jeudi' => 'Jeudi',
                'Vendredi' => 'Vendredi',
                'Samedi' => 'Samedi',
                'Dimanche' =>  'Dimanche',
               
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Jour',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
          
            ->add('openingTimeMidday', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'value' => '12:00'
                ],
                'label' => 'S\'ouvre à midi',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimeMidday', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'value' => '14:00'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('openingTimeEvening', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'value' => '19:00'
                ],
                'label' => 'S\'ouvre le soir',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimeEvening', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'value' => '23:00'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4 fs-4'
                ],
                'label' => 'Sauvegarder',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
