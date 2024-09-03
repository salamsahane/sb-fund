@extends('app')

@section('content')
  @session('success')
    <div class="alert alert-success">
      {{ $value }}
    </div>
  @endsession

  @isset($campaigns)
  <h1 class="mb-3">Campaigns to donate</h1>
    <div class="row g-4">
      @foreach ($campaigns as $campaign)
        <div class="col-4">
          <div class="card">
            @if($campaign->status === 'Completed')
              <span class="badge rounded-pill text-bg-success w-25 position-absolute">Complete</span>
            @endif
            <img src="/storage/{{ $campaign->image }}" class="card-img-top" alt="{{ $campaign->title }}">
            <div class="card-body">
              <h6 class="card-subtitle text-success text-uppercase">{{ $campaign->category->name }}</h6>
              <a href="{{ route('campaign.show', ['campaign' => $campaign->id]) }}" class="card-title fs-3 fw-bolder d-inline-block link-dark link-underline-light link-underline-opacity-100-hover mb-3" style>{{ $campaign->title }}</a>
              <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{ ($campaign->donations_sum_amount / $campaign->goal_amount) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: {{ ($campaign->donations_sum_amount / $campaign->goal_amount) * 100 }}%"></div>
              </div>
              <div class="row text-body-secondary fs-6 fw-semibold">  
                <div class="col">
                  <span><i class="bi bi-coin text-success"></i> Raised: <span class="text-success">${{ number_format($campaign->donations()->sum('amount')) }}</span></span>
                </div>
                <div class="col d-flex justify-content-end"> 
                  <span><i class="bi bi-calendar3 text-success"></i> Goal: <span class="text-success">${{ number_format($campaign->goal_amount) }}</span></span>
                </div>
              </div>
              <span class="text-body-secondary fw-light fst-italic d-inline-block mt-3">Created by {{ $campaign->user->name }}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endisset

  @empty($campaigns->toArray())
    <div class="alert alert-info mt-4">
      No campaign available for the moment
    </div>
  @endempty
  
@endsection