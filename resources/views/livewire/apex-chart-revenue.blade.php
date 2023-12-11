<div style="width: 100%;">
    <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">{{ $label }}</div>
            <div class="ms-auto lh-1">
              <div class="dropdown">
                <a class="text-muted" href="javascript:void(0)">
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
            <div class="h1 mb-3 me-2">{{ number_format($currentYearHighlightValue, '2', ',', '.') }}</div>
            <div class="me-auto">
              <span class="text-{{ $lineColor }} d-inline-flex align-items-center lh-1">
                {{ $revenuesDifferenceInPercentage }}% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg> --}}
                {{-- Trending up --}}
                @if ($percentageStatus == 'increased')
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M3 17l6 -6l4 4l8 -8" />
                  <path d="M14 7l7 0l0 7" />
                </svg>
                    
                @elseif($percentageStatus == 'decreased')
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3 7l6 6l4 -4l8 8"></path>
                  <path d="M21 10l0 7l-7 0"></path>
                </svg>
                @else
                @endif
              </span>
            </div>
          </div>
        </div>
        <div id="apex-chart-revenue-{{ $chartId }}" class="chart-sm" style="min-height: 40px;"></div>
    </div>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
          window.ApexCharts && (new ApexCharts(document.getElementById("apex-chart-revenue-{{ $chartId }}"), {
            chart: {
              type: "area",
              fontFamily: 'inherit',
              height: 40.0,
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
            series: [{
              name: "{{ $chartRevenueLabel }}",
              data: @json($chartDataCountPerYear)
            }],
            tooltip: {
              theme: 'dark',
              y: {
                formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                  return (value.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })).replace(/\s/g, '.');
                }
              }
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