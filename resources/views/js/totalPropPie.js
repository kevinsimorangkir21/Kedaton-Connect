fetch('json/nycPropSales.json')
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        window.propertyData = data;
        createTotalPropertySalesByBorough();
    });

function createTotalPropertySalesByBorough(){
    const ctx = document.getElementById('pie-total-property-sales');
    var arrTotalPropSales = { '1': 0, '2': 0, '3': 0, '4': 0, '5': 0 };
    var totalSales = 0;
    var dataForChart = [];

    for(var i = 1; i <= 5; i++){
        var arrBoroughFiltered = window.propertyData.filter((property) => property.BOROUGH == i.toString());
        var arrSalePriceFiltered = arrBoroughFiltered.filter((property) => parseInt(property.SALE_PRICE));

        arrTotalPropSales[i] = arrSalePriceFiltered.length;
        totalSales += arrSalePriceFiltered.length;
        dataForChart.push(arrTotalPropSales[i]);
    }

    new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Manhattan', 'Bronx', 'Brooklyn', 'Queens', 'Staten Island'],
          datasets: [{
            label: 'Total Property Sales',
            data: dataForChart,
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
            }
          }
        }
      });
}