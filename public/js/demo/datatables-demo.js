// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableWisata').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableEvent').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});