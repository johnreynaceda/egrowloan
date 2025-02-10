<div>
    <div class="mb-5">
        @if (auth()->user()->user_type == 'staff')
            <x-button label="Back" squared slate icon="arrow-left" href="{{ route('staff.dashboard') }}" />
        @else
            <x-button label="Back" squared slate icon="arrow-left" href="{{ route('customer.loans') }}" />
        @endif
    </div>
    <div>
        {{ $this->table }}
    </div>
</div>
