@extends('app')

@section('content')
  <a href="{{ route('home') }}" class="btn btn-light mb-3">Back to list</a>

  @session('success')
    <div class="alert alert-success">
      {{ $value }}
    </div>
  @endsession

  <div class="row">
    <div class="col-md-9">
      <div class="card border-light">
        <img src="/storage/{{ $campaign->image }}" alt="{{ $campaign->title }}">
        <div class="card-body">
          <h2 class="card-title fw-bold">{{ $campaign->title }}</h2>
          <p class="card-text mb-3">{!! nl2br($campaign->description) !!}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-bg-light">
        <div class="card-body">
          <h3 class="card-title fw-bold">${{ number_format($campaign->donations_sum_amount) }}</h3>
          <p class="card-text fs-5 text-secondary fw-medium">raised of <span class="text-dark fw-bolder">${{ number_format($campaign->goal_amount) }}</span> goal</p>
          <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{ $donation_progression }}" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: {{$donation_progression}}%"></div>
          </div>
          <p class="card-text fs-5 text-secondary fw-medium mb-3"><span class="text-dark fw-bolder fs-3">{{$campaign->donations_count}}</span> Donations</p>
          @if($campaign->status === 'Open')
            <div class="d-grid">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#donationModal"><i class="bi bi-heart"></i> Donate now</button>
            </div>
          @else
            <div class="alert alert-success" role="alert">
              Campaign goal reached, thanks for your support.
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  @include('partials/_donation-modal')
@endsection