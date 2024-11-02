<x-card.app>
    <!-- Card Section -->
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:py-14">
        <!-- Grid -->
        <div
            class="grid overflow-hidden border border-gray-200 shadow-sm md:grid-cols-3 rounded-xl dark:border-neutral-800">
            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Saldo Terkini
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 211.780.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Total Dana Terkumpul
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 540.240.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="relative block p-4 bg-white md:p-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="#">
                <div class="flex flex-col md:flex lg:flex-row gap-y-3 gap-x-5">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                                Total Dana Tersalurkan
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                Rp 370.110.000
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->

    <div class="flex flex-col justify-between max-w-full gap-4 sm:px-6 lg:flex-row">

        <link rel="stylesheet" href="../assets/vendor/apexcharts/dist/apexcharts.css">
        <style type="text/css">
            .apexcharts-tooltip.apexcharts-theme-light {
                background-color: transparent !important;
                border: none !important;
                box-shadow: none !important;
            }
        </style>

        <script src="../assets/vendor/lodash/lodash.min.js"></script>
        <script src="../assets/vendor/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/vendor/preline/dist/helper-apexcharts.js"></script>

        <!-- Card -->
        <div x-data="chartComponent" x-init="initChart()"
            class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 flex-grow">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm text-gray-500 dark:text-gray-500">
                        Penghimpunan
                    </h2>
                    <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-gray-200">
                        Rp 540.240.000
                    </p>
                </div>

                <div>
                    <span
                        class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="self-center inline-block size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                        </svg>
                        25%
                    </span>
                </div>
            </div>
            <!-- End Header -->

            <div id="hs-multiple-bar-charts"></div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('chartComponent', () => ({
                    initChart() {
                        buildChart(
                            "#hs-multiple-bar-charts",
                            (mode) => ({
                                chart: {
                                    type: "bar",
                                    height: 300,
                                    toolbar: {
                                        show: false
                                    },
                                    zoom: {
                                        enabled: false
                                    },
                                },
                                series: [{
                                        name: "Chosen Period",
                                        data: [23000, 44000, 55000, 57000, 56000, 61000, 58000,
                                            63000, 60000, 66000, 34000, 78000
                                        ],
                                    },
                                    {
                                        name: "Last Period",
                                        data: [17000, 76000, 85000, 101000, 98000, 87000,
                                            105000, 91000, 114000, 94000, 67000, 66000
                                        ],
                                    },
                                ],
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: "16px",
                                        borderRadius: 0
                                    },
                                },
                                legend: {
                                    show: false
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 8,
                                    colors: ["transparent"]
                                },
                                xaxis: {
                                    categories: ["January", "February", "March", "April", "May",
                                        "June", "July", "August", "September", "October",
                                        "November", "December"
                                    ],
                                    axisBorder: {
                                        show: false
                                    },
                                    axisTicks: {
                                        show: false
                                    },
                                    crosshairs: {
                                        show: false
                                    },
                                    labels: {
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "13px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        offsetX: -2,
                                        formatter: (title) => title.slice(0, 3),
                                    },
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "13px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) => (value >= 1000 ? `${value / 1000}k` :
                                            value),
                                    },
                                },
                                states: {
                                    hover: {
                                        filter: {
                                            type: "darken",
                                            value: 0.9
                                        }
                                    },
                                },
                                tooltip: {
                                    y: {
                                        formatter: (value) =>
                                            `$${value >= 1000 ? `${value / 1000}k` : value}`
                                    },
                                    custom: function(props) {
                                        const {
                                            categories
                                        } = props.ctx.opts.xaxis;
                                        const {
                                            dataPointIndex
                                        } = props;
                                        const title = categories[dataPointIndex];
                                        return buildTooltip(props, {
                                            title,
                                            mode,
                                            hasTextLabel: true,
                                            wrapperExtClasses: "min-w-28",
                                            labelDivider: ":",
                                            labelExtClasses: "ms-2",
                                        });
                                    },
                                },
                                responsive: [{
                                    breakpoint: 568,
                                    options: {
                                        chart: {
                                            height: 300
                                        },
                                        plotOptions: {
                                            bar: {
                                                columnWidth: "14px"
                                            }
                                        },
                                        stroke: {
                                            width: 8
                                        },
                                        labels: {
                                            style: {
                                                colors: "#9ca3af",
                                                fontSize: "11px",
                                                fontFamily: "Inter, ui-sans-serif",
                                                fontWeight: 400
                                            },
                                            offsetX: -2,
                                            formatter: (title) => title.slice(0, 3),
                                        },
                                        yaxis: {
                                            labels: {
                                                align: "left",
                                                minWidth: 0,
                                                maxWidth: 140,
                                                style: {
                                                    colors: "#9ca3af",
                                                    fontSize: "11px",
                                                    fontFamily: "Inter, ui-sans-serif",
                                                    fontWeight: 400,
                                                },
                                                formatter: (value) => value >= 1000 ?
                                                    `${value / 1000}k` : value,
                                            },
                                        },
                                    },
                                }],
                            }), {
                                colors: ["#2563eb", "#d1d5db"],
                                grid: {
                                    borderColor: "#e5e7eb"
                                },
                            }, {
                                colors: ["#6b7280", "#2563eb"],
                                grid: {
                                    borderColor: "#404040"
                                },
                            }
                        );
                    }
                }));
            });
        </script>
        <!-- End Card -->
        <div x-data="chartComponent(@entangle('chosenPeriodData').defer, @entangle('lastPeriodData').defer)" x-init="initChart()"
            class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 flex-grow">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm text-gray-500 dark:text-gray-500">Penyaluran</h2>
                    <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-gray-200">{{ $financialValue }}
                    </p>
                </div>

                <div>
                    <span
                        class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="self-center inline-block size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                        </svg>
                        {{ $percentage }}
                    </span>
                </div>
            </div>
            <!-- End Header -->

            <!-- Chart -->
            <div id="hs-multiple-bar-charts"></div>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('chartComponent', (chosenPeriodData, lastPeriodData) => ({
                        chosenPeriodData,
                        lastPeriodData,
                        initChart() {
                            buildChart(
                                "#hs-multiple-bar-charts",
                                (mode) => ({
                                    chart: {
                                        type: "bar",
                                        height: 300,
                                        toolbar: {
                                            show: false
                                        },
                                        zoom: {
                                            enabled: false
                                        },
                                    },
                                    series: [{
                                            name: "Chosen Period",
                                            data: this.chosenPeriodData
                                        },
                                        {
                                            name: "Last Period",
                                            data: this.lastPeriodData
                                        },
                                    ],
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: "16px",
                                            borderRadius: 0
                                        },
                                    },
                                    legend: {
                                        show: false
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: true,
                                        width: 8,
                                        colors: ["transparent"]
                                    },
                                    xaxis: {
                                        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                                            "Aug", "Sep", "Oct", "Nov", "Dec"
                                        ],
                                        axisBorder: {
                                            show: false
                                        },
                                        axisTicks: {
                                            show: false
                                        },
                                        crosshairs: {
                                            show: false
                                        },
                                        labels: {
                                            style: {
                                                colors: "#9ca3af",
                                                fontSize: "13px",
                                                fontFamily: "Inter, ui-sans-serif",
                                                fontWeight: 400,
                                            },
                                            offsetX: -2,
                                            formatter: (title) => title.slice(0, 3),
                                        },
                                    },
                                    yaxis: {
                                        labels: {
                                            align: "left",
                                            minWidth: 0,
                                            maxWidth: 140,
                                            style: {
                                                colors: "#9ca3af",
                                                fontSize: "13px",
                                                fontFamily: "Inter, ui-sans-serif",
                                                fontWeight: 400,
                                            },
                                            formatter: (value) => (value >= 1000 ? `${value / 1000}k` :
                                                value),
                                        },
                                    },
                                    states: {
                                        hover: {
                                            filter: {
                                                type: "darken",
                                                value: 0.9
                                            }
                                        },
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: (value) =>
                                                `$${value >= 1000 ? `${value / 1000}k` : value}`
                                        },
                                        custom: function(props) {
                                            const {
                                                categories
                                            } = props.ctx.opts.xaxis;
                                            const {
                                                dataPointIndex
                                            } = props;
                                            const title = categories[dataPointIndex];
                                            return buildTooltip(props, {
                                                title,
                                                mode,
                                                hasTextLabel: true,
                                                wrapperExtClasses: "min-w-28",
                                                labelDivider: ":",
                                                labelExtClasses: "ms-2",
                                            });
                                        },
                                    },
                                }), {
                                    colors: ["#2563eb", "#d1d5db"],
                                    grid: {
                                        borderColor: "#e5e7eb"
                                    }
                                }, {
                                    colors: ["#6b7280", "#2563eb"],
                                    grid: {
                                        borderColor: "#404040"
                                    }
                                }
                            );
                        },
                    }));
                });
            </script>
        </div>

    </div>



</x-card.app>
