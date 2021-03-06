<?php

namespace App\Form;

use App\Entity\Question;
use App\Entity\Questionnaire;
use App\Entity\TypeReponse;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questionnaire',
                    HiddenType::class,[],
                    EntityType::class, array(
                    'class' => Questionnaire::class,
                    'choice_label' => 'id',
                    'multiple'  => false,
            ))
            ->add('numero',TypeTextType::class,[
            'attr' => ['class' => 'col-12'],
        ])
            ->add('libelle')
            ->add('baremeQuestion')
            ->add('typeReponse',EntityType::class, array(
                    'class' => TypeReponse::class,
                    'choice_label' => 'type',
                    
                    'multiple'  => false,
                   
                    ))
            ->add('nbreChoix')
            ->add('reponseProfs', CollectionType::class, array(
            'entry_type' => ReponseProfType::class,
            'entry_options' => [
                                    'attr' =>
                                    ['class' => 'reponseInput'],
                                    'label'=> false,
                                 ],
                                'block_name' => 'reponses',
                                
                                'allow_add' => true,
                                'allow_delete' => true,
                                'prototype' => true,
                                'prototype_name' => '__rep_prot__',
                                'by_reference' => false
        ))

           

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
