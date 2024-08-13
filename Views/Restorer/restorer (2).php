<?php
headerAdmin($data);
?>
<body data-ng-app="validationApp">
	<div class="container" data-ng-controller="RegistrationController">
		<data-uib-tabset data-active="activeJustified" data-justified="true">
			<data-uib-tab data-heading="BACKUP" data-index="0">
				<br />
				<center>
					<div class="main">
						<header class="page-header">
							<div class="branding">
								<br>
								<form action="<?php echo base_url() ?>/BRM-master/php/Restore.php" method="POST">
									<h1> <p><center>  </center></p></h1>
									<h1> <p><center>  </center></p></h1>
									<h1> 
										<center>Restaurar la base de datos</center>
									</h1>
									<select name="restorePoint">
										<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
										<?php
										$ruta = "C:/xampp/htdocs/admintraex/BRM-master/backups/";
										if (is_dir($ruta)) {
											if ($aux = opendir($ruta)) {
												while (($archivo = readdir($aux)) !== false) {
													if ($archivo != "." && $archivo != "..") {
														$nombrearchivo = str_replace(".sql", "", $archivo);
														$nombrearchivo = str_replace("-", ":", $nombrearchivo);
														$ruta_completa = $ruta . $archivo;
														if (is_dir($ruta_completa)) {
														} else {
															echo '<option value="' . $ruta_completa . '">' . $nombrearchivo . '</option>';
														}
													}
												}
												closedir($aux);
											}
										} else {
											echo $ruta . " No es una ruta válida";
										}
										?>
									</select>
									<center><button type="submit" class="restaurar-button">Restaurar</button></center>
								</form>
							</div>
						</header>
					</div>
				</center>
			</data-uib-tab>
		</data-uib-tabset>
	</div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
<?php footerAdmin($data); ?>
