
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

setlocale(LC_MONETARY,"en_US");

class Admin extends CI_Controller {


	public function index(){
        $data['m']=$this->session->flashdata('m');
		$this->load->view('admin/login',$data);

	}

    //  ************************************************  SESION DE USUARIOS ************************************************
    
    public function login(){

        $login = $this->db->get_where('vendedores' , array('correo_vendedor'=>trim($_POST['email']), 'password'=>md5($_POST['password']) ) );
        
        if ($login->num_rows() > 0):
            $row = $login->row();

            //crer alerta de recordar contraseña

            if($row->fecha_pass =='' ||  $row->fecha_pass <= date('Y-m-d') ):
                $datos = array('fecha_alerta' => date("Y-m-d"), 'tipo_alerta' => 0, 'status_alerta' => 1, 'id_vendedor' => $row->id_vendedor);
                $insert = $this->db->insert('sf_alertas', $datos);
            endif;

            if($row->tipo_usuario == 0):

                $this->session->set_userdata('id_vendedor', $row->id_vendedor );
                $this->session->set_userdata('admin', trim($_POST['email']) );
                $this->session->set_userdata('tipo_usuario', '0' );
                $this->session->set_userdata('nombre_vendedor', $row->nombre_vendedor );

                redirect('admin/panel');  

            elseif($row->tipo_usuario == 1):
                $this->session->set_userdata('id_vendedor', $row->id_vendedor );
                $this->session->set_userdata('admin', trim($_POST['email']) );
                $this->session->set_userdata('tipo_usuario', '1' );
                $this->session->set_userdata('nombre_vendedor', $row->nombre_vendedor );
                redirect('admin/usuario');

            endif;

        else:

            $this->session->set_flashdata('m', '<div class="alert alert-danger">El usuario y/o contraseña son incorrectos.</div>');

            redirect($_SERVER['HTTP_REFERER']);         

        endif;        

    }

    public function logout(){

        $this->session->sess_destroy();
        redirect('admin');

    }

    public function change_password(){

        $admin = $this->session->userdata('admin');
                  $this->db->where('user', $admin);
        $update = $this->db->update('usuarios',array('pass'=>md5($_POST['password1']) )); 
        if($update):
            $this->session->set_flashdata('m', '<div class="alert alert-success">Se cambio correctamente la contraseña.</div>');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            echo $this->db->_error_message();        
        endif;

    }

    public function change_password_vend(){
        
        $fecha_actual = date("Y-m-d");
        $fecha_pass = date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 

                  $this->db->where('id_vendedor',$_POST['id_vendedor']);
        $update = $this->db->update('sf_vendedores',array('password'=>md5($_POST['password']),'fecha_pass'=>$fecha_pass)); 

        //           $this->db->where('id_cuenta_vend', $id);
        // $delete = $this->db->delete('sf_alertas'); 
        

        if($update):
            $this->session->set_flashdata('m_pass', '<div class="alert alert-success">Se cambio correctamente la contraseña.</div>');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            echo $this->db->_error_message();        
        endif;

    }


    public function panel(){

        $data['m']=$this->session->flashdata('m');
        $this->load->view('admin/header');
        $this->load->view('admin/home',$data);
        $this->load->view('admin/footer');

    }

    /*reportes generales */


    public function reportes1(){

        $data['m']=$this->session->flashdata('m');

        $this->load->view('admin/header');
        $this->load->view('admin/reportes',$data);
        $this->load->view('admin/footer');
    }

    public function reporte_efectividad_venta(){

        $data['m']=$this->session->flashdata('m');
        $this->load->view('admin/header');
        $this->load->view('admin/reporte_efectividad_venta',$data);
        $this->load->view('admin/footer');

    }

