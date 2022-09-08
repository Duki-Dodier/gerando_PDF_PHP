<?php

// AUTOLOAD DO COMPOSER
require __DIR__.'/vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;

//INSTANCIA DE OPTIONS
$options = new Options();
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

//INSTANCIA DE DOMPDF
$dompdf = new Dompdf($options);

//CARREGA O HTML PARA DENTRO DA CLASSE
// $dompdf->loadHtml("<b>OLá mundo</b>");
$dompdf->loadHtmlFile(__DIR__.'/arquivo.html');

//PAGINA
$dompdf->setPaper('A4',);
//$dompdf->setPaper('A4','landscape');

//RENDERIZA O ARQUIVO PDF
$dompdf->render();

//IMPRIME o CONTEÚDO DO ARQUIVO PDF NA TELA
//header('Content-type: application/pdf');
//echo $dompdf->output();

//DOWNLOAD
//$dompdf->stream('documento.pdf');

//SALVAR NO DISCO   
file_put_contents(__DIR__.'/arquivo.pdf',$dompdf->output());
echo 'Arquivo salvo no disco';