<template>
    <div>
        <div class="mb-5">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">
                Wedding Date
            </label>
            <datepicker input-class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wrapper-class="" v-model="end_date"></datepicker>
        </div>
        <!--<div class="mt-5 text-gray-700">
            {{ cal_in_lbs }} calories in a lbs
        </div>-->
        <div class="mb-5">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="current_weight">
                Current weight <span class="text-xs text-gray-500">lbs</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="current_weight" id="current_weight" name="weight" type="number" step=".01" placeholder="135.26">
        </div>
        <div class="mb-5">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="goal_weight">
                Goal weight <span class="text-xs text-gray-500">lbs</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="goal_weight" id="goal_weight" name="weight" type="number" step=".01" placeholder="135.26">
        </div>
        <!--<div class="mt-5 text-gray-700">
            Loss goal: {{ loss_goal }} lbs
        </div>
        <div class="mt-5 text-gray-700">
            Days remaining: {{ days_remaining }}
        </div>
        <div class="mt-5 text-gray-700">
            Total calories needed to lose: {{ cal_needed_to_lose }}
        </div>-->
        <div class="mt-5 text-gray-700">
            Calories per day: {{ cal_per_day }}
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        name: "goal",
        components: {
            Datepicker
        },
        data: function() {
            return {
                'end_date': new Date(2020, 2,  27),
                'start_date': new Date(),
                'goal_weight': 145,
                'cal_in_lbs': 3500,
                'current_weight': 165.0
            }
        },
        computed: {
            loss_goal: function () {
                return this.current_weight - this.goal_weight;
            },
            days_remaining: function () {
                return ((this.end_date.getTime() - this.start_date.getTime()) / (1000 * 3600 * 24)).toFixed(0);
            },
            cal_needed_to_lose: function () {
                return this.loss_goal * this.cal_in_lbs
            },
            cal_per_day: function () {
                return (this.cal_needed_to_lose / this.days_remaining).toFixed(0)
            }

        }
    }
</script>

<style scoped>

</style>
