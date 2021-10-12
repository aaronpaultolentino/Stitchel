@push('styles')
  <!-- <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/custom.css?v='.config('eventleap.asset_version')) }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/plugins/css/dataTables.bootstrap4.css') }}">
@endpush


@push('scripts')
	<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
@endpush
