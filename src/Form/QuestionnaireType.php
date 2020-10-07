<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Questionnaire;
use App\Entity\ReponseProf;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('startedAt')
            ->add('stoppedAt')
            ->add('nbreQuestion')
            ->add('baremeTot')
            
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Questionnaire::class,
           



        ]);
    }
}
