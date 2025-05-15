<?php

namespace App\Form;

use App\Entity\AssembleeGenerale;
use App\Entity\Coproprietaire;
use App\Entity\Participation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('participant', EntityType::class, [
                'class' => Coproprietaire::class,
                'choice_label' => 'id',
            ])
            ->add('mandataire', EntityType::class, [
                'class' => Coproprietaire::class,
                'choice_label' => 'id',
            ])
            ->add('assemblee', EntityType::class, [
                'class' => AssembleeGenerale::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participation::class,
        ]);
    }
}
