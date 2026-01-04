// Call the dataTables jQuery plugin
let table;
$(document).ready(function () {
  configuration && (configuration['drawCallback'] = function() {
    // $('[data-bs-toggle="tooltip"]', table.table().node()).tooltip();
  });

  let con = typeof(configuration) === 'function' ? configuration() : configuration || {};
  con.ajax.url = con.ajax.url.replace('http:',window.location.protocol);
  table = $('#dataTable').DataTable(con);
});
