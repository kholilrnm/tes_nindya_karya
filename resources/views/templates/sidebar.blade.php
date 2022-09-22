        <!-- Layout wrapper-->
        <div id="layoutDrawer">
            <!-- Layout navigation-->
            <div id="layoutDrawer_nav">
                <!-- Drawer navigation-->
                <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
                    <div class="drawer-menu">
                        <div class="nav">
                            <!-- Drawer section heading (Account)-->
                            <div class="drawer-menu-heading d-sm-none">Account</div>
                            <!-- Drawer link (Notifications)-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                                Notifications
                            </a>
                            <!-- Drawer link (Messages)-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                                Messages
                            </a>
                            <!-- Divider-->
                            <div class="drawer-menu-divider d-sm-none"></div>
                            <div class="drawer-menu-heading">Menu</div>
                            @if (session('idRole') == 1)
                                <a class="nav-link {{ (request()->is('order')) ? 'active' : '' }}" href="{{ url('order') }}">
                                    <div class="nav-link-icon"><i class="material-icons">description</i></div>
                                    Order
                                </a>
                                <a class="nav-link {{ (request()->is('stock')) ? 'active' : '' }}" href="{{ url('stock') }}">
                                    <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                                    Stock
                                </a>
                            @elseif (session('idRole') == 2)
                                <a class="nav-link {{ (request()->is('order')) ? 'active' : '' }}" href="{{ url('order') }}">
                                    <div class="nav-link-icon"><i class="material-icons">description</i></div>
                                    Order
                                </a>
                            @else
                                <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="{{ url('home') }}">
                                    <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                                    Dashboard
                                </a>
                                <a class="nav-link {{ (request()->is('order')) ? 'active' : '' }}" href="{{ url('order') }}">
                                    <div class="nav-link-icon"><i class="material-icons">description</i></div>
                                    Order
                                </a>
                                <a class="nav-link {{ (request()->is('stock')) ? 'active' : '' }}" href="{{ url('stock') }}">
                                    <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                                    Stock
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- Drawer footer        -->
                    <div class="drawer-footer border-top">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-muted">account_circle</i>
                            <div class="ms-3">
                                <div class="caption"><b>Logged in as:</b></div>
                                <div class="small fw-500">{{session('nama')}}</div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
