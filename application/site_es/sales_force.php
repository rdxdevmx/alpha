<?php



class Sales_force extends CI_Model{



    public function __construct() {



        parent::__construct();



    }

    public function get_value_formato($id,$name){

        $get = $this->db->get_where('sf_formato_campos',array('id_formato'=>$id,'name'=>$name) );

        $row = $get->row();

        if ($row = $get->row()) {
            return $row->value;
            
        } else{

            return false;
        }


    }

    public function get_value_formato_c($id,$name){

        $get = $this->db->get_where('sf_formato_campos',array('id_formato'=>$id,'name'=>$name) );

        $row = $get->row();

        if ($row = $get->row()) {
            return 'checked';
            
        } else{

            return '';
        }


    }

        public function get_value_pdf_c($id,$name){

        $get = $this->db->get_where('sf_formato_campos',array('id_formato'=>$id,'name'=>$name) );

        $row = $get->row();

        if ($row = $get->row()) {
            return 'checked';
            
        } else{

            return 'checkbox';
        }


    }


    public function get_alertas($id,$status){

		$query = $this->db->query('SELECT * FROM sf_alertas left join sf_tipo_accion on id_tipo_accion = tipo_alerta left join sf_cuentas on sf_alertas.id_cuenta = sf_cuentas.id_cuenta  where fecha_alerta <= CURDATE() AND sf_alertas.id_vendedor = '.$id.' AND status_alerta = '.$status.' order by fecha_alerta DESC');

// 'SELECT * FROM sf_alertas left join sf_tipo_alerta on id_tipo_alerta = tipo_alerta where id_vendedor = '.$id.' AND status_alerta = '.$status.' LIMIT 10'
        
        return $query;
      

    }



    public function row_alertas($id,$status){



        $query = $this->db->query('SELECT * FROM sf_alertas left join sf_tipo_accion on id_tipo_accion = tipo_alerta left join sf_cuentas on sf_alertas.id_cuenta = sf_cuentas.id_cuenta  where fecha_alerta <= CURDATE() AND sf_alertas.id_vendedor = '.$id.' AND status_alerta = '.$status.' order by fecha_alerta DESC');

// 'SELECT * FROM sf_alertas left join sf_tipo_alerta on id_tipo_alerta = tipo_alerta where id_vendedor = '.$id.' AND status_alerta = '.$status.' LIMIT 10'

        $num = $query->num_rows();

        return $num;

        

    }



    public function tipo_alerta(){

		$query = $this->db->get('sf_tipo_alerta');

        return $query;

    }



    public function get_icon($id){



        $icons = array(1=>'fa-phone',2=>'fa-list',3=>'fa-question',4=>'fa-check',5=>'fa-refresh',6=>'fa-times',7=>'fa-asterisk',8=>'fa-line-chart',11=>'fa-calendar',10=> 'fa-thumbs-down',9=>'fa-exclamation-triangle');



        return $icons[$id];

    }



    public function last_accion_icon($id){



        $get = $this->db->query('SELECT * FROM sf_accion left join sf_tipo_accion on id_tipo_accion = tipo_accion where folio_accion= '.$id.' order by id_accion DESC limit 1');



        if($get->num_rows() > 0):



            $row = $get->row();



            $icons = array(1=>'fa-phone',2=>'fa-list',3=>'fa-question',4=>'fa-check',5=>'fa-refresh',6=>'fa-times',7=>'fa-asterisk',8=>'fa-line-chart',11=>'fa-handshake-o',10=> 'fa-thumbs-down',9=>'fa-exclamation-triangle');



            return '<a href="#"class="btn btn-primary btn-xs btn-lg"><i class="fa '.$icons[$row->tipo_accion].'" aria-hidden="true"></i> '.$row->accion.'</a>';



        else:



            return '';    



        endif;



    }

    public function get_formato($id_accion){
        
        $get = $this->db->query('select * from sf_formato WHERE id_accion = '.$id_accion);

        if($get->num_rows() > 0):

            $row = $get->row();

            return $row;

        else:
            return '';    
        endif;

    }

    public function last_accion_action($id){

        $get = $this->db->query('SELECT * FROM sf_accion left join sf_tipo_accion on id_tipo_accion = tipo_accion LEFT JOIN sf_motivo ON motivo = id_motivo where folio_accion= '.$id.' order by sf_accion.id_accion DESC limit 1');

        if($get->num_rows() > 0):

            $row = $get->row();

            return $row;

        else:
            return '';    
        endif;

    }

    public function last_accion_name($id){



        $get = $this->db->query('SELECT * FROM sf_accion left join sf_tipo_accion on id_tipo_accion = tipo_accion where folio_accion= '.$id.' order by id_accion DESC limit 1');



        if($get->num_rows() > 0):



            $row = $get->row();



            $icons = array(1=>'fa-phone',2=>'fa-list',3=>'fa-question',4=>'fa-check',5=>'fa-refresh',6=>'fa-times',7=>'fa-asterisk');



            return '<span class = "accion">'.$row->accion.'</span>';



        else:



            return '';    



        endif;



    }

    public function reporte_efectividad_venta(){
        
    }

