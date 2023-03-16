<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Jour',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('openingTimeAm', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'S\'ouvre le matin',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimeAm', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('openingTimePm', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'S\'ouvre après midi',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimePm', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
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
