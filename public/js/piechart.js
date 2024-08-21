document.addEventListener('DOMContentLoaded', function() {
    fetch('json/hsi2024.json')
        .then((response) => response.json())
        .then((data) => {
            window.jumlahData = data;
            createPieChart();
        });
});

function createPieChart() {
    const ctx = document.getElementById('piechart-area').getContext('2d');
    const areas = ["METRO", "INNER", "PRINGSEWU", "UNIT", "KOTABUMI"];
    let areaCounts = {
        "METRO": 0,
        "INNER": 0,
        "PRINGSEWU": 0,
        "UNIT": 0,
        "KOTABUMI": 0
    };

    window.jumlahData.forEach(entry => {
        if (areas.includes(entry.AREA)) {
            areaCounts[entry.AREA]++;
        }
    });

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: areas,
            datasets: [{
                label: 'Jumlah Per Area',
                data: Object.values(areaCounts),
                backgroundColor: [
                    '#00a9a5', // nila
                    '#003049', // biru
                    '#d62828', // merah
                    '#f77f00', // oranye
                    '#7a9d8f'  // hijau
                ],
                borderColor: '#fff', // Border putih
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 1500,
                easing: 'easeOutExpo'
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                    }
                },
                datalabels: {
                    color: '#fff', // Warna teks label
                    formatter: (value, context) => {
                        const total = context.chart.getDatasetMeta(0).total;
                        const percentage = ((value / total) * 100).toFixed(2) + '%';
                        return percentage;
                    },
                    font: {
                        weight: 'bold',
                        size: 15
                    },
                    anchor: 'end',
                    align: 'start'
                }
            }
        },
        plugins: [ChartDataLabels]
    });
}