    public function reporte_acciones_general(){
        
        $query = $this->db->query('SELECT accion ,COUNT(accion) as total ,(COUNT(*) / (SELECT COUNT(*) FROM sf_folio_accion)) * 100 AS "porcentaje"  from sf_folio_accion 
                                   LEFT JOIN sf_tipo_accion ON sf_folio_accion.id_cuenta = sf_tipo_accion.id_tipo_accion GROUP BY accion');

        $i = 1;
        $array = array();

        foreach ($query->result() as $row) :
            $array[] = array('name'=>$row->accion , 'y'=>floatval($row->porcentaje));
            $i ++;
        endforeach;

        return $array;

    }

    public function reporte_cuentas_general(){

        $array_status = array(1=>'Nueva' , 2=>'Activa', 3=>'Reactivando', 4=>'Cancelada');

        $query = $this->db->query('SELECT sf_cuentas.status , COUNT(sf_cuentas.status ) as total , (COUNT(*) / (SELECT COUNT(*) FROM sf_cuentas)) * 100 AS "porcentaje" FROM sf_cuentas GROUP BY sf_cuentas.status; ');

        $i = 1;

        $array = array();

        foreach ($query->result() as $row) :
            $array[] = array('name'=>$array_status[$row->status] , 'y'=>floatval($row->porcentaje));
            $i ++;
        endforeach;

        return $array;
    }

    public function last_accion_date($id){



        $get = $this->db->query('SELECT * FROM sf_accion left join sf_tipo_accion on id_tipo_accion = tipo_accion where folio_accion= '.$id.' order by id_accion DESC limit 1');



        if($get->num_rows() > 0):



            $row = $get->row();



            $icons = array(1=>'fa-phone',2=>'fa-list',3=>'fa-question',4=>'fa-check',5=>'fa-refresh',6=>'fa-times',7=>'fa-asterisk');



            return '<span class = "fecha_accion">'.$row->fecha_accion.'</span>';



        else:



            return '';    



        endif;


    }


    public function is_cuenta($id_vendedor,$id_cuenta){

        //$get = $this->db->get_where('sf_cuentas_vendedores',array('id_cuenta'=>$id_cuenta,'id_vendedor'=>$id_vendedor));
        $get = $this->db->query('SELECT * FROM sf_cuentas_vendedores left join sf_cuentas ON sf_cuentas_vendedores.id_cuenta = sf_cuentas.id_cuenta WHERE sf_cuentas_vendedores.id_cuenta = '.$id_cuenta.' AND sf_cuentas_vendedores.id_vendedor = '.$id_vendedor.' AND status <> 4 ');

        $num = $get->num_rows();

        return $num;

    }

    public function get_vendedor($id_vendedor){

        $get = $this->db->get_where('sf_vendedores', array('id_vendedor'=>$id_vendedor) );

        $row = $get->row();

        if($id_vendedor == ''):
            return '';
        else:
            return $row->nombre_vendedor;
        endif;  

    }

    public function validate_edit($tipo_usuario,$tipo_accion){

        if($tipo_usuario == 0):
            return true;
        elseif($tipo_accion == 8 || $tipo_accion == 1):
            return true;
        else:
            return false;
        endif;

    }


    public function get_servicios($id_folio){

        $servicios  = array(1=>"Marítimo",2=>"Terrestre",3=>"Aéreo",4=>"Intermodal",5=>"Agente aduanal",6=>"Seguro",7=>"Almacenamiento",8=>"Mensajería");

        $get = $this->db->query('select * from sf_formato left join sf_accion on sf_formato.id_accion = sf_accion.id_accion where folio_accion = '.$id_folio.' ORDER BY id_formato DESC');

        $s = '';

        if($get->num_rows() > 0):

            foreach ($get->result() as $value):
                $s .= $servicios[$value->tipo_formato].'<br>';
            endforeach;

            //$row = $get->row();

            return $s;

        else:

            return '';

        endif;

    }

    public function get_servicios_ultima_accion($id_folio){

        $servicios  = array(3=>"Marítimo",1=>"Terrestre",2=>"Aéreo",7=>"Intermodal",4=>"Agente aduanal",5=>"Seguro",6=>"Almacenamiento",8=>"Mensajería");

        $query = "SELECT id_accion FROM sf_accion  where folio_accion = ".$id_folio."  order by id_accion DESC limit 1";
        $result = $this->db->query($query);
        if($result->num_rows() > 0):
            
            $id_ua = $result->row();
            $acc = $id_ua->id_accion;

            $get = $this->db->query('SELECT * FROM sf_formato LEFT JOIN sf_accion on sf_formato.id_accion = sf_accion.id_accion WHERE folio_accion = '.$id_folio.' AND sf_formato.id_accion = '.$acc.'  ORDER BY id_formato DESC');

            $s = '';

            if($get->num_rows() > 0):

                foreach ($get->result() as $value):
                    $s .= $servicios[$value->tipo_formato].'<br>';
                endforeach;

               // return $get->result();

                return $s;

            else:

                return '';

            endif;
        
        endif;


    }

    public function get_current_meta($id_vendedor){

        // agregar rango de fecha .

        $get = $this->db->query('select sf_accion.profit as meta from sf_accion LEFT JOIN sf_folio_accion ON id_folio_accion = folio_accion
                                where ultima_accion = 7 AND  sf_accion.profit <> "" AND sf_accion.id_vendedor = '.$id_vendedor);

        
        $total = 0;

        foreach ($get->result() as $value) :
            $total += $value->meta;
        endforeach;

        $total = number_format($total,2);

        return $total; 

    }

    public function get_folio($id_accion){

        $get = $this->db->get_where('sf_accion', array('id_accion'=>$id_accion));

        $row = $get->row();

        if($get->num_rows() != 0):
            return $row->folio_accion;
        else:
            return "";
        endif;  

    }


    public function get_services_format($folio_accion){

        $get = $this->db->query('SELECT * FROM sf_accion where folio_accion = '.$folio_accion.' ORDER by id_accion DESC limit 1');

        if($get->num_rows() > 0):
            $row = $get->row();

            $formatos = $this->db->query('SELECT * FROM sf_formato left join sf_tipo_servicio ON tipo_formato = id_tipo_servicio WHERE id_accion = '.$row->id_accion);

            return $formatos;

        else:

            return '';

        endif;

    }

}

