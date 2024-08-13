<?php headerAdmin($data); ?>
<main class="app-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Copia de Seguridad</h3>
                        <p class="card-text text-center">Respalde su base de datos</p>
                        <div class="text-center">
                            <a href="http:///BRM-master/php/Backup.php" class="btn btn-success">Generar Backup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body" style="height: 100vh;">
                        <h3 class="card-title text-center">Archivos de Respaldos</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre de Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Directorio donde se almacenan los archivos de respaldo
                                //$backup_dir = "C:/xampp/htdocs/TraexAdmin/BRM-master/backups/";  
                                $backup_dir = "C:/Users/garci/Documents/proyect github/TraexAdmin/BRM-master/backups/";

                                // Obtener la lista de archivos de respaldo en el directorio
                                $backups = scandir($backup_dir);

                                // Mostrar la lista de archivos de respaldo
                                foreach ($backups as $backup) {
                                    if ($backup != "." && $backup != "..") {
                                        echo "<tr><td>$backup</td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>



