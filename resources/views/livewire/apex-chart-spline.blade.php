<div style="width: 100%; height: 100%">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">{{ $label }}</h3>
          <div id="chart-area-spline-stacked-{{ $chartId }}"></div>
        </div>
    </div>

    {{-- Gráfico de Solicitações VS Propostas --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-area-spline-stacked-{{ $chartId }}'), {
            chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
            animations: {
                enabled: false
            },
            stacked: true,
            },
            dataLabels: {
            enabled: false,
            },
            fill: {
            opacity: .16,
            type: 'solid'
            },
            stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
            },
            series: [{
            name: "{{ $chartCategory1Label }}",
            data: @json($chartDataCountPerYearCategory1)
            },{
            name: "{{ $chartCategory2Label }}",
            data: @json($chartDataCountPerYearCategory2)
            }],
            tooltip: {
            theme: 'dark'
            },
            grid: {
            padding: {
                top: -20,
                right: 0,
                left: -4,
                bottom: -4
            },
            strokeDashArray: 4,
            },
            xaxis: {
            labels: {
                padding: 0,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            categories: @json($chartMonths),
            },
            yaxis: {
            labels: {
                padding: 4
            },
            },
            colors: @json($chartColors),
            legend: {
            show: false,
            },
        })).render();
        });
        // @formatter:on
    </script>
</div>
