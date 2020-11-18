<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
    @if (Auth::user())
        	<form id="chk-radios-form" method="POST" action="{{ route('book') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 control-label text-sm-right pt-2">Schedule<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div >
                            <input id="scheduled_at" name="scheduled_at" type="datetime-local" required />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label text-sm-right pt-2">Services<span class="required">*</span></label>
                    <div class="col-sm-9">
                        @foreach($services as $service) 
                        <div class="checkbox-custom chekbox-primary">
                            <input id="{{ $service['service'] }}" value="{{ $service['id'] }}" type="checkbox" name="for[]" required />
                            <label for="{{ $service['service'] }}">{{ $service['service'] }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="user_id" value={{ Auth::id() }}>
            </form>
    @else
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">
                Login
            </h2>
        </header>
        <div class="card-body">
            <form class="form-horizontal"  method="POST" action="{{ route('login') }}">
                @csrf
                    <div
                        class="form-group form-row"
                    >
                        <label
                            for="inputEmail4"
                            >Email</label
                        >
                        <input
                            name="email"
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Email"
                        />
                    </div>
                
                    <div
                    class="form-group form-row"
                >
                    <label
                        for="inputPassword4"
                        >Password</label
                    >
                    <input
                        name="password"
                        type="password"
                        id="password"
                        class="form-control"
                        placeholder="Password"
                    />

                    
                </div>

                <div class="form-group form-row">
               
                    <div
                    
                    >
                    <p>Don't have an account yet? <a href="{{ route('register') }}">Register here.</a></p>
                        <button
                            class="btn btn-primary"
                            type="submit"
                        >
                            Login
                        </button>
                        <button
                            class="btn btn-default modal-dismiss"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @endif
</div>
