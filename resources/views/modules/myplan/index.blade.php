@extends('layouts.app')

@section('content')
   <div class="row mt--7">
      <div class="col">
         <div class="card shadow">
            <div class="card-body">
               <h1>My Plan</h1>
               </div>
            </div>
        </div>
    </div>
@endsection

@push('optional_scripts')
<script type="text/javascript" src="{{ url('js/modules/reports/yearly.js?v='.config('eventleap.asset_version')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush