
<div
id="clientLoginModal"
class="modal-block modal-block-primary mfp-hide"
>
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
</div>