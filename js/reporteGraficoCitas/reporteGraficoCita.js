$(function () {
  // grafica
  google.charts.load("current", { packages: ["corechart"] });
  // toma el metodo de la para dibujar las grafica
  google.charts.setOnLoadCallback(graficarTortaCitasPorMes);
  // Responsive
  $(window).resize(function () {
    graficarTortaCitasPorMes();
  });
});

function graficarTortaCitasPorMes() {
  let parametros = {
    accion: "graficas",
    tipoGrafica: "reporteCitaPorMes",
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
        backgroundColor: "transparent",
        legend: {
          alignment: "center",
          position: "top",
        },
        // width :500,
        // height:500
      };
      // para cambiar solo indicar el tipo de diagreama que desea , en este caso es pieChart(torta)
      let chart = new google.visualization.PieChart(
        document.getElementById("graficaCitas")
      );

      chart.draw(data, options);
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

