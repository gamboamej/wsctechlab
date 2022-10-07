<?php
class MoUsuarios extends CI_Model {

        public function filas()
        {
          $consulta = $this->db->get('i003t_usuarios');
          return  $consulta->num_rows();
        }

        public function listar()
        {
          $this->db->select('a.*');
          $this->db->from('i003t_usuarios as a');
          //$this->db->join('i003t_usuarios as b', 'a.co_user_add=b.co_user');
          //$this->db->join('i004t_roles as c', 'a.co_user_rol=c.co_rol');
          //$this->db->join('i005t_titles as d', 'a.co_user_title=d.co_title');
          $this->db->order_by("a.fe_add", "desc");
          $consulta = $this->db->get();
            if ($consulta)
            {
              return $consulta->result();
            }
            else
            {
              return false;
            }
        }

        public function list_user_active()
        {
          $this->db->select('a.tx_first_name,
                            a.tx_last_name,
                            a.co_user');
          $this->db->from('i003t_usuarios as a');
          $this->db->where('in_status','1');
          $this->db->order_by("a.tx_first_name", "desc");
          $consulta = $this->db->get();
            if ($consulta)
            {
              return $consulta->result();
            }
            else
            {
              return false;
            }
        }

        public function add()
        {
            $data = array(
              'tx_nombre'	     =>ucwords(strtolower($this->input->post('tx_nombre'))),
              'tx_apellido'	     =>ucwords(strtolower($this->input->post('tx_apellido'))),
              'tx_usuario'		 =>strtolower($this->input->post('tx_usuario')),
              'tx_telefono'		 =>strtolower($this->input->post('tx_telefono')),
              'tx_clave'		 =>md5(strtolower($this->input->post('tx_telefono'))),
              'in_tipo'		     =>$this->input->post('in_tipo'),
              'co_usuario_add' =>$this->session->userdata('co_usuario'),
              'co_usuario_upd' =>$this->session->userdata('co_usuario'));
            $consulta=$this->db->insert('i003t_usuarios', $data);
            if ($consulta==true) {
                return true;
            } else {
                return false;
            }
        }

        public function edit()
        {
          $data = array(
            'tx_nombre'	     =>ucwords(strtolower($this->input->post('tx_nombre'))),
            'tx_apellido'	   =>ucwords(strtolower($this->input->post('tx_apellido'))),
            'tx_usuario'		 =>strtolower($this->input->post('tx_usuario')),
            'tx_telefono'		 =>strtolower($this->input->post('tx_telefono')),
            //'in_tipo'		     =>ucwords(strtolower($this->input->post('in_tipo'))),
            'co_usuario_add' =>$this->session->userdata('co_usuario'),
            'co_usuario_upd' =>$this->session->userdata('co_usuario'));
            $this->db->where('co_usuario',$this->input->post('co_usuario'));
            $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function repassword($id)
        {
            $data=array(
              'tx_clave' =>md5("GCLVE#2021"),
              'co_user_upd'	=>$this->session->userdata('co_usuario'));
              $this->db->where('co_usuario', $id);
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function findbyid()
        {
          $this->db->where('co_usuario',$this->input->post('co_usuario'));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyidusername()
        {
          $this->db->where('co_usuario',$this->input->post('co_usuario'));
          $this->db->where('nu_rut',strtolower($this->input->post('tx_usuario')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findemail()
        {
          $this->db->where('tx_email',strtolower($this->input->post('tx_email')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyusername()
        {
          $this->db->where('tx_usuario',strtolower($this->input->post('tx_usuario')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
        /*
        Funcion:validausuario.
        Descripcion:Consulta si el usuario y clave son correctos.
        Desarrollador: Elvis Gamboa.
        */
        public function validausuario($tx_usuario,$tx_clave)
        {
          $this->db->select('tx_password,
                             nu_rut,
                             co_usuario');
          $this->db->from('i003t_usuarios');
          $this->db->where('tx_password', $tx_clave);
          $this->db->where('nu_rut', $tx_usuario);
          $consulta = $this->db->get();
          if ($consulta->num_rows() > 0){return $consulta->row();}
            else{return false;}
        }

        /*
        Funcion:valida_usuario.
        Descripcion:Consulta si el usuario y clave son correctos.
        Desarrollador: Elvis Gamboa.
        */

        public function indicadorusuario($tx_usuario)
        {
          $this->db->select('nu_rut');
          $this->db->from('i003t_usuarios as a');
          $this->db->where('nu_rut', $tx_usuario);
          $consulta = $this->db->get();
          if ($consulta->num_rows() > 0){return true;}
            else  {return false;}
        }

        /*
        Funcion:usuarioactivo.
        Descripcion:Consulta si el usuario tiene estatus activo.
        Desarrollador: Elvis Gamboa.
        */

        public function usuarioactivo($tx_usuario,$tx_clave)
        {
          $this->db->select('tx_password,
                             nu_rut');
          $this->db->from('i003t_usuarios');
          $this->db->where('tx_password', $tx_clave);
          $this->db->where('nu_rut', $tx_usuario);
          $this->db->where('in_status','1');
          $consulta = $this->db->get();
          if ($consulta->num_rows() > 0){
            return true;
            }
            else
            {
            return false;
            }
        }

        public function usuarioeliminado($tx_usuario,$tx_clave)
        {
          $this->db->select('tx_clave,
                             tx_usuario');
          $this->db->from('i003t_usuarios');
          $this->db->where('tx_clave', $tx_clave);
          $this->db->where('tx_usuario', $tx_usuario);
          $this->db->where('in_status','2');
          $consulta = $this->db->get();
          if ($consulta->num_rows() > 0){
            return true;
            }
            else
            {
            return false;
            }
        }

        public function active($id)
        {
            $data=array(
              'in_status'			  =>'1',
              'co_usuario_upd'	=>$this->session->userdata('co_usuario'));
               $this->db->where('co_usuario', $id);
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function inactive($id)
        {
            $data=array(
              'in_status'			  =>'0',
              'co_usuario_upd'	=>$this->session->userdata('co_usuario'));
                $this->db->where('co_usuario', $id);
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function restore($id)
        {
            $data=array(
              'in_status'			  =>'1',
              'co_usuario_upd'	=>$this->session->userdata('co_usuario'));
                $this->db->where('co_usuario', $id);
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function deltemporarily($id)
        {
            $data=array(
              'in_status'			  =>'2',
              'co_usuario_upd'	    =>$this->session->userdata('co_usuario'));
                $this->db->where('co_usuario', $id);
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function del($id)
        {
            $this->db->where('co_usuario', $id);
            $query=$this->db->delete('i003t_usuarios');
            if ($query) {
                return true;
            } else {
                return false;
            }
        }

        public function changepassword($id,$tx_clave_nueva)
        {
            $data=array('tx_clave'	=>$tx_clave_nueva);
            if ($id==null) {
                return false;
            } else {
                $this->db->where('co_usuario', $id);
                return $this->db->update('i003t_usuarios', $data);
            }
        }

        }
