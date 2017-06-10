<b>Участок {{ $number }}</b><br/>

<ul>
@foreach ($data as $item)
    <li>{{ $item['name'] }}:
        <ul>
            <li>Телефон: {!! str_replace(',', '<br/>', $item['phone']) !!}</li>
            @if ($item['email'])
                <li>E-mail: {{ $item['email'] }}</li>
            @endif
        </ul>
    </li>
@endforeach
</ul>
