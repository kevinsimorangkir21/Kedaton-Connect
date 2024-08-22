document.addEventListener('DOMContentLoaded', function() {
    fetch('csv/hsi2024.csv')
        .then((response) => response.text())
        .then((csvText) => {
            const data = csvToJson(csvText);
            window.jumlahData = data;
            createPieChart();
        })
        .catch((error) => console.error('Error fetching CSV:', error));
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

    // Iterasi melalui data untuk menghitung jumlah setiap area
    window.jumlahData.forEach(entry => {
        const area = entry['AREA'] && entry['AREA'].trim().toUpperCase(); // Pastikan kolom 'AREA' ada dan formatnya sesuai
        if (areas.includes(area)) {
            areaCounts[area]++;
        }
    });

    // Membuat pie chart dengan Chart.js
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

// Fungsi untuk mengonversi CSV ke JSON
function csvToJson(csvText) {
    const lines = csvText.split('\n').filter(line => line.trim() !== ''); // Menghapus baris kosong
    const headers = lines[0].split(',').map(header => header.trim()); // Menangani header

    const result = lines.slice(1).map(line => {
        const values = line.split(',').map(value => value.trim()); // Menghapus spasi di awal dan akhir
        let obj = {};
        headers.forEach((header, index) => {
            obj[header] = values[index] || ""; // Menangani nilai yang hilang
        });
        return obj;
    });

    return result;
}
