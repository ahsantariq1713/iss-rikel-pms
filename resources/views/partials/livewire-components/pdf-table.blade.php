<style>
    #wrapper {
        font-size: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    #entities {
        border-collapse: collapse;
        width: 100%;

    }

    #entities td,
    #entities th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #entities tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    #entities th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(56, 56, 56);
        color: white;
    }

</style>
<div id="wrapper">
    <div style="text-align: center; margin-bottom:10px">
        <h3>Rikel PMS</h3>
    </div>
    <table id="entities" class="table table-vcenter table-bordered card-table">
        <thead>
            <tr>
                @foreach ($data['columns'] as $column)
                    @if ($column['display'] && $column['type'] != 'imageText' && $column['type'] != 'image')
                        <th>{{ $column['header'] }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data['entities'] as $entity)
                <tr>
                    @foreach ($data['columns'] as $column)
                        @if ($column['display'] && ($column['type'] != 'imageText' && $column['type'] != 'image'))
                            @if ($column['type'] == 'date' && isset($column['format']) && $entity[$column['key']])
                                <td>{{ $entity[$column['key']]->format($column['format']) }}</td>
                            @elseif ($entity[$column['key']])
                                <td> {{ $entity[$column['key']] }}</td>
                            @else
                                <td>NA</td>
                            @endif
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
