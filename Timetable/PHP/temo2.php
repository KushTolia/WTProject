<?php
// Define an array of data for the table
$data = array(
    array('John', 'Doe', '25'),
    array('Jane', 'Doe', '30'),
    array('Bob', 'Smith', '45')
);

// Start generating the HTML table
echo '<table id="myTable">';

// Generate the table header row
echo '<tr><th>First Name</th><th>Last Name</th><th>Age</th></tr>';

// Generate the table data rows
foreach ($data as $row) {
    echo '<tr>';
    echo '<td>' . $row[0] . '</td>';
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '</tr>';
}

// Add JavaScript code to add a new column
echo "
<script type='text/javascript'>
// Get a reference to the table element
var table = document.getElementById('myTable');

// Loop through the rows of the table
for (var i = 0; i < table.rows.length; i++) {

  // Insert a new cell in the current row after the first cell
  var cell = table.rows[i].insertCell(1);

  // Set the content of the new cell
  cell.innerHTML = 'Column 2 Data';
}
</script>
";

// Close the HTML table
echo '</table>';
?>