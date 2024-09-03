@extends('app')

@section('content')
  <a href="{{ route('home') }}" class="btn btn-light mb-3">Back to list</a>

  <div class="card">
    <div class="card-header">
      Create a new campaign
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title*</label>
          <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description*</label>
          <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="mb-3">
              <label for="goal_amount" class="form-label">Goal amount*</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" name="goal_amount" id="goal_amount" aria-label="Amount (to the nearest dollar)" required>
                <span class="input-group-text">.00</span>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category*</label>
          <select class="form-select" name="category" id="category" required>
            <option selected value="">Select a category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-grid">
          <input type="submit" value="create" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
@endsection