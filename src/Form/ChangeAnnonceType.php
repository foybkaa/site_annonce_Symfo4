<?php

namespace App\Form;

use App\Entity\ChangeAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangeAnnonceType extends AbstractType
{   /**
    * Permet d'avoir la configuration de base d'un champ
    */
    private function getConfiguration($label,$placeholder){
        return[
            'label'=>$label,
            'attr'=>[
                'placeholder'=>$placeholder
            ],
            ];
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('deviseA', ChoiceType::class, [
                'label'=>"La devise que vous possédez",
                'choices'  => [
                    'Euro' => "Euro",
                    'Dirham marocain' => "Dirham marocain",
                    'Dollar Américain' =>'Dollar Américain',
                    'Yen Japonais' => 'Yen Japonais',
                    'Dinar algérien' => 'Dinar algérien',
                    'Livre Sterling' => 'Livre Sterling',
                    'Dollar Australien' => 'Dollar Australien',
                    'Franc Suisse' => 'Franc Suisse',
                    'Dollar Canadien'=> 'Dollar Canadien',
                    'Peso Mexicain' => 'Peso Mexicain',
                    'Yuan Chinois' => 'Yuan Chinois',
                    'Dollar Néo-Zélandais' => 'Dollar Néo-Zélandais',
                    'Autre*' => 'Autre',
                ],
            ], )
            ->add('montant', IntegerType::class, $this->getConfiguration("Montant","Veuillez indiquer le vous montant que vous souhaitez échanger"))
            ->add('deviseB', ChoiceType::class, [
                'label'=>"La devise que vous recherchez",
                'choices'  => [
                    'Euro' => "Euro",
                    'Dirham marocain' => "Dirham marocain",
                    'Dollar Américain' =>'Dollar Américain',
                    'Yen Japonais' => 'Yen Japonais',
                    'Dinar algérien' => 'Dinar algérien',
                    'Livre Sterling' => 'Livre Sterling',
                    'Dollar Australien' => 'Dollar Australien',
                    'Franc Suisse' => 'Franc Suisse',
                    'Dollar Canadien'=> 'Dollar Canadien',
                    'Peso Mexicain' => 'Peso Mexicain',
                    'Yuan Chinois' => 'Yuan Chinois',
                    'Dollar Néo-Zélandais' => 'Dollar Néo-Zélandais',
                    'Autre*' => 'Autre',
                ],
            ], )
            ->add('ville', TextType::class, $this->getConfiguration("Ville", "Veuillez indiquer la ville ou l'échange aura lieux"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChangeAnnonce::class,
        ]);
    }
}
