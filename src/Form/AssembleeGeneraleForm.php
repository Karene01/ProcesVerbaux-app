<?php

namespace App\Form;

use App\Entity\AssembleeGenerale;
use App\Entity\Copropriete;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AssembleeGeneraleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'label' => 'Date de l\'assemblée',
                'attr' => ['class' => 'form-control']
        ])
        ->add('heure', TimeType::class, [
        'widget' => 'single_text',
        'html5' => true,
        'label' => 'Heure de début',
        'attr' => ['class' => 'form-control']
    ])
    ->add('copropriete', EntityType::class, [
        'class' => Copropriete::class,
        'choice_label' => 'nomCopropriete',
    ])
    ->add('ouverte', CheckboxType::class, [
        'label' => 'Assemblée ouverte',
        'required' => false,
    ])
            ->add('copropriete', EntityType::class, [
                'class' => Copropriete::class,
                'choice_label' => 'nomCopropriete',
            ])
        ->add('ouverte', CheckboxType::class, [
            'label' => 'Assemblée ouverte',
            'required' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AssembleeGenerale::class,
        ]);
    }
}
