
$(function () {


  // grafica
   google.charts.load("current", { packages: ["corechart"] });
   // toma el metodo de la para dibujar las grafica
  google.charts.setOnLoadCallback(graficarTortaEmpleadoConCitas);
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(graficarEmpleadosBarras);

    // Responsive
   $(window).resize(function(){
    graficarTortaEmpleadoConCitas();
    graficarEmpleadosBarras();
  });
});



function graficarTortaEmpleadoConCitas() {
    let parametros = {
      accion: "graficas",
      tipoGrafica: "reporteEmpleados"
    };
  
     $.ajax({
      url: "../../../controlador/reporteControl.php",
      data: parametros,
      type: "post",
      dataType: "json",  
      success: function (data) {
        console.log(data);
        // data = JSON.parse(data);
        var data = google.visualization.arrayToDataTable(data);
        var options = {
          title: "Total de empleados con cita asignadas",
          backgroundColor: 'transparent',
          legend: {
            alignment: 'center',
            position: 'left'
          },
          // is3D:true,
          pieHole: 0.4,
        };
        // para cambiar solo indicar el tipo de diagreama que desea , en este caso es pieChart(torta)
        let chart = new google.visualization.PieChart(
          document.getElementById("graficaEmpleado")
        );
  
        chart.draw(data, options);
      },
      error: function (ex) {
        console.log(ex.responseText);
      },
    });
  
    
  };


  function graficarEmpleadosBarras() {
    let parametros = {
      accion: "graficas",
      tipoGrafica: "reporteEmpleados"
    };
  
     $.ajax({
      url: "../../../controlador/reporteControl.php",
      data: parametros,
      type: "post",
      dataType: "json",  
      success: function (data) {
        console.log(data);
        var data = google.visualization.arrayToDataTable(data);
        var options = {
          backgroundColor: 'transparent',
          title: "Empleados con cita asignadas",
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("graficaBarraEmpleado"));
        chart.draw(data, options);
      },
      error: function (ex) {
        console.log(ex.responseText);
      },
    });

   
    
}