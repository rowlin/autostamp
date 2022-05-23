<div class="d-flex flex-column" id="sidebar">
    <div class="text-center">
        <a href="/">
            <img src="{{ url('/images/Logo.png') }}" id="mtb30" alt="Logo">
        </a>
    </div>
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="/products"
               class="nav-link @if(strpos(request()->segment(1) , 'products') !== false ) active @endif"
            >Products</a>
        </li>
        <li class="nav-item" >
            <a href="/stores"
               class="nav-link @if(strpos(request()->segment(1) , 'store') !== false ) active @endif"
            >Stores</a>
        </li>
        <li class="nav-item">
            <a href="/prices"
               class="nav-link @if(request()->segment(1) === 'price' || request()->segment(1) === 'prices'  ) active @endif"
            >Prices</a>
        </li>
        <li class="nav-item">
            <a href="/price_lists"  class="nav-link @if(strpos(request()->segment(1) , 'price_list') !== false ) active @endif
            " >Price Lists</a>
        </li>
        <li class="nav-item">
            <a href="/users"
               class="nav-link @if(strpos(request()->segment(1) , 'user') !== false ) active @endif"
            >Users</a>
        </li>
        <li class="nav-item">
            <a href="/roles"
               class="nav-link @if(strpos(request()->segment(1) , 'role') !== false ) active @endif"
            >Roles</a>
        </li>
    </ul>
</div>
