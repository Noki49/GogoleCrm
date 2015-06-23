<?php

namespace Gogole\TodoBundle\Controller;
/* import des classe symfony */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/* les formulaire */
use Gogole\TodoBundle\Form\FormModifieTacheType;
use Gogole\TodoBundle\Form\FormCreeTacheType;
/* les entité */
use Gogole\TodoBundle\Entity\Tache;

use Gogole\UserBundle\Entity\User;


class TodoController extends Controller
{


/***************************************************** affiche toutes les taches ***********************************************************************/

	
	// fonction qui permet d afficher toutes les taches

    public function listeTacheAction() // fonction qui envoi vers la page ou il y a toute les listes
    {

        $tacheActuelle = array(); 

        $tacheTerminer = array(); 
        $cpt = 0;

    	$em = $this->getDoctrine()->getManager(); // on donne a la variable $em les droit pour gerer la base de donnees
    	$uneTache = $em->getRepository("GogoleTodoBundle:Tache"); // $em pointe sur la table tache



 // cette ligne permet de recuperer le numero de l utilisateur connecter
            $user = $this->container->get('security.context')->getToken()->getUser();

        if ($user != "anon."){

            dump($user->getId());

        	$mesTaches = $uneTache->findBy(
            
                array('utilisateur'=> $user->getId())


            ); // findAll permet de recuperer toutes les colonne de la table
            
                foreach ($mesTaches as $key => $value) 
                {
                   if ($value->getEtat()==false)
                   {
                        $tacheActuelle[$cpt] = $value;
                   }
                   else if ($value->getEtat()== true)
                   {
                        $tacheTerminer[$cpt] = $value;
                   }
                   $cpt++;
                }
             
                
            return $this->render('GogoleTodoBundle:Todo:ListeTache.html.twig', array(

                'mes_taches'=> $mesTaches,
                'tache_actuelle' => $tacheActuelle,
                'tache_terminer' => $tacheTerminer
            ));
        } 
        else {return $this->redirect($this->generateUrl('fos_user_registration_register'));}

    }


/************************************************** creation d 'une tache *******************************************************************/

    // fonction qui permet de cree une tache 

    public function creeTacheAction(Request $request)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();// cette ligne permet de recuperer le numero de l utilisateur connecter


    	$em = $this->getDoctrine()->getManager(); // on donne a la variable $em les droit pour gerer la base de donnees
    	$tache =new Tache($user); // creation d un objet tache vide qui va beintot recevoir le retour du formulaire

    	// creation du formulaire

    	$formulaire = $this->get("form.factory")->create(new formCreeTacheType(),$tache);
    	$formulaire->handleRequest($request); // attribut les informations du formulaire à l'objet tache

    		// si le formulaire est rempli correctement il passe dans la condition
	    	if ($formulaire->isValid())
	    	{		
	    		$em->persist($tache);
	    		$em->flush();	//envoi des information a la base de donnees
	    		return $this->redirect($this->generateUrl('gogole_todo_homepage'));
	    	}

	    	// si le formulaire n'est pas encore valider il affiche la page de creation du tache en lui passant les parametres formumlaire et tache
	    return $this->render('GogoleTodoBundle:Todo:CreationTache.html.twig',array(
	    	'tache' => $tache,
	    	'formulaire' => $formulaire->createView()
	    	));
    	
    }

/******************************************** modifier une tache *******************************************************************************/
	
	public function modifierTacheAction( $id , Request $request)
	{

		$em = $this->getDoctrine()->getManager(); // on donne a la variable $em les droit pour gerer la base de donnees
		$uneTache = $em->getRepository("GogoleTodoBundle:Tache"); // $em pointe sur la table tache

		$maTache = $uneTache->find($id); // find(Id) permet de recuperer une tache en fontion de id
		
		// creation du formulaire modifier tache en fonction de l'id retourner et contenue dans $maTache

		$formulaire2 = $this->get("form.factory")->create(new FormModifieTacheType(),$maTache);
    	$formulaire2->handleRequest($request); // attribut les informations du formulaire à l'objet tache

    		// controle la variable a fin de savoir si elle pointe bien vers une tache de la base de donnée.
    		if($maTache == null)
    		{
                throw $this->createNotFoundException("il n'y a pas de tache ".$id); 
            }

            // si le formulaire est rempli on rentre dans la condition suivante
            if($formulaire2->isValid())
            {
                if ($maTache->getEtat()==true)
                {
                    $maTache->setDateFait(new \dateTime);
                }
                else if ($maTache->getEtat()==false) 
                {
                    $maTache->setDateFait(NULL);
                }
            	$em->flush();//validation a la base de donnees
                return $this->redirect($this->generateUrl('gogole_todo_homepage'));//retour a la page liste des taches
            }


            // si le formulaire n'est pas encore valider il affiche la page de modification de la tache en lui passant les parametres formumlaire et $maTache
        return $this->render('GogoleTodoBundle:Todo:ModifierTache.html.twig',array(
        	'formulaire'=> $formulaire2->createView()
        	));
	}

/******************************************** supprimer une Tache *****************************************************************************/

    public function supprimeTacheAction($id)
     {
        $em = $this->getDoctrine()->getManager(); // on donne a la variable $em les droit pour gerer la base de donnees
        $uneTache = $em->getRepository("GogoleTodoBundle:Tache"); // $em pointe sur la table tache

        $maTache = $uneTache->find($id); // find(Id) permet de recuperer une tache en fontion de id

        // la variable maTache contient les valeur de la tache selectionner dans la base de donnee.
        $em->remove($maTache); //suppression de la base de donnée les informations contenues dans la variable maTache
        $em->flush();

        return $this->redirect($this->generateUrl('gogole_todo_homepage'));

    }

    

}

