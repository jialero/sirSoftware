<?php
namespace Incidentes\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\ParameterContainer;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\Resultset;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;


class Menu extends AbstractTableGateway implements AdapterAwareInterface{
    
        private $dbAdapter;
	private $modulo_sir_codigo;
	private $codigo;
	private $nombre;
	private $template;
	private $icono_activo;
	private $icono_hover;
	private $codigo_padre;
        
        //protected $table;
        protected $table='menu';
 
        public function setDbAdapter(Adapter $adapter)
        {
            //$this->table = new \Zend\Db\Sql\TableIdentifier('menu');
            $this->adapter = $adapter;
            $this->resultSetPrototype = new HydratingResultSet();

            $this->initialize();
        }   
        
        public function obtenerPaginas() {            
            $resultSet = $this->select(function(Select $select){
                //$select->order(array('MODULO_SIR_CODIGO asc'));
                $select->where(array('MODULO_SIR_CODIGO'=>2));
            });
            return $resultSet->toArray();
	}              

}


?>
