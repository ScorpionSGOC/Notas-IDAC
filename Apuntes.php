Puedes darme los datos para el diagrama de clases navegacional del siguiente código:
<?php
header('Content-Type: text/html');
header('Pragma: no-cache');
header('Cache-Control: no-cache');

require_once '../config/conexion.php';
session_start();
//INDICADOR PARA BOTONES DE AGREGAR Y ACTUALIZAR
$switch_btnAgregar = true;

$conn=conexion();
include('./operaciones_instrum.php');
if (isset($_GET['idMateria'])) {
    $idMateria = (isset($_GET['idMateria']))?$_GET['idMateria']:"";
    $my_sql3 = "SELECT * FROM cat_temario
    INNER JOIN materia on cat_temario.id_Materia=materia.id_materia
    WHERE cat_temario.id_Materia=".$idMateria;

    $consultDatosMateria = mysqli_query($conn, $my_sql3);
    
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
                initial-scale=1.0">
    <title>docentes</title>
    <link rel="icon" href="./ico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../font_awesome/css/all.min.css">
    <link rel="stylesheet" href="../css/estyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script type="text/javascript">
		function confirmEliminarProducto() {
			var resp = confirm("¿QUIERES ELIMINAR ESTA EVIDENCIA?");
			if (resp == true) {
				return true;
			}else{
				return false;
			}
		}
	</script>
        <style>
            /* Estilos generales */
            body {
                font-family: Arial, sans-serif;
                
            }

            /* Estilos específicos para la impresión */
            @media print {
                /* body {
                font-size: 12pt;
                margin: 0;
                }
                .table thead th{
                    position: sticky;
    top: 0;
    background-color: #f5f5f5;
                }
                 */
                /* Otros estilos para la impresión */
                /* ... */
            }
        </style>
    </head>
    


<body onbeforeprint="antesDeimprimir()" onafterprint ="despuesDeImprimir()">
    <!-- <button onclick="window.print();">IMPRIMIR</button> -->
    <?php require_once('../componentes/header.php') ?>
<br>
hereeeee
<i class="fas fa-heart"></i> <br>


    <div class="container-fluid">
        <div class="row">
            
            <!-- <div id="button" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                
            </div> -->
            
            <div class="container-fluid">
                <div class="row colum_ocultar">
                    <div id="button" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="midiv" style="position:sticky; top: 1rem;">
                        <div id="button_1" class="d-flex flex-column bd-highlight p-3 bg-light" style="width: 100%;">
                        <center>    
                        <h2>Menú</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <a id="index_1" class="btn btn-primary mt-2" href="/IDAC/login/docente.php" role="button">Volver</a>
                                </div>
                                <div class="col-md-6">
                                    <a id="index_1" class="btn btn-primary mt-2" href="accion/logout.php" role="button">Cerrar Sesión</a>
                                </div>
                            </div>
                            </center>
                            
                            
                        </div> <br>
                        <!-- Aquí va el recuadro que hace que el formulario se alinea a la derecha-->
                        <!-- _________________MI TABLA______________________________- -->
                        <!-- #SU FOORM -->
                        <div class="col-md-12" >
                            <div id="sombra"class="card shadow-lg">
                                <div class="card-header">
                                    <h5>Datos de la Evidencia</h5>
                                    </div>
                                    <div class="card-body form-evidencias">
                                        <form id="etiquetaForm" action="form_instrumentacion.php" method="post">
                                                
                                                    <div class="row">
                                                    <div class="col-md-12" style="">
                                                        <?php if (isset($idProductoUpdate)) { ?>
                                                                <label for="idEvidencia" class="form-label">ID:</label>
                                                                <input readonly type="text" value="<?php echo(isset($idProductoUpdate))?$idProductoUpdate:""; ?>"
                                                                class="form-control" name="idEvidencia" id="idEvidencia" aria-describedby="helpId" placeholder="">
                                                       <?php } ?>
                                                    

                                                        <label for="nameEvidencia" class="form-label">Nombre de la evidencia:</label>
                                                        <input type="text" value="<?php echo(isset($nameProduct))?$nameProduct:""; ?>"
                                                        class="form-control" name="nameEvidencia" id="nameEvidencia" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                                
                                            <br>
                                            <div class="row">
                                            <label style="text-align: left;" class="text-right" for="">Puntuar Indicadores de Alcance:</label>
                                                    <div class="col-md-2">
                                                        <ewe>
                                                            <label for="ind_a" class="form-label">A:</label>
                                                            <input type="number" min="1" max="100" value="<?php echo(isset($indA))?$indA:""; ?>"
                                                            class="form-control indicadores" name="ind_a" id="ind_a" required aria-describedby="helpId" placeholder="">
                                                        </ewe>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ewe><label for="ind_b" class="form-label">B:</label>
                                                        <input type="number" min="1" max="100" value="<?php echo(isset($indB))?$indB:""; ?>"
                                                        class="form-control indicadores" name="ind_b" id="ind_b" required aria-describedby="helpId"
                                                        placeholder=""></ewe>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ewe><label for="ind_c" class="form-label">C:</label>
                                                        <input type="number" min="0" max="100" value="<?php echo(isset($indC))?$indC:""; ?>"
                                                        class="form-control indicadores" name="ind_c" id="ind_c" required aria-describedby="helpId" 
                                                        placeholder=""></ewe>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ewe><label for="ind_d" class="form-label">D:</label>
                                                        <input type="number" min="0" max="100" value="<?php echo(isset($indD))?$indD:""; ?>"
                                                        class="form-control indicadores" name="ind_d" id="ind_d" required aria-describedby="helpId" 
                                                        placeholder=""></ewe>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <ewe><label for="ind_e" class="form-label">E:</label>
                                                        <input type="number" min="0" max="100" value="<?php echo(isset($indE))?$indE:""; ?>"
                                                        class="form-control indicadores" name="ind_e" id="ind_e" required aria-describedby="helpId" 
                                                        placeholder=""></ewe>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ewe><label for="ind_f" class="form-label">F:</label>
                                                        <input type="number" min="0" max="100" value="<?php echo(isset($indF))?$indF:""; ?>"
                                                        class="form-control indicadores" name="ind_f" id="ind_f" required aria-describedby="helpId" 
                                                        placeholder=""></ewe>
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="evalucionFormativa" class="form-label">Evaluación formativa:</label>
                                                        <select class="form-select form-select-sm" name="evalucionFormativa" id="evalucionFormativa" required>
                                                            <option></option>
                                                            <option <?php echo (isset($evalFormativa) && $evalFormativa=="Rubrica")?"selected":""; ?> value="Rubrica">Rúbrica</option>
                                                            <option <?php echo (isset($evalFormativa) && $evalFormativa=="Lista de cotejo")?"selected":""; ?> value="Lista de cotejo">Lista de cotejo</option>
                                                            <option <?php echo (isset($evalFormativa) && $evalFormativa=="Guia de evaluacion")?"selected":""; ?> value="Guia de evaluacion">Guía de evaluación</option>
                                                            <option <?php echo (isset($evalFormativa) && $evalFormativa=="Ninguna")?"selected":""; ?> value="Ninguna">Ninguna</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <?php
                                                            $my_sql11 = "SELECT * FROM temas WHERE id_materia_pert=".$idMateria;

                                                            $allTemas = mysqli_query($conn, $my_sql11);

                                                        ?>
                                                        <label for="idTema" class="form-label">Tema al que pertenece:</label>
                                                        <select class="form-select form-select-sm" name="idTema" id="idTema" required>
                                                            <option></option>
                                                            <?php foreach ($allTemas as $tema) { ?>
                                                            <option <?php echo(isset($idTemaPerteneciente) && $idTemaPerteneciente == $tema['id_temas'])?"selected":""; ?> value="<?php echo($tema['id_temas']); ?>"><?php echo($tema['name_tema']); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- ESTE INPUT CONTIENE EL ID DE LA MATERIA QUE SE PUEDE OCUPAR -->
                                            <input hidden name="id_Materia" type="number" min="0" max="100" value="<?php echo(isset($idMateria))?$idMateria:""; ?>"
                                                        class="form-control indicadores" name="ind_f" id="ind_f" required aria-describedby="helpId">
                                            <?php if ($switch_btnAgregar == true) {?>
                                                 <button name="agregarProducto" type="submit" class="btn btn-primary m-1"><i class="fa-solid fa-floppy-disk animateIco"></i> Agregar</button>
                                           <?php } elseif ($switch_btnAgregar == false) {?>
                                                 <button name="actualizarProducto" type="submit" class="btn btn-primary m-1"><i class="fa-solid fa-floppy-disk animateIco"></i> Actualizar</button>
                                           <?php } ?>
                                                
                                                
                                        </form>
                                    </div>
                                <div class="card-footer text-muted"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div id="table" class="col-md-8">
                        <!-- Aquí va el formulario -->
						<div class="">
							<table class="encabezado" style="border-collapse:collapse;margin-left:22.91pt" cellspacing="0">
								<tr style="height:28pt">
									<td style="width:149pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" rowspan="3">
										<p style="text-indent: 0pt;text-align: left;"><br/></p>
										<p style="padding-left: 22pt;text-indent: 0pt;text-align: left;"><span> <img src="Diseño_IDAC/imagenes/logo_intru.png" width="131" height="101" alt="image">
											</span></p>
									</td>
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
                        <center><h3>Tecnológico Nacional de México</h3>                        
                            <b>
                                Subdirección Académica o su equivalente en los Institutos Tecnológicos Descentralizados <br>
                                Instrumentación didáctica para la formación y desarrollo de competencias Profesionales
                            </b>
                            <h3>
                                Periodo:
                                <select name="periodo" style="width: 20%;font-size:13px;padding:0;">
                                            <option value="ENERO/JUN-2023">ENERO/JUNIO-2023</option>
                                            <option value="AGOSTO/ABRIL-2023">AGOSTO/DICIEMBRE-2023</option>
                                            <option value="ENERO/JUNIO-2024">ENERO/JUNIO-2024</option>
                                            <option value="AGOSTO/ABRIL-2024">AGOSTO/DICIEMBRE-2024</option>
                                            <option value="ENERO/JUNIO-2025">ENERO/JUNIO-2025</option>
                                            <option value="AGOSTO/ABRIL-2025">AGOSTO/DICIEMBRE-2025</option>
                                            <option value="ENERO/JUNIO-2026">ENERO/JUNIO-2026</option>
                                            <option value="AGOSTO/ABRIL-2026">AGOSTO/DICIEMBRE-2026</option>
                                            <option value="ENERO/JUNIO-2026">ENERO/JUNIO-2027</option>
                                            <option value="AGOSTO/ABRIL-2026">AGOSTO/DICIEMBRE-2027</option>
                                        </select>
                            </h3>
                            <p>
                                <?php while ($materia = mysqli_fetch_assoc($consultDatosMateria)) {?>
                                    <b>Nombre de la asignatura:</b><?php echo $materia['nombremateria']; ?><br>
                                    <b>Plan de estudios:</b><?php echo $materia['plan_estudio']; ?> <?php echo " ".$materia['carrera']; ?>. <br>
                                    <b>Clave de asignatura:</b><?php echo $materia['clave_asignatura']; ?><br>
                                    <b>Horas teoría: (<?php echo $materia['hrs_teoricas']; ?>) – 
                                    horas prácticas: (<?php echo $materia['hrs_practicas']; ?>) – 
                                    créditos: (<?php echo $materia['creditos']; ?>)</b>
                          
                                
                            </p>
                        </center>
                        <br>
                        <h6><b>1. Caracterización de la asignatura</b></h6>
                        <div style="height: auto;width: 100%;border: solid #000 1px;text-align: justify;padding: 10px;">
                            <?php echo $materia['caract_asignatura']; ?>                        
                        </div><br>
                        <h6><b>2. Intención didáctica</b></h6>
                        <div style="height: auto;width: 100%;border: solid #000 1px;text-align: justify;padding: 10px;">
                            <?php echo $materia['intension_didactica']; ?>
                        </div><br>
                        <h6><b> 3. Competencia de la asignatura</b></h6>
                        <div style="height: auto;width: 100%;border: solid #000 1px;text-align: justify;padding: 10px;">
                            <?php echo $materia['competencia_asign']; ?>
                        </div><br>
                        <?php  } ?>
                        <h6><b>4. Análisis por competencias específicas</b></h6>
                        <div class="table-responsive">
                            <?php
                                    $my_sql4 = "SELECT * FROM temas
                                    INNER JOIN subtemas on temas.id_temas=subtemas.idTema
                                    WHERE temas.id_materia_pert=".$idMateria;                                
                                    $consulTemasSubtemas = mysqli_query($conn, $my_sql4); 
                                    $cont = 1; 
                                    foreach ($consulTemasSubtemas as $temasSubtemas) {?>
                                    <p>
                                        <?php echo "&#9;Competencia: ".$temasSubtemas['compet_del_tema']; ?>
                                    </p>
                                    
                            <table class="table table">
                                <thead>
                                    <tr>
                                        <th scope="col">Temas y subtemas para desarrollar la competencia específica</th>
                                        <th scope="col">Actividades de aprendizaje </th>
                                        <th scope="col">Actividades de enseñanza </th>
                                        <th scope="col">Desarrollo de competencias genéricas </th>
                                        <th scope="col">Horas tericas-practicas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr class="">
                                            <td style="text-align: justify;" scope="row"><b><?php echo "Tema ".$cont.". ".$temasSubtemas['name_tema']; ?></b> <br> <?php echo nl2br($temasSubtemas['subtemas']); ?></td>
                                            <td style="text-align: justify;"><?php echo nl2br($temasSubtemas['activds_aprendizajes']); ?></td>
                                            <td style="text-align: justify;"><?php echo nl2br($temasSubtemas['activds_ensenanzas']); ?></td>
                                            <td style="text-align: justify;"><?php echo nl2br($temasSubtemas['desarr_compet_genericas']); ?></td>
                                            <td><?php echo "T = ".$temasSubtemas['hras_teoricas']; ?> <br> <?php echo "P = ".$temasSubtemas['hras_practicas']; ?></td><br>
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td colspan='5'>
                                                <div style="background-color: none;" class='mi-div'>
                                                
                                                    <br>
                                                    <!-- TEMA: <?php //echo $cont;  ?> - aqui iran las tables_________________________________________________________ -->
                                                    <div>
                                                         <!-- FIN FORM -->
                                                        <table border="1" class="table" id="myTable">
                                                            <thead>
                                                                <tr>
                                                                    <th id="quitaracciones" scope="col"><b>Acciones</b> </th>
                                                                    <th scope="col"><b>Evidencia de aprendizaje</b> </th>
                                                                    <th scope="col"><b>%</b> </th>
                                                                    <th scope="col"><b>A</b> </th>
                                                                    <th scope="col"><b>B</b> </th>
                                                                    <th scope="col"><b>C</b> </th>
                                                                    <th scope="col"><b>D</b> </th>
                                                                    <th scope="col"><b>E</b> </th>
                                                                    <th scope="col"><b>F</b> </th>
                                                                    <th scope="col"><b>Evaluación formativa de la competencia</b> </th>
                                                                    <!-- <th scope="col">Intención didactica</th>
                                                                    <th scope="col">Competencia asignatura</th> -->
                                                                </tr>
                                                            </thead>
                                                            
                                                                <?php
                                                                $my_sql6 = "SELECT * FROM productos WHERE idtema_perteneciente=".$temasSubtemas['id_temas'];                                                            
                                                                $evidenciasAsignatura = mysqli_query($conn, $my_sql6);

                                                                $totalCol_a = 0;
                                                                $totalCol_b = 0;
                                                                $totalCol_c = 0;
                                                                $totalCol_d = 0;
                                                                $totalCol_e = 0;
                                                                $totalCol_f = 0;
                                                                $sumfila =0;
                                                                $sumafilaTotal =0;
                                                                
                                                                    foreach ($evidenciasAsignatura as $producto) {
                                                                    $sumfila += $producto['ind_a']+$producto['ind_b']+$producto['ind_c']+$producto['ind_d']+$producto['ind_e']+$producto['ind_f'];
                                                                    $sumafilaTotal += $producto['ind_a']+$producto['ind_b']+$producto['ind_c']+$producto['ind_d']+$producto['ind_e']+$producto['ind_f'];
                                                                    $totalCol_a += $producto['ind_a'];
                                                                    $totalCol_b += $producto['ind_b'];
                                                                    $totalCol_c += $producto['ind_c'];
                                                                    $totalCol_d += $producto['ind_d'];
                                                                    $totalCol_e += $producto['ind_e'];
                                                                    $totalCol_f += $producto['ind_f'];

                                                                    ?>
                                                                <tr>
                                                                    <td id="quitarbotones">
                                                                        <a href="form_instrumentacion.php?idMateria=<?php echo $idMateria;?>&idProductoUpdate=<?php echo $producto['id_productos']; ?>"><i class="fas fa-solid fa-pen-to-square fa-xl"></i></a> || 
                                                                        <a onclick=" return confirmEliminarProducto()" href="form_instrumentacion.php?idMateria=<?php echo $idMateria;?>&idProductoEliminar=<?php echo $producto['id_productos']; ?>"><i class="fas fa-duotone fa-trash fa-xl"></i></a>
                                                                    </td>
                                                                    <td><?php echo $producto['nombre_producto']; ?></td>
                                                                    <td><p class="cell"><?php echo $sumfila; $sumfila=0;?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_a']; ?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_b']; ?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_c']; ?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_d']; ?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_e']; ?></p></td>
                                                                    <td><p class="cell"><?php echo $producto['ind_f']; ?></p></td>
                                                                    <td><?php echo $producto['evaluacion_formativa']; ?></td>

                                                                </tr>
                                                                <?php

                                                                    } ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Total</td>
                                                                    <td><label class="total-ecidencias"><?php echo $sumafilaTotal; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_a; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_b; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_c; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_d; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_e; ?></label></td>
                                                                    <td><label class="total-ecidencias"><?php echo $totalCol_f; ?></label></td>

                                                                </tr>
                                                        </table>
                                                        <!-- ____________________________________________________________________________________ -->
                                                        <br><br>
                                                        <table border="1" class="table" id="myTable">
                                                            <thead>
                                                                <tr style="text-align: center;">
                                                                    <th scope="col"><b>Indicadores de alcance</b> </th>
                                                                    <th scope="col"><b>Valor del indicador</b> </th>
                                                                 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td style="text-align: justify;">
                                                                        <b>A. Se adapta a situaciones y contextos complejos.</b> <br>
                                                                        El estudiante puede trabajar en equipo, reflejar sus conocimientos en las redes de computadoras utilizando un servidor.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_a; ?></td>                                                                   

                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: justify;">
                                                                        <b>B.  Hace aportaciones a las actividades académicas desarrolladas.</b> <br>
                                                                        Pregunta ligando conocimientos. Presenta otros puntos de vista que complementan al presentado en la clase con respecto a los tipos de servidores. Presenta fuentes de información adicionales, revistas especializadas, manuales, consulta fuentes en un segundo idioma, entre otras.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_b; ?></td> 
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: justify;">
                                                                        <b>C. Propone y/o explica soluciones o procedimientos no vistos en clase.</b> <br>
                                                                        Aplica procedimientos aprendidos en otra asignatura para el para la aplicación de una entrevista y reportes de investigación sobre el tema de servidores.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_c; ?></td>                                                                     
                                                                </tr>
                                                                <tr>
                                                                     <td style="text-align: justify;">
                                                                        <b>D. Introduce recursos y experiencias que promueven un pensamiento crítico.</b> <br>
                                                                        Introduce cuestionamientos de tipo histórico, político, Administrativo, económico que deben tomarse en cuenta para adquirir servidores en el mercado. Se apoya en foros, documentales, o trae ejemplos del tema de servidores.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_d; ?></td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="text-align: justify;">
                                                                        <b>E. Incorpora conocimientos y actividades interdisciplinarias en su aprendizaje.</b> <br>
                                                                        Incorpora conocimiento y actividades desarrollados en otras asignaturas para lograr la competencia de la unidad temática.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_e; ?></td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="text-align: justify;">
                                                                        <b>F. Realiza su trabajo de manera autónoma y autorregulada.</b> <br>
                                                                        Realiza una investigación diaria con el objetivo de participar activamente en las clases y corregir sus dudas para la elaboración de sus actividades a entregar. El estudiante demuestra interés en la clase al participar de manera organizada en la clase.
                                                                    </td>                                                                   
                                                                    <td style="text-align: center;"><?php echo $totalCol_f; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br><br>
                                                        <?php if ($cont == 1) {?>
                                                            <table border="1" class="table" id="myTable">
                                                                <thead>
                                                                    <tr style="text-align: center;">
                                                                        <th scope="col"><b>DESEMPEÑO</b> </th>
                                                                        <th scope="col"><b>NIVEL DE DESEMPEÑO</b> </th>
                                                                        <th scope="col"><b>INDICADORES DE ALCANCE</b> </th>
                                                                        <th scope="col"><b>VALORACÓN NÚMERICA</b> </th>
                                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                    <tr>                                                                   
                                                                        <td rowspan="4" style="text-align: center;">Competencia alcanzada</td>                                                                  
                                                                        <td style="text-align: center;">Excelente</td>                                                                   
                                                                        <td style="text-align: center;">Cumple con al menos cinco de los indicadores definidos en el desempeño excelente</td>                                                                   
                                                                        <td style="text-align: center;">95-100</td>                                                                   

                                                                    </tr>
                                                                    <tr>
                                                                        <!-- <td style="text-align: center;"></td>                                                                   -->
                                                                        <td style="text-align: center;">Notable</td>                                                                   
                                                                        <td style="text-align: center;">Cumple con al menos cuatro de los indicadores definidos en el desempeño excelente</td>                                                                   
                                                                        <td style="text-align: center;">85-94</td> 
                                                                    </tr>
                                                                    <tr>
                                                                        <!-- <td style="text-align: center;"></td>                                                                   -->
                                                                        <td style="text-align: center;">Bueno</td>                                                                   
                                                                        <td style="text-align: center;">Cumple con al menos tres de los indicadores definidos en el desempeño excelente</td>                                                                   
                                                                        <td style="text-align: center;">75-84</td>                                                                     
                                                                    </tr>
                                                                    <tr>
                                                                        <!-- <td style="text-align: center;"></td>                                                                   -->
                                                                        <td style="text-align: center;">Suficiente</td>                                                                   
                                                                        <td style="text-align: center;">Cumple con al menos dos de los indicadores definidos en el desempeño excelente</td>                                                                   
                                                                        <td style="text-align: center;">70-74</td> 
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center;">Competencia no alcanzada</td>                                                                  
                                                                        <td style="text-align: center;">Insuficiente</td>                                                                   
                                                                        <td style="text-align: center;">No se cumple con el 100% de evidencias conceptuales, procedimentales y actitudinales de los indicadores definidos en el desempeño docente</td>                                                                   
                                                                        <td style="text-align: center;">NA (No alcanzada)</td> 
                                                                    </tr>
                                                                
                                                                </tbody>
                                                            </table>                                                          
                                                        <?php } ?>
                                                        

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                    
                                </tbody>
                                
                            </table>
                            <?php 
                                 $cont++;
                                } ?>
                        </div><br>
                        <h6><b>5. Fuentes de información y apoyos didácticos</b></h6>
                        <div style="height: auto;width: 100%;border: solid #000 1px;">
                            <?php 
                             $my_sql7 = "SELECT fuentes_informacion FROM cat_temario WHERE id_Materia=".$idMateria;                                
                             $fuentesInfos = mysqli_query($conn, $my_sql7);
                             foreach ($fuentesInfos as $fuenteinf) {
                                 echo $fuenteinf['fuentes_informacion'];
                             }
                            ?>                        
                        </div><br>
                        <h6><b>6. Calendarización de evaluación en semanas (6):</b></h6>
                        <div>
                            <table border="1" class="table" id="myTable">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col"><b>Semana</b> </th>
                                        <th scope="col"><b>1</b> </th>
                                        <th scope="col"><b>2</b> </th>
                                        <th scope="col"><b>3</b> </th>
                                        <th scope="col"><b>4</b> </th>
                                        <th scope="col"><b>5</b> </th>
                                        <th scope="col"><b>6</b> </th>
                                        <th scope="col"><b>7</b> </th>
                                        <th scope="col"><b>8</b> </th>
                                        <th scope="col"><b>9</b> </th>
                                        <th scope="col"><b>10</b> </th>
                                        <th scope="col"><b>11</b> </th>
                                        <th scope="col"><b>12</b> </th>
                                        <th scope="col"><b>13</b> </th>
                                        <th scope="col"><b>14</b> </th>
                                        <th scope="col"><b>15</b> </th>
                                        <th scope="col"><b>16</b> </th>
                                        <th scope="col"><b>17</b> </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>TP</td>
                                        <td>ED,EF1</td>
                                        <td>EF1</td>
                                        <td>EF2</td>
                                        <td>EF2</td>
                                        <td>EF2</td>
                                        <td>EF3</td>
                                        <td>EF3</td>
                                        <td>EF3</td>
                                        <td>EF3</td>
                                        <td>EF4</td>
                                        <td>EF4</td>
                                        <td>EF4</td>
                                        <td>EF4</td>
                                        <td>EF5</td>
                                        <td>EF5</td>
                                        <td>EF5</td>
                                        <td>EF5</td>
                             
                                    </tr>
                                    <tr>
                                        <td>TR</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                             
                                    </tr>
                                    <tr>
                                        <td>SD </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>SD1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>SD2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>SD1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-3"><b>TP = </b>tiempo planeado <br><b>TR = </b>tiempo real</div>
                                <div class="col-md-3"><b>SD = </b>seguimiento departamental <br> <b>ED = </b>evaluación diagnóstica</div>
                                <div class="col-md-5"><b>EFn = </b>evaluación formativa (competencia específica n)<br><b>ES = </b>evaluación sumativa</div>
                            </div>
                            <br>   
                            <br>
                            <p style="text-align: right;">
                            <?php 
                             $mDateActual = (new DateTime('now', new DateTimeZone('America/Mexico_City')));
                             echo "Fecha de elaboración: ".$mDateActual->format('d \d\e F \d\e Y');
                            ?></p>
                            <div class="row">
                                <div style="text-align: center;" class="col-md-6">
                                    <?php echo strtoupper($_SESSION['fullNameUSer']); ?><br>
                                    _____________________________________ <br>
                                    Nombre y firma del profesor
                                </div>
                                <div style="text-align: center;" class="col-md-6">
                                    ENRIQUE GARIBO HERNANDEZ<br>
                                    _____________________________________ <br>
                                    Nombre y firma del Subdirector académico
                                </div>
                            </div>
                        </div><br>
                        
                        
                       
                        <!-- <style>
                        table {
                        width: 100%;
                        max-width: 100%;
                        border-collapse: collapse;
                        }
                        thead {
                        background-color:rgb(214, 214, 214);
                        }
                        select {
                        width: 70%;
                        height: 40px;
                        border-radius: 3px;
                        border: 1px solid #ccc;
                        padding: 6px 10px;
                        font-size: 16px;
                        color: #555;
                        background-color: white;
                        }
                        .xelcolor{
                            color: black;
                        }
                        textarea {
                        width: 100%;
                        height: 80px;
                        padding: 10px;
                        font-size: 16px;
                        border-radius: 5px;
                        border: 1px solid #ccc;
                        }
                        </style>
                                                

                                        
                                                <table>
                                                    <tbody>     
                                                        <tr>
                                                            <td><button>Guardar</button></td>
                                                        </tr>
                                                    </tbody>
                                                
                            <form>
                                <label for="unidades"  class ="xelcolor">Ingrese la cantidad de unidades: </label>
                                <input type="number" id="unidades" name="unidades" min="1" max="10">
                                
                                <button type="button" onclick="crearTabla()">Crear</button>

                                <div id="tablaEvidencias"></div>

                                <br><br>	
                            </form>
                        </table> -->
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">        
        function antesDeimprimir() {
            $('#container_header').hide();
			$('#quitaracciones, #quitarbotones').hide();
            $('.colum_ocultar #button').hide();
            $('#table').removeClass('col-md-8').addClass('col-md-12');
        }
        function despuesDeImprimir() {
            $('#container_header').show();
			$('#quitaracciones,#quitarbotones').show();
            $('.colum_ocultar #button').show();
            $('#table').removeClass('col-md-12').addClass('col-md-8');
        }
        
    </script>
</body>


</html>
