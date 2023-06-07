<?php
ob_start();
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<style>
			.container {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin: auto;

			}

			.s1 {
				color: black;
				font-family: Arial, sans-serif;
				font-style: normal;
				font-weight: bold;
				text-decoration: none;
				font-size: 11pt;
			}
			p {
				color: black;
				font-family: Arial, sans-serif;
				font-style: normal;
				text-decoration: none;
				font-size: 12pt;
				margin: 0pt;
			}
			.encabezado, tbody {
				vertical-align: top;
				overflow: visible;
			}
			/*Encabezado Fin*/
			.indice{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin: 10px;
				text-align: center;

			}
			.cuerpo{
				display: flex;
				flex-direction: column;
				justify-content: center;
				text-align: justify;
				align-items: center;
				margin: 10px;

			}

			.tabla {
				border: 1px solid black;
				padding: 10px;
				width: 80%;
				margin: 10px;
			}



			.text{
				right: 30px;
			}
			.textitulo{
				margin-left: -950px;

			}
			/*↓↓↓tabla triple↓↓↓*/
			.tabla_3 {
				border: 1px solid black;
				padding: 10px;
				width: 80%;
				margin: 10px;
				border-collapse: collapse;
				table-layout: fixed;
			}

			.linea{
				padding: 10px;
				border: 1px solid black;
				width: 23%;

			}
			.linea-2{
				padding: 10px;
				border: 1px solid black;
				width: 23%;
				text-align: justify;
				word-break: break-word;
				height: 100px;
				vertical-align: top;


			}
			.linea-5{
				padding: 10px;
				border: 1px solid black;
				width: 10%;
				word-break: break-word;
				vertical-align: top;

			}
			/**/
			.indice{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin: 5px;
				text-align: center;
				font-size: 16px;
				font-weight: bold;
				font-family: Arial;
				padding: 5px;
				margin-bottom: 0pt;
				margin-top: 0pt;
			}

			.indice_2{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin: 10px;
				text-align: center;
				font-size: 16px;
				font-family: Arial;
				margin: auto;
				line-height: 10px;

			}
			.indece_2, p{
				margin: 10px;
			}
		</style>
	</head>
	<?php
	include("./funcion.php");
	$Periodo = obtenerPeriodo();
	$Nommateria = obtenernombremateria();	
	?>
	<body>
		<div class="container">
			<div class="">
				<table class="encabezado" style="border-collapse:collapse;margin-left:22.91pt" cellspacing="0">
					<tr style="height:28pt">
						<td style="width:149pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" rowspan="3">
							<p style="text-indent: 0pt;text-align: left;"><br/></p>
							<p style="padding-left: 22pt;text-indent: 0pt;text-align: left;"><span><img width="131" height="101" alt="image" src="./imagenes/logo_intru.png"/></span></p></td>
						<td style="width:333pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" rowspan="2">
							<p class="s1" style="padding-left: 39pt;text-indent: 0pt;line-height: 108%;text-align: left;"><span>Instrumentación Didáctica para la formación y desarrollo de competencias profesionales</span></p></td>
						<td style="width:170pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
							<p class="s1" style="padding-left: 39pt;padding-right: 26pt;text-indent: 0pt;line-height: 14pt;text-align: left;"><span>Código: TecNM-AC-<br/>PO003-02</span></p></td></tr>
					<tr style="height:22pt">
						<td style="width:170pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
							<p class="s1" style="padding-left: 38pt;text-indent: 0pt;text-align: left;">Revisión: O</p></td></tr>
					<tr style="height:30pt">
						<td style="width:333pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
							<p class="s1" style="padding-left: 38pt;text-indent: 0pt;text-align: left;">Referencia a la Norma ISO 9001:2015: 8.1, 8.2.2, 8.5.1</p></td>
						<td style="width:170pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
							<p class="s1" style="padding-left: 45pt;text-indent: 0pt;text-align: left;">Página 1 de 1</p></td></tr>
				</table>
			</div>
		</div>			
		<div class="indice">
			<p>Tecnologico Nacional de Mexico</p>
			<p> Subdirector Academico o su equivalete en los Institutos Tecnologicos Descentralizados</p>
			<p>Instrumentación didáctica para la formación y desarrollo de competencias Profesionales</p>
		</div>
		<div class="indice_2">
			<?php foreach ($Periodo as $periodo) : ?>
			<p> Periodo: <?php echo $periodo; ?>.</p><?php endforeach; ?>
			<?php foreach ($Nommateria as $materia) : ?>
			<p> Nombre de la asignatura: <?php echo $materia; ?>.</p><?php endforeach; ?>
			<?php foreach ($Plandeestudio as $planestudio) : ?>
			<p>Plan de estudio: <?php echo $planestudio; ?></p><?php endforeach; ?>			
			<p>Clave de asignatura:IINF-2010-220</p> 
			<p>Horas teoría: – horas prácticas: – créditos:</p>
		</div>
	</body>
</html>

<?php

$html=ob_get_clean();
//echo $html;

require_once './libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter','landscape');

$dompdf->render();

$dompdf->stream("instrumentatacion_.pdf", array("Attachment" => false));
?>
