@extends("home")

@section("topbar")
    @include("layout.topbar")
@endsection

@section("sidebar")
    @include("layout.sidebar")
@endsection

@section("content")

<input type="hidden" value="{{ csrf_token() }}" id="_token">
<div class="p-3 mb-5 bg-white rounded">
    <div id="table-alert">
    </div>
    <div align="right">
        <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <table id="featured-table" class="table-bordered table table-striped">
        <thead class="thead-light">
            <th>ID</th>
            <th>Featured Link</th>
            <th></th>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Featured Link</th>
            <th></th>
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
$(document).ready(function(){
  
    fetch_data();

    function fetch_data(){
        var dataTable = $('#featured-table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "ajax" : {
                url:"featured/getfeatured",
                type:"get"
            }
        });
    }
    $('#add').click(function(){
        var html = '<tr>';
        html += '<td></td>';
        html += '<td contenteditable id="data1"></td>';
        html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
        html += '</tr>';
        $('#featured-table tbody').prepend(html);
    });
    function update_data(id, column_name, value){
        $.ajax({
            url:"featured/updatefeatured",
            method:"POST",
            data:{id:id, column_name:column_name, value:value, _token: $("#_token").val()},
            success:function(data)
            {
                $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                $('#featured-table').DataTable().destroy();
                fetch_data();
            }
        });
        setTimeout(function(){
            $('#table-alert').html('');
        }, 5000);
    }
    $(document).on('blur', '.update', function(){
        var id = $(this).data("id");
        var column_name = $(this).data("column");
        var value = $(this).text();
        update_data(id, column_name, value);
    });
    $(document).on('click', '#insert', function(){
        var featured_link = $('#data1').text();
        if(featured_link != ''){
            $.ajax({
                url:"featured/createfeatured",
                method:"POST",
                data:{
                    featured_link: featured_link,
                    _token: $("#_token").val()
                    },
                success:function(data){
                    $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                    $('#featured-table').DataTable().destroy();
                    fetch_data();
                }
            });
            setTimeout(function(){
                $('#table-alert').html('');
            }, 5000);
        }
        else{
            alert("Both Fields is required");
        }
    });
    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this?")){
            $.ajax({
                url:"featured/deletefeatured",
                method:"POST",
                data:{id:id, _token: $("#_token").val()},
                success:function(data){
                    $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                    $('#featured-table').DataTable().destroy();
                    fetch_data();
                }
            });
            setTimeout(function(){
                $('#table-alert').html('');
            }, 5000);
        }
    });
});


</script>

@endsection