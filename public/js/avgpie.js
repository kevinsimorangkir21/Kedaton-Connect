fetch('json/hsi2023.json')
    .then((response) => response.json())
    .then((data) => {
        window.jumlahData = data;
        createBarChart();
    });

function createBarChart() {
    const ctx = document.getElementById('barchart-jumlah').getContext('2d');
    const months = ["JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"];
    let jumlahPerBulan = new Array(12).fill(0);

    window.jumlahData.forEach(entry => {
        const monthIndex = months.indexOf(entry.BULAN);
        if (monthIndex !== -1) {
            jumlahPerBulan[monthIndex]++;
        }
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Jumlah Per Bulan',
                data: jumlahPerBulan,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                    }
                }
            }
        }
    });
}
 