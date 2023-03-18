<div>
    <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
      </table>
</div>