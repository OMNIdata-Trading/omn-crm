<div style="width: 100%;">
    <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">{{ $label }}</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                {{-- data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" --}}
                <a class="dropdown-toggl text-muted" href="javascript:void(0)">
                  {{ date('Y') }}
                </a>
                {{-- <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item active" href="#">2022</a>
                  <a class="dropdown-item" href="#">2021</a>
                  <a class="dropdown-item" href="#">2020</a>
                </div> --}}
              </div>
            </div>
          </div>
          <div class="d-flex align-items-baseline">
            <div class="h1 mb-3 me-2">{{ $currentYearHighlightValue ?? 0 }}</div>
            <div class="me-auto">
              {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
              </span> --}}
            </div>
          </div>
          <div id="apex-chart-livewire-{{ $chartId }}" class="chart-sm"></div>
        </div>
    </div>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
          window.ApexCharts && (new ApexCharts(document.getElementById('apex-chart-livewire-{{ $chartId }}'), {
            chart: {
              type: "bar",
              fontFamily: 'inherit',
              height: 40.0,
              sparkline: {
                enabled: true
              },
              animations: {
                enabled: false
              },
            },
            plotOptions: {
              bar: {
                columnWidth: '50%',
              }
            },
            dataLabels: {
              enabled: false,
            },
            fill: {
              opacity: 1,
            },
            series: [{
              name: "{{ $chartBarLabel }}",
              data: @json($chartDataCountPerYear)
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
              axisBorder: {
                show: false,
              },
              type: 'year',
            },
            yaxis: {
              labels: {
                padding: 4
              },
            },
            labels: @json($chartYears),
            colors: [tabler.getColor("{{ $chartColor }}")],
            legend: {
              show: false,
            },
          })).render();
        });
        // @formatter:on
    </script>
</div>