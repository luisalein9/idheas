<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReporteExcel_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			//load our new PHPExcel library
			$this->load->library('excel');
			
			$this->load->library('session');
        
			$this->is_logged_in();
		
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	
	
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
	}
	
	function index() 
	{
		date_default_timezone_set('America/Mexico_City');	
		$this->generaExcel();	
	}
	function traer_catalogos(){
        		
		$datos['actosN1Catalogo'] = $this->general_m->obtener_todo('actosN1Catalogo', 'actoId', 'descripcion');
		
		$datos['actosN2Catalogo'] = $this->general_m->obtener_todo('actosN2Catalogo', 'actoN2Id', 'descripcion');
		
		$datos['actosN3Catalogo'] = $this->general_m->obtener_todo('actosN3Catalogo', 'actoN3Id', 'descripcion');
		
		$datos['actosN4Catalogo'] = $this->general_m->obtener_todo('actosN4Catalogo', 'actoN4Id', 'descripcion');
		
		$datos['derechosAfectadosN1Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN1Catalogo', 'derechoAfectadoN1Id', 'descripcion');
		
		$datos['derechosAfectadosN2Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN2Catalogo', 'derechoAfectadoN2Id', 'descripcion');
		
		$datos['derechosAfectadosN3Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN3Catalogo', 'derechoAfectadoN3Id', 'descripcion');
		
		$datos['derechosAfectadosN4Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN4Catalogo', 'derechoAfectadoN4Id', 'descripcion');
      	
	    return $datos;
        
    }
	function generaExcel(){
	
		 
		$this->excel->setActiveSheetIndex(0);
		
		$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->setTitle('Reporte corto');
						
		$this->excel->getActiveSheet()->setCellValue('A1', 'Nombre del caso');
						
		$this->excel->getActiveSheet()->setCellValue('B1', 'Actos');
						
		$this->excel->getActiveSheet()->setCellValue('C1', 'Tipo de perpetrador');
						
		$this->excel->getActiveSheet()->setCellValue('D1', 'Número de Víctimas del caso');
						
		$this->excel->getActiveSheet()->setCellValue('E1', 'Fecha de inicio');
						
		$this->excel->getActiveSheet()->setCellValue('F1', 'Fecha de término'); 
		 
		 
		$catActos = $this->catalogos_m->mTraerDatosCatalogoActos(); 
		$catPerpe = $this->catalogos_m->mTraerDatosCatalogoTipoPerpetrador();
		$catDA = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
		 
		/*$datos = array('actoViolatorioId'=>'1','actoViolatorioNivel'=>'1');
			
		$Data = $this->reportes_m->mReporteCortoActoDerechoAfectado($datos);
		
		$datos = array('nombre'=>'Caso 2');
			
		$Data = $this->reportes_m->mReporteCortoNombre($datos);
		
		$tipo = 1;*/
		
		$Data = array();
		$tipo = $_POST['tipoFiltro'];
		
		switch ($tipo){

                    case(1):
						$datos = array('nombre'=>$_POST['nombreCaso']);
                       	$Data = $this->reportes_m->mReporteCortoNombre($datos);
					
						if($Data=='0'){
							echo "<script languaje='javascript' type='text/javascript'>
								
			 					alert('No se han encontrado registros con este filtro.');
			 					
							</script>";
							$datos['is_active'] = 'reportes';

					        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
					
					        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();
							
							$datos['catalogos']= $this->traer_catalogos();
					
					        $datos['head'] = $this->load->view('general/head_v', $datos, true);
					
					        $datos['content'] = $this->load->view('reporte/reporte_v', $datos, true);
					
					        $datos['body'] = $this->load->view('general/body_v', $datos, true);
					
					
					        $this->load->view('general/principal_v', $datos);
						}
                    break;

                    case(2): 
						$datos = array('desdeFecha'=>$_POST['fechaInicial'],'hastaFecha'=>$_POST['fechaTermino']);
                        $Data = $this->reportes_m->mReporteCortoFechas($datos);
                
                        if($Data=='0'){
							echo "<script languaje='javascript' type='text/javascript'>
								
			 					alert('No se han encontrado registros con este filtro.');
			 					
							</script>";
							$datos['is_active'] = 'reportes';

					        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
					
					        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();
							
							$datos['catalogos']= $this->traer_catalogos();
					
					        $datos['head'] = $this->load->view('general/head_v', $datos, true);
					
					        $datos['content'] = $this->load->view('reporte/reporte_v', $datos, true);
					
					        $datos['body'] = $this->load->view('general/body_v', $datos, true);
					
					
					        $this->load->view('general/principal_v', $datos);
						}
                    break;

                    case(3): 
						$datos =array('derechoAfectadoId'=>$_POST['derechoAfectadoId'],'actoViolatorioNivel'=>$_POST['actoViolatorioNivel'],'actoViolatorioId'=>$_POST['actoViolatorioId']);
                        $Data = $this->reportes_m->mReporteCortoActoDerechoAfectado($datos);
					
						if($Data=='0'){
							echo "<script languaje='javascript' type='text/javascript'>
								
			 					alert('No se han encontrado registros con este filtro.');
			 					
							</script>";
							$datos['is_active'] = 'reportes';

					        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
					
					        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();
							
							$datos['catalogos']= $this->traer_catalogos();
					
					        $datos['head'] = $this->load->view('general/head_v', $datos, true);
					
					        $datos['content'] = $this->load->view('reporte/reporte_v', $datos, true);
					
					        $datos['body'] = $this->load->view('general/body_v', $datos, true);
					
					
					        $this->load->view('general/principal_v', $datos);
						}
                    break;
                
                    default : redirect(base_url().'index.php/reportes_c/generar_reporte');
                        
                    break;

                }
		
		if($tipo == 1 && $Data !='0'){
			
			$actoslist="";
			if(isset($Data['actos']) && isset($Data['derechoAfectado']) ){
					foreach($Data['actos'] as $acto){
						foreach ($catDA['derechosAfectadosN'.$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoNivel'].'Catalogos'] as $DA) {
							if($DA['derechoAfectadoN'.$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoNivel'].'Id']==$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoId']){
								$derechoAfectado = $DA['descripcion'];
							}
						}
						
						if($acto['actoViolatorioNivel']==1){
							foreach ($catActos['actosN'.$acto['actoViolatorioNivel'].'Catalogos'] as $catA) {
								if($catA['actoId']==$acto['actoId']){
									$nombreActo = $catA['descripcion'];
								}
							}
						}else{
							foreach ($catActos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catA) {
								if($catA['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoId']){
									$nombreActo = $catA['descripcion'];
								}
							}
						}
						
						$listaPerpetradores =" ";
						if(isset($Data['perpetradores'])){
							foreach ($Data['perpetradores'] as $perpetrador) {
								$listaPerpetradores = $listaPerpetradores . $perpetrador['nombre'].' '.$perpetrador['apellidos'].'. ';
							}
						}
							
						
						$actoslist = $actoslist."Derecho Afectado: ".$derechoAfectado." . Acto:".$nombreActo.". "
						."(Fecha inicio: ".$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['fechaInicial'].". Fecha término: ".
						$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['fechaTermino']." )."."No victimas:  "
						.$Data['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['noVictimas']."Perpetradores: ".$listaPerpetradores;
	
					}
				}
			
			$tipoPerpetradores="";
			if(isset($Data['perpetradores'])){
				foreach($Data['perpetradores'] as $perpetrador){
					foreach($catPerpe['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Catalogo'] as $tipo){
						if($tipo['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Id'] == $perpetrador['tipoPerpetradorId']){
							$tipoPerpetradores= $tipoPerpetradores.$tipo['descripcion'].'. ';
						}
					}
					
				}
			}
			
			
			$this->excel->getActiveSheet()->setCellValue('A2', $Data['caso']['nombre']);
			
			$this->excel->getActiveSheet()->setCellValue('B2', $actoslist);
			
			$this->excel->getActiveSheet()->setCellValue('C2', $tipoPerpetradores);
			
			$this->excel->getActiveSheet()->setCellValue('D2', $Data['caso']['personasAfectadas']);
			
			$this->excel->getActiveSheet()->setCellValue('E2', $Data['caso']['fechaInicial']);
			
			$this->excel->getActiveSheet()->setCellValue('F2', $Data['caso']['fechaTermino']);
		}elseIf($Data!='0'){
			$r=1;
			
			foreach($Data['casos'] as $caso){
			
				$actoslist="";
				if(isset($caso['actos']) && isset($caso['derechoAfectado']) ){
					foreach($caso['actos'] as $acto){
						foreach ($catDA['derechosAfectadosN'.$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoNivel'].'Catalogos'] as $DA) {
							if($DA['derechoAfectadoN'.$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoNivel'].'Id']==$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['derechoAfectadoId']){
								$derechoAfectado = $DA['descripcion'];
							}
						}
						
						if($acto['actoViolatorioNivel']==1){
							foreach ($catActos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catA) {
								if($catA['actoId']==$acto['actoId']){
									$nombreActo = $catA['descripcion'];
								}
							}
						}else{
							foreach ($catActos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catA) {
								if($catA['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoId']){
									$nombreActo = $catA['descripcion'];
								}
							}
						}
						$listaPerpetradores =" ";
						if(isset($caso['perpetradores'])){
							foreach ($caso['perpetradores'] as $perpetrador) {
								$listaPerpetradores = $listaPerpetradores . $perpetrador['nombre'].' '.$perpetrador['apellidos'].'. ';
							}
						}
						
						$actoslist = $actoslist."Derecho Afectado: ".$derechoAfectado." . Acto:".$nombreActo.". "
						."(Fecha inicio: ".$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['fechaInicial'].". Fecha término: ".
						$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['fechaTermino'].")."." No victimas: ".
						$caso['derechoAfectado'][$acto['derechoAfectado_derechoAfectadoCasoId']]['noVictimas']."Perpetradores: ".$listaPerpetradores;
	
					}
				}

				$tipoPerpetradores="";
				
				if(isset($caso['perpetradores'])){
					foreach($caso['perpetradores'] as $perpetrador){
						foreach($catPerpe['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Catalogo'] as $tipo){
							if($tipo['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Id'] == $perpetrador['tipoPerpetradorId']){
								$tipoPerpetradores= $tipoPerpetradores.$tipo['descripcion'].'. ';
							}
						}
						
					}
				}
				
				$r = $r+1;
				
				$this->excel->getActiveSheet()->setCellValue('A'.$r, $caso['caso']['nombre']);
				
				$this->excel->getActiveSheet()->setCellValue('B'.$r, $actoslist);
				
				$this->excel->getActiveSheet()->setCellValue('C'.$r, $tipoPerpetradores);
				
				$this->excel->getActiveSheet()->setCellValue('D'.$r, $caso['caso']['personasAfectadas']);
				
				$this->excel->getActiveSheet()->setCellValue('E'.$r, $caso['caso']['fechaInicial']);
				
				$this->excel->getActiveSheet()->setCellValue('F'.$r, $caso['caso']['fechaTermino']);
				
			}
			
			
		}
		
		if($Data!='0'){
			$filename='reporte_corto.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
						             
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');	
		}
		

	}

}

?>