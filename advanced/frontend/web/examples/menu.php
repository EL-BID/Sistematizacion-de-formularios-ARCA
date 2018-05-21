<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='1'){
?>
<!--componente Javascript 1-->
<!--li><a href="instalaciones.php">Instalaciones Previas</a></li-->
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="autocomplete.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Autocomplete</a></li>
<li><a href="creacion.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Formularios</a></li>
<li><a href="tablas.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Tablas</a></li>
<li><a href="validadores.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Validadores</a></li>
<li><a href="mvertical.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Menu Vertical</a></li>
<li><a href="mhorizontal.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Menu Horizontal</a></li>
<li><a href="pbar.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Progress Bar</a></li>
<li><a href="graficas.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Graficas PIE/BAR/LINE</a></li>
<li><a href="tooltip.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Tooltip</a></li>
<li><a href="editor.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Editor de Texto Enriquecido</a></li>
<li><a href="modal.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Formularios Ventanas Emergentes</a></li>


<?php
}else{
?>
<?php
}
?>
<!--componente Javascript 2-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='2'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="tabs.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">TabIndex</a></li>
<li><a href="dropdown.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Combobox Base de Datos</a></li>
<li><a href="dropdownmultipleBD.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Combobox Base de Datos Multiple</a></li>
<li><a href="fileupload.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Subir Archivo (1 solo archivo)</a></li>
<li><a href="fileuploadmultiple.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Subir Multiples Archivos (n archivos)</a></li>
<li><a href="multiplesinsert.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Insertar registro en multiples tablas / multiples registros</a></li>

<?php
}else{
?>
<?php
}
?>
<!--Trazabilidad-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='3'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="trazabilidad.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Trazabilidad</a></li>
<?php
}else{
?>
<?php
}
?>
<!--Formularios dinámicos POC-->
<!--POC-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='5'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="aplicacionbeta.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Aplicación Beta</a></li>
<li><a href="aplicacionbeta2.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Aplicación Beta con Fachada</a></li>
<li><a href="dashboard.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Dashboard</a></li>
<li><a href="detcapitulo.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Detalle Capitulo</a></li>
<li><a href="detformato.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Detalle Formato</a></li>
<li><a href="listcapitulos.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Listado Capitulo</a></li>
<li><a href="formatoHTML.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Formato HTML</a></li>
<?php
}else{
?>
<?php
}
?>
<!--Reportes-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='6'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="documentosPDF.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generar PDF</a></li>
<li><a href="documentosExcel.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generar Excel </a></li>
<li><a href="documentosWordphpword.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generar Word phpWord </a></li>
<li><a href="documentosWord.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generar Word vsword</a></li>
<?php
}else{
?>
<?php
}
?>
<!--Generador Gii-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='4'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="generadores.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Configuración Nuevo</a></li>
<li><a href="crud.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generador Gii CrudArca</a></li>
<li><a href="model.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Generador Gii Model</a></li>

<?php
}else{
?>
<?php
}
?>

<!--Pruebas-->
<?php
if(!empty($_GET['pagina']) and $_GET['pagina']=='7'){
?>
<button type="submit" ><a href="../manual.php">Menú Inicio</a></button> <br/>
<li><a href="test.php?pagina=<?= !empty($_GET['pagina'])? $_GET['pagina']:''; ?>">Test Unit</a></li>
<?php
}else{
?>
<?php
}
?>