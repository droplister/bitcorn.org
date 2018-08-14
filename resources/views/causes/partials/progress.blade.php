<h3>{{ $cause->progress }}% Pledged</h3>
<div class="progress mb-5">
    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $cause->progress === 0 ? 1 : $cause->progress }}%" aria-valuenow="{{ $cause->progress === 0 ? 1 : $cause->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
</div>