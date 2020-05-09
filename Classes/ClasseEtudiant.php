<?php


class ClasseEtudiant{
   /* public $etudiant_id;
    public $et_nom;
    public $et_prenom; */
    public $et_email;
    public $et_mdp;
   /* public $et_annee;
    public $et_naissance;
    public $et_tele; */
   
    function __construct() {
        
    }
    
    public static function construct3(array $row){
        $instance = new self();
      /*  $instance->etudiant_id = $row['etudiant_id'];
        $instance->et_nom = $row['et_nom'];
        $instance->et_prenom = $row['et_prenom']; */
        $instance->et_email = $row['et_email'];
        $instance->et_mdp = $row['et_mdp'];
     /*   $instance->et_annee = $row['et_annee'];
        $instance->et_naissance = $row['et_naissance'];
        $instance->et_tele = $row['et_tele']; */


        return $instance;
    }
     //public static function construct2($etudiant_id, $et_nom, $et_prenom, $et_email, $et_mdp, $et_annee, $et_naissance,$et_tele){

    public static function construct2($et_email, $et_mdp){
        $instance = new self();
     /*   $instance->etudiant_id = $etudiant_id;
        $instance->et_nom = $et_nom;
        $instance->et_prenom = $et_prenom; */
        $instance->et_email = $et_email;
        $instance->et_mdp = $et_mdp;
     /*   $instance->et_annee = $et_annee;
        $instance->et_naissance = $et_naissance; 
        $instance->et_tele = $et_tele;  */
        return $instance;
    }
    
}

