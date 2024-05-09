<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Billing History</title>
<style>
  .year {
    display: block;
    margin-bottom: 10px;
    cursor: pointer;
  }
  .month {
    display: inline-block;
    margin-right: 10px;
    cursor: pointer;
  }
</style>
</head>
<body>
  <h1>Billing History</h1>
  <div id="billingHistory"></div>

  <script>
    // Example billing history data
    var billingHistory = {
      "2024": {
        "January": ["Invoice 1", "Invoice 2"],
        "February": ["Invoice 3", "Invoice 4"],
        // Add more months here...
      },
      // Add more years here...
    };

    // Function to display billing history
    function showBillingHistory() {
      var billingHistoryDiv = document.getElementById('billingHistory');
      billingHistoryDiv.innerHTML = '';

      // Iterate over each year
      for (var year in billingHistory) {
        var yearDiv = document.createElement('div');
        yearDiv.className = 'year';
        yearDiv.textContent = year;
        yearDiv.onclick = function() {
          toggleMonths(this);
        };
        billingHistoryDiv.appendChild(yearDiv);

        // Iterate over each month for the current year
        var monthsDiv = document.createElement('div');
        monthsDiv.className = 'months';
        monthsDiv.style.display = 'none';
        for (var month in billingHistory[year]) {
          var monthDiv = document.createElement('div');
          monthDiv.className = 'month';
          monthDiv.textContent = month;
          monthDiv.onclick = function() {
            showInvoices(this.textContent, year);
          };
          monthsDiv.appendChild(monthDiv);
        }
        billingHistoryDiv.appendChild(monthsDiv);
      }
    }

    // Function to toggle display of months
    function toggleMonths(yearElement) {
      var monthsDiv = yearElement.nextElementSibling;
      if (monthsDiv.style.display === 'none') {
        monthsDiv.style.display = 'block';
      } else {
        monthsDiv.style.display = 'none';
      }
    }

    // Function to display invoices for a specific month
    function showInvoices(month, year) {
      var invoices = billingHistory[year][month];
      alert("Invoices for " + month + " " + year + ": " + invoices.join(", "));
    }

    // Call showBillingHistory initially to display billing history when the page loads
    window.onload = function() {
      showBillingHistory();
    };
  </script>
</body>
</html>