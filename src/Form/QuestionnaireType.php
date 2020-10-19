<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Questionnaire;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuestionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matiere',EntityType::class, array(
                    'class' => Matiere::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
                    'mapped'=>true,
                    ))
            ->add('startedAt',DateTimeType::class,[
                    'placeholder' => [
                        'year' => 'Année',
                         'month' => 'Mois',
                          'day' => 'Jour',
                    ],
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker']])
            ->add('stoppedAt',DateTimeType::class,[
                    'placeholder' => [
                        'year' => 'Année',
                         'month' => 'Mois',
                          'day' => 'Jour',
                    ],
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker']])
            ->add('nbreQuestion')
            ->add('baremeTot')
            ->add('questions', CollectionType::class, array(
                                'entry_type' => QuestionType::class,
                                'entry_options' => [
                                    'attr' =>
                                    ['class' => 'questionInput col-md-12'],
                                    'label'=> false,
                                 ],
                                'block_name' => 'questions',
                                 
                                 'allow_add' => true,
                                'allow_delete' => true,
                                'prototype' => true,
                                'by_reference' => false
            ))
            
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Questionnaire::class,
           



        ]);
    }
}
