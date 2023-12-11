<div style="width: 100%;">
    <div class="card h-full w-full">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">{{ $label }}</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                <a class="dropdown-toggl text-muted" href="javascript:void(0)">
                  2023
                </a>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-baseline">
            <div class="h1 mb-3 me-2">--</div>
            <div class="me-auto">
              {{-- <span class="text-yellow d-inline-flex align-items-center lh-1">
                0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
              </span> --}}
            </div>
          </div>
          <div id="chart-{{ $chartId }}" class="chart-sm"></div>
        </div>
    </div>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-{{ $chartId }}'), {
            chart: {
            type: "line",
            fontFamily: 'inherit',
            height: 40.0,
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
            stroke: {
            width: [2, 1],
            dashArray: [0, 3],
            lineCap: "round",
            curve: "smooth",
            },
            series: [{
            name: "Users",
            data: [37, 35, 44, 28]
            },{
            name: "Colaborators",
            data: [93, 54, 51, 24]
            }],
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
            type: 'year',
            },
            yaxis: {
            labels: {
                padding: 4
            },
            },
            labels: [
            '{{ date('Y') }}',
            '2022',
            '2021',
            '2020',
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
            legend: {
            show: false,
            },
        })).render();
        });
        // @formatter:on
    </script>
</div>