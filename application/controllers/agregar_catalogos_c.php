<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agregar_catalogos_c extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('file', 'url'));
        
		$this->load->library('session');
        
		$this->is_logged_in();
		
        $this->load->model('agregar_catalogos_m');
        
    }
    
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
	}
	
    public function index(){
    	
        $this->cAgregarCatalogoDeOcupaciones();
        
        $this->cAgregarCatalogoGruposIndigenas();
        
        $this->cAgregarCatalogosLugares();
        
        $this->cAgregarCatalogosTipoDeIntervencion();
       
        $this->cAgregarCatalogosTipoPerpetrador();
		
		$this->cAgregarDerechosCatalogos();
		
		$this->cAgregarActosCatalogos();
       
        $this->cAgregarCatalogoEstatusDeLaVictima();
       
        $this->cAgregarCatalogoEstatusDelPerpetrador();
        
        $this->cAgregarCatalogoNivelDeConfiabilidad();
        
        $this->cAgregarCatalogoTipoDeFuente();
        
        $this->cAgregarCatalogoTipoDeActorColectivo();
        
        $this->cAgregarEstadoCivilCatalogo();
        
        $this->cAgregarCatalogoRelacionEntreActores();
        
        $this->cAgregarCatalogoDeNacionalidades();
        
        $this->cAgregarCatalogoNivelEscolaridad();
        
        $this->cAgregarCatalogoTipoDeDireccion();
		
		$this->cAgregarCatalogoGradoInvolucramientoN1();
		
		$this->cAgregarCatalogoGradoInvolucramientoN2();
		
		$this->cAgregarCatalogoMotivoViaje();
        
		$this->cAgregarCatalogoActosDerechoAfectado();
		
		$this->cAgregarCatalogoTipoLugarN1();
		
		$this->cAgregarCatalogoTipoLugarN2();
		
		$this->cAgregarCatalogoTipoLugarN3();
		
		$this->cAgregarCatalogoTipoRelacionCasos();
		
		$this->cAgregarCatalogoTipoFuenteDocumentalN1();
		
		$this->cAgregarCatalogoTipoFuenteDocumentalN2();

		

		$this->cAgregarActosCatalogo();
    }
    
    /*
     * @name: Agrega los catalogos de derechos afectados
     * @param: no_aplica
     * @descripcion: Esta función agrega el catalogo de paises a la bse de datos.
     * 
     */
    
    public function cAgregarEstadoCivilCatalogo(){
        
        $estadoCivil['estadoCivil'][1] = array('estadoCivilId' => 1, 'descripcion' => 'Soltero');
        
        $estadoCivil['estadoCivil'][2] = array('estadoCivilId' => 2, 'descripcion' => 'Casado');
        
        $estadoCivil['estadoCivil'][3] = array('estadoCivilId' => 3, 'descripcion' => 'Viudo');
        
        $estadoCivil['estadoCivil'][4] = array('estadoCivilId' => 4, 'descripcion' => 'Separado');
        
        $estadoCivil['estadoCivil'][5] = array('estadoCivilId' => 5, 'descripcion' => 'Divorciado');
        
        $estadoCivil['estadoCivil'][6] = array('estadoCivilId' => 6, 'descripcion' => 'En Unión Libre');
        
        $estadoCivil['estadoCivil'][7] = array('estadoCivilId' => 7, 'descripcion' => 'Con Compañero');
        
        $estadoCivil['estadoCivil'][8] = array('estadoCivilId' => 8, 'descripcion' => 'En Sociedad De Convivencia');
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estadoCivil);
        
        echo 'Catalogos de estados civiles insertados exitosamente<br />';
        
    }

	public function cAgregarActosCatalogo(){
		
		$actoN3Catalogo['actosN3Catalogo'][1] = array('actoN3Id' =>1, 'descripcion' => 'Desaparición forzada', 'actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][2] = array('actoN3Id' =>2,'descripcion' =>'Ejecución','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][3] = array('actoN3Id' =>3,'descripcion' =>'Ejecución judicial por aplicación de la pena de muerte','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');/*
(4,'Genocidio',1,''),
(5,'Masacre',1,''),
(6,'Muerte bajo custodia',1,''),
(7,'Muerte en contexto de operaciones militares',1,'Excepto los operativos militares de seguridad pública'),
(8,'Muerte en contexto de operativos de seguridad pública',1,''),
(9,'Muerte resultado de negligencia',1,''),
(10,'Muerte resultado de otras VDH',1,''),
(11,'Muerte sospechosa',1,''),
(12,'Muerte violenta',1,''),
(13,'Agresión sexual',2,''),
(14,'Agresiones físicas',2,''),
(15,'Hostigamiento sexual',2,''),
(16,'Intento de violación sexual',2,''),
(17,'Intimidación',2,''),
(18,'Tortura',2,''),
(19,'Tratos crueles, inhumanos o degradantes',2,''),
(20,'Uso desproporcionado o indebido de la fuerza pública',2,'Se utiliza independientemente de si el uso de la fuerza es justificado o no, legal o no, cuando este uso de la fuerza es desproporcionado (cuando no es proporcional a lo estrictamente necesario). La utilización de la fuerza debe ser una medida excepcional. Cfr. Código de conducta para funcionarios encargados de hacer cumplir la ley. Adoptado por la Asamblea General en su resolución 34/169, de 17 de diciembre de 1979'),
(21,'Deportación a un lugar en el que se pueda sufrir violaciones a derechos humanos',2,''),
(22,'Violación sexual',2,''),
(23,'Arraigo',3,''),
(24,'Arresto domiciliario',3,''),
(25,'Detención arbitraria o ilegal',3,''),
(26,'Encarcelamiento arbitrario',3,''),
(27,'Reclutamiento forzoso',3,''),
(28,'Redada',3,''),
(29,'Revisión irregular o arbitraria',3,''),
(30,'Secuestro',3,''),
(31,'Toque de queda',3,''),
(32,'Esclavitud',4,''),
(33,'Prostitución forzada',4,''),
(34,'Servidumbre',4,''),
(35,'Trabajo forzoso',4,''),
(36,'Tráfico de personas',4,''),
(37,'Trata de personas',4,''),
(40,'Violaciones al derecho a ser comunicado(a)s con las autoridades consulares de su Estado en caso de ser detenido(a)s',5,'Violaciones a los derechos humanos y violación al derecho internacional'),
(53,'Derecho a un tribunal independiente e imparcial',6,'Violaciones a los derechos humanos y violación al derecho internacional'),
(60,'Extradición',6,''),
(70,'Extorsión',11,'Aplica a situaciones donde la autoridad o particulares utilizan de forma arbitraria o injustificada el poder (ya sea económico, político, etc.) que legalmente poseen. No se trata de actos ilegales, sino de que empleando sus facultades, las utilizan arbitrariamente, ejerciendo acciones innecesarias, intimidatorias con una gran carga de discrecionalidad. Ej. El caso del General Gallardo, al cual se le abrieron 13 averiguaciones previas, cada una después de una exoneración de la anterior. No puede hablarse de acciones ilegales, pero sí arbitrarias y discrecionales, con una intencionalidad de castigar. Otro ejemplo son los operativos injustificados o arbitrarios, que nuevamente no son ilegales porque la autoridad tiene facultades para realizar operativos, pero cuando se hacen sin causa que amerite el operativo, como denuncias específicas o pruebas de que es necesario el operativo, causan molestia a la población y pueden ser utilizados para intimidar a comunidades'),
(71,'Allanamiento',15,''),
(72,'Cateo',15,''),
(73,'Injerencias arbitrarias e ilegales en el domicilio',15,'Incluye injerencias arbitrarias e ilegales en comunidades'),
(74,'Violación a la confidencialidad de las comunicaciones',16,''),
(75,'Violación a la correspondencia',16,''),
(76,'Censura',17,''),
(77,'Restricciones para publicar o difundir información',17,'Ej. Recolectar o comprar todos los ejemplares de un periódico o una revista evitando el acceso a la misma'),
(78,'Negación de la existencia de información',18,''),
(79,'Retención de información',18,''),
(85,'Bloqueo de vías de comunicación',22,''),
(86,'Retenes',22,''),
(92,'Alto número de alumnos por maestro',35,''),
(93,'Ubicación de la escuela a gran distancia de la casa del o la estudiante',35,''),
(94,'Condiciones inadecuadas de escuelas y salones de clase',35,''),
(95,'Cuotas escolares prohibitivas',35,''),
(96,'Negación del tratamiento adecuado',36,''),
(97,'Atención primaria de salud no proporcionada a comunidades específicas',36,''),
(98,'Negación de subsidio a los servicios para personas que no pueden pagar la atención primaria a la salud',36,''),
(99,'Costos prohibitivos de la atención médica',36,''),
(102,'Falta de oportunidades de empleo',37,''),
(103,'Expropiación arbitraria de la vivienda',38,''),
(104,'Destrucción de vivienda',38,''),
(105,'Negación de escrituras de vivienda',38,''),
(106,'Desalojos forzosos o ilegales',38,''),
(107,'Exposición a sustancias peligrosas',41,''),
(108,'Contaminación',41,''),
(112,'Robo',46,''),
(113,'Expropiación arbitraria',46,''),
(114,'Negación de título de propiedad de la tierra',46,''),
(121,'Violaciones al derecho de los y las trabajadore(a)s la negociación colectiva',48,''),
(125,'Negación de indemnización por despido injustificado',48,''),
(126,'Despido injustificado',48,''),
(127,'Negación de vacaciones periódicas con goce de sueldo',48,''),
(128,'Negación del descanso, del tiempo libre y de la limitación razonable de la jornada laboral',48,''),
(129,'No pago de salarios',48,'');*/

		$this->agregar_catalogos_m->mAgregarDerechosCatalogos($actoN3Catalogo);
		echo 'Cataologos de actos ingresados correctamente<br />';
		
		

	}


    public function cAgregarDerechosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['derechosAfectadosN1Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN1Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['derechosAfectadosN2Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN2Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN1Catalogo_derechoAfectadoN1Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN3 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel3.csv');
        
        $derechosN3 = explode('&', $derechosN3);
        
        foreach($derechosN3 as $derechoN3){
            
            $obtener_datos = explode('¬', $derechoN3);
                
              $derechos['derechosAfectadosN3Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN3Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN2Catalogo_derechoAfectadoN2Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN4 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel4.csv');
        
        $derechosN4 = explode('&', $derechosN4);
        
        foreach($derechosN4 as $derechoN4){
            
            $obtener_datos = explode('¬', $derechoN4);
                
              $derechos['derechosAfectadosN4Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN4Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN3Catalogo_derechoAfectadoN3Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'cataologos de derechos afectados ingresados correctamente<br />';
        
    }
    
        public function cAgregarActosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['actosN1Catalogo'][trim($obtener_datos[0])] = array('actoId' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['actosN2Catalogo'][trim($obtener_datos[0])] = array('actoN2Id' => trim($obtener_datos[0]), 
              'descripcion' => trim($obtener_datos[1]), 
              'actosN1Catalogo_actoId' => trim($obtener_datos[2]), 
              'notas' => trim($obtener_datos[3]),
              'derechosAfectadosN2Catalogo_derechoAfectadoN2Id' => trim($obtener_datos[4]));

        }
		
        
       $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'Cataologos de actos violatorios ingresados correctamente<br />';
        
    }
    
    public function cAgregarCatalogosLugares(){
        
        $paises = read_file('statics/catalogos/catalogosLugares/paises.csv');
        
        $estados = read_file('statics/catalogos/catalogosLugares/CatalogosEdos.csv');
        
        $municipios = read_file('statics/catalogos/catalogosLugares/CatalogosMunicipios.csv');
        
        $paises = explode('&', $paises);
        
        $estados = explode('&', $estados);
        
        $municipios = explode('&', $municipios);
        
        foreach($paises as $pais){
            
            $datos_pais = explode('¬', $pais);
            
            $lugares['paisesCatalogo'][$datos_pais[0]] = array('paisId' => trim($datos_pais[0]), 'nombre' => trim($datos_pais[1]));
            
        }
        
        foreach($estados as $estado){
            
            $datos_estado = explode('¬', $estado);
            
            $lugares['estadosCatalogo'][trim($datos_estado[0])] = array('estadoId' => trim($datos_estado[0]), 'nombre' => trim($datos_estado[1]), 'paises_paisId' => trim($datos_estado[2]));
            
        }
        
        foreach($municipios as $municipio){
            
            $datos_municipio = explode('¬', $municipio);
            
            $lugares['municipiosCatalogo'][trim($datos_municipio[0])] = array('municipioId' => trim($datos_municipio[0]), 'nombre' => trim($datos_municipio[1]), 'estados_estadoId' => trim($datos_municipio[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($lugares);
        
        echo 'Catalogos de lugares insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogosTipoDeIntervencion(){
        
        for($n = 1; $n <= 4; $n++){
            
            $tipoDeIntervencion[$n] = explode('&', read_file('statics/catalogos/catalogotipodeintervencion/TipodeIntervencion_nivel'.$n.'.csv'));
            
        }
            
            foreach($tipoDeIntervencion[1] as $nivelDeIntervencion){
                
                $datosNivel = explode('¬', $nivelDeIntervencion);
            
                $tiposDeIntervencionNiveles['tipoIntervencionN1Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]));
   
            }
            
            foreach($tipoDeIntervencion[2] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN2Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN1Catalogo_tipoIntervencionN1Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[3] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN3Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN2Catalogo_tipoIntervencionN2Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[4] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN4Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN3Catalogo_tipoIntervencionN3Id' => trim($datosNivel[2]));
                
            }
            
     
        
            $this->agregar_catalogos_m->mAgregarCatalogos($tiposDeIntervencionNiveles);
        
            echo 'Catalogos de Tipo de intervencion insertados exitosamente<br />';
            
    }
    
    public function cAgregarCatalogosTipoPerpetrador(){
        
        for($n = 1; $n <= 5; $n++){
            
            $tipoDePerpetrador[$n] = explode('&', read_file('statics/catalogos/catalogotipodeperpetrador/TipodePerpetrador_nivel'.$n.'.csv'));
            
        }
        foreach($tipoDePerpetrador[1] as $nivelDePerpetrador){
                
                    $datosNivel = explode('¬', $nivelDePerpetrador);
                
                    $tiposDePerpetradorNiveles['tipoPerpetradorN1Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[2]));
               
        }
        
        foreach($tipoDePerpetrador[2] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN2Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN1Catalogo_tipoPerpetradorN1Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[3] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN3Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[4] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN4Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[5] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN5Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN5Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN4Catalogo_tipoPerpetradorN4Id' => trim($datosNivel[2]));
                
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($tiposDePerpetradorNiveles);
        
        echo 'Catalogos de tipos de perpetrador insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoGruposIndigenas(){
        
        $catalogoGruposIndigenas = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeGruposIndigenas.csv'));
        
        foreach($catalogoGruposIndigenas as $grupoIndigena){
                
            $datosGrupo = explode('¬', $grupoIndigena);
                
            $gruposIndigenas['gruposIndigenas'][trim($datosGrupo[0])] = array('grupoIndigenaId' => trim($datosGrupo[0]), 'paisId' => trim($datosGrupo[2]), 'descripcion' => trim($datosGrupo[1]), 'notas' => trim($datosGrupo[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($gruposIndigenas);
        
        echo 'Catalogos de grupos indigenas insertados exitosamente.<br />';
        
    }
	
	public function cAgregarCatalogoTipoRelacionCasos(){
        
        $catalogoTipoRelacionCasos = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoRelacionCasos.csv'));
        
        foreach($catalogoTipoRelacionCasos as $tipoRelacion){
                
            $datosTipoRelacion = explode('¬', $tipoRelacion);
                
            $tiposRelaciones['relacionCasosCatalogo'][trim($datosTipoRelacion[0])] = array('relacionCasosId' => trim($datosTipoRelacion[0]), 'descripcion' => trim($datosTipoRelacion[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($tiposRelaciones);
        
        echo 'Catalogos de tipos de relacion entre casos insertados exitosamente.<br />';
        
    }
	
	
	public function cAgregarCatalogoMotivoViaje(){
        
        $catalogoGruposIndigenas = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoMotivoDelViaje.csv'));
      
        foreach($catalogoGruposIndigenas as $motivoViaje){
             
           $datosGrupo = explode('¬', $motivoViaje);    
           $motivosViaje['motivoViajeCatalogo'][trim($datosGrupo[0])] = array('motivoViajeId' => trim($datosGrupo[0]), 'descripcion' => trim($datosGrupo[1]));
			
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($motivosViaje);
        
        echo 'Catalogos de motivos Viaje insertados exitosamente.<br />';
        
    }
    
	 public function cAgregarCatalogoActosDerechoAfectado(){
        
        $catalogoActosDA = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoActosDA.csv'));
        
        foreach($catalogoActosDA as $actoDA){
                
            $datosGrupo = explode('¬', $actoDA);
                
            $actosDA['actosN1Catalogo_has_derechosAfactadosN1Catalogo'][trim($datosGrupo[0])] = array('actosN1Catalogo_actoId' => trim($datosGrupo[0]), 'derechosAfactadosN1Catalogo_derechoAfectadoN1Id' => trim($datosGrupo[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($actosDA);
        
        echo 'Catalogos de actos derecho afectado insertados exitosamente.<br />';
        
    }
	
	
	
    public function cAgregarCatalogoDeNacionalidades(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/nacionalidadesCatalogo.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['nacionalidadesCatalogo'][$datosOcupacion[0]] = array('nacionalidadId' => trim($datosOcupacion[0]), 'nombre' => trim($datosOcupacion[1]), 'generoNacionalidad' => trim($datosOcupacion[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de nacionalidades insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoDeOcupaciones(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresIndividuales.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
		
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[2]), 'tipoActorId' => 1);
            
        }
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresColectivos.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[2]), 'tipoActorId' => 2);
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de ocupaciones insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoEstatusDeLaVictima(){
        
        $catalogoEstatusDeLAVictima = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDeLaVictima.csv'));
        
        foreach($catalogoEstatusDeLAVictima as $estatusDeLaVictima){
                
            $datosEstatusDeLaVictima = explode('¬', $estatusDeLaVictima);
                
            $estatus['estatusVictimaCatalogo'][trim($datosEstatusDeLaVictima[0])] = array('estatusVictimaId' => trim($datosEstatusDeLaVictima[0]), 'descripcion' => trim($datosEstatusDeLaVictima[1]), 'notas' => trim($datosEstatusDeLaVictima[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de victimas insertado exitosamente.<br />';
        
    }
    
        public function cAgregarCatalogoEstatusDelPerpetrador(){
        
        $catalogoEstatusDelPerpetrador = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDelPerpetrador.csv'));
        
        foreach($catalogoEstatusDelPerpetrador as $estatusDelPerpetrador){
                
            $datosEstatusDelPerpetrador = explode('¬', $estatusDelPerpetrador);
                
            $estatus['estatusPerpetradorCatalogo'][trim($datosEstatusDelPerpetrador[0])] = array('estatusPerpetradorId' => trim($datosEstatusDelPerpetrador[0]), 'descripcion' => trim($datosEstatusDelPerpetrador[1]), 'notas' => trim($datosEstatusDelPerpetrador[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de perpetradores insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoNivelDeConfiabilidad(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoNivelDeConfiabilidad.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['nivelConfiabilidadCatalogo'][trim($datos[0])] = array('nivelConfiabilidadId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }

    
    public function cAgregarCatalogoTipoDeFuente(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeFuente.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoFuenteCatalogo'][trim($datos[0])] = array('tipoFuenteId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]) ,'selectorTipoFuente' => 1);

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoTipoDeActorColectivo(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/tipoDeActorColectivo.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoActorColectivo'][trim($datos[0])] = array('tipoActorColectivoId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de actores colectivos insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoRelacionEntreActores(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/relacionEntreActores.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['relacionActoresCatalogo'][trim($datos[0])] = array('tipoRelacionId' => trim($datos[0]), 'nombre' => trim($datos[1]), 'notas' => trim($datos[2]), 'nivel2' => trim($datos[3]), 'tipoDeRelacionId' => trim($datos[4]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de relación entre actores insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoNivelEscolaridad(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoGradoEscolaridad.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['nivelEscolaridadCatalogo'][trim($datos[0])] = array('nivelEscolaridadId' => trim($datos[0]), 'descripcion' => trim($datos[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grados de escolaridad insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoTipoDeDireccion(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeDireccion.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoDireccionCatalogo'][trim($datos[0])] = array('tipoDireccionId' => trim($datos[0]), 'descripcion' => trim($datos[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipos de direccion insertado exitosamente.<br />';
        
    }
    
    
    public function cAgregarCatalogoGradoInvolucramientoN1(){
    	
		$catalogo =explode('&',read_file('statics/catalogos/catalogogradodeinvolucramiento/GradodeInvolucramientoNivel1.csv'));
	
		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['gradoInvolucramientoN1Catalogo'][trim($datos[0])] = array('gradoInvolucramientoN1Id' => trim($datos[0]), 'descripcion' => trim($datos[1]),'notas' => trim($datos[2]));

        }
		 
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grado involucramiento N1 insertado exitosamente.<br />';
    }
	
    public function cAgregarCatalogoGradoInvolucramientoN2(){
    	
		$catalogo =explode('&',read_file('statics/catalogos/catalogogradodeinvolucramiento/GradodeInvolucramientoNivel2.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['gradoInvolucramientoN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
            'gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id'=>trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grado involucramiento N2 insertado exitosamente.<br />';
    }
    
	public function cAgregarCatalogoTipoLugarN1(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel1.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN1Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N1 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoLugarN2(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel2.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoLugarN1Catalogo_tipoLugarId' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N2 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoLugarN3(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel3.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN3Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoLugarN2Catalogo_tipoLugarN2Id' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N3 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoFuenteDocumentalN1()
	{
		$catalogo =explode('&',read_file('statics/catalogos/catalogosFuenteDocumental/tipoFuenteDocumentalN1Catalogo.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoFuenteDocumentalN1Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo fuente documental N1 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoFuenteDocumentalN2()
	{
		$catalogo =explode('&',read_file('statics/catalogos/catalogosFuenteDocumental/tipoFuenteDocumentalN2Catalogo.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoFuenteDocumentalN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoFuenteDocumentalN1Catalogo_tipoFuenteDocumentalN1CatalogoId' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo fuente documental N2 insertado exitosamente.<br />';
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */
