<div class="row">
    <table id="products-table">
        <thead>
            <th>ID</th>
            <th>Product Details</th>
            <th>Products Category</th>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Product Details</th>
            <th>Products Category</th>
        </tfoot>
    </table>
</div>
<button class="btn btn-primary" id="refresh">Refresh</button>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
var $table;
$(document).ready(function(){
    var $data = {"data" : []};
    $table = $('#products-table').DataTable({
        "ajax": {
            "url": "{{ url('dashboard/products') }}",
            "type": "GET",
            "dataType": 'json',
            "dataSrc": function (d) {
                return d;
            }
        }
    });
});
$("#refresh").click(function(){
    $table.ajax.reload();
});
</script>