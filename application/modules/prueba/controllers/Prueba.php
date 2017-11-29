<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends MX_Controller {
	
	public function __construct(){		
		parent::__construct();
		$this->load->library("phpexcel/PHPExcel");
	}
	
	public function index(){	
		$this->load->model("pruebamodel");
		$data["prueba"] = $this->pruebamodel->prueba();
		$data["view"] = "prueba3";
		$this->load->view("layout",$data);		
	}
	
	public function pruebaui(){
		$data["view"] = "prueba3";
		$this->load->view("layout",$data);
	}
	
	public function actualizarCombo(){
		$this->load->model("pruebamodel");		
		$id = $this->input->post("id");
		$test = $this->pruebamodel->pruebaSelect($id);
		echo '<option value="-">Seleccione...</option>';
		for ($i=0; $i<count($test); $i++){
			echo '<option value="'.$test[$i]["id"].'">'.$test[$i]["nombre"].'</option>';
		}		
	}
	
	public function jsonQuery(){
		$this->load->model("pruebamodel");
		$test = $this->pruebamodel->pruebaGrid();
		echo json_encode($test);
	}
	
	public function pruebaExcel(){
		$sheetId = 0;
		$this->phpexcel->createSheet(NULL, $sheetId);
		$this->phpexcel->setActiveSheetIndex($sheetId);
		$this->phpexcel->getActiveSheet()->setTitle("Excel de Prueba");
		$sheet = $this->phpexcel->getActiveSheet();
		$sheet->getColumnDimension('A')->setWidth(30);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(30);
		$sheet->getColumnDimension('D')->setWidth(30);
		$sheet->getColumnDimension('E')->setWidth(30);
		$sheet->getColumnDimension('F')->setWidth(30);
		$sheet->getColumnDimension('G')->setWidth(30);
		$styleArray = array('font' => array('bold' => true));
		$sheet->setCellValue('A3','Columna A3');
		$sheet->setCellValue('B3','Columna BB');
		$sheet->setCellValue('C3','Columna C3');
		$sheet->setCellValue('D3','Columna D3');
		$sheet->setCellValue('E3','Columna E3');
		$sheet->setCellValue('F3','Columna F3');
		$sheet->setCellValue('G3','Columna G3');
		$sheet->setCellValue('A4','Columna A4');
		$sheet->setCellValue('B4','Columna B4');
		$sheet->setCellValue('C4','Columna C4');
		$sheet->setCellValue('D4','Columna D4');
		$sheet->setCellValue('E4','Columna E4');
		$sheet->setCellValue('F4','Columna F4');
		$sheet->setCellValue('G4','Columna G4');
		$writer = new PHPExcel_Writer_Excel5($this->phpexcel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output');		
	}
	
	public function pruebaPDF(){
		$this->load->library('html2pdf');
		$this->load->helper('download');
		$filename = './assets/archivo.pdf';		
		if (!file_exists($filename)) {			
			$this->html2pdf->folder('./assets/');
			$this->html2pdf->filename('archivo.pdf');
			$this->html2pdf->paper('a4', 'portrait');
			$data["view"] = "prueba";
			$html = $this->load->view("layout",$data,true);
			$this->html2pdf->html($html);
			$this->html2pdf->create('save');			
		}
		$data = file_get_contents($filename); 
		$name = 'archivo.pdf';
		force_download($name, $data);
	}
	
}//EOC
