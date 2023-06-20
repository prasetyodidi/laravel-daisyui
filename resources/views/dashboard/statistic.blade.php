@extends('dashboard.main')

@section('content')
    <div class="w-full flex flex-row">
        <div class="w-1/2 flex flex-col">
            <h1 class="text-xl text-center">Pencapaian</h1>
            <div class="flex flex-row">
                <select name="achievement-month" id="achievement-month" class="select">
                    <option value="1" disabled selected>Bulan</option>
                    @foreach($months as $key => $month)
                        <option value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
                <select name="achievement-year" id="achievement-year" class="select">
                    <option value="1" disabled selected>Tahun</option>
                    @foreach($years as $key => $year)
                        <option value="{{ $key }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <canvas id="achievements"></canvas>
        </div>
        <div class="w-1/2">
            <h1 class="text-xl text-center">Pelanggaran</h1>
            <div class="flex flex-row">
                <select name="violation-month" id="violation-month" class="select">
                    <option value="1" disabled selected>Bulan</option>
                    @foreach($months as $key => $month)
                        <option value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
                <select name="violation-year" id="violation-year" class="select">
                    <option value="1" disabled selected>Tahun</option>
                    @foreach($years as $key => $year)
                        <option value="{{ $key }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <canvas id="violations"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const achievement = document.getElementById('achievements');
        const violation = document.getElementById('violations');
        const achievementMonth = document.getElementById('achievement-month');
        const achievementYear = document.getElementById('achievement-year');
        const violationMonth = document.getElementById('violation-month');
        const violationYear = document.getElementById('violation-year');

        async function getStatisticData(url) {
            const baseUrl = '{!! url('/') !!}';
            const response = await fetch(baseUrl + url);
            return await response.json()
        }

        const achievementChart = new Chart(achievement, {
            type: 'line',
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const violationChart = new Chart(violation, {
            type: 'line',
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function updateAchievementChart(data) {
            achievementChart.data = {
                labels: data.days,
                datasets: [{
                    label: data.info,
                    data: data.values,
                    borderWidth: 1
                }]
            };
            achievementChart.update();
        }

        function updateViolationChart(data) {
            violationChart.data = {
                labels: data.days,
                datasets: [{
                    label: data.info,
                    data: data.values,
                    borderWidth: 1
                }]
            };
            violationChart.update();
        }

        getStatisticData('/achievements/statistic')
            .then((values) => updateAchievementChart(values) );
        getStatisticData('/violations/statistic')
            .then((values) => updateViolationChart(values));

        achievementMonth.addEventListener("change", (event) => {
            const month = event.target.value;
            const year = achievementYear.value;
            getStatisticData('/achievements/statistic?month=' + month + '&year=' + year)
                .then((values) => updateAchievementChart(values));
        });

        achievementYear.addEventListener('change', (event) => {
            const year = event.target.value;
            const month = achievementMonth.value;
            getStatisticData('/achievements/statistic?month=' + month + '&year=' + year)
                .then((values) => updateAchievementChart(values));
        });

        violationMonth.addEventListener("change", (event) => {
            const month = event.target.value;
            const year = achievementYear.value;
            getStatisticData('/violations/statistic?month=' + month + '&year=' + year)
                .then((values) => updateViolationChart(values));
        });

        violationYear.addEventListener('change', (event) => {
            const year = event.target.value;
            const month = achievementMonth.value;
            getStatisticData('/violations/statistic?month=' + month + '&year=' + year)
                .then((values) => updateViolationChart(values));
        });
    </script>
@endsection
