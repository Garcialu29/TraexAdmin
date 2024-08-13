<?php headerAdmin($data); ?>

<main class="app-content">
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="doughnutChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="radarChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="polarChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="doughnutChartDemo3D"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>



<!-- Incluye la librería Chart.js -->
<script src="https://www.chartjs.org/dist/Chart.min.js"></script>
<script type="text/javascript">
    // Obtener los datos de los gráficos proporcionados por el controlador y el modelo
    var dataLineChart = <?php echo json_encode($data['paquetesPorMes']); ?>;
    var dataDoughnutChart = <?php echo json_encode($data['paquetesPorEstado']); ?>;
    var dataRadarChart = <?php echo json_encode($data['paquetesPorTipoPago']); ?>;
    var dataPolarChart = <?php echo json_encode($data['paquetesPorSeguro']); ?>;
    var dataPieChart = <?php echo json_encode($data['paquetesPorTipoEnvio']); ?>;
    var dataBarChart = <?php echo json_encode($data['paquetesPorTipoPago']); ?>;


    // Configurar los datos y opciones de cada gráfico
var barChartData = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'], // Etiquetas de los meses
    datasets: [{
        label: 'Paquetes por mes',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        data: dataLineChart // Datos de paquetes por mes
    }]
};

var ctxBarChart = document.getElementById('lineChartDemo').getContext('2d');
var barChart = new Chart(ctxBarChart, {
    type: 'bar', // Cambia el tipo de gráfico a 'bar' para un histograma
    data: barChartData,
    options: {
        // Configuraciones adicionales del gráfico de histograma
    }
});



var pieChartData = {
    labels: dataDoughnutChart.map(item => item.Estado),
    datasets: [{
        label: 'Estado de paquete',
        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
        borderWidth: 1,
        data: dataDoughnutChart.map(item => item.TotalPaquetes)
    }]
};

// Configurar el gráfico de pastel
var ctxPieChart = document.getElementById('radarChartDemo').getContext('2d');
var pieChart = new Chart(ctxPieChart, {
    type: 'doughnut',
    data: pieChartData,
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'left',
                align: 'start',
                labels: {
                    padding: 20,
                    boxWidth: 10 // Ancho de la caja de color de la leyenda
                }
            }
        }
    }
});




var doughnutChartData = {
    labels: dataRadarChart.map(item => item.TipoPago),
    datasets: [{
        label: 'Paquetes por tipo de pago',
        backgroundColors: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
        borderColors: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
        borderWidth: 1,
        data: dataRadarChart.map(item => item.TotalPaquetes)
    }]
};

// Configurar el gráfico de anillo
var ctxDoughnutChart = document.getElementById('polarChartDemo').getContext('2d');
var doughnutChart = new Chart(ctxDoughnutChart, {
    type: 'doughnut',
    data: doughnutChartData,
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'left',
                align: 'start',
                labels: {
                    padding: 20,
                    boxWidth: 10 // Ancho de la caja de color de la leyenda
                }
            }
        }
    }
});



var barChartData = {
    labels: dataPolarChart.map(item => item.Seguro),
    datasets: [{
        label: 'Paquetes por seguro',
        backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        data: dataPolarChart.map(item => item.TotalPaquetes)
    }]
};

// Encontrar el valor máximo y mínimo del conjunto de datos
var min = Math.min.apply(null, barChartData.datasets[0].data);
var max = Math.max.apply(null, barChartData.datasets[0].data);

// Configurar el gráfico de barras
var ctxBarChart = document.getElementById('doughnutChartDemo').getContext('2d');
var barChart = new Chart(ctxBarChart, {
    type: 'bar',
    data: barChartData,
    options: {
    }
});


var doughnutChartData3D = {
    labels: dataPieChart.map(item => item.TipoEnvio),
    datasets: [{
        label: 'Paquetes por tipo de envío',
        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
        borderWidth: 1,
        data: dataPieChart.map(item => item.TotalPaquetes)
    }]
};

var ctxDoughnutChart3D = document.getElementById('doughnutChartDemo3D').getContext('2d');
var doughnutChart3D = new Chart(ctxDoughnutChart3D, {
    type: 'doughnut',
    data: doughnutChartData3D,
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'right',
                align: 'start',
                labels: {
                    padding: 20,
                    boxWidth: 10 // Ancho de la caja de color de la leyenda
                }
            }
        }
    }
});




</script>


<?php footerAdmin($data); ?>