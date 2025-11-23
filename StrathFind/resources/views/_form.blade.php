@csrf

<div class="form-group mb-3">
    <label for="claimant_name">Claimant Name:</label>
    <input type="text" name="claimant_name" id="claimant_name"
           value="{{ old('claimant_name', $claim->claimant_name ?? '') }}" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label for="item_name">Item Name:</label>
    <input type="text" name="item_name" id="item_name"
           value="{{ old('item_name', $claim->item_name ?? '') }}" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $claim->description ?? '') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="pending" {{ (old('status', $claim->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ (old('status', $claim->status ?? '') == 'approved') ? 'selected' : '' }}>Approved</option>
        <option value="rejected" {{ (old('status', $claim->status ?? '') == 'rejected') ? 'selected' : '' }}>Rejected</option>
    </select>
</div>

<button type="submit" class="btn btn-success">Save</button>
<a href="{{ route('claims.index') }}" class="btn btn-secondary">Cancel</a>
