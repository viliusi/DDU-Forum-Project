// Function to add rows to the table
function addRowsToTable() {
    // Dummy data for new rows
    const dummyData = [
      { data1: 'New Data 1', data2: 'New Data 2' },
      { data1: 'New Data 3', data2: 'New Data 4' },
      // Add more data as needed
    ];
  
    const table = document.getElementById('fixed_header');
    const tbody = table.querySelector('tbody');
  
    dummyData.forEach((data) => {
        const row = document.createElement('tr');
        for (const key in data) {
            const cell = document.createElement('td');
            cell.textContent = data[key];
            row.appendChild(cell);
        }
        tbody.appendChild(row);
    });
      const row = document.createElement('tr');
      for (const key in data) {
        const cell = document.createElement('td');
        cell.textContent = data[key];
        row.appendChild(cell);
      }
      tbody.appendChild(row);
    }
  
  // Detect when the user scrolls to the bottom
  window.addEventListener('scroll', function () {
    if (
      window.innerHeight + window.scrollY >= document.body.offsetHeight - 100
    ) {
      addRowsToTable();
    }
  });
  