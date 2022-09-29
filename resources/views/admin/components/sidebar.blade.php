<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <ul class="list-unstyled ps-0">
        <li>
            <div>
                <ul class="btn-toggle-nav list-unstyled fw-normal small bg-light">
                    <li class="border-top border-bottom bg-primary hover-auth-li">
                        <a href="{{ route('admin.admin') }}" class="btn w-100 fw-semibold text-secondary text-uppercase"><i class="fa-solid fa-utensils me-2"></i>{{ Auth::user()->name }}</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.dishes.index') }}" class="btn w-100">Lista Piatti</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.dishes.create') }}" class="btn w-100">Aggiungi Piatto</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.orders.index') }}" class="btn w-100">Lista Ordini</a>
                    </li>
                    <li class="border-bottom hover-link">
                        <a href="{{ route('admin.orders.chart') }}" class="btn w-100">Grafico Fatturato</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>