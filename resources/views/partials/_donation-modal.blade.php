<div class="modal fade" id="donationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="donationModalLabel">Help make a better world!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @error('credentials')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="" method="post">
          @csrf
          <div class="mb-3">
            <label for="amount" class="form-label">Donation amount*</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" class="form-control" name="amount" id="amount" aria-label="Amount (to the nearest dollar)" required>
              <span class="input-group-text">.00</span>
            </div>
          </div>
          <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
          <div class="d-grid">
            <input type="submit" value="Donate" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>