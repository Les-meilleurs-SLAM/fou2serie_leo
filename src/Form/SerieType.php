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


class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('duree')
            ->add('premiereDiffusion')
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
                'expanded'=>true,
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
