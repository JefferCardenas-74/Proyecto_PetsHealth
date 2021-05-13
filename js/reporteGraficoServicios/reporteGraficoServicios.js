var fechaEscogida=null;

$(function () {
  cargarFecha();
  // grafica
  google.charts.load("current", { packages: ["bar"] });
  google.charts.setOnLoadCallback(graficarServicios);
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(graficarTortaServicioPorMes);
  // Responsive
  $(window).resize(function () {
    graficarServicios();
    graficarTortaServicioPorMes();
  });
});

function graficarServicios() {
  let parametros = {
    accion: "graficas",
    tipoGrafica: "reporteCantidadTotalDineroTipoServicios",
    fecha:fechaEscogida
  };

  $.ajax({
    url: "../../../controlador/reporteControl.php",
    data: parametros,
    type: "post",
    dataType: "json",
    success: function (data) {
      var datax = google.visualization.arrayToDataTable(data);
      var options = {
        chart: {
          title: "Dinero total recaudado ",
          subtitle: "Dinero recaudado dependiendo por tipo de servicio por mes",
        },
        titleTextStyle: {
          fontName: "Pompiere",
          fontSize: 30,
          bold: true,
          color: "var(--colorParrafo)",
        },
        legend: {
          alignment: "center",
          position: "top",
        },
      };
      var chart = new google.charts.Bar(
        document.getElementById("graficaTotalDineroServicio")
      );
      chart.draw(datax, google.charts.Bar.convertOptions(options));

      //Cambiar el color del subtitulo
      google.visualization.events.addListener(chart, "ready", function () {
        var labels = document.getElementsByTagName("text");
        for (var i = 0; i < labels.length; i++) {
          if (labels[i].innerHTML === options.chart.subtitle) {
            labels[i].style.fill = "var(--colorParrafo)";
            labels[i].style.fontFamily = "var(--fuenteParrafos)";
            labels[i].style.fontSize = "20";
            break;
          }
        }
      });
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

function graficarTortaServicioPorMes() {
  let parametros = {
    accion: "graficas",
    tipoGrafica: "reporteCantidadTipoServicios",
    fecha:fechaEscogida,
  };

  $.ajax({
    url: "../../../controlador/reporteControl.php",
    data: parametros,
    type: "post",
    dataType: "json",
    success: function (data) {
      let noResultados = Object.keys(data).length == 1;
      var data = google.visualization.arrayToDataTable(data);
      var options = {
        title: "cantidad  de tipos de servicios atendidos por mes",
        titleTextStyle: {
          color:"var(--colorParrafo)",
          fontName:"Pompiere",
          fontSize:30
      },
        backgroundColor: "transparent",
        legend: {
          alignment: "center",
          position: "left",
        },
        is3D: true,
        tooltip: {isHtml: true},
      };

       // Si no hay datos
       if (noResultados) {
        data = new google.visualization.DataTable();
        data.addColumn({ type: "string", label: "Result" });
        data.addColumn({ type: "number", label: "Count" });
        data.addRows([
          ["No se encontraron servicios solicitados para este mes o año", 0],
          ["No se encontraron servicios solicitados para este mes o año", 0],
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
          document.getElementById("graficaCantidadServicio")
        );
        error.draw(data, {
          sliceVisibilityThreshold: 0,
          pieSliceText: opt_pieslicetext,
          tooltip: { trigger: opt_tooltip_trigger },
          colors: opt_color,
        });
      }
      let chart = new google.visualization.PieChart(
        document.getElementById("graficaCantidadServicio")
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
    fechaEscogida = datepicker.getDate("yyyy-mm-dd");
     // obtener el cambio de fecha
     element.addEventListener(
      "changeDate",
      function (e) {
          fechaEscogida = datepicker.getDate("yyyy-mm-dd");
          if($("#txt_fecha").val()!=""){
            google.charts.setOnLoadCallback(graficarTortaServicioPorMes);
            google.charts.setOnLoadCallback(graficarServicios);
          }else{
            google.charts.setOnLoadCallback(graficarTortaServicioPorMes);
            google.charts.setOnLoadCallback(graficarServicios);
          }
          
      },
      false
  );
}