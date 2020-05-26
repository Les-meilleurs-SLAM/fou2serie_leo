<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Serie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('duree')
            ->add('premiereDiffusion', TypeDateType::class, array(
                'years' => range(date('Y') - 20, date('Y') + 5)
            ))
            ->add('image')
            ->add('video')
            ->add('nbEpisode')
            ->add('lesGenres', EntityType::class, array(
                'class' => Genre::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('genre')
                        ->orderBy('genre.libelleGenre', 'ASC');
                },
                'choice_label' => 'libelleGenre',
                'multiple' => true, // permet la sélection multiple
                //'expanded' => true, pour ne pas avoir de cases à cocher
            ))
            ->add('Sauvegarder', SubmitType::class, [
                'attr' => [
                    'class' => 'save'
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
