<template>
    <div class="rounded overflow-hidden shadow-lg">
        <div class="font-semibold bg-indigo-500 text-gray-100 py-3 px-6 mb-0">
            Chart
        </div>
        <apexchart ref="chart" width="100%" type="line" :options="options" :series="series"></apexchart>
    </div>
</template>

<script>
    export default {
        name: 'weight_chart',
        props: [
            'measurements',
            'days'
        ],
        data: function() {
            return {
                series: [
                    {
                        name: 'Weight',
                        unit: 'pounds',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Workout',
                        unit: 'calories',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Food',
                        unit: 'calories',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Sleep',
                        unit: 'hours',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Water',
                        unit: 'ounces',
                        type: 'line',
                        data: []
                    }
                ],
                options: {
                    stacked: true,
                    colors: ['#ed8936', '#4fd1c5', '#f56565', '#667eea', '#4299e1'],
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        width: [3, 3, 3, 3, 3],
                        curve: 'smooth'
                    },
                    xaxis: {
                        categories: [],
                        type: 'datetime',
                    },
                    yaxis: [
                        {
                            min: 160,
                            max: 175,
                            axisTicks: {
                                show: true,
                            },
                            opposite: true,
                            axisBorder: {
                                show: true,
                                color: '#ed8936'
                            },
                            title: {
                                text: "Weight (lbs)",
                                style: {
                                    color: '#ed8936',
                                }
                            }
                        },
                        {
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#4fd1c5'
                            },
                            title: {
                                text: "Workout (cal)",
                                style: {
                                    color: '#4fd1c5',
                                }
                            },
                        },
                        {
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#f56565'
                            },
                            title: {
                                text: "Food (cal)",
                                style: {
                                    color: '#f56565',
                                }
                            }
                        },
                        {
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#667eea'
                            },
                            title: {
                                text: "Sleep (hourss)",
                                style: {
                                    color: '#667eea',
                                }
                            }
                        },
                        {
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#4299e1'
                            },
                            title: {
                                text: "Water (oz)",
                                style: {
                                    color: '#4299e1',
                                }
                            }
                        }
                    ],
                    tooltip: {
                        enabled: true,
                        shared: true
                    },
                    legend: {
                        show: true
                    }
                }
            }
        },
        mounted() {
            //Set the days from the prop
            this.days.forEach((day) => {
                this.options.xaxis.categories.push(Date.parse(day + ' EST'));
            });

            //Loop over all the series
            this.series.forEach((series, index) => {
                //Set the data from each series json
                this.series[index].data = this.measurements[series.name.toLowerCase()].map((data) => {
                    return data[series.unit.toLowerCase()];
                });
            });

            this.$refs.chart.updateSeries(this.series, true);
        }
    }
</script>
