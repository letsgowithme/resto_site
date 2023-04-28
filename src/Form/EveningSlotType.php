<?php

namespace App\Form;

use App\Entity\EveningSlot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EveningSlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TimeType::class, [
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Heure',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
        ->add('isAvailable', CheckboxType::class, [
            'attr' => [
                'class' => 'form-check-input mt-4 mb-4',
            ],
            'required' => false,
            'label' => 'Disponible',
            'label_attr' => [
                'class' => 'form-check-label mt-3 ms-3 text-dark fs-5'
            ],
            
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EveningSlot::class,
        ]);
    }
}
