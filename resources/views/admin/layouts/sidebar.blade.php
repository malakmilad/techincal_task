 <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="nav-heading">Product</li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Product" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('product.index')}}">
                        <i class="bi bi-circle"></i><span>All Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('product.create')}}">
                        <i class="bi bi-circle"></i><span>Create Product</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('payment.form')}}">
              <i class="bi bi-person"></i>
              <span>Payment</span>
            </a>
          </li>
     </ul>
 </aside>
