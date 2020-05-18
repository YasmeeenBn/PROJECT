<?php


class Classe_company{

    public $et_email;
    public $et_mdp;
     
    public static  function construct3($et_email,$et_mdp){
        $company = new self();
        // $admin->ad_id=$ad_id;
        // $admin->ad_nom=$ad_nom;
        // $admin->ad_prenom=$ad_prenom;
        $company->et_email=$et_email;
        $company->et_mdp=$et_mdp;
        return $company;
    }

    
}

