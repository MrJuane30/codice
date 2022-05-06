<template>

    <div class="col-md-5">
        <h4 class="text-left">Cantidad de usuario por sexo</h4>
        <apexchart width="100%" type="donut" :options="options" :series="options.series"></apexchart>
    </div>
</template>

<script>
export default {
  data: function() {
    return {
      options: {
        series: [44, 55],
        labels: ['Masculino', 'Femenino']
      },
    }
  }
}
</script>