<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoSeguridad extends CI_Model {

        public function sesionusuario($co_usuario)
        {
          $this->db->select('a.*,
                             b.nb_rol as tx_rol');
                   $this->db->from('i003t_usuarios as a');
                   $this->db->join('i004t_roles as b', 'a.co_usuario_rol=b.co_rol');
                   $this->db->where('a.co_usuario',$co_usuario);
                   $this->db->where('a.in_status','1');
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

        public function valoresconfig()
        {
          $this->db->select('*');
          $this->db->from('i004t_settings as a');
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

  /*      public function menu_usuario($co_usuario)
        {
          $this->db->select('a.tx_menu');
                   $this->db->from('i008t_menu_usuario as a');
                   $this->db->join('i007t_tipo_usuario as b', 'a.co_tipo_usuario=b.co_tipo_usuario');
                   $this->db->join('i002t_usuario as c', 'c.co_tipo_usuario=b.co_tipo_usuario');
                   $this->db->where('c.co_usuario',$co_usuario);
                //   $this->db->where('a.in_activo',1);
                   $consulta = $this->db->get();
            if($consulta->num_rows() == 1)
            {
            return $consulta->row();
            }
            else
            {
            return false;
            }
        }*/
        }