    public function reporte_ultima_accion(){

        $query ='SELECT *  from sf_folio_accion LEFT JOIN sf_tipo_accion ON sf_folio_accion.id_cuenta = sf_tipo_accion.id_tipo_accion LEFT JOIN sf_cuentas ON sf_folio_accion.id_cuenta = sf_cuentas.id_cuenta';  
        /*codigo para paginacion*/               
        $config = array();
        $config["base_url"] = base_url("admin/reporte_ultima_accion");
        /**codigo para paginado con variables GET*/
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        /**codigo para paginado con variables GET*/
        $config["total_rows"] = $this->Page_query->record_count($query);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['prev_link'] = 'Anterior';
        $config['prev_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Siguiente';
        $config['next_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button " aria-controls="dataTables-example" tabindex="0">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Page_query->fetch_results($config["per_page"], $page,$query);
        $data["links"] = $this->pagination->create_links();
        $data['m'] = $this->session->flashdata('m');

        $this->load->view('admin/header');
        $this->load->view('admin/reporte_ultima_accion',$data);
        $this->load->view('admin/footer');

    }

    public function reporte_cuentas_general(){

        $query ='SELECT * FROM sf_cuentas';  
        /*codigo para paginacion*/               
        $config = array();
        $config["base_url"] = base_url("admin/reporte_ultima_accion");
        /**codigo para paginado con variables GET*/
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        /**codigo para paginado con variables GET*/
        $config["total_rows"] = $this->Page_query->record_count($query);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['prev_link'] = 'Anterior';
        $config['prev_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Siguiente';
        $config['next_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button " aria-controls="dataTables-example" tabindex="0">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Page_query->fetch_results($config["per_page"], $page,$query);
        $data["links"] = $this->pagination->create_links();
        $data['m'] = $this->session->flashdata('m');
        $data['array_status'] = array(1=>'Nueva' , 2=>'Activa', 3=>'Reactivando', 4=>'Cancelada');

        $this->load->view('admin/header');
        $this->load->view('admin/reporte_cuentas_general',$data);
        $this->load->view('admin/footer');

    }

    /**Sales force*/

    public function vendedores(){

        $query ='SELECT * FROM sf_vendedores where tipo_usuario > 0';  
        /*codigo para paginacion*/               
        $config = array();
        $config["base_url"] = base_url("admin/vendedores");
        /**codigo para paginado con variables GET*/
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        /**codigo para paginado con variables GET*/
        $config["total_rows"] = $this->Page_query->record_count($query);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['prev_link'] = 'Anterior';
        $config['prev_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Siguiente';
        $config['next_tag_open'] = '<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button " aria-controls="dataTables-example" tabindex="0">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Page_query->fetch_results($config["per_page"], $page,$query);
        $data["links"] = $this->pagination->create_links();
        $data['m'] = $this->session->flashdata('m');
        $data['servicios'] = $this->db->get('sf_tipo_servicio');    

        $fecha_actual = date("Y-m-d");
        $data['fecha_pass'] = date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 


        $this->load->view('admin/header');
        $this->load->view('admin/vendedores',$data);
        $this->load->view('admin/footer');
    }

    public function editar_vendedor(){

        $id = $this->uri->segment(3);
        $data['id_vendedor'] = $id;
        $vendedor = $this->db->get_where('sf_vendedores',array('id_vendedor'=>$id) );
        $row = $vendedor->row();
        $data['vendedor'] = $row;
        $data['m'] = $this->session->flashdata('m');
        $data['servicios'] = $this->db->get('sf_tipo_servicio');  
        //array('id_vendedor'=>$id)
        $data['cuentas'] = $this->db->query('select * from sf_cuentas_vendedores LEFT JOIN sf_cuentas ON sf_cuentas_vendedores.id_cuenta = sf_cuentas.id_cuenta WHERE sf_cuentas_vendedores.id_vendedor='.$id);

        $array = array();

        $comision = $this->db->get_where('sf_comision',array('id_vendedor'=>$id));
        foreach ($comision->result() as $c):
            $array[$c->id_servicio] = $c->comision;     
        endforeach;

        //print_r($array);

        $data['comision'] = $array;        

        $this->load->view('admin/header');
        $this->load->view('admin/editar_vendedor',$data);
        $this->load->view('admin/footer');

    }

    public function eliminar_cuenta(){
        
        $id = $this->uri->segment(3);

        $this->db->where('id_cuenta_vend', $id);
        $delete = $this->db->delete('sf_cuentas_vendedores'); 
        
        if($delete):
            $this->session->set_flashdata('m', '<div class="alert alert-success">Se quitó la cuenta al vendedor.</div>');  
            redirect($_SERVER['HTTP_REFERER']);
        else:
            echo $this->db->_error_message();    
        endif; 

    }

    public function update_vendedor(){

        if($_POST['v']['password']!=''):
             $_POST['v']['password'] = md5($_POST['v']['password']);
        else:
            unset($_POST['v']['password']);
        endif; 

        $id = $_POST['v']['id_vendedor'];

                  $this->db->where('id_vendedor', $_POST['v']['id_vendedor']);
        $delete = $this->db->delete('sf_comision'); 

        foreach ($_POST['comision'] as $key => $value) :
            if($value > 0):
                $this->db->insert('sf_comision',array('id_vendedor'=>$_POST['v']['id_vendedor'],'id_servicio'=>$key,'comision'=>$value));
            endif;
        endforeach;

        //           $this->db->where('id_vendedor', $_POST['v']['id_vendedor']);
        // $delete = $this->db->delete('sf_cuentas_vendedores'); 

        foreach ($_POST['cuenta'] as $key => $value) :
            if($value > 0):
                $this->db->insert('sf_cuentas_vendedores',array('id_vendedor'=>$_POST['v']['id_vendedor'],'id_cuenta'=>$key));
            endif;
        endforeach;

        $_POST['v']['meta_ventas'] = floatval(str_replace(",","",$_POST['v']['meta_ventas']));
      
                  $this->db->where('id_vendedor', $_POST['v']['id_vendedor']);
        $update = $this->db->update('sf_vendedores',$_POST['v']);     

        if($update):
            $this->session->set_flashdata('m', '<div class="alert alert-success">Se actualizó correctamente el vendedor.</div>');  
            redirect($_SERVER['HTTP_REFERER']);
        else:
            echo $this->db->_error_message();
        endif;

    }

    public function borrar_vendedor(){
        
        $id = $this->uri->segment(3);
        
        $this->db->where('id_vendedor', $id);
        $delete = $this->db->delete('sf_vendedores'); 
        
        if($delete):
            $this->session->set_flashdata('m', '<div class="alert alert-success">Se eliminó correctamente el vendedor.</div>');  
            redirect($_SERVER['HTTP_REFERER']);
        else:
            echo $this->db->_error_message();    
        