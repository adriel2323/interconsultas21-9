<div class="table-responsive">
    <table id="products" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripción</th>
            <th>Medio</th>
            <th>Presentación</th>
            <th>Precio</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            @foreach($product->presentation as $presentation)
                <tr>
                    <td>{{ $product->Descripcion }}</td>
                    <td>{{ $presentation->Medio }}</td>
                    <td>{{ $presentation->Descripcion }}</td>
                    <td>${{ $presentation->price->PrecioPublico }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
