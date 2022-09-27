<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-semibold">{{ Auth::user()->name }}</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <div class="" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <li><a href="{{ route('admin.dishes.index') }}" class="link-dark d-inline-flex text-decoration-none rounded">Lista Piatti</a></li>
                    <li><a href="{{ route('admin.dishes.create') }}" class="link-dark d-inline-flex text-decoration-none rounded">Aggiungi Piatto</a></li>
                </ul>
            </div>
        </li>
        
        <li class="mb-1">
            <div class="" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <li><a href="{{ route('admin.orders.index') }}" class="link-dark d-inline-flex text-decoration-none rounded">Lista Ordini</a></li>
                    <li><a href="{{ route('admin.orders.chart') }}" class="link-dark d-inline-flex text-decoration-none rounded">Grafico Fatturato</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        /form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
