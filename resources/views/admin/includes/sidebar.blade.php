<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

           
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2"></span>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.maincategories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.maincategories.create')}}" data-i18n="nav.dash.crypto">أضافة
                             قسم جديد </a>
                    </li>
                </ul>
            </li>

         
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">العلامات النجاريه  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2"></span>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.type')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.type.create')}}" data-i18n="nav.dash.crypto">أضافة
                             علامه تجاريه جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات  </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2"><span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.vendors')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.vendors.create')}}" data-i18n="nav.dash.crypto">أضافة
                            منتج  </a>
                    </li>
                </ul>
            </li>


         
        </ul>
    </div>
</div>
