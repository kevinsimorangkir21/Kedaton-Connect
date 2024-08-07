fetch('json/hsi2024.json')
    .then((response) => response.json())
    .then((data) => {
        window.jumlahData = data;
        createBarChart();
    });

function createBarChart() {
    const ctx = document.getElementById('barchart-jumlah').getContext('2d');
    const months = ["JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"];
    const shortMonths = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"];
    let jumlahPerBulan = new Array(12).fill(0);

    window.jumlahData.forEach(entry => {
        const monthIndex = months.indexOf(entry.BULAN.toUpperCase());
        if (monthIndex !== -1) {
            jumlahPerBulan[monthIndex]++;
        }
    });

    // Hitung total dari semua bulan
    const totalAmount = jumlahPerBulan.reduce((sum, value) => sum + value, 0);

    // Update elemen HTML dengan total
    document.getElementById('total-amount').textContent = totalAmount;

    // Warna berbeda untuk setiap bar
    const backgroundColors = [
        '#A30000',
        '#7D1007',
        '#470000',
        '#EF9234',
        '#EC7A08',
        '#C46100',
        '#8481DD',
        '#5752D1',
        '#3C3D99',
        '#73C5C5',
        '#009596',
        '#005F60'
    ];

    const borderColors = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: shortMonths,
            datasets: [{
                label: 'Jumlah Per Bulan',
                data: jumlahPerBulan,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 0,
                borderRadius: 3,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false
                    },
                  },
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
