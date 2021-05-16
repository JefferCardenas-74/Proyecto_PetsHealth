var fechaInicial=null;
var fechaFinal=null;

$(function () {

  cargarFechaInicial();
  cargarFechaFinal();
  // grafica
  google.charts.load("current", { packages: ["corechart"] });
 
  // Responsive
  $(window).resize(function () {
    graficarTortaCitasAtendidasPorMi();
  });
  
});

function graficarTortaCitasAtendidasPorMi() {
  let parametros = {
    accion: "graficas",
    tipoGrafica: "reporteCitaAtendidaPorVeterinario",
    fechaInicial:fechaInicial,
    fechaFinal:fechaFinal
  };

  $.ajax({
    url: "../../../controlador/reporteControl.php",
    data: parametros,
    type: "post",
    dataType: "json",
    success: function (data) {
      let noResultados = Object.keys(data).length == 1;
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
      // Si no hay datos
      if (noResultados) {
        data = new google.visualization.DataTable();
        data.addColumn({ type: "string", label: "Result" });
        data.addColumn({ type: "number", label: "Count" });
        data.addRows([
          ["No  haz atendido citas entre los meses seleccionados.", 0],
          ["No  haz atendido citas entre los meses seleccionados.", 0],
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

/**
 * CARGAR FECHAS CON DATAPICKER
 */

function cargarFechaInicial() {
  let element1 = document.getElementById("txt_fechaInicial");
  datepicker1 = new Datepicker(element1, {
      language: "es",
      buttonClass: "btn",
      format: "yyyy-mm-dd",
      // orientacion
      orientation: "bottom",
  });

  // fecha dos
  element1.addEventListener(
    "changeDate",
    function (e) {
        fechaInicial = datepicker1.getDate("yyyy-mm-dd");
        // let arraInicial=fechaInicial.split('-');
        // let arraFinal=fechaFinal.split('-');

        
        if(fechaFinal!=null && fechaFinal!=undefined){
          
          google.charts.setOnLoadCallback(graficarTortaCitasAtendidasPorMi);
        }
     
    },
    false
);
}

function cargarFechaFinal() {
    // datepicker de fecha
    let element2 = document.getElementById("txt_fechaFinal");
    datepicker2 = new Datepicker(element2, {
        language: "es",
        buttonClass: "btn",
        format: "yyyy-mm-dd",
        // orientacion
        orientation: "bottom",
    });
     // obtener el cambio de fecha
     element2.addEventListener(
      "changeDate",
      function (x) {
          fechaFinal = datepicker2.getDate("yyyy-mm-dd");
          console.log("Inicial "+fechaInicial + " final "+fechaFinal);
          
          if(fechaInicial!=null && fechaInicial!=undefined){
            google.charts.setOnLoadCallback(graficarTortaCitasAtendidasPorMi);
          }
        
      },
      false
  );
  return fechaFinal;
}