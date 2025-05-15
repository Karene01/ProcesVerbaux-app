<?php

namespace App\Form;

use App\Entity\Coproprietaire;
use App\Entity\Copropriete;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoproprietaireForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('domicile')
            ->add('quotePart')
            ->add('copropriete', EntityType::class, [
                'class' => Copropriete::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coproprietaire::class,
        ]);
    }
}
