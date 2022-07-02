<?php
 require_once("clsdatos.php");// incluimos la clase de datos (Modelo)
   class clspropietario
    {
        private $cod_prop;
        private $id_prop;
        private $nom_prop;
        private $can_prop;
        private $nac_prop;
        private $ci_prop;
        private $rif_prop;
        private $loc_prop;
        private $cor_prop;
        private $est_prop;
        private $mun_prop;
        private $par_prop;
        private $dir_prop;
        private $ofi_prop;
        private $tip_prop;
        private $rep_prop;
        private $hab_prop;
        private $for_prop;
        private $por_rete;
        private $ret_prop;
        private $cel_prop;


       public $obj;


       function clspropietario()
       {
        $this->obj= new clsdato();// instanciando la clase datos
       }// fin de blog

       function incluir()
       {
          $this->obj->abrir();
          $sql="INSERT INTO `propietario` (`cod_prop`, `id_prop`, `nom_prop`, `can_prop`, `nac_prop`, `ci_prop`, `rif_prop`, `loc_prop`, `cel_prop`, `cor_prop`, `est_prop`, `mun_prop`, `par_prop`, `dir_prop`, `ofi_prop`, `tip_prop`, `rep_prop`) VALUES ('".$this->cod_prop."','".$this->id_prop."','".$this->nom_prop."','".$this->can_prop."','".$this->nac_prop."','".$this->ci_prop."','".$this->rif_prop."','".$this->loc_prop."','".$this->cel_prop."','".$this->cor_prop."','".$this->est_prop."','".$this->mun_prop."','".$this->par_prop."','".$this->dir_prop."','".$this->ofi_prop."','".$this->tip_prop."','".$this->rep_prop."')";
        
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function modificar()
       {
          $this->obj->abrir();
          $sql='update propietario set id_prop="'.$this->id_prop.'", 
          nom_prop="'.$this->nom_prop.'", can_prop="'.$this->can_prop.'" where cod_prop="'.$this->cod_prop.'"';
          
         $sql='UPDATE propietario SET cod_prop = "'.$this->cod_prop.'", nom_prop = "'.$this->nom_prop.'", ape_prop = "'.$this->ape_prop.'", nac_prop = "'.$this->nac_prop.'", ci_prop = "'.$this->ci_prop.'", rif_prop = "'.$this->rif_prop.'", loc_prop = "'.$this->loc_prop.'", cel_prop = "'.$this->cel_prop.'", cor_prop = "'.$this->cor_prop.'", mun_prop = "'.$this->mun_prop.'", par_prop = "'.$this->par_prop.'", dir_prop = "'.$this->dir_prop.'", ofi_prop = "'.$this->ofi_prop.'", tip_prop = "'.$this->tip_prop.'", rep_prop = "'.$this->rep_prop.'" where id_prop="'.$this->id_prop.'"';

           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function activar()
       {
          $this->obj->abrir();
          $sql='update propietario set act_prop=1 where id_prop="'.$this->id_prop.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function desactivar()
       {
          $this->obj->abrir();
          $sql='update propietario set act_prop=0 where id_prop="'.$this->id_prop.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function eliminar()
       {
            $this->obj->abrir();
        $sql='delete from propietario where id_prop="'.$this->id_prop.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

     function buscar()
       {
        //echo "uno";
          $this->obj->abrir();
          $sql='select * from propietario where id_prop="'.$this->id_prop.'"';
         // echo $sql;
          $tb=$this->obj->select($sql);
          $exito=0;
          if ($fila=$this->obj->siguiente($tb))
          {
            $this->cod_prop=$fila['cod_prop'];
            $this->id_prop=utf8_encode($fila['id_prop']);
            $this->nom_prop=utf8_encode($fila['nom_prop']);
            $this->can_prop=$fila['can_prop'];
            $this->act_prop=$fila['act_prop'];            
            $exito=1;
          }
           $this->obj->cerrar();
          // echo "<br>exito".$exito;
          return $exito;
       } //  fin del buscar
//////////////////  consultar  ///////////////////////////

      function consultar()
       {  
           $this->obj->abrir();
          $sql="select *  from propietario   ORDER BY cod_prop desc"; //act_prop!=0
     // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
          $archivo=$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar



      function consultar_e($condicion='1=1')
       {  
          $this->obj->abrir();
          $sql="select *  from propietario where $condicion and act_prop!=0  ORDER BY fec_inic desc"; //act_prop!=0
     // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
          $archivo=$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar



      function consultar_n($condicion='1=1', $n)
       {  
           $this->obj->abrir();
         $sql="select *
                from propietario 
                where $condicion  and  act_prop!=0 
                ORDER BY cod_prop desc LIMIT $n;";
               // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
         $archivo==$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar


       function set($vobj,$var)
       {
          $this->$vobj=$var;
       }// fin del set


      function get($vobj)
       {
        //echo "a:".$vobj;
        //echo "b:".$this->$vobj;
          return $this->$vobj;
       } // fin del get 

    
      function consultar_todo()
       {  
           $this->obj->abrir();
          $sql="SELECT * FROM propietario c left join inmuebles i on i.id_inmu=c.nom_prop LEFT JOIN propietario p on i.id_prop = p.id_prop LEFT JOIN inquilino iq on iq.id_inqu=c.id_prop left join tipo_inmueble ti on ti.id_tipo=i.tip_inmu where cod_prop='".$this->cod_prop."' ORDER BY cod_prop desc"; //act_prop!=0
          echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
          $archivo=$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar

 
    } // fin de la clase
?>