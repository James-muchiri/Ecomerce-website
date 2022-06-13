 <aside id="left-panel" class="left-panel" style="background-color: #55597B;">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="/categories"> <i class="menu-icon fa fa-table"></i>Categories</a>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Manage Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/hidden_products">Hidden Product</a></li>
                            <li><i class="fa fa-table"></i><a href="/products">All Products</a></li>
                          
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Manage Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/pendingorders">Pending Order</a></li>
                            <li><i class="fa fa-table"></i><a href="/pendingdeliveries">Pending Deliveries</a></li>
                            <li><i class="fa fa-table"></i><a href="/completeorders">Completed Orders</a></li>
                          

                        </ul>
                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
  