<?php
class MoPersonas extends CI_Model {

        public function filas()
        {
          $consulta = $this->db->get('i003t_usuarios');
          return  $consulta->num_rows();
        }

        public function listar()
        {
          $this->db->select('a.nu_rut,
                            a.tx_nombre,
                            a.tx_apellido,
                            a.tx_correo,
                            a.co_usuario,
                            a.in_status,
                            a.url_avatar,
                            a.fe_add,
                            a.fe_upd,
                            a.co_usuario_rol,
                            c.nb_rol');
          $this->db->from('i003t_usuarios as a');
          $this->db->join('i003t_usuarios as b', 'a.co_usuario_add=b.co_usuario');
          $this->db->join('i004t_roles as c', 'a.co_usuario_rol=c.co_rol');
          $this->db->order_by("b.fe_add", "desc");
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
          $this->db->select('a.tx_nombre,
                            a.tx_apellido,
                            a.co_usuario');
          $this->db->from('i003t_usuarios as a');
          $this->db->where('a.in_status','1');
          $this->db->order_by("a.tx_nombre", "desc");
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

        public function add($nb_foto)
        {
            $data = array(
              'nu_rut'	        =>trim($this->input->post('nu_rut')),
              'tx_nombre'	      =>ucwords(strtolower($this->input->post('tx_nombre'))),
              'tx_apellido'	    =>ucwords(strtolower($this->input->post('tx_apellido'))),
              'tx_correo'		    =>trim(strtolower($this->input->post('tx_correo'))),
              'tx_password'		  =>md5("techlab2022"),
              'co_usuario_rol'  =>$this->input->post('co_usuario_rol'),
              'in_status'			  =>$this->input->post('in_status'),
              'url_avatar'		  =>$nb_foto,
              'co_usuario_add'	=>$this->session->userdata('co_usuario'),
              'co_usuario_upd'  =>$this->session->userdata('co_usuario'));
            $consulta=$this->db->insert('i003t_usuarios', $data);
            if ($consulta==true) {
                return true;
            } else {
                return false;
            }
        }

        public function edit($nb_foto)
        {

          if ($nb_foto==null) {
            $data=array(
              'nu_rut'	        =>$this->input->post('nu_rut'),
              'tx_nombre'	      =>ucwords(strtolower($this->input->post('tx_nombre'))),
              'tx_apellido'	    =>ucwords(strtolower($this->input->post('tx_apellido'))),
              'tx_correo'		    =>strtolower($this->input->post('tx_correo')),
              'co_usuario_rol'	=>$this->input->post('co_usuario_rol'),
              'in_status'			  =>$this->input->post('in_status'),
              'co_usuario_upd'  =>$this->session->userdata('co_usuario'));
          }
          else {
            $data=array(
              'nu_rut'	        =>$this->input->post('nu_rut'),
              'tx_nombre'	      =>ucwords(strtolower($this->input->post('tx_nombre'))),
              'tx_apellido'	    =>ucwords(strtolower($this->input->post('tx_apellido'))),
              'tx_correo'		    =>strtolower($this->input->post('tx_correo')),
              'co_usuario_rol'	=>$this->input->post('co_usuario_rol'),
              'in_status'			  =>$this->input->post('in_status'),
              'url_avatar'		  =>$nb_foto,
              'co_usuario_upd'  =>$this->session->userdata('co_usuario'));
            }
                $this->db->where('co_usuario',$this->input->post('id'));
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        public function repassword()
        {
            $data=array(
              'tx_password' =>md5("techlab2022"),
              'co_usuario_upd'	=>$this->session->userdata('co_usuario'));
              $this->db->where('co_usuario', $this->input->post('id'));
                $consulta=$this->db->update('i003t_usuarios', $data);
                if ($consulta)
                { return true;}
                else
                { return false;}
        }

        /*
        nombre: findbyid
        funcion: contar cantidad de registros que contenga un id en especifico.
        creador: Elvis Gamboa - gamboamej
        */
        public function findbyid()
        {
          $this->db->where('co_usuario',$this->input->post('id'));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() <> 0) {
                return true;
            } else {
                return false;
            }
        }


        /*
        nombre: findid
        funcion: contar cantidad de registros que contenga un id en especifico con parametro.
        creador: Elvis Gamboa - gamboamej
        */
        public function findid($id)
        {
          $this->db->where('co_usuario',$id);
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() <> 1) {
                return true;
            } else {
                return false;
            }
        }

        /*
        nombre: findnu_rut
        funcion: contar cantidad de registros que contenga un rut en especifico.
        creador: Elvis Gamboa - gamboamej
        */
        public function findnu_rut()
        {
          $this->db->where('nu_rut',trim(strtolower($this->input->post('nu_rut'))));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /*
        nombre: findtx_correo
        funcion: contar cantidad de registros que contenga un correo en especifico.
        creador: Elvis Gamboa - gamboamej
        */
        public function findtx_correo()
        {
          $this->db->where('tx_correo',strtolower($this->input->post('tx_correo')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() <> 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyidnonu_rut()
        {
          $this->db->where('co_usuario !=',$this->input->post('id'));
          $this->db->where('nu_rut',strtolower($this->input->post('nu_rut')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() <> 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyidnotx_correo()
        {
          $this->db->where('co_usuario !=',$this->input->post('id'));
          $this->db->where('tx_correo',strtolower($this->input->post('tx_correo')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() <> 0) {
                return true;
            } else {
                return false;
            }
        }



        public function findemail()
        {
          $this->db->where('tx_correo',strtolower($this->input->post('tx_correo')));
          $query = $this->db->get('i003t_usuarios');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyemail()
        {
          $this->db->where('co_usuario',$this->input->post('tx_correo'));
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

        /*
        Funcion:findCoUsuariobynu_rut.
        Descripcion:Extrae el co_usuario de usuario por nu_rut y si tiene estatus activo.
        Desarrollador: Elvis Gamboa.
        */

        public function findCoUsuariobynu_rut()
        {
          $this->db->select('co_usuario');
                   $this->db->from('i003t_usuarios');
                   $this->db->where('nu_rut',trim(ucwords(strtolower($this->input->post('nu_rut')))));
                   $this->db->where('in_status','1');
                   $consulta = $this->db->get();
            if($consulta->num_rows() == 1)
            {
            return $consulta->row();
            }
            else
            {
            return false;
            }
        }

        public function usuarioeliminado($tx_usuario,$tx_clave)
        {
          $this->db->select('tx_password,nu_rut');
          $this->db->from('i003t_usuarios');
          $this->db->where('tx_password', $tx_clave);
          $this->db->where('nu_rut', $tx_usuario);
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
              'co_usuario_upd'	    =>$this->session->userdata('co_usuario'));
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
              'co_usuario_upd'	    =>$this->session->userdata('co_usuario'));
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
            $data=array('tx_password'	=>$tx_clave_nueva);
            if ($id==null) {
                return false;
            } else {
                $this->db->where('co_usuario', $id);
                return $this->db->update('i003t_usuarios', $data);
            }
        }

        }
