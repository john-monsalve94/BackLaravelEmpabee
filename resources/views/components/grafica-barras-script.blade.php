@php
    $route_url = route('producciones_web', ['siembra_id' => $siembra->id ?? null]);
@endphp
<script defer>
    alert('{{ $siembra->id }}');
    $(document).ready(() => {
        let url = "{{ $route_url }}";
        url = url.replace(/&amp;/g, '&');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                console.log(response);
                let data = response.map((produccion) => {
                    let {
                        mes,
                        anio,
                        suma_miel
                    } = produccion;

                    // Construye la etiqueta para la barra (por ejemplo, "Abril 2024")
                    let etiqueta = `${mes}-${anio}`;

                    return {
                        etiqueta: etiqueta,
                        valor: suma_miel
                    };
                });

                let etiquetas = data.map(produccion => produccion.etiqueta);
                let valores = data.map(produccion => produccion.valor);

                let ctx = document.getElementById('{{ $idGrafico }}').getContext('2d');

                let myChart = new Chart(ctx, {
                    type: 'bar', // Cambia el tipo de gráfica a barras
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: 'Producción de miel(Litros)',
                            data: valores,
                            backgroundColor: '#F7A733', // Color de las barras
                            borderWidth: 1 // Grosor del borde de las barras
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                stacked: true // Ajusta según tus necesidades
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
