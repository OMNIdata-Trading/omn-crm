<div>
    <div class="position-relative">
        <div class="position-relative top-0 left-0 px-3 mt-1 w-75">
            <div class="row g-2">
              <div class="col-auto">
                <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
              </div>
              <div class="col">
                <div>Enviadas hoje: {{ $sentToday }}</div>
                <div class="text-muted"><!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                    @if ($percentageStatus == 'increased')
                    <span class="text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M3 17l6 -6l4 4l8 -8" />
                          <path d="M14 7l7 0l0 7" />
                        </svg>
                    </span>

                    +
                        
                    @elseif($percentageStatus == 'decreased')
                    <span class="text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M3 7l6 6l4 -4l8 8"></path>
                          <path d="M21 10l0 7l-7 0"></path>
                        </svg>
                    </span>
                    @else
                    @endif
                    {{ $sentCountDifference }} que o dia de ontem
                </div>
              </div>
            </div>
        </div>
        <div id="chart-sparkline-{{ $chartId }}"></div>
    </div>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-sparkline-{{ $chartId }}'), {
            chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 192,
            sparkline: {
                enabled: true
            },
            animations: {
                enabled: false
            },
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
            series: [
                {
                    name: "{{ $chartSparklineLabel }}",
                    data: @json($chartDataCountPerYear)
                }
            ],
            tooltip: {
            theme: 'dark'
            },
            grid: {
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
            type: 'month',
            },
            yaxis: {
            labels: {
                padding: 4
            },
            },
            labels: @json($chartMonths),
            colors: [tabler.getColor("{{ $chartColor }}")],
            legend: {
            show: false,
            },
            point: {
            show: false
            },
        })).render();
        });
        // @formatter:on
    </script>
</div>
