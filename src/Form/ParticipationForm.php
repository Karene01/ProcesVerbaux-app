<?php

namespace App\Form;

use App\Entity\AssembleeGenerale;
use App\Entity\Coproprietaire;
use App\Entity\Participation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class ParticipationForm extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('participant', EntityType::class, [
            'class' => Coproprietaire::class,
            'choice_label' => fn($c) => $c->getNom() . ' ' . $c->getPrenom(),
            'label' => 'Copropriétaire',
        ])
        ->add('present', CheckboxType::class, [
            'label' => 'Présent(e)',
            'required' => false,
            'data' => true,
        ])
        ->add('mandataire', EntityType::class, [
            'class' => Coproprietaire::class,
            'choice_label' => fn($c) => $c->getNom() . ' ' . $c->getPrenom(),
            'required' => false,
            'label' => 'Mandataire (si représenté)',
            'placeholder' => '— Aucun —',
        ])
        ->add('assembleeGenerale', EntityType::class, [
            'class' => AssembleeGenerale::class,
            'choice_label' => 'id',
            'disabled' => true,
        ]);

        }


    


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participation::class,
            'action_type' => null,
        ]);
    }
}
