<?php

namespace App\Form;

use App\Entity\RendezVous;
use App\Enum\Prestation;
use App\Enum\Specialite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateHeure', DateTimeType::class, [
                'label' => 'Date et heure',
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('prestation', ChoiceType::class, [
                'label' => 'Type de prestation',
                'choices' => Prestation::cases(),
                'choice_label' => fn($prestation) => ucfirst($prestation->value),
                'choice_value' => fn($prestation) => $prestation?->value,
            ])
            ->add('specialite', ChoiceType::class, [
                'label' => 'Spécialité',
                'choices' => Specialite::cases(),
                'choice_label' => fn($specialite) => ucfirst($specialite->value),
                'choice_value' => fn($specialite) => $specialite?->value,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
