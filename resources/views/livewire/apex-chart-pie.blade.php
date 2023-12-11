<div style="width: 100%;">
    <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">{{ $label }} ({{ date('Y') }})</h3>
          <div id="chart-demo-pie-{{ $chartId }}"></div>
        </div>
    </div>
    
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie-{{ $chartId }}'), {
            chart: {
            type: "donut",
            fontFamily: 'inherit',
            height: 240,
            sparkline: {
                enabled: true
            },
            animations: {
                enabled: false
            },
            },
            fill: {
            opacity: 1,
            },
            series: @json($chartDataCountPerLabel),
            labels: @json($chartLabels),
            tooltip: {
            theme: 'dark'
            },
            grid: {
            strokeDashArray: 4,
            },
            colors: @json($chartColors),
            legend: {
            show: true,
            position: 'bottom',
            offsetY: 12,
            markers: {
                width: 10,
                height: 10,
                radius: 100,
            },
            itemMargin: {
                horizontal: 8,
                vertical: 8
            },
            },
            tooltip: {
            fillSeriesColor: false
            },
        })).render();
        });
        // @formatter:on
    </script>
</div>
