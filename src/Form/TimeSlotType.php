<?php

namespace App\Form;

use App\Entity\TimeSlot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeSlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lunchTimeStart')
            ->add('lunchSlot', ChoiceType::class, [
                'choices' => [
                    // 'Heure' => 0,
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
            ->add('lunchTimeEnd')
            ->add('dinnerTimeStart')
            ->add('dinnerSlot', ChoiceType::class, [
                'choices' => [
                    // 'Heure' => 0,
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
            ->add('dinnerTimeEnd')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TimeSlot::class,
        ]);
    }
}
