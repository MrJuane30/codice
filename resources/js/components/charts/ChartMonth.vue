<template>
    <div class="col-md-5">
        <h4 class="text-center">Cantidad de usuarios por mes</h4>
        <div id="chart">
            <apexchart apexchart width="100%" type="bar" :options="options" :series="series"></apexchart>
      </div>
    </div>
</template>

<script>

export default {
   
         data: function() {
    return {
      options: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
        }
      },
      series: [{
        name: 'Número de registros',
        data: [30, 40, 45, 50, 49, 60, 70, 91, 50, 40, 12, 30]
      }]
    }
  }
}
</script>