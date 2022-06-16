<?php

class Luta
{

    //Atributos
    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;

    public function marcarLuta(){

    }

    public function lutar(){

    }

     //Set
     public function setDesafiado($de)
     {
         $this->desafiado = $de;
     }

     public function setDesafiante($desa)
     {
         $this->desafiante = $desa;
     }

     public function setRounds($ro)
     {
         $this->rounds = $ro;
     }

     public function setAprovada($ap)
     {
         $this->aprovada = $ap;
     }


}