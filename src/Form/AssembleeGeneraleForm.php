<?php

namespace App\Form;

use App\Entity\AssembleeGenerale;
use App\Entity\Copropriete;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class AssembleeGeneraleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        /*->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'label' => 'Date de l\'assemblée',
                'attr' => ['class' => 'form-control']
        ])*/
        ->add('date', DateType::class, [
        'widget' => 'single_text',
        'html5' => true,
        'label' => 'Date de l\'assemblée',
        'attr' => ['class' => 'form-control'],
        'required' => true,
        'constraints' => [
            new NotBlank(['message' => 'La date est obligatoire.']),
            new GreaterThanOrEqual([
                'value' => 'today',
                'message' => 'La date de l\'assemblée ne peut pas être dans le passé.',
            ]),
        ],
    ])
        ->add('heure', TimeType::class, [
        'widget' => 'single_text',
        'html5' => true,
        'label' => 'Heure de début',
        'required' => true,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
            new NotBlank(['message' => 'L\'heure est obligatoire.']),
    ]
    ])
    ->add('copropriete', EntityType::class, [
        'class' => Copropriete::class,
        'choice_label' => 'nomCopropriete',
    ])
    ->add('copropriete', EntityType::class, [
        'class' => Copropriete::class,
        'choice_label' => 'nomCopropriete',
    ]);
     
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AssembleeGenerale::class,
        ]);
    }
}
