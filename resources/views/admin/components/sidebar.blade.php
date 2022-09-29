<div class="flex-shrink-0 p-3 bg-white" style="min-width: 185px;">
    <ul class="list-unstyled ps-0">
        <li>
            <div>
                <ul class="btn-toggle-nav list-unstyled fw-normal small bg-light">
                    <li class="border-top border-bottom bg-primary hover-auth-li">
                        <a href="{{ route('admin.admin') }}" class="btn w-100 fw-semibold text-secondary text-uppercase"><i class="fa-solid fa-utensils me-2"></i>{{ Auth::user()->name }}</a>
                    </li>
                    <li class="border-bottom hover-link ">
                        <a href="{{ route('admin.dishes.index') }}" class="btn w-100 {{ Route::currentRouteName() === 'admin.dishes.index' ? 'active-sidebar-button' : ''}}">Lista Piatti</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.dishes.create') }}" class="btn w-100 {{ Route::currentRouteName() === 'admin.dishes.create' ? 'active-sidebar-button' : ''}}">Aggiungi Piatto</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.orders.index') }}" class="btn w-100 {{ Route::currentRouteName() === 'admin.orders.index' ? 'active-sidebar-button' : ''}}">Lista Ordini</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.orders.chart') }}" class="btn w-100 {{ Route::currentRouteName() === 'admin.orders.chart' ? 'active-sidebar-button' : ''}}">Grafico Fatturato</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>