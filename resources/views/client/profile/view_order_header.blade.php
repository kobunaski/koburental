<div class="typo-header-sq">
    <div class="ui grid">
        <div class="row">
            <div class="ui twelve wide computer column">
                <h2>Orders</h2>

                <ul class="inline-menu-sq list-default-sq list-style-inline-sq">
                    <li class="{{Request()->is('profile/view/order/all') ? "active" : ""}}">
                        <a href="profile/view/order/all">All</a>
                    </li>
                    <li class="{{Request()->is('profile/view/order/pending') ? "active" : ""}}">
                        <a href="profile/view/order/pending">Pending</a>
                    </li>
                    <li class="{{Request()->is('profile/view/order/processing') ? "active" : ""}}">
                        <a href="profile/view/order/processing">Processing</a>
                    </li>
                    <li class="{{Request()->is('profile/view/order/completed') ? "active" : ""}}">
                        <a href="profile/view/order/completed">Completed</a>
                    </li>
                    <li class="{{Request()->is('profile/view/order/declined') ? "active" : ""}}">
                        <a href="profile/view/order/declined">Declined</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
