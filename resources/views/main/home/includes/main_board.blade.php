<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ auth()->user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ auth()->user()->status ?? 'nnnnn' }}

                    {{--@forelse ($slogans as $slogan)
                        
                    @empty
                        
                    @endforelse--}}
                   
                </div>
            </div>
        </div>
    </div>
</div>

