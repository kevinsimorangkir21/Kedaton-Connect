document.addEventListener('DOMContentLoaded', function() {
    fetch('csv/dashboard.csv')
        .then((response) => response.text())
        .then((csvText) => {
            const data = csvToJson(csvText);
            window.jumlahData = data;
            createPieCharts();
        })
        .catch((error) => console.error("Error fetching data:", error));
});

// Fungsi untuk mengonversi CSV ke JSON
function csvToJson(csvText) {
    const lines = csvText.split('\n');
    const headers = lines[0].split(',');

    const result = lines.slice(1).map(line => {
        const values = line.split(',');
        let obj = {};
        headers.forEach((header, index) => {
            obj[header.trim()] = values[index]?.trim();
        });
        return obj;
    });

    return result;
}

function createPieCharts() {
    const branches = ["INNER LAMPUNG", "KOTABUMI", "METRO", "PRINGSEWU", "UNIT"];
    const outerColors = [
        '#4e79a7', '#f28e2b', '#e15759', '#76b7b2', '#59a14f'
    ];
    const innerColors = [
        '#003f5c', '#444e86', '#955196', '#dd5182', '#ff6e54',
        '#ffa600', '#c1c1c1', '#6d6d6d', '#aaaaaa', '#888888'
    ];

    branches.forEach((branch, index) => {
        const filteredData = window.jumlahData.filter(entry => entry.BRANCH === branch && parseInt(entry['WO HI']) > 0);

        // Outer Pie Chart Data (STO)
        const stoCounts = {};
        filteredData.forEach(entry => {
            if (entry.STO in stoCounts) {
                stoCounts[entry.STO] += parseInt(entry['WO HI']);
            } else {
                stoCounts[entry.STO] = parseInt(entry['WO HI']);
            }
        });

        // Inner Pie Chart Data (Additional Info)
        const additionalFields = [
            'ON HAND TEKNISI', 'SURVEY TEKNISI', 'TARIK DC PROGRESS', 'TARIK DC COMPLETE',
            'SALPEN OK PENDING PELANGGAN', 'POTENSI PS AKTIVASI', 'COMPLETED (PS)',
            'KENDALA PERANGKAT', 'KENDALA SISTEM', 'KENDALA RETI/SEKTOR',
            'PENDING PELANGGAN/RNA', 'KENDALA PT2/TANAM TIANG', 
            'KENDALA TEKNIK PT3', 'CANCEL', 'KENDALA TEKNISI'
        ];

        const additionalCounts = {};
        additionalFields.forEach(field => {
            additionalCounts[field] = 0; // Initialize all fields
        });

        filteredData.forEach(entry => {
            additionalFields.forEach(field => {
                if (entry[field]) {
                    additionalCounts[field] += parseInt(entry[field]);
                }
            });
        });

        const canvasId = `piechart-${branch.toLowerCase().replace(/\s/g, '-')}`;
        const ctx = document.getElementById(canvasId)?.getContext('2d');

        if (ctx) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        ...Object.keys(stoCounts), // Outer labels (STO)
                        ...Object.keys(additionalCounts).filter(key => additionalCounts[key] > 0) // Inner labels (Additional Info)
                    ],
                    datasets: [
                        {
                            label: `STO di ${branch}`,
                            data: Object.values(stoCounts), // Outer data (STO)
                            backgroundColor: outerColors.slice(0, Object.keys(stoCounts).length),
                            borderColor: '#ffffff',
                            borderWidth: 2
                        },
                        {
                            label: `Informasi Tambahan di ${branch}`,
                            data: Object.values(additionalCounts).filter(value => value > 0), // Inner data (Additional Info)
                            backgroundColor: innerColors.slice(0, Object.keys(additionalCounts).filter(key => additionalCounts[key] > 0).length),
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }
                    ]
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
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    let percentage = ((value / context.dataset.data.reduce((a, b) => a + b, 0)) * 100).toFixed(2);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            color: '#fff',
                            formatter: (value, context) => {
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
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
            console.error(`Canvas element for ${branch} not found!`);
        }
    });
}
