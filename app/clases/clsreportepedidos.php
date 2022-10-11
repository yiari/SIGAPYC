<?php

require '../../vendor/autoload.php';

include_once '../../app/modelos/conexcion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class clsreportepedidos
{
    private $titulo;
    private $id_recibopedido;
    private $archivo;

    public function __construct(string $titulo, int $id_recibopedido = 0, string $archivo )
    {
        //$this->id = $id;
        $this->titulo = $titulo;
        $this->id_recibopedido = $id_recibopedido;
        $this->archivo = $archivo;

    }

    public function armarReporte(){

        $spreadsheet = new Spreadsheet();
        $contador = 2;

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'MES');
        $sheet->setCellValue('C1', 'CODIGO AVISO');
        $sheet->setCellValue('D1', 'CODIGO PEDIDO');
        $sheet->setCellValue('E1', 'CODIGO INQUILINO');
        $sheet->setCellValue('F1', 'CEDULA INQUILINO');
        $sheet->setCellValue('G1', 'CODIGO INMUEBLE O UNIDAD');
        $sheet->setCellValue('H1', 'MONTO PEDIDO');

       


        $dbConexion = new conexcion();
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_consulta_recibo_pedido()");
        //$stmt -> bindParam(1,$items["id_unid"], PDO::PARAM_INT);
       
  
        $stmt->execute();
        $dataRegistro = $stmt->fetchall();
  
        $dataRes = array(
          'error' => '0',
          'mensaje' =>  'El registro se obtuvo.'
        );


        foreach($dataRegistro as $data){

            $sheet->setCellValue('A'.$contador, $data['id']);
            $sheet->setCellValue('B'.$contador, $data['nombre_mes']);
            $sheet->setCellValue('C'.$contador, $data['cod_aviso']);
            $sheet->setCellValue('D'.$contador, $data['cod_Pedido']);
            $sheet->setCellValue('E'.$contador, $data['inquilino']);
            $sheet->setCellValue('F'.$contador, $data['cedula']);
            $sheet->setCellValue('G'.$contador, $data['inmueble']);
            $sheet->setCellValue('H'.$contador, $data['monto_pedido']);

            $contador++;

        }



        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($this->archivo).'"');
        $writer->save('php://output');

        //$writer->save($this->archivo);


    }


}