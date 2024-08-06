document.addEventListener('DOMContentLoaded', function() {
    fetch('json/dashboard.json')
        .then((response) => response.json())
        .then((data) => {
            console.log("Data fetched:", data); // Debugging line
            window.jumlahData = data;
            createPieCharts();
        })
        .catch((error) => console.error("Error fetching data:", error)); // Debugging line
});

function createPieCharts() {
    const datels = ["METRO AREA", "INNER AREA", "PRINGSEWU AREA"];
    const colors = [
        '#4e79a7', // Biru
        '#f28e2b', // Oranye
        '#e15759', // Merah
        '#76b7b2', // Hijau Mint
        '#59a14f', // Hijau
        '#edc949', // Kuning
        '#af7aa1', // Ungu Muda
        '#ff9da7', // Merah Muda
        '#9c755f', // Coklat
        '#bab0ac'  // Abu-abu
    ];

    datels.forEach((datel, index) => {
        const filteredData = window.jumlahData.filter(entry => entry.DATEL === datel && parseInt(entry['WO HI']) > 0);
        const stoCounts = {};

        filteredData.forEach(entry => {
            if (entry.STO in stoCounts) {
                stoCounts[entry.STO] += parseInt(entry['WO HI']);
            } else {
                stoCounts[entry.STO] = parseInt(entry['WO HI']);
            }
        });

        console.log(`STO Counts for ${datel}:`, stoCounts); // Debugging line

        const canvasId = `piechart-${datel.toLowerCase().replace(/\s/g, '-')}`;
        const ctx = document.getElementById(canvasId)?.getContext('2d');
        
        if (ctx) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(stoCounts),
                    datasets: [{
                        label: `Jumlah WO HI di ${datel}`,
                        data: Object.values(stoCounts),
                        backgroundColor: colors.slice(0, Object.keys(stoCounts).length),
                        borderColor: colors.slice(0, Object.keys(stoCounts).length),
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
            });
        } else {
            console.error(`Canvas element for ${datel} not found!`); // Debugging line
        }
    });
}
