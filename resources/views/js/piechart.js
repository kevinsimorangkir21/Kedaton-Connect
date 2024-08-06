fetch('json/hsi2024.json')
    .then((response) => response.json())
    .then((data) => {
        window.jumlahData = data;
        createPieChart();
    });

function createPieChart() {
    const ctx = document.getElementById('piechart-area').getContext('2d');
    const areas = ["METRO", "INNER", "PRINGSEWU"];
    let areaCounts = {
        "METRO": 0,
        "INNER": 0,
        "PRINGSEWU": 0
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
                    '#ffd166', // Krem
                    '#006d77', // biru muda
                    '#ed6a5a'  // Merah
                ],
                borderColor: [
                    '#ffd166', // Krem
                    '#006d77', // biru muda
                    '#ed6a5a'  // Merah
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                        size: 14
                    },
                    anchor: 'end',
                    align: 'start'
                }
            }
        },
        plugins: [ChartDataLabels]
    });
}