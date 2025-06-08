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


use Doctrine\ORM\EntityManagerInterface;

class ParticipationForm extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('participant', EntityType::class, [
                'class' => Coproprietaire::class,
                'choice_label' => fn($c) => $c->getNom() . ' ' . $c->getPrenom(),
                'label' => 'Copropriétaire',
                'attr' => [
                    'class' => 'select-participant',
                ],
            ])
            ->add('present', CheckboxType::class, [
                'label' => 'Présent(e)',
                'required' => false,
                'data' => true,
                'attr' => [
                    'class' => 'present-checkbox',
                ],
            ])
            ->add('mandataire', EntityType::class, [
                'class' => Coproprietaire::class,
                'choice_label' => fn($c) => $c->getNom() . ' ' . $c->getPrenom(),
                'required' => false,
                'label' => 'Mandataire (si représenté)',
                'placeholder' => '— Aucun —',
                'choices' => $this->getFilteredMandataires($options['assemblee'], $options['participant']),
                'attr' => [
                    'class' => 'select-mandataire',
                ],
            ])
            ->add('assembleeGenerale', EntityType::class, [
                'class' => AssembleeGenerale::class,
                'choice_label' => 'id',
                'disabled' => true,
            ]);
    }

    private function getFilteredMandataires(?AssembleeGenerale $assemblee, ?Coproprietaire $participant): array
    {
        if (!$assemblee) {
            return [];
        }

        $mandatairesDisponibles = [];
        $participations = $assemblee->getParticipations();

        // Récupérer tous les copropriétaires sauf le participant actuel
        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select('c')
            ->from(Coproprietaire::class, 'c');

        if ($participant) {
            $queryBuilder->where('c.id != :participantId')
                ->setParameter('participantId', $participant->getId());
        }

        $coproprietaires = $queryBuilder->getQuery()->getResult();

        foreach ($coproprietaires as $coproprietaire) {
            // Vérifier si ce copropriétaire est déjà mandataire dans cette AG
            $estDejaMandataire = false;
            foreach ($participations as $participation) {
                if ($participation->getMandataire() && $participation->getMandataire()->getId() === $coproprietaire->getId()) {
                    $estDejaMandataire = true;
                    break;
                }
            }

            if (!$estDejaMandataire) {
                $mandatairesDisponibles[] = $coproprietaire;
            }
        }

        return $mandatairesDisponibles;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participation::class,
            'assemblee' => null,
            'participant' => null,
        ]);

        $resolver->setAllowedTypes('assemblee', ['null', AssembleeGenerale::class]);
        $resolver->setAllowedTypes('participant', ['null', Coproprietaire::class]);
    }



}
