// Fungsi untuk mengonversi CSV ke JSON
function csvToJson(csvText) {
    const lines = csvText.split('\n');
    const headers = lines[0].split(',');

    const result = lines.slice(1).map(line => {
        const values = line.split(',');
        let obj = {};
        headers.forEach((header, index) => {
            obj[header.trim()] = values[index].trim();
        });
        return obj;
    });

    return result;
}

// Fungsi untuk memperbarui kartu skor berdasarkan branch
function updateBranchScoreCard(data, branch) {
    const filteredData = branch ? data.filter(item => item.BRANCH === branch) : data;
    const branchWO = filteredData.reduce((sum, item) => sum + (parseInt(item['ALL WO']) || 0), 0);
    document.getElementById('branch-wo').innerText = branchWO.toLocaleString('en-US');
}

// Fungsi untuk memperbarui kartu skor total WO
function updateTotalScoreCard(data) {
    const totalWO = data.reduce((sum, item) => sum + (parseInt(item['ALL WO']) || 0), 0);
    document.getElementById('total-wo').innerText = totalWO.toLocaleString('en-US');
}

// Ambil data WO dari CSV
fetch('csv/dashboard.csv')
    .then(response => response.text())
    .then(csvText => {
        const data = csvToJson(csvText);
        window.woData = data;

        // Tampilkan total keseluruhan saat pertama kali memuat data
        updateTotalScoreCard(data);

        // Tangani seleksi BRANCH
        document.getElementById('branch-select').addEventListener('change', event => {
            const branch = event.target.value;
            updateBranchScoreCard(window.woData, branch);
        });

        // Tampilkan total WO per branch saat pertama kali memuat data
        updateBranchScoreCard(data, document.getElementById('branch-select').value);
    })
    .catch(error => {
        console.error('Error fetching the WO data:', error);
    });
