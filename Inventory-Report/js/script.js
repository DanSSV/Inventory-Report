$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#submit').click(function() {
    var dateRange = getDateRange();
    $.ajax({
      url: 'getData.php',
      method: 'POST',
      data: {
        dateRange: dateRange
      },
      dataType: 'json',
      success: function(data) {
        var table = $('#dataTable').DataTable();
        table.clear();
        $.each(data, function(i, item) {
          var row = createRow(item);
          table.row.add($(row));
        });
        table.draw();
      }
    });
  });

  $('#print').click(function() {
    printTable();
  });
});

function createRow(data) {
  var row = "<tr>";
  row += "<td>" + data.id + "</td>";
  row += "<td>" + data.product_name + "</td>";
  row += "<td>" + data.expiration_date + "</td>";
  row += "<td>" + data.quantity + "</td>";
  row += "<td>" + data.brand + "</td>";
  row += "<td>" + data.category + "</td>";
  row += "<td>" + data.status + "</td>";
  row += "</tr>";
  return row;
}

function getDateRange() {
  var startDate = $('#start_date').val();
  var endDate = $('#end_date').val();
  return [startDate, endDate];
}

function printTable() {
  var printContents = document.getElementById('dataTable_wrapper').innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
