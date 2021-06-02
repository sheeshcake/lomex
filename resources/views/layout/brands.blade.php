@extends("home")

@section("topbar")
    @include("layout.topbar")
@endsection


@section("sidebar")
    @include("layout.sidebar")
@endsection
@section("content")
<input type="hidden" value="{{ csrf_token() }}" id="_token">
    <div class="card">
        <div class="card-header">
            Brands
        </div>
        <div class="card-body">
            <div id="table-alert"></div>
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-info">Add</button>
            </div>
            <table id="brand-table" class="teble table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th></th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
  
            fetch_data();
            function fetch_data(){
                var dataTable = $('#brand-table').DataTable({
                    "processing" : true,
                    "serverSide" : true,
                    "order" : [],
                    "ajax" : {
                        url:"{{ route('admin.getbrands') }}",
                        type:"post",
                        data: {_token: $("#_token").val()}
                    }
                });
            }
            $('#add').click(function(){
                var html = '<tr>';
                html += '<td  class="bg-primary"></td>';
                html += '<td contenteditable id="data1" class="bg-primary"></td>';
                html += '<td  class="bg-primary"><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
                html += '</tr>';
                $('#brand-table tbody').prepend(html);
            });
            function update_data(id, column_name, value){
                $.ajax({
                    url:"{{ route('admin.updatebrand') }}",
                    method:"POST",
                    data:{id:id, column_name:column_name, value:value, _token: $("#_token").val()},
                    success:function(data)
                    {
                        $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                        $('#brand-table').DataTable().destroy();
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
                var brand_name = $('#data1').text();
                if(brand_name != ''){
                    $.ajax({
                        url:"{{ route('admin.addbrand') }}",
                        method:"POST",
                        data:{
                            brand_name: brand_name,
                            _token: $("#_token").val()
                            },
                        success:function(data){
                            $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                            $('#brand-table').DataTable().destroy();
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
                        url:"{{ route('admin.deletebrand') }}",
                        method:"POST",
                        data:{id:id, _token: $("#_token").val()},
                        success:function(data){
                            $('#table-alert').html('<div class="alert alert-success">'+data+'</div>');
                            $('#brand-table').DataTable().destroy();
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