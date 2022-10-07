<?php
class Modocumentos extends CI_Model {

        public function filas()
        {
          $consulta = $this->db->get('i003t_usuarios');
          return  $consulta->num_rows();
        }

        public function listar()
        {
          $this->db->select('a.*');
          $this->db->from('i001t_documentos as a');
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

        public function misdocumentos()
        {
          $this->db->select('a.co_usuario,a.co_documento,c.*');
          $this->db->from('c001t_documento_usuario as a');
          $this->db->join('i003t_usuarios as b', 'a.co_usuario =b.co_usuario');
          $this->db->join('i001t_documentos as c', 'a.co_documento=c.co_documento');
          $this->db->where('b.co_usuario',$this->session->userdata('co_usuario'));
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

        public function lst_permisos_documentos()
        {
          $this->db->select('a.co_documento_usuario,
                             a.co_usuario,
                             a.co_documento,
                             d.*,
                             b.tx_nombre as tx_nombre_usuario_permiso_documento,
                             b.tx_apellido as tx_apellido_usuario_permiso_documento,
                             c.tx_nombre as tx_nombre_crea_permiso_documento,
                             c.tx_apellido as tx_apellido_crea_permiso_documento,
                             a.fe_add as fe_permiso_documento
                             ');
          $this->db->from('c001t_documento_usuario as a');
          $this->db->join('i003t_usuarios as b', 'a.co_usuario=b.co_usuario');
          $this->db->join('i003t_usuarios as c', 'a.co_usuario_add=c.co_usuario');
          $this->db->join('i001t_documentos as d', 'a.co_documento=d.co_documento');
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

        public function add($nb_archivo)
        {
            $data = array(
              'nb_documento'			                =>$this->input->post('tx_nombre_documento'),
              'tx_descripcion'			              =>$this->input->post('tx_nombre_documento'),
              'in_estado'			                    =>'1',
              'co_unidad'			                    =>'1',
              'co_usuario_add'			              =>'1',
              'co_usuario_upd'			              =>'1',
              'tx_url'			                      =>$nb_archivo);
            $query=$this->db->insert('i001t_documentos', $data);
            if ($query==true) {
                return true;
            } else {
                return false;
            }
        }

        public function add_permiso_documento()
        {
            $data = array(
              'co_documento'			                =>$this->input->post('co_documento'),
              'co_usuario'			                  =>$this->session->userdata('co_usuario_permiso_documento'),
              'co_usuario_add'			              =>$this->session->userdata('co_usuario'),
              'co_usuario_upd'			              =>$this->session->userdata('co_usuario'));
            $query=$this->db->insert('c001t_documento_usuario', $data);
            if ($query==true) {
                return true;
            } else {
                return false;
            }
        }

        public function findid($id)
        {
          $this->db->where('co_documento',$id);
          $query = $this->db->get('i001t_documentos');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findbyid_documento_permiso($id)
        {
          $this->db->where('co_documento_usuario',$id);
          $query = $this->db->get('c001t_documento_usuario');
            if ($query->num_rows() <> 0) {
                return true;
            } else {
                return false;
            }
        }

        public function urlid($id)
        {
          $this->db->select('*');
          $this->db->where('co_documento',$id);
          $this->db->from('i001t_documentos');
          $consulta = $this->db->get();
            if ($consulta)
            {
              return $consulta->row();
            }
            else
            {
              return false;
            }
        }

        public function del($id)
        {
            $this->db->where('co_documento', $id);
            $query=$this->db->delete('i001t_documentos');
            if ($query) {
                return true;
            } else {
                return false;
            }
        }

        public function del_documento_permiso($id)
        {
            $this->db->where('co_documento_usuario', $id);
            $query=$this->db->delete('c001t_documento_usuario');
            if ($query) {
                return true;
            } else {
                return false;
            }
        }
        

}
