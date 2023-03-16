<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
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
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('openingTime', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'S\'ouvre',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTime', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
