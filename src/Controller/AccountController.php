<?php

namespace App\Controller;

use App\Entity\EditPassword;
use App\Entity\User;
use App\Form\EditPasswordType;
use App\Form\EditProfilType;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccountController extends AbstractController
{
    /**
     * Permet d'afficher et de gérer le formulaire de connexion
     * 
     * @Route("/login", name="account_login")
     */
    public function login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $username = $utils->getLastUsername();

        return $this->render('account/login.html.twig', [
            'hasError' => $error !== null,
            'username' => $username
        ]);
    }

     /**
     * Permet de se déconnecter
     * 
     * @Route("/logout", name="account_logout")
     */
    public function logout()
    {

    }

    /**
     * Permet d'afficher le formulaire d'inscription
     * 
     * @Route("/register", name="account_register")
     */
    public function register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getHash());
            $user->setHash($hash);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Félicitation votre compte a bien été créé ! Vous pouvez maintenant vous connecter"
            );

            return $this->redirectToRoute("account_login");
        }

        return $this->render('account/registration.html.twig',[
            'form' => $form->createView()
        ]);

    }

    /**
     * Permet d'afficher et de traiter le formulaire de modification de profil
     * 
     * @Route("/editProfile", name="account_editProfile")
     */
    public function editProfile(Request $request, ObjectManager $manager)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfilType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Le profil à bien été mis à jour"
            );
        }
        return $this->render('account/editProfile.html.twig',[
            'form' => $form->createView()
        ]);
    }


      /**
     * Permet d'afficher et de traiter le formulaire de modification de profil
     * 
     * @Route("/editPassword", name="account_editPassword")
     */
    public function editPassword(Request $request, ObjectManager $manager,UserPasswordEncoderInterface $encoder )
    {
        $editPassword = new EditPassword();

        $user = $this->getUser();

        $form = $this->createForm(EditPasswordType::class, $editPassword);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //Vérifier que l'ancien mot de passe est le même que le password de l'user
            if(!password_verify($editPassword->getOldPassword(), $user->getHash())){
                // Gérer l'erreur
             $form->get('oldPassword')->addError(new FormError("Le mot de passe indiqué, ne correspond pas au mot de passe actuel"));
            } else {
            
            $newPassword = $editPassword->getNewPassword();
            $hash = $encoder->encodePassword($user, $newPassword);

            $user->setHash($hash);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Le mot de passe à bien été mis à jour"
            );

            }
        }
        return $this->render('account/editPassword.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher le profil de l'utilisateur connecté'
     * 
     * @Route("/account", name="account_index")
     */
    public function myAccount(){
        return $this->render('account/myProfile.html.twig',[
            'user' => $this->getUser()
        ]);
    }


}