@php
    $route_url = route('medidas_web', ['tipo' => $tipo]);

    if (isset($colmena)) {
        $colmena_id = (int) $colmena->id;
        $route_url .= '&colmena_id=' . $colmena_id;
    }
    $route_url = str_replace('&amp;', '&', $route_url);
@endphp
<script defer>
    $(document).ready(() => {
        let url = "{{ $route_url }}";
        url = url.replace(/&amp;/g, '&');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                let data = response.map((medida) => {
                    let {
                        valor,
                        created_at: fecha
                    } = medida;
                    let {
                        simbolo_medida
                    } = medida.sensor.tipo_sensor

                    fecha = new Date(fecha);
                    const dia = ('0' + fecha.getDate()).slice(-2);
                    const mes = ('0' + (fecha.getMonth() + 1)).slice(-2);
                    const anio = fecha.getFullYear().toString().slice(-2);
                    const hora = ('0' + fecha.getHours()).slice(-2);
                    const minuto = ('0' + fecha.getMinutes()).slice(-2);

                    fecha = `${dia}-${mes}-${anio}`;
                    let hora_medida = `${hora}:${minuto}`;
                    return {
                        valor: valor,
                        simbolo: simbolo_medida,
                        fecha: fecha,
                        hora: hora_medida
                    };
                });

                let valores = data.map(medida => medida.valor);
                let etiquetas = data.map(medida => medida.hora);

                let ctx = document.getElementById('{{ $idGrafico }}').getContext('2d');

                let myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: data[0].simbolo,
                            data: valores,
                            borderColor: '#F7A733',
                            backgroundColor: '#F7A733',
                            pointBackgroundColor: '#FDEBC8',
                            pointHoverBackgroundColor: 'F7A733',
                            borderJoinStyle: 'round',
                            borderCapStyle: 'round',
                            borderWidth: 3,
                            // pointHitRadius:50
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                stacked: true
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>
