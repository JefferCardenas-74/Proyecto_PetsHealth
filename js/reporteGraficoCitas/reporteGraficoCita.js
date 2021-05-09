var fechaEscogida=null;

$(function () {
  // grafica
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(graficarTortaCitasPorMes);
  cargarFecha();
  // Responsive
  $(window).resize(function () {
    graficarTortaCitasPorMes();
    graficarTortaCitasPorMesSeleccionado(fechaEscogida);
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
        is3D: true,
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

function graficarTortaCitasPorMesSeleccionado() {
  let parametros = {
    accion: "graficas",
    tipoGrafica: "reporteCitaPorMesSeleccionado",
    fecha: fechaEscogida,
  };

  $.ajax({
    url: "../../../controlador/reporteControl.php",
    data: parametros,
    type: "post",
    dataType: "json",
    success: function (data) {
      let noResultados = Object.keys(data).length == 1; //obtener la cantidad del arreglo
      var data = google.visualization.arrayToDataTable(data);
      var options = {
        is3D: true,
        backgroundColor: "transparent",
        legend: {
          alignment: "center",
          position: "top",
        },
      };
      // Si no hay datos
      if (noResultados) {
        data = new google.visualization.DataTable();
        data.addColumn({ type: "string", label: "Result" });
        data.addColumn({ type: "number", label: "Count" });
        data.addRows([
          ["No se encontraron citas para este mes o año", 0],
          ["No se encontraron citas para este mes o año", 0],
        ]);

        var opt_pieslicetext = null;
        var opt_tooltip_trigger = null;
        var opt_color = null;
        if (data.getValue(1, 1) == 0 && data.getValue(0, 1) == 0) {
          opt_pieslicetext = "none";
          opt_tooltip_trigger = "none";
          data.setCell(1, 1, 0.1);
          opt_color = ["#02A46"];
        }
        error = new google.visualization.PieChart(
          document.getElementById("graficaCitas")
        );
        error.draw(data, {
          sliceVisibilityThreshold: 0,
          pieSliceText: opt_pieslicetext,
          tooltip: { trigger: opt_tooltip_trigger },
          colors: opt_color,
        });
      }
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

function cargarFecha() {
  // datepicker de fecha
  var element = document.getElementById("txt_fecha");
    datepicker = new Datepicker(element, {
        language: "es",
        buttonClass: "btn",
        format: "yyyy-mm-dd",
        // orientacion
        orientation: "bottom",
    });
     // obtener el cambio de fecha
     element.addEventListener(
      "changeDate",
      function (e) {
          fechaEscogida = datepicker.getDate("yyyy-mm-dd");
          if($("#txt_fecha").val()!=""){
            google.charts.setOnLoadCallback(graficarTortaCitasPorMesSeleccionado);
          }else{
            google.charts.setOnLoadCallback(graficarTortaCitasPorMes);
          }
          
      },
      false
  );
}