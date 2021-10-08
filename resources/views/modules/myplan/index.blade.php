@extends('layouts.app')

@section('content')
<div class="row mt-4">
  <div class="col-xl-4 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h1 class="card-title text-uppercase text-muted mb-0 text-center">My Plan 1</h1>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title text-center">$0 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4  text-center" >
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit ameasdasdt</li>
            </ul>
            <button type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-check" aria-hidden="true"></i> Activated</button>
          </div>
        </div>
      </div>
    </div>
  </div>
 <div class="col-xl-4 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h1 class="card-title text-uppercase text-muted mb-0 text-center">My Plan 2</h1>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title text-center">$0 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4 text-center">
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>

            </ul>
            <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fas fa-times" aria-hidden="true"></i> Upgrade to Standard</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h1 class="card-title text-uppercase text-muted mb-0 text-center">My Plan 3</h1>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title text-center">$0 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4 text-center">
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="fas fa-times" aria-hidden="true"></i> Lorem ipsum dolor sit amet</li>
            </ul>
            <button type="button" class="btn btn-warning btn-lg btn-block"><i class="fas fa-times" aria-hidden="true"></i> Upgrade to premium</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('optional_scripts')
<script type="text/javascript" src="{{ url('js/modules/reports/yearly.js?v='.config('eventleap.asset_version')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush