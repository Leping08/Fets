<template>
    <div class="rounded overflow-hidden shadow-lg">
        <div class="font-semibold bg-orange-400 text-gray-900 py-3 px-6 mb-0">
            Chart
        </div>
        <apexchart ref="chart" width="100%" type="line" :options="options" :series="series"></apexchart>
        <div class="flex">
            <div class="p-2 flex-1">
                <button @click="toggle('Weight'); weightButton = !weightButton" v-bind:class="[ weightButton ? 'bg-orange-500 hover:bg-orange-400' : 'line-through bg-orange-400 hover:bg-orange-300' ]" class="text-white font-bold py-2 px-4 rounded mr-2" >
                    Weight
                </button>
                <button @click="toggle('Intake'); intakeButton = !intakeButton" v-bind:class="[ intakeButton ? 'bg-teal-500 hover:bg-teal-400' : 'line-through bg-teal-400 hover:bg-teal-300' ]" class="text-white font-bold py-2 px-4 rounded mr-2" >
                    Calories Eaten
                </button>
                <button @click="toggle('Workout'); workoutButton = !workoutButton" v-bind:class="[ workoutButton ? 'bg-purple-500 hover:bg-purple-400' : 'bg-purple-400 hover:bg-purple-300 line-through' ]" class="text-white font-bold py-2 px-4 rounded mr-2" >
                    Calories Burned
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'weight_chart',
        props: [
            'measurements'
        ],
        data: function() {
            return {
                weightButton: true,
                workoutButton: true,
                intakeButton: true,
                series: [
                    {
                        name: 'Weight',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Workout',
                        type: 'line',
                        data: []
                    },
                    {
                        name: 'Intake',
                        type: 'line',
                        data: []
                    }
                ],
                options: {
                    colors: ['#ed8936', '#667eea', '#4fd1c5'],
                    // dataLabels: {
                    //     enabled: false
                    // },
                    stroke: {
                        width: [3, 3, 3],
                        curve: 'smooth'
                    },
                    // title: {
                    //     text: 'Weight Trend',
                    //     align: 'left',
                    //     offsetX: 110
                    // },
                    xaxis: {
                        categories: [],
                        type: 'datetime',
                    },
                    yaxis: [
                        {
                            min: 130,
                            max: 180,
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
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        {
                            seriesName: 'Income',
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#667eea'
                            },
                            title: {
                                text: "Calories Out",
                                style: {
                                    color: '#667eea',
                                }
                            },
                        },
                        {
                            seriesName: 'Revenue',
                            opposite: false,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#38b2ac'
                            },
                            title: {
                                text: "Calories In",
                                style: {
                                    color: '#38b2ac',
                                }
                            }
                        }
                    ],
                    // tooltip: {
                    //     fixed: {
                    //         enabled: true,
                    //         position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                    //         offsetY: 30,
                    //         offsetX: 60
                    //     },
                    // },
                    legend: {
                        show: false,
                        // horizontalAlign: 'left',
                        // offsetX: 40
                    }
                }
            }
        },
        mounted() {
            let x;
            for (x of this.measurements) {
                this.series[0].data.push(x.weight);
                this.series[1].data.push(x.calories_burned);
                this.series[2].data.push(x.calories_eaten);
                this.options.xaxis.categories.push(x.date);
            }
        },
        methods: {
            toggle: function (series) {
                this.$refs.chart.toggleSeries(series);
            }
        }
    }
</script>
