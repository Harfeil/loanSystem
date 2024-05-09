<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Validation</title>
</head>
<body>
  <input type="text" id="inputNumber" placeholder="Enter number">
  <button onclick="validateNumber()">Submit</button>

  <script>
    function validateNumber() {
      var input = document.getElementById('inputNumber').value;
      if (input.trim() === '') {
        alert('Please enter a number.');
        return;
      }

      // Regular expression to check if the input ends with "000" and does not have any other digits
      var regex = /^[1-9]\d*000$/;

      if (regex.test(input)) {
        alert('Valid number: ' + input);
      } else {
        alert('Invalid number. Please enter a number ending with "000" without any other digits.');
      }
    }
  </script>
</body>
</html>