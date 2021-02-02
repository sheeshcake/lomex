<div class="row">
    <table id="products-table">
        <thead>
            <th>ID</th>
            <th>Product Details</th>
            <th>Products Category</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($products as $data)
                <tr>
                    <td> 
                        {{ $data["id"] }}
                    </td>
                    <td> 
                        {{ $data["product_name"] }}
                    </td>
                    <td> 
                        {{ $data["category_name"] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>