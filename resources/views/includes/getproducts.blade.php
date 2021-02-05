
<div class="alert" id="table-alert" style="display: none" role="alert">
</div>
<div class="p-3 mb-5 bg-white rounded">
    <table id="products-table" class="table-bordered table table-striped table-hover">
        <thead class="thead-light">
            <th><input type="checkbox" class="input-form" id="select-all"></th>
            <th>ID</th>
            <th>Image</th>
            <th>Product Details</th>
            <th>Products Category</th>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <th></th>
            <th>ID</th>
            <th>Image</th>
            <th>Product Details</th>
            <th>Products Category</th>
        </tfoot>
    </table>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script>
var $table;
$(document).ready(function(){
    $table = $('#products-table').DataTable({
        "bAutoWidth": false,
        columnDefs: [
            { "width": "40vw", "targets": 3 },
            {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
            } 
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
        "ajax": {
            "url": "{{ url('dashboard/products') }}",
            "type": "GET",
            "dataType": 'json',
            "dataSrc": function (d) {
                console.log(d);
                var $data = [];
                d.forEach(function(entry) {
                    entry.unshift("");
                    entry[2] = "<img width='50vw' class='product-image mx-auto d-block' src='img/products/" + entry[2] + "'>";
                    entry[3] = "<p class='text-center'>" + entry[3] + "</p>";
                    entry[4] = "<p class='text-center'>" + entry[4] + "</p>";
                    $data.push(entry);
                });
                return $data;
            }
        },
        "dom": '<"top"Bf>irt<"bottom"lp><"clear">',
        buttons: [
            {
                text: 'Create Product',
                attr: {
                    class: 'btn btn-primary',
                    onclick: "location.href = '{{ url('dashboard/createproduct') }}'"
                },
                action: function ( e, dt, node, config ) {
                    return true;
                }
            },
            {
                text: 'Delete',
                attr: {
                    class: 'btn btn-danger',
                    id: 'delete',
                    style: "display: none"
                },
                action: function ( e, dt, node, config ) {
                    var $product_id = [];
                    for(var i = 0; i < $table.rows('.selected').data().length; i++){
                        $product_id.push(this.rows('.selected').data()[i][1]);
                    }
                    $.ajax({
                        url: "{{ url('dashboard/deleteproduct') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            product_id: $product_id
                        },
                        success: function(d){
                            $("#delete").fadeOut(500);
                            $("#table-alert").addClass("alert-" + d["status"]);
                            $("#table-alert").text(d["msg"]);
                            $("#table-alert").slideDown(500);
                            setTimeout(function () {
                                $("#table-alert").slideUp(500);
                            }, 5000);
                            $table.ajax.reload();
                        }
                    })
                }
            }
        ]
    });
    $table.on('select', function(e,dt,type,indexes){
        var length = $table.rows('.selected').data().length;
        if(length > 0){
            $("#delete").fadeIn(500);
        }
    }).on('deselect', function(e,dt,type,indexes){
        var length = $table.rows('.selected').data().length;
        if(length <= 0){
            $("#delete").fadeOut(500);
        }
    });
});
$("#products-table").on('click','tbody tr', function (evt){
    var $cell=$(evt.target).closest('td');
    if( $cell.index() > 0){
        var data = $table.row(this).data();
        window.location.replace("?p=editproduct&id=" + data[1]);
    }
});
$("#select-all").on("click", function(e) {
    if ($(this).is( ":checked" )) {
        $table.rows().select();        
    } else {
        $table.rows().deselect(); 
    }
});
</script>